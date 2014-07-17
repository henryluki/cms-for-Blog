<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model','blog');
		$this->load->model('gallery_model','gallery');
	}
    //主页
	public function index()
	{
	    $data['article']=$this->blog->send_article();
	    $data['category']=$this->gallery->send_picture();
        $this->load->view('index/index.html',$data);
		
	}
/*********************blog*******************************/
	//博客界面
	public function blog()
	{
		// $this->output->cache(1);
		//缩略图 标题 文章摘要
		$data['article']=$this->blog->blog_check();
        $this->load->view('index/blog.html',$data);
		
	}
	//查看具体某篇文章
	public function article()
	{   
		// $this->output->cache(1);
		//文章内容 右侧是标题
		$a_id=$this->uri->segment('4');
		$data['title']=$this->blog->blog_check();
		$data['article']=$this->blog->check_u($a_id);
        $this->load->view('index/article.html',$data);
		
	}

/*********************gallery*******************************/
  //画廊界面
	public function gallery()
	{
		// $this->output->cache(1);
     //调出p_info跟gc_id对应的gc_name相同的 该图片做封面
	$data['category']=$this->gallery->check_col();
               
	// p($data);die;
        $this->load->view('index/gallery.html',$data);

	}
	//查看某个具体分类
	public function picture()
	{
		$gc_id=$this->uri->segment('4');
		$data['picture']=$this->gallery->show_picture($gc_id);
		$data['category']=$this->gallery->check_ucol($gc_id);

        $this->load->view('index/picture.html',$data);

	}
  


}

?>