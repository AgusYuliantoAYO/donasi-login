<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query="SELECT `user_sub_menu`.*,`user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id`=`user_menu`.`id`
            ";
        return $this->db->query($query)->result_array();
    } 


    // public function edit_SubMenu($where,$table)
    // {
    //     return $this->db->get_where($table,$where);    
    // }

    // public function edit_SubMenu()
    // {
    //     $result = $this->db->get('user_sub_menu');
    //     if($result->num_rows() > 0){
    //         return $result->result();
    //     }else {
    //         return false;
    //     }
    // } 
    // public function edit_SubMenu()
    // {
    //     return $this->db->get('user_sub_menu');
    // }
    // public function edit_SubMenu($where,$table)
    // {
    //     return $this->db->get_where($table,$where);    
    // }
    public function edit_SubMenu($id)
    {
        $result = $this->db->where('id',$id)->get('user_sub_menu');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        } 
    }
    public function userMenu($id)
    { 
        return $this->db->get_where("user_menu",array('id' => 2));
    }

    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    } 

    public function getUser($limit, $start, $keyword = null )
    {
        if ($keyword){
            $this->db->like('name', $keyword);
            $this->db->or_like('alamat', $keyword);
        }
        $this->db->order_by('role_id','ASCD');
        $query=$this->db->get('user', $limit, $start)->result_array();
        return $query;
    }

}