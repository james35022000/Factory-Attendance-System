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

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
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
	  
        <div class="row"><?php print '<font size="7"><b>本日上班員工</b></font>'; ?></div>
		
		<div class="row">
            <div class="col-lg-3"><?php print '<font size="5"><b>員工id</b></font>'; ?></div>
            <div class="col-lg-3"><?php print '<font size="5"><b>權限</b></font>'; ?></div>
			<div class="col-lg-3"><?php print '<font size="5"><b>早晚班</b></font>'; ?></div>
        </div>
		<br>

		<?php require_once('db.php');
		date_default_timezone_set('Asia/Taipei');
		$DATE_TODAY = date("Y-m-d");
        $query2 = mysql_query("SELECT a1.ID, a2.prior, a1.Shift, a1.Absence, a1.Approval FROM Attendance a1, test a2 where a1.Date = '$DATE_TODAY' AND a1.ID = a2.id ORDER BY a1.ID"); ?>
		
		<?php while ($row = mysql_fetch_assoc($query2)) { ?>
          <div class="row">
            <div class="col-lg-3"><?php print $row['ID']; ?></div>
            <div class="col-lg-3"><?php if($row['prior']==0){print '員工';
				}else if($row['prior']==1){print '領班';
				}else{print '主任';};?> 
            </div>
            <div class="col-lg-3"><?php if($row['Absence'] != NULL & $row['Approval'] == 1) {
											?><font color="#FF0000"> <?php print $row['Absence']; ?> </font> <?php
										}
										else {
											print $row['Shift'];
										};  ?>
            </div>
          </div>
          <br>
          <?php }?>
		<br>
		<div class="row">	
			<div class="col-lg-2">
				<form id="tocheck" action="tocheck.php" method="post">
				   <input type="submit" class="btn btn-sm btn-info" id="check" value="查詢出缺勤紀錄" />
				</form>
			</div>
		</div>	
		<br>
		<div class="row">	
			<div class="col-lg-2">
				<form id="insert_done" action="insert_done.php" method="post">
				   <input type="submit" class="btn btn-sm btn-info" id="insert" value="新增下周勤務" />
				</form>
			</div>
		</div>	
    </div>
  </div>
</div>

    




