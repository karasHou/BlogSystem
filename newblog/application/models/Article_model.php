<?php

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 18/1/13
 * Time: 下午3:20
 */
class Article_model extends CI_Model
{

    //获取文章行数
    public function get_count_article($userid)
    {
        if ($userid)
            $this->db->where('username', $userid->user_id);
        return $this->db->count_all('t_article');
    }

    //获取文章列表项
    public function get_article_list($page_size, $offset)
    {


        $this->db->select('*');
        $this->db->from('t_article a');
        //连接
        $this->db->join('t_article_type t', 'a.type_id = t.type_id', 'left');
        //ci的limit和常规的limit参数位置相反,1.每页的数量 2.偏移量
        $this->db->limit($page_size, $offset);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_article_type($user_id)
    {


        $sql = "select * from
                 (select count(*) num,a.type_id
                 from t_article a where a.user_id = $user_id
                GROUP BY a.type_id) nt,
                t_article_type t 
                where t.type_id = nt.type_id";

        $query = $this->db->query($sql);
        return $query->result();

    }


    public function publish_blog($article)
    {
        $this->db->insert('t_article', $article);
        return $this->db->affected_rows();

    }

}