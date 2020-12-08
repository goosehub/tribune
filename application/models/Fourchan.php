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
        $json_files = scandir($this->json_folder);
        // Loop, consdering limit, offset, and number of files
        for ($i = $offset; $i <= $limit + $offset; $i++) {
            if (!isset($json_files[$i])) {
                break;
            }
            $json_file = $json_files[$i];
            // Ignore hidden files
            if ($json_file[0] === '.') {
                continue;
            }
            $json_contents = file_get_contents($this->json_folder . $json_file);
            $thread = json_decode($json_contents);
            $threads[] = $thread->posts[0];
        }
        return $threads;
    }

}
?>
