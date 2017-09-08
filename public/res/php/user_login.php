<?php
  //debug
  require_once("UserModel.php");
  require_once("auth.php");
  require_once("notify.php");
  //echo "U: ".$_POST["usr"]. "P: ".$_POST["pwd"];
  if(!isset($_POST["usr"]) && !isset($_POST["pwd"]))
  {
    notify("Plese fill the form","please enter your username & password!","../../login.php","panel-danger");
    die();
  }

  $usrModel = new UserModel();


  if($usrModel->isLoginCorrect($_POST["usr"],$_POST["pwd"])) //密碼正確
  {
    ////////////// 登陆用户 //////////////
    loginForUsr($_POST["usr"]);
    notify("Welcome back ".getName(),"Login Successful, you will be redirect to home.","../../home.php");
  }
  else
  {
    //密码错误
    //die("Wrong PWD or username");
    notify("Wrong Username or Password!","You entered username or password is wrong.","../../login.php","panel-danger");
  }



  //echo $uid;

  //if(correct )
?>
