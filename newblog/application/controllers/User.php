<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->load->model("User_model");

    }

    //主页
    public function index()
    {
        $this->load->view('index');
    }

    //登录
    public function login()
    {

        $this->load->view('login');
    }

    //产生验证码
    public function createCode()
    {

        //先生成注册码，保存变量，然后核对
        $this->load->helper('captcha');     //加载辅助类插件

        $rand = rand(1000, 9999);        //生成四位验证码

        //将验证码存储在session中
        $this->session->set_userdata(array(
            "captcha" => $rand
        ));

        //存储验证码相关配置
        $vals = array(
            'word' => $rand,   //存验证码
            'img_path' => './captcha/',    //验证码路径
            'img_url' => base_url() . 'captcha/',       //图片路径
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '150',
            'img_height' => 30,
            'expiration' => 7200,
            'word_length' => 8,
            'font_size' => 16,
            'img_id' => 'code-img',

            // White background and border, black text and red grid
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);   //创建验证码
        return $cap;

    }

    //注册
    public function reg()
    {
        $img = $this->createCode();
        //将验证码传到reg页面
        $this->load->view('reg', array('img' => $img['image']));
    }

    //添加用户
    public function add_user()
    {
        $email = $this->input->get('email');
        $name = $this->input->get('name');
        $pwd = $this->input->get('pwd');
        $pwd2 = $this->input->get('pwd2');
        $gender = $this->input->get('gender');
        $province = $this->input->get('province');
        $city = $this->input->get('city');

        //校验密码
        if ($pwd != $pwd2) {
            echo 'pwd-error';
            die();
        }


        //调用User_model的add方法,参数为数组对象
        $rows = $this->User_model->add_user(array(
            'username' => $name,
            'email' => $email,
            'password' => $pwd,
            'sex' => $gender,
            'province' => $province,
            'city' => $city

        ));


        if ($rows <= 0) {
            echo '<script>alert("系统错误，请稍后重试！")</script>';
            redirect('User/reg');
        }

    }

    //校验邮箱
    public function check_email()
    {
        $email = $this->input->get('email');

        $result = $this->User_model->check_email($email);

        if (count($result) > 0) {
            echo "already";
        }
    }

    //校验验证码
    public function check_code()
    {

        $code = $this->input->get('code');

        //从session中取出验证码
        $captcha = $this->session->userdata('captcha');
        if ($code != $captcha) {
            echo 'error';
            die();
        }
    }

    //切换另一张验证码
    public function new_code()
    {
        $img = $this->createCode();
        echo $img['time'];
    }

    //登录验证
    public function login_check()
    {
        $email = $this->input->get('email');
        $pwd = $this->input->get('pwd');

        $result = $this->User_model->check_login($email);

        if (count($result) > 0) {
            //存在
            if ($result[0]->password == $pwd) {
                //密码正确


                $this->session->set_userdata(array(
                    "user" => $result[0]
                ));

                echo 'success';


            } else {
                //密码错误
                echo 'pwd-error';

            }

        } else {
            //不存在
            echo 'user-no-exit';

        }


    }

    //退出登录
    public function exit_login()
    {

        $this->session->unset_userdata('user');
        redirect("welcome/index");


    }

}
