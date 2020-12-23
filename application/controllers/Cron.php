<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    protected $max_thread_size = 9999;
    protected $json_folder_path = 'application/json/';
    protected $image_folder_path = 'uploads/';
    protected $api_base = 'https://a.4cdn.org/';
    protected $image_api_base = 'https://i.4cdn.org/';
    protected $pages_to_pull = 3;
    protected $fortunes = [
        'f51c6a---foggy---reply_hazy' => 0,
        'fd4d32---windy---excellent_luck' => 0,
        'e7890c---cloudy---good_luck' => 0,
        'bac200---overcast---average_luck' => 0,
        '7fec11---rain---bad_luck' => 0,
        '43fd3b---snow---good_news' => 0,
        '16f174---hail---short_face' => 0,
        '00cbb0---blizzard---long_face' => 0,
        '0893e1---storms---handsome_stranger' => 0,
        '2a56fb---unknown---better_not' => 0,
        '6023f8---clear---outlook_good' => 0,
        '9d05da---tornados---very_bad' => 0,
        'd302a7---eclipse---godly_luck' => 0,
    ];

    function __construct() {
        parent::__construct();
    }

    // Map view
    public function index($token = false)
    {
        // Use hash equals function to prevent timing attack
        $auth = auth();
        if (!$token) {
            return false;
        }
        if (!hash_equals($auth->token, $token)) {
            return false;
        }

        // Check if it's time to run
        $crontab = '* * * * *'; // Every minute
        $now = date('Y-m-d H:i:s');
        $run_crontab = parse_crontab($now, $crontab);
        if (!$run_crontab) {
            echo 'Start of Cron - ' . time() . '<br>';
            return false;
        }

        // Run cron
        echo 'Start of Cron - ' . time() . '<br>';
        $this->clear_json_files();
        $this->clear_image_files();
        $this->main_loop();
        echo 'End of Cron - ' . time() . '<br>';
    }

    public function main_loop()
    {
        $pages = $this->get_from_api(BOARD . '/threads.json', false);
        foreach ($pages as $key => $page) {
            if ($key >= $this->pages_to_pull) {
                break;
            }
            foreach ($page->threads as $page_thread) {
                if ($page_thread->replies > $this->max_thread_size) {
                    continue;
                }
                $thread_json_string = $this->get_from_api(BOARD . '/thread/' . $page_thread->no . '.json', true);
                $thread = json_decode($thread_json_string);

                $this->create_thread_json($page_thread, $thread_json_string);
                $this->create_thread_images($thread);
                $this->increment_fortunes($thread);
            }
        }
        $this->create_fortunes_json($thread);
    }

    public function create_thread_json($page_thread, $thread_json_string)
    {
        file_put_contents($this->json_folder_path . BOARD . '_' . $page_thread->no . '.json', $thread_json_string);
    }

    public function create_thread_images($thread)
    {
        $op = $thread->posts[0];
        $op_image = $op->tim . $op->ext;
        $image_contents = file_get_contents($this->image_api_base . BOARD . '/' . $op_image);
        file_put_contents($this->image_folder_path . BOARD . '_' . $op_image, $image_contents);
    }

    public function increment_fortunes($thread)
    {
        foreach ($thread->posts as $post) {
            if (!isset($post->com)) {
                continue;
            }
            if (strpos($post->com, '#f51c6a') !== false) {
                $this->fortunes['f51c6a---foggy---reply_hazy']++;
            }
            if (strpos($post->com, '#fd4d32') !== false) {
                $this->fortunes['fd4d32---windy---excellent_luck']++;
            }
            if (strpos($post->com, '#e7890c') !== false) {
                $this->fortunes['e7890c---cloudy---good_luck']++;
            }
            if (strpos($post->com, '#bac200') !== false) {
                $this->fortunes['bac200---overcast---average_luck']++;
            }
            if (strpos($post->com, '#7fec11') !== false) {
                $this->fortunes['7fec11---rain---bad_luck']++;
            }
            if (strpos($post->com, '#43fd3b') !== false) {
                $this->fortunes['43fd3b---snow---good_news']++;
            }
            if (strpos($post->com, '#16f174') !== false) {
                $this->fortunes['16f174---hail---short_face']++;
            }
            if (strpos($post->com, '#00cbb0') !== false) {
                $this->fortunes['00cbb0---blizzard---long_face']++;
            }
            if (strpos($post->com, '#0893e1') !== false) {
                $this->fortunes['0893e1---storms---handsome_stranger']++;
            }
            if (strpos($post->com, '#2a56fb') !== false) {
                $this->fortunes['2a56fb---unknown---better_not']++;
            }
            if (strpos($post->com, '#6023f8') !== false) {
                $this->fortunes['6023f8---clear---outlook_good']++;
            }
            if (strpos($post->com, '#9d05da') !== false) {
                $this->fortunes['9d05da---tornados---very_bad']++;
            }
            if (strpos($post->com, '#d302a7') !== false) {
                $this->fortunes['d302a7---eclipse---godly_luck']++;
            }
        }
    }

    public function create_fortunes_json()
    {
        $fortune_json_string = json_encode($this->fortunes);
        file_put_contents($this->json_folder_path . BOARD . '_fortunes.json', $fortune_json_string);
    }

    public function clear_json_files()
    {
        $files = glob($this->json_folder_path . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }

    public function clear_image_files()
    {
        $files = glob($this->image_folder_path . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }

    public function get_from_api($path, $raw = false)
    {
        // Get from API
        $full_url = $this->api_base . $path;
        $raw_response = file_get_contents($full_url);

        // Stop on any failure
        if (!$raw_response) {
            echo 'file_get_contents dun goofed';
            die();
        }

        // Sleep for the API, only allowed at most one request per second
        usleep(1100);

        // Return result as requested
        if ($raw) {
            return $raw_response;
        }
        else {
            return json_decode($raw_response);
        }
    }
}