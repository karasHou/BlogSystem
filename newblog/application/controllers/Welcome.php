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

    public function index_logined()
    {


        $user = $this->session->userdata('user');


        //配置分页类
        $this->load->library('pagination');
        //获取文章表的
        $total = $this->Article_model->get_count_article($user);
        //当前控制器方法
        $config['base_url'] = base_url() . 'welcome/index_logined';
        //总数
        $config['total_rows'] = $total;
        //每页显示条数
        $config['per_page'] = 2;
        //初始化
        $this->pagination->initialize($config);
        //创建分页标签对象
        $links = $this->pagination->create_links();
        //第一个参数是每页的数量,第二个参数是计算每次的偏移量（偏移量是指从开头到当前的距离）
        $results = $this->Article_model->get_article_list($config['per_page'], $this->uri->segment(3));

        $types = $this->Article_model->get_article_type($user->user_id);

        $this->load->view('index_logined', array('list' => $results, 'types' => $types, 'links' => $links));

    }


    public function index()
    {

        //配置分页类
        $this->load->library('pagination');
        //获取文章表的
        $total = $this->Article_model->get_count_article(null);
        //当前控制器方法
        $config['base_url'] = base_url() . 'welcome/index';
        //总数
        $config['total_rows'] = $total;
        //每页显示条数
        $config['per_page'] = 2;
        //初始化
        $this->pagination->initialize($config);
        //创建分页标签对象
        $links = $this->pagination->create_links();
        //第一个参数是每页的数量,第二个参数是计算每次的偏移量（偏移量是指从开头到当前的距离）
        $results = $this->Article_model->get_article_list($config['per_page'], $this->uri->segment(3));





        $user = $this->session->userdata('user');

        if (isset($user)) {

            $types = $this->Article_model->get_article_type($user->user_id);

            //$link为分页信息
            $this->load->view('index', array('list' => $results, 'types' => $types, 'links' => $links));

        } else {

            $this->load->view('index', array('list' => $results, 'links' => $links));

        }

    }
}
