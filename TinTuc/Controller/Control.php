<?php
session_start();
include("Model/Model_Tintuc.php");
include("Model/pager.php");
class Control_tintuc{
	public function index()
	{
		# load slide from model_tintuc

		$m_tintuc = new Model_tintuc();

		$slide = $m_tintuc->getSlide();

		$menu = $m_tintuc->getMenu();

		return  array('slide' => $slide, 'menu' => $menu );

	}

	public function loaitin(){
		$id_loaitin=$_GET['id_loaitin'];
		$m_tintuc = new Model_tintuc();

		$danhmuctin = $m_tintuc->getTinTucByIDLoai($id_loaitin);
	
		$tranghientai=(isset($_GET['page']))?$_GET['page']:1;

		$pagination =  new pagination(count($danhmuctin),$tranghientai,7,4);

		$paginationHTML= $pagination->showPagination();

		$limit = $pagination->get_nItemOnPage();

		$vitri = ($tranghientai-1)*$limit;

		$danhmuctin = $m_tintuc->getTinTucByIDLoai($id_loaitin,$vitri,$limit);
	
		$menu= $m_tintuc->getMenu();
		$title=$m_tintuc->getTitelByIDLoai($id_loaitin);
		return array('danhmuctin' => $danhmuctin ,"menu"=> $menu,"title"=>$title,"pagination"=>$paginationHTML);

	}

	public function chitiettin(){

		$id_tintuc= $_GET['id_tintuc'];
		$m_tintuc = new Model_tintuc();
		$chitiettin = $m_tintuc->getTinTucByID($id_tintuc);
		$tinnoibat= $m_tintuc->getTinTucNoiBat();
		$id_loaitin = $m_tintuc->getIdLoaiByIdTin($id_tintuc)->idLoaiTin;
		$tinlienquan = $m_tintuc->getTinTucLienQuan($id_loaitin);
		//$tinlienquan = $m_tintuc->getTinTucLienQuan();
		
		$comment= $m_tintuc->getComment($id_tintuc);
		
		//return array('chitiettin'=>$chitiettin, 'tinnoibat'=>$tinnoibat);
		return array('chitiettin'=>$chitiettin, 'tinnoibat'=>$tinnoibat, 'tinlienquan'=>$tinlienquan ,'comment'=>$comment);
	}

	function addCommentTinTuc($id_user,$id_tintuc,$noidung){
		$m_tintuc = new Model_tintuc();
		$m_tintuc->addComment($id_user,$id_tintuc,$noidung);
		header ('location:'.$_SERVER['HTTP_REFERER']);
	}
	
	function getIdUser($username){
		$m_tintuc= new Model_tintuc();
		return $m_tintuc->getIdUserNameByUserName($username)->id;
	}
}




?>