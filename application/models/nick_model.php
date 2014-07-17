<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nick_model extends CI_Model{
	//查询后台管理员数据
	public function check($u_name)
	{
         $data=$this->db->get_where('user',array('u_name'=>$u_name))->result_array();
         return $data;
	}
	//修改后台管理员数据
	public function change($u_id,$data)
	{
         $this->db->update('user',$data,array('u_id'=>$u_id));
	}

}