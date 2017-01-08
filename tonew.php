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
				$newid = $_POST['id'];
				$newpri = $_POST['pri'];
				if($_POST['pas']==''){
					$newpass = '00000000';
				}else{
					$newpass = $_POST['pas'];
				}
				if($_POST['pri']<0 || $_POST['pri']>2 ){ ?>
					
					<div class="row"><font size="5"><b>權限格式有誤，請確認後再試一次</b></font></div>
					 <form id="tochange" action="list.php" method="post">
						<input name="送出" type="submit" class="btn btn-sm btn-primary" id="back" value="返回員工名單"/>
              　 	 </form>
				<?php }else{
					if(mysql_query("INSERT INTO `test` VALUES('$newid', '$newpass', '$newpri' , NULL , NULL )")){     ?>
						<div class="row"><font size="5"><b>新增成功</b></font></div>
							
							<div class="row">新員工id : <?php print $newid; ?></div>
							<div class="row">新員工權限 : <?php if($newpri==0){print '員工';
																}else if($newpri==1){print '領班';
																}else{print '主任';};?>
						</div>
						<br>
							
					      <form id="tochange" action="list.php" method="post">
					      <input name="送出" type="submit" class="btn btn-sm btn-primary" id="back" value="返回員工名單"/>
              　 	 	  </form>
			  
						<?php }else{ ?>
							<div class="row"><font size="5"><b>新增失敗，請確認無重複id後再試一次</b></font></div>
                            <div class="row">輸入id : <?php print $newid; ?></div>
							<form id="tochange" action="list.php" method="post">
							<input name="送出" type="submit" class="btn btn-sm btn-primary" id="back" value="返回員工名單"/>
				  　 		</form>
						<?php }
				}?>
				
				
				
				
					 
					
					
					
				
					
					
				
			
			
			
			
   
        </div>
      </div>
    </div>
	
	