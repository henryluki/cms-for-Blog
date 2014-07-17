<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nick extends MY_Controller
{
	//后台主页
	public function index ()
	{
		$this->load->view('nick/header');
		$this->load->view('nick/welcome');
		$this->load->view('nick/footer');
	}

	//修改密码
	public function change ()
	{
		$this->load->view('nick/header');
		$this->load->view('nick/change');
		$this->load->view('nick/footer');
	}

	//修改密码工作
	public function change_sure()
	{
		$this->load->model('nick_model','nick');

		$u_id=$this->session->userdata('u_id');
		$u_name=$this->input->post('name');
		$userdata=$this->nick->check($u_name);

		$u_password=$this->input->post('password');
		$n_password=$this->input->post('n_password');
		$new_password=$this->input->post('new_password');
		if(md5($u_password)!=$userdata[0]['u_password'])
		{
			error('原密码不正确！');
		}
		if($n_password!=$new_password)
		{
			error('两次密码输入不正确！');
		}
		$data=array(
			'u_password'=>md5($new_password)
			);
		$this->nick->change($u_id,$data);

		success('xieyanglin/login/index','修改密码成功！');
	}
}
?>