<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('fourchan', '', TRUE);
        $this->load->model('youtube', '', TRUE);
        $this->load->model('helper', '', TRUE);
    }

    public function index($page = 1)
    {
        $data['page'] = $page;
        $offset = ($page - 1) * PER_PAGE;
        $limit = PER_PAGE;
        $data['posts'] = $this->fourchan->get_original_posts($offset, $limit);

        $data['page_title'] = '[s4s] Tribune';
        $data = $this->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('headlines', $data);
        $this->load->view('templates/footer', $data);
    }

    public function article($board, $thread_no, $thread_slug = '')
    {
        $data['thread'] = $this->fourchan->get_thread($board, $thread_no);

        $data['page_title'] = '[s4s] Tribune';
        $data = $this->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('article', $data);
        $this->load->view('templates/footer', $data);
    }

    public function radio()
    {
        $data['page_title'] = '[s4s] Radio';
        $data = $this->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/radio', $data);
        $this->load->view('templates/footer', $data);
    }

    // Print is reserved word
    public function print_media()
    {
        $data['page_title'] = '[s4s] Print';
        $data = $this->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/print', $data);
        $this->load->view('templates/footer', $data);
    }

    public function weather()
    {
        $data['page_title'] = '[s4s] Weather';
        $data = $this->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/weather', $data);
        $this->load->view('templates/footer', $data);
    }

    public function markets()
    {
        $data['page_title'] = '[s4s] Markets';
        $data = $this->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/markets', $data);
        $this->load->view('templates/footer', $data);
    }

    public function election()
    {
        $data['page_title'] = '[s4s] Election';
        $data = $this->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/election', $data);
        $this->load->view('templates/footer', $data);
    }

    public function travel()
    {
        $data['page_title'] = '[s4s] Travel';
        $data = $this->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/travel', $data);
        $this->load->view('templates/footer', $data);
    }

    public function spiderman()
    {
        $data['page_title'] = '[s4s] Spiderman';
        $data = $this->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/spiderman', $data);
        $this->load->view('templates/footer', $data);
    }

    public function global_data_set($data)
    {
        $data['youtube_id'] = $this->youtube->random_youtube_id();
        $data = $this->get_weather($data);
        return $data;
    }

    public function get_weather($data)
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
