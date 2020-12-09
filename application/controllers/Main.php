<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('fourchan', '', TRUE);
        $this->load->model('helper', '', TRUE);
    }

    public function index($page = 1)
    {
        $data['page'] = $page;
        $offset = ($page - 1) * PER_PAGE;
        $limit = PER_PAGE;
        $data['posts'] = $this->fourchan->get_original_posts($offset, $limit);

        // Load view
        $data['page_title'] = '[s4s] Tribune';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('headlines', $data);
        $this->load->view('templates/footer', $data);
    }

    public function article($board, $thread_no, $thread_slug)
    {
        $data['thread'] = $this->fourchan->get_thread($board, $thread_no);

        // Load view
        $data['page_title'] = '[s4s] Tribune';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('article', $data);
        $this->load->view('templates/footer', $data);

    }
}
