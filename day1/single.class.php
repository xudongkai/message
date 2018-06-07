<?php 
final class Single{

	//私有    静态
	private  static $inst;
	//私有                构造    数据库
	private function __construct(){
		mysql_connect('127.0.0.1','root','root');
		mysql_select_db("shiyi");
		mysql_query("set names utf8");
	}
	//公共静态  实例化对象
	static function getIns(){
		if (self::$inst instanceof self) {
			return self::$inst;
		}else{
			self::$inst = new self;
			return self::$inst;
		}
	}
	//私有           克隆
	private function __clone(){}
	//添加
	public function insert($mess,$data){
		$key = "";
		$val = "";
		foreach ($data as $k => $v) {
			$key .=",`$k`";
			$val .=",'$v'";
		}
		$key = ltrim($key,',');
		$val = ltrim($val,',');
		$sql = "INSERT INTO `$mess` ($key) VALUES ($val)";
		return mysql_query($sql);
	}
	//查询
	public function selectAll(){
		$sql = "SELECT * FROM mess";
		$res = mysql_query($sql);
		$data = array();
		while ($arr = mysql_fetch_assoc($res)) {
			$data[] = $arr;
		}
		return $data;
	}
	//删除
	public function delete($mess,$id){
		$sql = "DELETE FROM $mess WHERE id = $id";
		return mysql_query($sql);
	}
	//修改
	public function up($mess,$id){
		$sql = "SELECT * FROM `$mess` WHERE id=$id";
		return $data = mysql_query($sql);
	}
	public function update($mess,$id,$data){
		$arr = "";
		foreach ($data as $k => $v) {
			$arr .= "`$k` = '$v',";
		}
		$arr=trim($arr,',');
		$sql = "UPDATE `$mess` SET $arr WHERE id = $id";
		// var_dump($sql);die;
		return $res = mysql_query($sql);
	}


}
// $db = Single::getIns();
// $data = $db->selectAll('mess');
// var_dump($data);


 ?>