<?php
/**
 * Created by PhpStorm.
 * User: zlt
 * Date: 2016/5/16
 * Time: 15:14
 */
class sqlHelper{
    const lost = 0;
    const success = 1;
    public $conn;//连接数据库
    public $dbname="zltdata";
    public $username="zlt";
    public $password="123";
    public $host="localhost";
    //连接数据库
    public function __construct(){
//        error_reporting(E_ALL ^ E_DEPRECATED);
//        error_reporting(E_ALL ^ E_DEPRECATED);
//        $this->conn=mysql_connect($this->host,$this->username,$this->password);
//       if(!$this->conn){
//            die("连接失败".mysql_error());
//        }
//        mysql_select_db($this->dbname,$this->conn);
        $this->conn=new mysqli($this->host,$this->username,$this->password,$this->dbname);
        if ($this->conn->connect_errno) {
            printf("Connect failed: %s\n", $this->connect_error);
            exit();
        }
    }
    //执行查询语句
    public function execute_dql($sql){
        $res=$this->conn->query($sql);
//        $res =mysqli_query($this->conn,$sql);
        return $res;
    }
    //执行增填改语句
    public function execute_dml($sql){
        //  mysql_query($sql,$this->conn);
        $res=$this->conn->query($sql);
        return $res;
    }
    //关闭数据库
    public function close(){
        if ($this->conn == null) {
            return self::lost;
        } else {
            $this->conn->close();
            return self::success;
        }
    }
}