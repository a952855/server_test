<?php
	require_once 'php/db.php';
	require_once 'php/functions.php';
	if(!empty($_SESSION['login_user_id'])){
		
		$data = get_user($_SESSION['login_user_id']);
	}
	else{
		
		$data = null;
	}
	

	

?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>作品網站</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="shortcut icon" href="images/favicon.ico">
	

  </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="head.js"></script>

  

  </head>

  <body>
	<?php include_once 'menu.php'; ?>
		<div class = "container"> 
			<div class = "row">
				<div class = "col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
						<h3 class="panel-title">帳號:<?php echo $data['user']?></h3>
					</div>
					<div class="panel-body">
						信箱:<?php echo $data['email'];?><br>
						性別:<?php if($data['gender'] == 1){echo '男';}else{echo '女';}?><br>
						生日:<?php echo $data['birthday'];?><br>
						<a href = "edit_information.php">編輯個人資料</a>
					</div>
					</div>
				</div>
			</div>
		</div>
	<?php include_once 'footer.php'; ?>
  </body>

</html>
