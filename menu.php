<?php
//取得目前檔案的名稱。透過$_SERVER['PHP_SELF']先取得路徑
$current_file = $_SERVER['PHP_SELF'];
//echo $current_file; //查看目前取得的檔案完整
//然後透過 basename 取得檔案名稱，加上第二個參數".php"，主要是將取得的檔案去掉 .php 這副檔名稱
$current_file = basename($current_file , ".php");
//echo $current_file; //查看目前取得後的檔名

switch ($current_file) {
	case 'article_list':
	case 'article':
		//為文章列表或完整文章頁
		$index = 1;
		break;
	case 'work_list':
	case 'work':
		//為作品列表或完整作品頁
		$index = 2;
		break;
	default:
		//預設索引為 0
		$index = 0;
		break;
}
?>
<div id="dialog-form1" class = "dialog" >
	  <p class="validateTips">請輸入帳號密碼</p>
	 
	  <form>
		<fieldset>
		  <label for="login_name">帳號</label>
		  <input type="text" name="login_name" id="login_name" class="text ui-widget-content ui-corner-all">
		  <label for="login_password">密碼</label>
		  <input type="password" name="login_password" id="login_password" class="text ui-widget-content ui-corner-all">
	 
		  <!-- Allow form submission with keyboard without duplicating the dialog button -->
		  <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
		</fieldset>
	  </form>
	</div>
	
	<div id="dialog-form2" class = "dialog" >
	  <p class="validateTips">註冊</p>
	 
	  <form>
		<fieldset>
			<div class="form-group">
                <label for="register_name">帳號</label>
				<input type="text" name="register_name" id="register_name"  class="text ui-widget-content ui-corner-all">		  
             </div>
			  <div class="form-group">
               <label for="register_password">密碼</label>
				<input type="password" name="register_password" id="register_password"  class="text ui-widget-content ui-corner-all">
              </div>
			  <div class="form-group">
               <label for="email">Email</label>
				<input type="text" name="email" id="email" placeholder="eg. ui@jquery.com" class="text ui-widget-content ui-corner-all">
              </div>
			  <div class="form-group">
               <p>性別</p>
				<label class="radio-inline">
                  <input type="radio" name="gender" value="1" checked> 男
                </label>
				<label class="radio-inline">
                  <input type="radio" name="gender" value="0"> 女
                </label>
              </div>
		 
		  <div class="form-group">
                <label for="birthday">生日</label>
			<input type="date" name="birthday" id="birthday" class="text ui-widget-content ui-corner-all">
		  <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
             </div>
			
				
                
			
		</fieldset>
	  </form>
	</div>
<div class ="container-fluid" style = "background-color:#eee;">
	<div class = "row">
		<div class = "col-xs-7">
		
		</div>
		<div class = "col-xs-3">
			<?php if(!empty($data)):?>
<div class="alert alert-success" role="alert">
  <?php echo $data['user'];?>&nbsp;
  <a href = "information.php" class = "btn btn-default">個人資料</a>
  <a href = "php/logout.php" class = "btn btn-default">登出</a>
</div>
				
			
				
				
				<?php else:?>
				<div class="alert alert-warning" role="alert">
  <?php echo'訪客&nbsp;';?>
  <button id = "login" class = "btn btn-default">登入</button>
				<button id = "register" class = "btn btn-default">註冊</button>
</div>
				
				<?php endif;?>
		</div>
		<div class = "col-xs-2">
		
		</div>
	</div>
</div>
<div class="jumbotron">

  <div class="container">
    <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
    <div class="row">
      <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
      <div class="col-xs-12">
        <!--網站標題-->
        <h1 class="text-center">作品網站</h1>
		

        <!-- 選單 -->
        <ul class="nav nav-pills">
          <li role="presentation" <?php echo ($index == 0)?'class="active"':'';?>><a href="index.php">首頁</a></li>
          <li role="presentation" <?php echo ($index == 1)?'class="active"':'';?>><a href="article_list.php">所有文章</a></li>
          <li role="presentation" <?php echo ($index == 2)?'class="active"':'';?>><a href="work_list.php">所有作品</a></li>          
        </ul>
      </div>
    </div>
  </div>
</div>
