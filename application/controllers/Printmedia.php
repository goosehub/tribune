<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Print is reserved word */
class Printmedia extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('fourchan', '', TRUE);
        $this->load->model('youtube', '', TRUE);
        $this->load->model('helper', '', TRUE);
    }

    public function april()
    {
        $data['page_title'] = '[s4s] April Issue';
        $data = $this->helper->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('print/april', $data);
        $this->load->view('templates/footer', $data);
    }

    public function may()
    {
        $data['page_title'] = '[s4s] May Issue';
        $data = $this->helper->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('print/may', $data);
        $this->load->view('templates/footer', $data);
    }

    public function june()
    {
        $data['page_title'] = '[s4s] June Issue';
        $data = $this->helper->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('print/june', $data);
        $this->load->view('templates/footer', $data);
    }

    public function july()
    {
        $data['page_title'] = '[s4s] July Issue';
        $data = $this->helper->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('print/july', $data);
        $this->load->view('templates/footer', $data);
    }

    public function weekly($file)
    {
        $data['file'] = $file;
        $data['page_title'] = '[s4s] Weekly Issue';
        $data = $this->helper->global_data_set($data);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar', $data);
        $this->load->view('print/weekly', $data);
        $this->load->view('templates/footer', $data);
    }

}
