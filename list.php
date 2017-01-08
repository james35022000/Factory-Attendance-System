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


          			
          <?php  //var_dump($_SESSION['data']['id']);
		  if($_SESSION['data']['prior']!=2){?>
          <div class="row">權限不足</div>
          <?php }else{
            require_once('db.php');
            $query1 = mysql_query("SELECT * FROM `test` ORDER BY `id`"); ?>

            
          <div class="row">
				<form id="tonew" action="tonew.php" method="post">
					<div class="col-lg-3">
						<input/ name = "id" type="text" class="form-control" id="nuserid"  placeholder="新增員工id" required>
					</div>
					<div class="col-lg-3">
						<input/ name = "pas" type="password" class="form-control" id="npassword"  placeholder="密碼預設為00000000"readonly >
					</div>
					<div class="col-lg-3">選擇權限 :
						<!--<input/ name = "pri" type="text" class="form-control" id="prior"  placeholder="權限(0員工、1領班、2主任)" required="required">-->
                         <select name="pri">
                         <option value="2">主任</option>
                         <option value="1">領班</option>
                         <option value="0">員工</option>
                        </select>
					</div>					
					<div class="col-lg-3">
					
						<input name="送出" type="submit" class="btn btn-sm btn-info" id="new" value="新增員工"/>
              　	
					</div>
				</form>
          </div>
          <br>
          <div class="row">
          	<form id="tochange" action="tochange.php" method="post">
          		<div class="col-lg-3">
						<input/ name = "cid" type="text" class="form-control" id="cuid"  placeholder="更改權限員工id" required>
				</div>
                <div class="col-lg-3">選擇權限 :
						<!--<input/ name = "cpri" type="text" class="form-control" id="cupri"  placeholder="更改權限(0員工、1領班、2主任)" required="required">-->
                        <select name="cpri">
                         <option value="2">主任</option>
                         <option value="1">領班</option>
                         <option value="0">員工</option>
                        </select>
				</div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3">
                  
                  <input name="ch" type="submit" class="btn btn-sm btn-warning" id="change" value="更改權限"/>
               　
              	</div>
             </form>
          </div>
		  <br>
          
          <div class="row">
          	<form id="todelete" action="todelete.php" method="post">
          		<div class="col-lg-3">
						<input/ name = "did" type="text" class="form-control" id="duid"  placeholder="刪除員工id" required>
				</div>
                <div class="col-lg-3">確認刪除
						<input/ name = "dpri" type="checkbox"  id="dupri"   required="required">
				</div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3">
                  
                  <input name="de" type="submit" class="btn btn-sm btn-danger" id="delete" value="刪除員工"/>
               　
              	</div>
             </form>
          </div>
          <br>
          
		  <div class="row">
                <div class="col-lg-3"><?php print '<font size="5"><b>員工id</b></font>'; ?></div>
                <div class="col-lg-3"><?php print '<font size="5"><b>權限</b></font>'; ?></div>
                <div class="col-lg-3"><?php print '<font size="5"><b>連絡電話</b></font>'; ?></div>
                <div class="col-lg-3"><?php print '<font size="5"><b>聯絡email</b></font>'; ?></div>
          
          </div>
          
          <br>
          <?php while ($row = mysql_fetch_assoc($query1)) { ?>
          <div class="row">
            <div class="col-lg-3"><?php print $row['id']; ?></div>
            <div class="col-lg-3"><?php if($row['prior']==0){print '員工';
				}else if($row['prior']==1){print '領班';
				}else{print '主任';};?> 
            </div>
            <div class="col-lg-3"><?php if($row['phone']==NULL){print '無';
				}else{print $row['phone'];};?>

            </div>
            <div class="col-lg-3"><?php if($row['email']==NULL){print '無';
				}else{print $row['email'];};?>
                  
                 
             
            </div>
          </div>
          <br>
          <?php } } ?>
        </div>
      </div>
    </div>
	
	

