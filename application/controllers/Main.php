<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('fourchan', '', TRUE);
        $this->load->model('helper', '', TRUE);
    }

    public function index($offset = 0, $limit = 1000)
    {
        $data['posts'] = $this->fourchan->get_original_posts($offset, $limit);

        // Load view
        $data['page_title'] = '[s4s] Tribune';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('main', $data);
        $this->load->view('headlines', $data);
        $this->load->view('templates/footer', $data);
    }
}
