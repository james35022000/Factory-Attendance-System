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
          <!--區塊功能打在這-->	
			<?php require_once('db.php');
				$id = $_SESSION['data']['id'];
				$pas1 = $_POST['pas1'];

				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$pas = $_POST['pas'];
				
				$newemail = false;
				$newphone = false;
				$newpas   = false;
				
				
				//print $pas1;
				//print $pas2;
				
				if($pas !=  $_SESSION['data']['password']||strlen($pas) != strlen($_SESSION['data']['password'])){ ?>
					<div class="row"><font size="5"><b>輸入的舊密碼有誤，請在試一次</b></font></div>
                    
					 <form id="tochange" action="myacc.php" method="post">
						<input name="送出" type="submit" class="btn btn-sm btn-primary" id="back" value="返回個人帳戶" />
              　 	 </form>
					
					
			<?php }else{
						if($email != ""){
								$sqle = "UPDATE `test` SET `email` = '$email' WHERE `id`='$id'";
								if(mysql_query($sqle)){$newemail = true;}
								
						}
						if($phone != ""){
								$sqlp = "UPDATE `test` SET `phone` = '$phone' WHERE `id`='$id'";
								if(mysql_query($sqlp)){$newphone = true;}
								
						}
						if($pas1 != ""){
								$sqlpa = "UPDATE `test` SET `password` = '$pas1' WHERE `id`='$id'";
								if(mysql_query($sqlpa)){$newpas = true;}
							
						}
						
						if($newpas == true || $newemail == true || $newphone == true){ 
							$_SESSION['logged_in'] = FALSE;
											
						?>
							<div class="row"><font size="5"><b>更新成功，請重新登入，頁面即將跳轉</b></font></div>	
                            		<meta http-equiv="refresh" content="3; url=home.php">

			<?php		}else{ ?>
							<div class="row"><font size="5"><b>更新失敗或無資料更新，請稍後再試一次</b></font></div>
                    
					    	 <form id="tochange" action="myacc.php" method="post">
							 <input name="送出" type="submit" class="btn btn-sm btn-primary" id="back" value="返回個人帳戶" />
              　		 		 </form>
										
							
							
					<?php	}
				
				}
				
				?>
				
				
					
                    


					
				
			
			
			
			
   
        </div>
      </div>
    </div>
	
	