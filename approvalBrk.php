<?php
  session_start();
  header("Content-Type:text/html; charset=utf-8");

  if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.html');
  }  ?>
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
			<div class="row">
				<div class="col-lg-2"><?php print '<font size="5"><b>員工id</b></font>'; ?></div>
				<div class="col-lg-1"><?php print '<font size="5"><b>職位</b></font>'; ?></div>
				<div class="col-lg-2"><?php print '<font size="5"><b>時間</b></font>'; ?></div>
				<div class="col-lg-1"><?php print '<font size="5"><b>請假</b></font>'; ?></div>
				<div class="col-lg-3"><?php print '<font size="5"><b>事由</b></font>'; ?></div>
			</div>
			<br>
			<?php require_once('db.php');
				$SQL_SEARCH = "SELECT * FROM `Attendance` WHERE `Prior` <= 2 AND `Absence` IS NOT NULL AND `Approval` = 0 ";
				$DATA = mysql_query($SQL_SEARCH);  ?>
				
			<?php
				$COUNT = 0;
				$ID = array("EMPTY");
				$DATE = array(date("Y-m-d"));
				while($ROW = mysql_fetch_assoc($DATA)) {
					if($ROW['Prior'] > $_SESSION['data']['prior'])  continue;
					
					$COUNT = $COUNT + 1;
					array_push($ID, $ROW['ID']);
					array_push($DATE, $ROW['Date']);?>
					<div class="row">
						<div class="col-lg-2" style="font-size:150%"><?php print $ROW['ID']; ?></div>
						<div class="col-lg-1" style="font-size:150%"><?php if($ROW['Prior'] == 0) {
														print '員工';
													}
													else if($ROW['Prior'] == 1) {
														print '領班';
													}
													else {
														print '主任';
													};?> </div>
						<div class="col-lg-2" style="font-size:150%"> <?php print $ROW['Date'];?> </div>
						<div class="col-lg-1" style="font-size:150%"> <?php print $ROW['Absence'];?> </div>
						<div class="col-lg-3" style="font-size:150%"> <?php print $ROW['Reason'];?> </div>
						<div class="col-lg-2">
							<button class="btn btn-sm btn-info" onclick="javascript:location.href='Approve.php?ID=<?php print $ID[$COUNT] ?>&DATE=<?php print $DATE[$COUNT] ?>'">批准</button>
							<button class="btn btn-sm btn-danger" onclick="javascript:location.href='Delete.php?ID=<?php print $ID[$COUNT] ?>&DATE=<?php print $DATE[$COUNT] ?>'">刪除</button>
						</div>
					</div>
		<?php	}  ?>
        </div>
      </div>
    </div>
	
	