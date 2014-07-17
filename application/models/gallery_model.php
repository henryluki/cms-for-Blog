<<<<<<< .mine
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//添加分类
	public function add_col($arr)
	{
	   //无需加表前缀
		$this->db->insert('column',$arr);
	}
	//查看分类
	public function check_col()
	{
	   //返回数组
		$arr=$this->db->get('column')->result_array();
		return $arr;
	}
    //查看对应分类
	public function check_ucol($gc_id)
	{
		//查询数组 于column表 并返回数组 
		//指定gc_id 指定表 获得该行 
	     $arr=$this->db->where(array('gc_id'=>$gc_id))->get('column')->result_array();
	     return $arr;
	}
	//编辑分类
	public function update_col($gc_id,$data)
	{
		//表 修改参数 指定行
	     $this->db->update('column',$data,array('gc_id'=>$gc_id));
	}
	//删除分类
	public function delete_col($gc_id)
	{
		//表 指定行
	     $this->db->delete('column',array('gc_id'=>$gc_id));
	}


    //上传图片
    public function add_picture($arr)
    {
         $this->db->insert('picture',$arr);
    }
     //查看图片
    public function check_picture()
    {
         $data=$this->db->select('p_id,p_info,p_time,p_name,gc_name')
         ->from('picture')->join('column','picture.gc_id=column.gc_id')
         ->order_by('p_id','asc')->get()
         ->result_array();
         return $data;
    }
    //查看某张图片
    public function check_upicture($p_id)
    {
    	//查询数组 于picture表 并返回数组 
		//指定p_id 指定表 获得该行 
	     $arr=$this->db->where(array('p_id'=>$p_id))->get('picture')->result_array();
	     return $arr;

    }
    //编辑图片信息
	public function update_picture($p_id,$data)
	{
		//表 修改参数 指定行
	     $this->db->update('picture',$data,array('p_id'=>$p_id));
	}
	//删除图片
	public function delete_picture($p_id)
	{
		//表 指定行
	     $this->db->delete('picture',array('p_id'=>$p_id));
	}
    //找到该栏目下的所有图片 gc_id相关联
    public function show_picture($gc_id)
    {
    	$data=$this->db->select('p_name,p_info,p_time')
    	->from('picture')
    	->where(array('gc_id'=>$gc_id))
    	->get()->result_array();
    	return $data;
    }
     //首页显示最新三张照片
     public function send_index()
    {
         $data=$this->db->select('p_id,p_info,p_time,p_name,gc_name')
         ->from('picture')->join('column','picture.gc_id=column.gc_id')
         ->order_by('p_id','desc')->get()
         ->result_array();
         return $data;
    }
  // ->limit(3)
=======
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//添加分类
	public function add_col($arr)
	{
	   //无需加表前缀
		$this->db->insert('column',$arr);
	}
	//查看分类
	public function check_col()
	{
	   //返回数组
		$arr=$this->db->get('column')->result_array();
		return $arr;
	}
    //查看对应分类
	public function check_ucol($gc_id)
	{
		//查询数组 于column表 并返回数组 
		//指定gc_id 指定表 获得该行 
	     $arr=$this->db->where(array('gc_id'=>$gc_id))->get('column')->result_array();
	     return $arr;
	}
	//编辑分类
	public function update_col($gc_id,$data)
	{
		//表 修改参数 指定行
	     $this->db->update('column',$data,array('gc_id'=>$gc_id));
	}
	//删除分类
	public function delete_col($gc_id)
	{
		//表 指定行
	     $this->db->delete('column',array('gc_id'=>$gc_id));
	}


    //上传图片
    public function add_picture($arr)
    {
         $this->db->insert('picture',$arr);
    }
     //查看图片
    public function check_picture()
    {
         $data=$this->db->select('p_id,p_info,p_time,p_name,gc_name')
         ->from('picture')->join('column','picture.gc_id=column.gc_id')
         ->order_by('p_id','asc')->get()
         ->result_array();
         return $data;
    }
    //查看某张图片
    public function check_upicture($p_id)
    {
    	//查询数组 于picture表 并返回数组 
		//指定p_id 指定表 获得该行 
	     $arr=$this->db->where(array('p_id'=>$p_id))->get('picture')->result_array();
	     return $arr;

    }
    //编辑图片信息
	public function update_picture($p_id,$data)
	{
		//表 修改参数 指定行
	     $this->db->update('picture',$data,array('p_id'=>$p_id));
	}
	//删除图片
	public function delete_picture($p_id)
	{
		//表 指定行
	     $this->db->delete('picture',array('p_id'=>$p_id));
	}
    //找到该栏目下的所有图片 gc_id相关联
    public function show_picture($gc_id)
    {
    	$data=$this->db->select('p_name,p_info,p_time')
    	->from('picture')
    	->where(array('gc_id'=>$gc_id))
    	->get()->result_array();
    	return $data;
    }
     //首页显示最新三张照片
     public function send_picture()
    {
         $data=$this->db->select('p_id,p_info,p_time,p_name,gc_name')
         ->from('picture')->join('column','picture.gc_id=column.gc_id')
         ->order_by('p_id','desc')->limit(3)->get()
         ->result_array();
         return $data;
    }

>>>>>>> .r555
}