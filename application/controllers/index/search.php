<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model','blog');
	}  //search框查询  动作
   public function index()
    {
        $text=$this->input->post("text");
        $data['article']=$this->blog->search($text);

        if(!empty($data['article']))
        {
             //搜索内容展示
        	$this->load->view('index/search.html',$data);
        }
        else
        {
            success('index/home/blog',"查询无结果");
        }

    }
 }