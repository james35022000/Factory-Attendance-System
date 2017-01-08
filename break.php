<?php
header("Content-Type:text/html; charset=utf-8");
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
 // header('Location: index.html');
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
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
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
		<br><br><br><br><br><br>
		<div class="row">
			<form id="postBrk" action="postBrk.php" method="post">
				<div class="col-lg-2">
					<input id="absenceDate" name="absenceDate" class="form-control" type="text" required/>
					<script language="JavaScript">
						$(document).ready(function(){
							var opt={dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
								dayNamesMin:["日","一","二","三","四","五","六"],
								monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
								monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
								prevText:"上月", nextText:"次月", weekHeader:"週", showMonthAfterYear:true, dateFormat:"yy-mm-dd" };
							$("#absenceDate").datepicker(opt); });
					</script>
				</div>
				<div class="col-lg-3">
					<input name = "absenceReason" type="text" class="form-control" id="reason"  placeholder="事由(病假、補休可不填寫)" >
				</div>
				<div class="col-lg-3">請假類別 :
                    <select name="absenceType">
                      <option value="補休">補休</option>
                      <option value="事假">事假</option>
                      <option value="病假">病假</option>
					</select>
				</div>
				<div class="col-lg-3">
					<input type="submit" class="btn btn-sm btn-info" id="absenceSend" value="送出"/>
				</div>
			</form>
		</div>
    </div>
	<?php
	if($_SESSION['data']['prior'] > 0) {  ?>
    <div class="col-lg-10">
		<br><br><br><br><br><br><br><br><br>
		<div class="row" style="width:80%;text-align: center;margin:0 auto;">
			<form id="approvalBrk" action="approvalBrk.php" method="post">
				<input type="submit" class="btn btn-sm btn-danger" id="approvalBt" value="請假批准" style="font-size:300%; font-weight: bold;"/>
			</form>
		</div>
	</div>
	<?php
	}  ?>
  </div>
</div>

    




