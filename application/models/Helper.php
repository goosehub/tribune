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

    function global_data_set($data)
    {
        $data['youtube_id'] = $this->youtube->random_youtube_id();
        $data = $this->get_weather($data);
        return $data;
    }

    function get_weather($data)
    {
        $fortunes = $this->fourchan->get_fortunes(BOARD);
        $data['weather_temp'] = 0;
        $data['weather_type'] = 'End of the world';
        $data['weather_color'] = '#000000';
        $number_to_beat = 0;
        foreach ($fortunes as $key => $fortune) {
            $data['weather_temp'] += $fortune;
            if ($fortune > $number_to_beat) {
                $number_to_beat = $fortune;
                $weather_array = explode('---', $key);
                $data['weather_color'] = $weather_array[0];
                $data['weather_type'] = $weather_array[1];
            }
        }
        $temp_color_base = dechex($data['weather_temp']) . '0000';
        $data['temp_color_hex'] = substr($temp_color_base, 0, 6);
        return $data;
    }
}
?>
