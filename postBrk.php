<?php
  session_start();
  header("Content-Type:text/html; charset=utf-8");

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
			<?php require_once('db.php');
				date_default_timezone_set('Asia/Taipei');
				$ID = $_SESSION['data']['id'];
				$TYPE = $_POST['absenceType'];
				$DATE = $_POST['absenceDate'];
				$REASON = $_POST['absenceReason'];
				$SQL_CMD = "UPDATE `canwall_test`.`Attendance` SET `Absence` = '$TYPE', `Reason` = '$REASON', `Approval` = '0' WHERE `Attendance`.`ID` = '$ID' AND `Attendance`.`Date` = '$DATE';";
				
				$DATE_TODAY = date("Y-m-d");
				
				if(($TYPE == "事假") && ($REASON == "")) { ?>
					<div class="row"><font size="5"><b>請填寫理由</b></font></div>
					<form action="break.php" method="post">
						<input type="submit" class="btn btn-sm btn-primary" id="back" value="返回請假系統"/>
				  　 </form>			
		<?php 	}
				else {
					if($TYPE == 0) {
						if(strtotime($DATE) >= strtotime($DATE_TODAY)) {
							if(mysql_query($SQL_CMD)) { ?>
								<div class="row"><font size="5"><b>請假成功</b></font></div>
								<div class="row">員工id : <?php print $ID; ?> </div>
								<div class="row">請假類別 : <?php print $TYPE ?> </div>
								<br>
								<form action="find.php" method="post">
									<input type="submit" class="btn btn-sm btn-primary" id="back" value="查詢出缺勤"/>
              　 	 		  	</form>
			<?php 			}
							else { 	?>
									<div class="row"><font size="5"><b>更新失敗，請稍後再試一次</b></font></div>
									<form action="break.php" method="post">
										<input type="submit" class="btn btn-sm btn-primary" id="back" value="返回請假系統"/>
				  　 				</form>
			<?php			}
						}
						else { 	?>
							<div class="row"><font size="5"><b>請假時間不允許 請重新填寫</b></font></div>
							<form action="break.php" method="post">
								<input type="submit" class="btn btn-sm btn-primary" id="back" value="返回請假系統"/>
				  　	 	</form>
			<?php		}
					}
					else {
						if(strtotime($DATE) > strtotime($DATE_TODAY)) {
							if(mysql_query($SQL_CMD)) { ?>
								<div class="row"><font size="5"><b>請假成功</b></font></div>
								<div class="row">員工id :   <?php print $ID; ?></div>
								<div class="row">請假類別 : <?php 	print $TYPE; ?> </div>
								<br>
								<form action="find.php" method="post">
									<input type="submit" class="btn btn-sm btn-primary" id="back" value="查詢出缺勤"/>
              　 	 	  		</form>
			<?php 			}
							else { 	?>
									<div class="row"><font size="5"><b>更新失敗，請稍後再試一次</b></font></div>
									<form action="break.php" method="post">
										<input type="submit" class="btn btn-sm btn-primary" id="back" value="返回請假系統"/>
				  　 				</form>				
			<?php			}
						}
						else {  ?>
							<div class="row"><font size="5"><b>請假時間不允許 請重新填寫</b></font></div>
							<form action="break.php" method="post">
								<input type="submit" class="btn btn-sm btn-primary" id="back" value="返回請假系統"/>
				  　 		</form>
			<?php		}
					}  
				}?>
			
        </div>
      </div>
    </div>