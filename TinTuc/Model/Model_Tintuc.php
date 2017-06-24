<?php

include("database.php");

class Model_tintuc extends database{

	function getSlide(){
		$sql= "SELECT * FROM slide";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}


	function getMenu(){
		$sql =" SELECT tl.* , GROUP_CONCAT( DISTINCT lt.id, ':' , lt.Ten ,':',lt.TenKhongDau) As LoaiTin , tt.Hinh,tt.TieuDe,tt.TomTat,tt.TieuDeKhongDau,tt.SoLuotXem FROM theloai tl INNER JOIN loaitin lt ON lt.idTheLoai= tl.id INNER JOIN tintuc tt ON tt.idLoaiTin = lt.id group by tl.id";
		$this -> setQuery($sql);
		return $this->loadAllRows();
	}


	function getTinTucByIDLoai($id_loaitin,$vitri=-1,$limit=-1){

		{
			$sql="SELECT * FROM tintuc WHERE idLoaiTin=$id_loaitin";
			if($vitri>-1 && $limit>1)	{
				$sql=$sql." limit $vitri,$limit";
			}
			$this-> setQuery($sql);
			return $this-> loadAllRows(array($id_loaitin));
		}

	}

	function getTitelByIDLoai($id_loaitin){
			$sql="SELECT Ten FROM loaitin WHERE id=$id_loaitin";
			$this-> setQuery($sql);
			return $this-> loadRow(array($id_loaitin));
	}

	function getTinTucByID($id_tintuc){
		$sql = "SELECT * FROM tintuc WHERE id= $id_tintuc";
		$this-> setQuery($sql);
		return $this-> loadRow(array($id_tintuc));
	}

	function getTinTucLienQuan($id_loaitin){
		//$sql = "SELECT * FROM tintuc WHERE idLoaiTin=$id_loaitin limit 0,4";
		$sql = "SELECT * FROM tintuc WHERE idLoaiTin= $id_loaitin limit 0,4";
		$this->setQuery($sql);
		return $this-> loadAllRows(array($id_loaitin));
	}

	function getTinTucNoiBat(){
		$sql = "SELECT * FROM tintuc WHERE NoiBat=1 limit 0,4";
		$this->setQuery($sql);
		return $this-> loadAllRows();
	}

	function getComment($id_tintuc){
		$sql = "SELECT UR.*, CM.NoiDung, CM.created_at,CM.updated_at FROM comment CM INNER JOIN users UR ON CM.idUser=UR.id WHERE CM.idTinTuc= $id_tintuc ";
		$this->setQuery($sql);
		return $this-> loadAllRows(array($id_tintuc));
	}
	function getIdLoaiByIdTin($id_tintuc){
		$sql = "SELECT idLoaiTin FROM tintuc WHERE id=$id_tintuc ";
		$this->setQuery($sql);
		return $this-> loadRow(array($id_tintuc));
	}

	public function addComment($id_user,$id_tintuc,$noidung){
		$sql= "INSERT INTO comment(idUser,IdTinTuc,Noidung) VALUES (?,?,?)";
		$this->setQuery($sql);
		return $this->execute(array($id_user,$id_tintuc,$noidung));
	}

	public function getIdUserNameByUserName($username){
		$sql = "SELECT id FROM users where name = '$username'";
		$this->setQuery($sql);
		return $this->loadRow(array($username));
	}

	public function searchTintuc($keywords){
		$sql = "SELECT * FROM tintuc where "
	}



}


?>