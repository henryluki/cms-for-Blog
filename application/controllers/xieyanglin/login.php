<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	//登陆界面

	public function index()
	{
        /* $this->load->helper('captcha');
		$data['cap'] = create_captcha();
		// echo $cap['image'];
		  // p($data['cap']);die;	
		      //将验证码写入session
		$data['image'] = $cap['image'];//图片URL 显示图片
		if(!isset($_SESSION))
		{
			session_start();
		}
		$_SESSION['code']=$data['cap']['word'];
		// p($_SESSION['code']);die;         */
        $this->load->view('nick/login');

	}


    //登录验证
	public function login_in()
	{
        //$code=$this->input->post('captcha');
		  //判断是否开启
		if(!isset($_SESSION))
		{
			session_start();
		}
		// p($code);
		// p($_SESSION['code']);
        //if($code!=$_SESSION['code']){
        //error('验证码错误');
        //}
		$u_name=$this->input->post('name');
		$this->load->model('nick_model','nick');
		$userdata=$this->nick->check($u_name);
		// p($userdata);
		$u_password=$this->input->post('password');
		if(!$userdata||$userdata[0]['u_password']!=md5($u_password)){
             error('用户名或密码错误！');
		}
       //以上用php原生代码进行登录验证！！！！！
       //以下载入session类存储登录信息

		   //先写入了密匙 config/config.php 再设置为自动载入因此直接用了

		$session_data = array(
                   'u_name'  => $u_name,
                   'u_id'     => $userdata[0]['u_id'],
                   'logintime' => time()
               );
		//写入
		$this->session->set_userdata($session_data);
		// 也可以读出 $data=$this->session->userdata('u_id');
	
		 success('xieyanglin/nick/index','登陆成功！');

	}

	//退出登录
	public function login_out()
	{
		$this->session->sess_destroy();
		success('xieyanglin/nick/index','退出成功！');
	}
}
?>