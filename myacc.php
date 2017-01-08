<?php
header("Content-Type:text/html; charset=utf-8");
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
  header('Location: index.html');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>home</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系統登入</title>

<!-- 最新編譯和最佳化的 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- 選擇性佈景主題 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- 最新編譯和最佳化的 JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="myjs.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
	
<body>
	

<div class="container">
  <div class="page-header">
   
    <div class="row">
      <div class="col-lg-1">
   		 <div class="row">您的id : <?php print $_SESSION['data']['id']; ?></div>
      </div>
      <div class="col-lg-9">
        <!-- <div class="row">您的姓名 : <?php print $_SESSION['data']['name']; ?></div>-->
      </div>
      <div class="col-lg-2">
         <form id="logout" action="logout.php" method="post">
          <input name="送出" type="submit" class="btn btn-success" id="btn" value="登出"/>
          </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2">
      <div class="row"> 


		<div class="btn-group-vertical" role="group" aria-label="...">
        	<form id="find" action="find.php" method="post">
            <button type="submit" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 查詢出缺勤
            </button>
            </form>
            
            <form id="break" action="break.php" method="post">
            <button type="submit" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 請假
            </button>
            </form>
            
            <form id="goout" action="goout.php" method="post">
            <button type="submit" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-plane" aria-hidden="true"></span> 出差
            </button>
            </form>
            
            <form id="myacc" action="myacc.php" method="post">
            <button type="submit" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 個人帳戶
            </button>
            </form>
            
            <form id="list" action="list.php" method="post">
            <button type="submit" class="btn btn-default btn-lg" >  
             	<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> 員工名單
            </button>
            </form>
		</div>

       </div>
    </div>
    <div class="col-lg-10">
      <!--區塊功能打在這-->
      <div class="row">
      	<div class="page-header">
      		<h1 align="center"><small>更改資料</small></h1>
        </div>
      	<form id="cinf" action="changeinfo.php" method="post">
        	<div class="row" align="center">使用者id : <?php print $_SESSION['data']['id']; ?></div> <br>
      		<div class="row" align="center">新密碼</div> 
            <input name = "pas1" type="password" class="form-control" id="npassword" style="width:30%;text-align: center;margin:0 auto;"/><br>
        
            <div class="row" align="center">連絡電話 : <?php print $_SESSION['data']['phone']; ?></div> 
            <input name = "phone" type="text" class="form-control" id="nphone"   placeholder="更改連絡電話請填在這裡" style="width:30%;text-align: center;margin:0 auto;"/><br>
            <div class="row" align="center">聯絡email : <?php print $_SESSION['data']['email']; ?></div> 
            <input name = "email" type="text" class="form-control" id="nemail"   placeholder="更改連絡email請填在這裡" style="width:30%;text-align: center;margin:0 auto;"/><br>   
            <div class="row" align="center">請輸入密碼以繼續</div> 
            <input name = "pas" type="password" class="form-control" id="pass"   required="required" style="width:30%;text-align: center;margin:0 auto;"/><br>               
            
                     
        	<div class="row" align="center">
			<input name="送出" type="submit" class="btn btn-sm btn-primary" align="center" id="wow" value="更新資料"/>
            </div>
        
        </form>
      
      
      
      
      </div>
      
      
    </div>
  </div>
</div>

    




