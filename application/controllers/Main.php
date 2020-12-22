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

        $data['page_title'] = '[s4s] Tribune';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('headlines', $data);
        $this->load->view('templates/footer', $data);
    }

    public function article($board, $thread_no, $thread_slug = '')
    {
        $data['thread'] = $this->fourchan->get_thread($board, $thread_no);

        $data['page_title'] = '[s4s] Tribune';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('article', $data);
        $this->load->view('templates/footer', $data);
    }

    public function radio()
    {
        $data['page_title'] = '[s4s] Radio';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/radio', $data);
        $this->load->view('templates/footer', $data);
    }

    // Print is reserved word
    public function print_media()
    {
        $data['page_title'] = '[s4s] Print';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/print', $data);
        $this->load->view('templates/footer', $data);
    }

    public function weather()
    {
        $data['page_title'] = '[s4s] Weather';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/weather', $data);
        $this->load->view('templates/footer', $data);
    }

    public function markets()
    {
        $data['page_title'] = '[s4s] Markets';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/markets', $data);
        $this->load->view('templates/footer', $data);
    }

    public function election()
    {
        $data['page_title'] = '[s4s] Election';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/election', $data);
        $this->load->view('templates/footer', $data);
    }

    public function travel()
    {
        $data['page_title'] = '[s4s] Travel';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/travel', $data);
        $this->load->view('templates/footer', $data);
    }

    public function spiderman()
    {
        $data['page_title'] = '[s4s] Spiderman';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('extras/spiderman', $data);
        $this->load->view('templates/footer', $data);
    }

}
