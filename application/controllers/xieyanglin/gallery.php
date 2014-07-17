<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model','gallery');
	}
/********************分类操作***************************************************/
    //查看分类
	public function check_col($page='check_gallery')
	{
		
		//$data['row']在这里有点不太理解 二维数组的第一个参数（记录行？）
		$data['row']=$this->gallery->check_col();
 
		$this->load->helper('form');
		$this->load->view('nick/header',$data);
		$this->load->view('nick/'.$page);
		$this->load->view('nick/footer');
	}


	//增加分类
	public function add_col($page='add_gallery')
	{
		$this->load->helper('form');
		$this->load->view('nick/header');
		$this->load->view('nick/'.$page);
		$this->load->view('nick/footer');
	}
    //增加分类动作
    public function add_col_sure($page='add_gallery')
    {
        //从这里进行修改
        
        
    	$this->load->library('form_validation');
    	$status=$this->form_validation->run('column');

	   //文件上传   
        
        $path_of_sae = 'storage/gallery/'; // 第一个uploads是sae storage名字，第二个uploads是目录
        $path_no_sae = FCPATH.'gallery/'; // 站点根目录/uploads/
        
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
        $config['max_size'] = '1024';
        //$config['max_width']  = '2048';
        //$config['max_height']  = '1680';
        $config['overwrite'] = true;
        $config['file_name'] = time().mt_rand(10,1000);
    
        $this->load->library('upload', $config);
         //执行上传
        $this->upload->do_upload('picture');
       $wrong=$this->upload->display_errors();//返回错误信息
        if($wrong){
          error($wrong);
       }
       $info=$this->upload->data();//返回上传有关的信息数组--对这些信息进行操作！！
      
 
    	if($status)
    	{
        
           $data=array(
           	'gc_name'=>$this->input->post('name'),
           	'gc_thumb'=>$info['full_path'],
           	'gc_time'=>time(),
           	'gc_info'=>$this->input->post('info')
           	);
           $this->gallery->add_col($data);
           //添加成功跳转到首页        success定义于 Common.php
			success('xieyanglin/gallery/check_col','添加成功!');
    	}
    	else{
    		$this->load->helper('form');
    		$this->load->view('nick/header');
		    $this->load->view('nick/'.$page);
		    $this->load->view('nick/footer');
    	}
    }

	//编辑分类
	public function edit_col()
	{

	    $gc_id=$this->uri->segment(4);    
        $data['row']=$this->gallery->check_ucol($gc_id);

		$this->load->helper('form');
		$this->load->view('nick/header',$data);
		$this->load->view('nick/edit_gallery');
		$this->load->view('nick/footer');
	}
    //编辑分类动作
    public function edit_col_sure($page='edit_gallery')
    {
    	$this->load->library('form_validation');
        $gc_id=$this->input->post('id');
    	$status=$this->form_validation->run('column');
    	if($status)
    	{
    	   //var_dump($gc_id);die;  可以打印出id 隐藏表单！！
    	   $gc_name=$this->input->post('name');
    	    $gc_info=$this->input->post('info');
    	   $data=array(
    	   	'gc_name'=>$gc_name,
    	   	'gc_info'=>$gc_info
    	   	);
          
           $data['row']=$this->gallery->update_col($gc_id,$data);
           success('xieyanglin/gallery/check_col','修改成功');
    	}
    	else{
    		$this->load->helper('form');
        $arr['row']=$this->gallery->check_ucol($gc_id);
    		$this->load->view('nick/header',$arr);
		    $this->load->view('nick/'.$page);
		    $this->load->view('nick/footer');
    	}
    }
    //删除分类
    public function delete_col()
    {
    	$gc_id=$this->uri->segment(4);
        $this->gallery->delete_col($gc_id);
        success('xieyanglin/gallery/check_col','删除成功');
    }

/********************图片操作***************************************************/
    //上传图片
	public function upload()
	{
		$this->load->helper('form');
		
		//$data['row']在这里有点不太理解 二维数组的第一个参数（记录行？）
		$data['row']=$this->gallery->check_col();
		$this->load->view('nick/header',$data);
		$this->load->view('nick/gallery');
		$this->load->view('nick/footer');
	}
	//上传图片动作
	public function upload_sure()
	{
		
		 //表单验证
	 $this->load->library('form_validation');
	 //执行验证 写在config form_validation.php
	 $status=$this->form_validation->run('picture');
	
	   //文件上传   
        
        $path_of_sae = 'storage/gallery/'; // 第一个uploads是sae storage名字，第二个uploads是目录
        $path_no_sae = FCPATH.'gallery/'; // 站点根目录/uploads/
        
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
        $config['max_size'] = '1024';
        $config['overwrite'] = true;
        $config['file_name'] = time().mt_rand(10,1000);
    
        $this->load->library('upload', $config);
         //执行上传
        $this->upload->do_upload('picture');
       $wrong=$this->upload->display_errors();//返回错误信息
        if($wrong){
          error($wrong);
          }
       $info=$this->upload->data();//返回上传有关的信息数组--对这些信息进行操作！！
 
	if($status)
	{

		// 数据库操作
		$arr=array(
			// 'u_name'=>$_POST['name'],
			// 'u_password'=>$_POST['password']
			//输入类传输数据   (好处是不用检验是否存在)
			'p_info'=>$this->input->post('p_info'),
			'p_time'=>time(),
			'p_name'=>$info['full_path'],
			'gc_id'=>$this->input->post('gc_id')
			);		
		$this->gallery->add_picture($arr);
		//登录成功跳转到首页        success定义于 Common.php
			success('xieyanglin/gallery/check','上传成功!');
	}
	else{
	   $data['row']=$this->gallery->check_col();
       $this->load->view('nick/header',$data);
	   $this->load->view('nick/gallery');
	   $this->load->view('nick/footer');
	}
}
    //查看图片
   public function check()
   {

	     	//载入分页类
        $this->load->library('pagination');
            //分页变量
        $perpage=3;
             //配置
        $config['base_url'] = site_url('xieyanglin/gallery/check/');
        $config['total_rows'] = $this->db->count_all_results('picture');//计算ci_blog表有多少行
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
   	    $data['row']=$this->gallery->check_picture();

		$this->load->view('nick/header',$data);
		$this->load->view('nick/check_picture');
		$this->load->view('nick/footer');
   }
	//编辑图片信息
	public function edit()
	{
		$this->load->helper('form');
		$p_id=$this->uri->segment(4);
		$arr['picture']=$this->gallery->check_upicture($p_id);
		$arr['row']=$this->gallery->check_col();
		
		$this->load->view('nick/header',$arr);
		$this->load->view('nick/edit_picture');
		$this->load->view('nick/footer');
	}
	//编辑图片信息动作
	public function edit_sure()
	{
		  $p_id=$this->input->post('p_id');
		 //表单验证
	    $this->load->library('form_validation');
	    $status=$this->form_validation->run('picture');
    	if($status)
    	{
    	
    		$data=array(
    		     'p_info'=>$this->input->post('p_info'),
        	   'gc_id'=>$this->input->post('gc_id'),
             'p_time'=>time()
            	);
              // p($data);die;
          	 $this->gallery->update_picture($p_id,$data);
          	 success('nick/gallery/check','修改图片信息成功！');
          }
         else{
         	    $this->load->helper('form');
		        $arr['picture']=$this->gallery->check_upicture($p_id);
	             //p($arr['picture']);die;
		        $arr['row']=$this->gallery->check_col();
		         p($arr['row']);die;
		        $this->load->view('nick/header',$arr);
		        $this->load->view('nick/edit_picture');
		        $this->load->view('nick/footer');
         }
    	
	}
	//删除图片
	public function delete()
	{
		$p_id=$this->uri->segment('4');
		$this->gallery->delete_picture($p_id);
		success('xieyanglin/gallery/check','图片信息已从数据库删除！');
	}


	
}
?>