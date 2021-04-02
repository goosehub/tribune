<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class fourchan extends CI_Model
{
    public $json_folder;

    function __construct()
    {
        parent::__construct();
        $this->json_folder = 'application/json/';
        $this->excluded_files = ['.', '..', '.gitignore'];
    }

    function get_original_posts($offset, $limit)
    {
        $threads = [];
        // Get all non hidden files
        $json_files = array_values(preg_grep('/^([^.])/', scandir($this->json_folder)));
        // Loop, consdering limit, offset, and number of files
        for ($i = $offset; $i < $limit + $offset; $i++) {
            // Catch
            if (!isset($json_files[$i])) {
                // dd('get_original_posts limit broke');
                break;
            }
            $json_file = $json_files[$i];
            if ($this->exclude_file($json_file)) {
                continue;
            }
            $json_contents = file_get_contents($this->json_folder . $json_file);
            $thread = json_decode($json_contents);
            $threads[] = $thread->posts[0];
        }
        return $threads;
    }

    function exclude_file($json_file)
    {
        if (strpos($json_file, 'fortunes') !== false) {
            return true;
        }
        if (strpos($json_file, 'gets') !== false) {
            return true;
        }
        if (strpos($json_file, 'votes') !== false) {
            return true;
        }
        return false;
    }

    function get_thread($board, $thread_no)
    {
        $filepath = $this->json_folder . $board . '_' . $thread_no . '.json';
        if (!file_exists($filepath)) {
            echo 'Thread has been pruned';
            die();
        }
        $json_contents = file_get_contents($filepath);
        return json_decode($json_contents);
    }

    function get_fortunes($board)
    {
        $filepath = $this->json_folder . $board . '_fortunes.json';
        if (!file_exists($filepath)) {
            echo 'Thread has been pruned';
            die();
        }
        $json_contents = file_get_contents($filepath);
        return json_decode($json_contents);
    }

    function get_gets($board)
    {
        $filepath = $this->json_folder . $board . '_gets.json';
        if (!file_exists($filepath)) {
            echo 'Thread has been pruned';
            die();
        }
        $json_contents = file_get_contents($filepath);
        return json_decode($json_contents);
    }

    function get_votes($board)
    {
        $filepath = $this->json_folder . $board . '_votes.json';
        if (!file_exists($filepath)) {
            echo 'Thread has been pruned';
            die();
        }
        $json_contents = file_get_contents($filepath);
        return (array)json_decode($json_contents);
    }

}
?>
