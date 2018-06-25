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
        $this->pdo = new \PDO('mysql:host=127.0.0.1;dbname=item',"root","root");
        $this->pdo->query("set names utf8");
    }
//添加
    public function insert($table,$data)
    {
        $key = "";
        $val = "";
        foreach ($data as $k => $v) {
            $key .= "`$k`,";
            $val .= "'$v',";
        }
        $key = rtrim($key,',');
        $val = rtrim($val,',');

        $sql = "INSERT INTO `$table` ($key) VALUES ($val)";
        // var_dump($sql);die;
        return $this->pdo->exec($sql);
    }
//查询
    public function selectAll($table)
    {
        $sql = "SELECT * FROM `$table`";
        $res = $this->pdo->query($sql)->fetchAll();
        return $res;
    }
//单条查询
    public function select($table,$where)
    {
        $sql = "SELECT  * FROM `$table` WHERE $where";
        // var_dump($sql);die;
        $res = $this->pdo->query($sql);
        // var_dump($res);die;
        return $res;
    }
    //两表联查
    public function show($table1,$table2,$where)
    {
        $sql = "SELECT * FROM `$table1` INNER JOIN `$table2` ON $where";
        $res = $this->pdo->query($sql);
        return $res;
    }
//删除
    public function delete($table,$where)
    {
        $sql = "DELETE FROM `$table` WHERE $where";
        return $this->pdo->exec($sql);
    }
//修改查询
    public function find($table,$where)
    {
        $sql = "SELECT * FROM `$table` WHERE $where";
        $res = $this->pdo->query($sql)->fetchAll();
        return $res;
    }
//修改
    public function update($table,$data,$where)
    {
        $str = '';
        foreach ($data as $k => $v) {
            $str .="`$k`='$v',";
        }
        $str = rtrim($str,',');
        $sql = "UPDATE `$table` SET $str WHERE $where";
        return $res=$this->pdo->exec($sql);
    }
  
    //双表分页方法(参数:表名，（条件：" `字段` LIKE '$sou%'"）)
    public function Page($table,$page,$pagesize){
        $ssql = "SELECT * FROM `$table`";
        $num = $this->pdo->query($ssql)->rowcount();
        $end = ceil($num/$pagesize);
        $up = $page-1<1?1:$page-1;
        $down = $page+1>$end?$end:$page+1;
        $limit = ($page-1)*$pagesize;
        $sql = "SELECT * FROM `$table` LIMIT $limit,$pagesize";
        $res = $this->pdo->query($sql)->fetchAll();
        //资源转换并循环数组
        $arr=array();
        foreach ($res as $key => $v) {
            $arr[] = $v;
        }
        $href = "?c=".$_GET['c']."&a=".$_GET['a'];
        $page = "<a href=$href&page=1>首页</a>
                 <a href=$href&page=$up>上一页</a>
                 <a href=$href&page=$down>下一页</a>
                 <a href=$href&page=$end>尾页</a>";
        //返回三维数组
        return array(
            'page'=>$page,
            'arr'=>$arr,
        );
    }
     //条件查询加搜索方法(参数：表名，（条件："`字段` LIKE '$sou%'"）)
    public function pageSou($table,$where,$sou,$page,$pagesize,$ajax){
        $ssql = "SELECT * FROM `$table` WHERE 1=1 and `$where` like '%$sou%' ";
        $num = $this->pdo->query($ssql)->rowcount();
        $end = ceil($num/$pagesize);
        $up = $page-1<1?1:$page-1;
        $down = $page+1>$end?$end:$page+1;
        $limit = ($page-1)*$pagesize;
        $sql = "SELECT * FROM `$table` WHERE 1=1 and `$where` like '%$sou%' LIMIT $limit,$pagesize";
        $res = $this->pdo->query($sql)->fetchAll();
        //资源转换并循环数组
        $arr=array();
        foreach ($res as $key => $v) {
            $arr[]=$v;
        }
        if ($ajax=="true") {
            $href = "?c=".$_GET['c']."&a=".$_GET['a'];
            $page = "<button class='page' url=$href&page=1&sou=$sou>首页</button>
                     <button class='page' url=$href&page=$up&sou=$sou>上一页</button>
                     <button class='page' url=$href&page=$down&sou=$sou>下一页</button>
                     <button class='page' url=$href&page=$end&sou=$sou>尾页</button>";
        }else{
            $href = "?c=".$_GET['c']."&a=".$_GET['a'];
            $page = "<a href=$href&page=1&sou=$sou>首页</a>
                     <a href=$href&page=$up&sou=$sou>上一页</a>
                     <a href=$href&page=$down&sou=$sou>下一页</a>
                     <a href=$href&page=$end&sou=$sou>尾页</a>";
        }
         //返回三维数组
        return array(
            'page'=>$page,
            'arr'=>$arr,
        );
    }

  
 }

 //文件上传
 class imag
 {
    private $size = 5;
    private $extra = array('image/jpeg','image/png','image/gif','image/bmp');
    private $error = "";
    public function int($file)
    {
        if (!$this->check_error($file['error'])) {
            echo $this->error;die;
            return false;
        }
        if (!$this->s_size($file['size'])){
            echo $this->error;die;
            return false;
        }
        if (!$this->check_type($file['type'])) {
            return false;
        }
        $path=$this->getNewPath();

        $names = $this->getNewName($file['name']);

        return $this->move_file($file['tmp_name'],$path.$names);
    }
    public function check_error($error)
    {
        switch ($error) {
            case '0':
                return true;
            case '1':
                $this->error = "上传文件超过了php.ini的最大值";
                return false;
            case '2':
                $this->error = "上传文件超过了php.ini的最小值";
                return false;
            case '3':
                $this->error = "文件只有部分被上传";
                return false;
            case '4':
                $this->error = "文件没有上传";
                return false;
                break;
            
            default:
                $this->error = "未知的错误";
                break;
        }
    }
   public  function check_type($type)
    {
        if (!in_array($type,$this->extra)) {
            $this->error = "上传文件类型不符！";
            return false;
        }else{
            return true;
        }
    }
    public function s_size($size){
        if (!$size>$this->size*1024*1024) {
            $this->error = "文件不能超过".$this->size."M";
            return false;
        }else{
            return true;
        }
    }
    public function getNewPath()
    {
        $path="./Public/img/".date('Ymd')."/";
        if (!is_dir($path)) {
            mkdir($path,0777,true);
        }
        return $path;
    }
    public function getNewName($name)
    {
        $names=time().rand(1000,9999).substr($name,strrpos($name, ','));
        return $names;
    }
    public function move_file($tmp_name,$new_path)
    {
        if (!move_uploaded_file($tmp_name, $new_path)) {
            $this->error = "文件移动失败！";
            return false;
        }else{
            return $new_path;
        }
    }
    public function getError()
    {
        return $this->error;
    }
}
