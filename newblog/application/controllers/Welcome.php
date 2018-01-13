<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    //构造函数
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Article_model");


    }

    public function index()
    {
        $results = $this->Article_model->get_article_list();


        $user = $this->session->userdata('user');

        if (isset($user)) {

            $types = $this->Article_model->get_article_type($user->user_id);
            $this->load->view('index', array('list' => $results, 'types' => $types));

        } else {

            $this->load->view('index');

        }

    }
}
