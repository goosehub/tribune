<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class helper extends CI_Model
{
    function get_headline($post)
    {
        if (isset($post->sub)) {
            return $post->sub;
        }
        if (!isset($post->com)) {
            return 'Topkek';
        }
        if (strpos($post->com, '<br>') !== false) {
            return substr($post->com, 0, strpos($post->com, '<br>'));
        }
        else {
            return $post->com;
        }

    }
}
?>
