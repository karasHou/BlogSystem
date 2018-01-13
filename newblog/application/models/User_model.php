<?php
/**
 * Created by PhpStorm.
 * User: houwe
 * Date: 2018/1/12
 * Time: 13:46
 */

class User_model extends CI_Model
{

    //添加用户（向数据库插入）
    public function add_user($user)
    {
        $this->db->insert('t_user', $user);
        return $this->db->affected_rows();

    }

    //校验邮箱是否存在
    public function check_email($email)
    {

        $query = $this->db->get_where('t_user', array('email' => $email));
        return $query->row();
    }

    public function check_login($email)
    {

        $query = $this->db->get_where('t_user', array('email' => $email));
        return $query->row();
    }


}