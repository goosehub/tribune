<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    protected $boards = ['s4s'];
    protected $max_thread_size = 9999;
    protected $json_folder_path = 'application/json/';
    protected $image_folder_path = 'uploads/';
    protected $api_base = 'https://a.4cdn.org/';
    protected $image_api_base = 'https://i.4cdn.org/';

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
        $this->generate_json_files();
        echo 'End of Cron - ' . time() . '<br>';
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

    public function generate_json_files()
    {
        foreach ($this->boards as $board) {
            $pages = $this->get_from_api($board . '/threads.json', false);
            foreach ($pages as $page) {
                foreach ($page->threads as $page_thread) {
                    if ($page_thread->replies > $this->max_thread_size) {
                        continue;
                    }
                    $rawThread = $this->get_from_api($board . '/thread/' . $page_thread->no . '.json', true);
                    file_put_contents($this->json_folder_path . $board . '_' . $page_thread->no . '.json', $rawThread);
                    $thread = json_decode($rawThread);
                    $op = $thread->posts[0];
                    $opImage = $op->tim . $op->ext;
                    $imageContents = file_get_contents($this->image_api_base . $board . '/' . $opImage);
                    file_put_contents($this->image_folder_path . $board . '_' . $opImage, $imageContents);
                }
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