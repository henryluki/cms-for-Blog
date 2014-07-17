<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller{
	public function __construct()
	{
	   //继承父类构造函数 再写自己的构造函数
		parent::__construct();

		$u_name=$this->session->userdata('u_name');
		$u_id=$this->session->userdata('u_id');
		//先登录成功 再存储session信息 构造函数里对session进行判断 只有登录成功存了session才能访问后台模板

		if(!$u_name||!$u_id)
		{
			//自动跳转到登陆界面
			redirect('xieyanglin/login/index');
		}
	}
}