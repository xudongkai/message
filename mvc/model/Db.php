<?php 
namespace model;
header("content-type:text/html;charset=utf-8");

class DB
{
	public $pdo;

	public function __construct()
	{
		// $db=C('db');
		// $this->pdo=new \PDO('mysql:host='.$db['host']';dbname='.$db['dbname'],$db['username'],$db['password']);
		$this->pdo = new \PDO('mysql:host=127.0.0.1;dbname=shiyi',"root","root");
		$this->pdo->query("set names utf8");
	}
//添加
	public function insert($table,$data)
	{
		$key="";
		$val="";
		foreach ($data as $k => $v) {
			$key .= "`$k`,";
			$val .= "'$v',";
		}
		$key = rtrim($key,',');
		$val = rtrim($val,',');

		$sql="INSERT INTO `$table` ($key) VALUES ($val)";
		// var_dump($sql);die;
		return $this->pdo->exec($sql);
	}
//查询
	public function selectAll($table)
	{
		$sql="SELECT * FROM `$table`";
		$res=$this->pdo->query($sql)->fetchAll();
		return $res;
	}
//单条查询
	public function select($table,$where)
	{
		$sql="SELECT  * FROM `$table` WHERE $where";
		// var_dump($sql);die;
		$res=$this->pdo->query($sql);
		// var_dump($res);die;
		return $res;
	}
//修改查询
	public function find($table,$where)
	{
		$sql="SELECT * FROM `$table` WHERE $where";
		$res=$this->pdo->query($sql)->fetchAll();
		return $res;
	}
//删除
	public function delete($table,$where)
	{
		$sql="DELETE FROM `$table` WHERE $where";
		return $this->pdo->exec($sql);
	}
//修改
	public function update($table,$data,$where)
	{
		$str = '';
		foreach ($data as $k => $v) {
			$str .="`$k`='$v',";
		}
		$str = rtrim($str,',');
		$sql="UPDATE `$table` SET $str WHERE $where";
		return $res=$this->pdo->exec($sql);
	}

 }
