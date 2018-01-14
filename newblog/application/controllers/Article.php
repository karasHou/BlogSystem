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

        $user = $this->session->userdata('user');

        $types = $this->Article_model->get_article_type($user->user_id);

        $this->load->view('newblog', array('types' => $types));

    }

    public function insert_article()
    {

        $title = $this->input->post('title');
        $catalog = $this->input->post('catalog');
        $content = $this->input->post('content');
        $user = $this->session->userdata('user');


        date_default_timezone_set('Asia/Shanghai');

        $rows = $this->Article_model->publish_blog(array(
            'title' => $title,
            'content' => $content,
            'post_date' => date("Y-m-d h:m:s"),
            'user_id' => $user->user_id,
            'type_id' => $catalog
        ));

        if ($rows > 0) {
            redirect('Welcome/index_logined');
        }

    }


}
