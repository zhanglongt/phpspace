<?php
/**
 * Created by PhpStorm.
 * User: zlt
 * Date: 2016/5/16
 * Time: 15:50
 */
require("baseDao.php");
    type();
    function type(){
    $type=$_GET['type'];
    if($type==1){
        login();
    }else if($type==2){
        register();
    }
}
    function login()
    {
        $coon = new sqlHelper();
        $phone = $_GET['phone'];
        $pwd = $_GET['password'];
//        $name =1;
//        $pwd = 1;
        $sql = "SELECT * FROM testuser WHERE mobile = '" . $phone . "' and password = '" . $pwd . "'";
        $res = $coon->execute_dql($sql);
        //$user=new WxUser();
        if ($res) {
            $a =array();
            while ($row = $res->fetch_assoc()) {
            $foo=  array( 'phone'=>$row["mobile"],
                           'keyid'=> md5($row["password"]),
                           'name'=>$row["nickname"],
                           'result'=> "right");
//            $foo = array("keyid" => md5($row["password"]));
                echo json_encode($foo);
                return;
            }

            echo json_encode( array("result" => "wrong"));
        }
    }
  // register();
   //注册
    function register()
    {
          $coon=new sqlHelper();
        $phone=$_POST['mobile'];
        $name = $_POST['userName'];
        $psw = $_POST['userPass'];
//        $phone=123;
//        $name = 12;
//        $psw = 12;
        $sql = "insert into testuser(mobile,nickname,password) VALUES ('$phone','$name','$psw')";
        $res = $coon->execute_dml($sql);
        if ($res) {
            $foo = array("result" => "right");
            echo json_encode($foo);
            //echo "right";
        } else {
            $foo = array("result" => "wrong");
            echo json_encode($foo);
           // echo "wrong";
        }
    }