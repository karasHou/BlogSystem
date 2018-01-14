<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller
{


    //构造函数
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Article_model");

    }


    //跳转到创建文章界面
    public function createblog()
    {

        $this->load->view('newblog');

    }


}
