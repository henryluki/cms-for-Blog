<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model','blog');
    }
	//查看文章
	public function check()
	{

	     	//载入分页类
        $this->load->library('pagination');
            //分页变量
        $perpage=5;
             //配置
        $config['base_url'] = site_url('xieyanglin/blog/check/');
        $config['total_rows'] = $this->db->count_all_results('blog');//计算ci_blog表有多少行
        $config['per_page'] = $perpage;
        $config['uri_segment'] = '4';//设为页面的参数，如果不添加这个参数分页用不了 
             //自定义分页
        $config['first_link'] = '第一页';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['last_link'] = '最后一页';
             //载入和生成链接
        $this->pagination->initialize($config); 
              //通过data数组将链接载入到视图模板
        $data['links']=$this->pagination->create_links();
             //使用模型传递数据
        $offset=$this->uri->segment(4);
             //限制查询 从$offset后查$perpage个行
        $this->db->limit($perpage, $offset);
		
		$data['row']=$this->blog->check();

        $this->load->helper('form');
        $this->load->view('nick/header',$data);
    	$this->load->view('nick/check_article');
		$this->load->view('nick/footer');
	}   

	//发表文章
	public function publish($page='article')
	{
	//开启调试模式  输出类
    // $this->output->enable_profiler(TRUE);
        $this->load->helper('form');
        $this->load->view('nick/header');
    	$this->load->view('nick/'.$page);
		$this->load->view('nick/footer');
	}   
    //发表文章动作
	public function publish_sure($page='article')
	{
		 //表单验证 
 	$this->load->library('form_validation');
	//执行验证 写在config form_validation.php
	 $status=$this->form_validation->run('blog');
	
	     //文件上传   
        
        $path_of_sae = 'storage/blog/'; // 第一个uploads是sae storage名字，第二个uploads是目录
		$path_no_sae = FCPATH.'blog/'; // 站点根目录/uploads/
		
		/**
		 * 如果是sae环境，可以返回完整的路径，包括sae的sotrage访问地址，带http://
		 * 如果是非sae环境，只能根据目录拿到相对当前url的地址
		 * 
		 */
		
		if (class_exists('SaeKV'))
		{
			$config['upload_path'] = $path_of_sae;
		}
		else
		{
			$config['upload_path'] = $path_no_sae;
		}
		
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1000';
		$config['max_width']  = '2048';
		$config['max_height']  = '1680';
		$config['overwrite'] = true;
        $config['file_name'] = time().mt_rand(10,1000);
         //这里生成缩略图，所以省掉这些配置
       // $config['max_width'] = '1024';
        // $config['max_height'] = '768';
        $this->load->library('upload', $config);
         //执行上传
        $this->upload->do_upload('thumb');//会返回一个值，可以在这里根据返回值判断是否一定要上传
          //返回信息
       $wrong=$this->upload->display_errors();//返回错误信息
       // if($wrong){
      // 	error($wrong);
         // }
       $data=$this->upload->data();//返回上传有关的信息数组--对这些信息进行操作！！
 
            
	   if($status)
	    {

		// 数据库操作
		$arr=array(
			// 'u_name'=>$_POST['name'],
			// 'u_password'=>$_POST['password']
			//输入类传输数据   (好处是不用检验是否存在)
			'a_title'=>$this->input->post('title'),
			'a_info'=>$this->input->post('info'),
			'a_time'=>time(),
			'a_thumb'=>$data['full_path'],
			'a_content'=>$this->input->post('content')
			);
      
		$this->blog->add($arr);
		//登录成功跳转到首页        success定义于 Common.php
			success('xieyanglin/blog/check','发表成功!');
	}
	else{
	 $this->load->helper('form');
	 $this->load->view('nick/header');
	 $this->load->view('nick/'.$page);
	 $this->load->view('nick/footer');
	}
}
    

	//修改文章
	public function edit()
	{
		$a_id=$this->uri->segment(4);
       
        $data['row']=$this->blog->check_u($a_id);
        // var_dump($data['row']);die;
	//开启调试模式  输出类
        // $this->output->enable_profiler(TRUE);
        $this->load->helper('form');
        $this->load->view('nick/header',$data);
    	$this->load->view('nick/edit_article');
		$this->load->view('nick/footer');
	}  
    //修改文章动作
	public function edit_sure($page='edit_article')
	{
		$this->load->library('form_validation');
		$status=$this->form_validation->run('blog');
          //文件上传   
        
        $path_of_sae = 'storage/blog/'; // 第一个uploads是sae storage名字，第二个uploads是目录
		$path_no_sae = FCPATH.'blog/'; // 站点根目录/uploads/
		
		/**
		 * 如果是sae环境，可以返回完整的路径，包括sae的sotrage访问地址，带http://
		 * 如果是非sae环境，只能根据目录拿到相对当前url的地址
		 * 
		 */
		
		if (class_exists('SaeKV'))
		{
			$config['upload_path'] = $path_of_sae;
		}
		else
		{
			$config['upload_path'] = $path_no_sae;
		}
		
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1000';
		$config['max_width']  = '2048';
		$config['max_height']  = '1680';
		$config['overwrite'] = true;
        $config['file_name'] = time().mt_rand(10,1000);
         //这里生成缩略图，所以省掉这些配置
       // $config['max_width'] = '1024';
        // $config['max_height'] = '768';
        $this->load->library('upload', $config);
         //执行上传
        $this->upload->do_upload('thumb');//会返回一个值，可以在这里根据返回值判断是否一定要上传
          //返回信息
       $wrong=$this->upload->display_errors();//返回错误信息
       // if($wrong){
      // 	error($wrong);
         // }
       $data=$this->upload->data();//返回上传有关的信息数组--对这些信息进行操作！！
	if($status)
	{
        $a_id=$this->input->post('id'); 
        // var_dump($a_id);die;
    	$data=array(
    	    'a_title'=>$this->input->post('title'),
    	    'a_info'=>$this->input->post('info'),
    	  	'a_time'=>time(),
          	'a_thumb'=>$data['full_path'],
			'a_content'=>$this->input->post('content')
    	);
       
      
        $this->blog->update($a_id,$data);

        success('xieyanglin/blog/check','修改成功');
	}
     else{
        $this->load->helper('form');
        $this->load->view('nick/header');
    	$this->load->view('nick/'.$page);
		$this->load->view('nick/footer');
	}
}  

	//删除文章
	public function delete()
	{
		$a_id=$this->uri->segment(4);
      
        $this->blog->delete($a_id);
        success('xieyanglin/blog/check','删除文章成功');
	}
}
?>