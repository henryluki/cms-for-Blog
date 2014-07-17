<?php 
$config=array(
	'blog' => array(
		array(
			'field' => 'title',
			'label' => '标题',
			'rules' => 'required|max_length[20]'),
		array(
			'field' => 'info',
			'label' => '摘要',
			'rules' => 'required|max_length[200]'),
		array(
			'field' => 'content',
			'label' => '内容',
			'rules' => 'required|max_length[50000]'),
		),
	'column'=>array(
		array(
			'field' => 'name',
			'label' => '分类名称',
			'rules' => 'required|max_length[10]',
			),
		array(
			'field' => 'info',
			'label' => '分类信息',
			'rules' => 'required|max_length[50]',
			),
		),
	'picture'=>array(
		array(
		    'field' => 'p_info',
			'label' => '图片信息',
			'rules' => 'required|max_length[50]',
		),
	)
)
?>