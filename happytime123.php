<?php
	require_once 'php/db.php';
	require_once 'php/functions.php';
	if(!empty($_SESSION['login_user_id'])){
		
		$data = get_user($_SESSION['login_user_id']);
	}
	else{
		
		$data = null;
	}
	
	$article = get_article($_GET['p']);
	
		
	$all_article = all_article($article['title']);
	

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
	<style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
	.no-close .ui-dialog-titlebar-close {	
	display: none;
	}
	div.ui-dialog{
	
	background-color:#888888;
	border-radius:5px;
}

  </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(document).on("ready" , function(){
	  var dialog_login, dialog_register, form_register, form_login ,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
	  login_name = $( "#login_name" ),
      login_password = $( "#login_password" ),
	  register_name = $("#register_name"),
	  email = $("#email"),
	  register_password = $("#register_password"),
      //allFields = $( [] ).add( register_name ).add(email).add( register_password ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
	
	    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( n + "長度介於" + min + "-" + max + "之間");
        return false;
      } else {
        return true;
      }
    }
	
	function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
	
	
	
    function login() {
      $.ajax({
		  
		  type : "POST" , 
		  url : "php/verify_user.php" ,
		  data : {
			  name : $("#login_name").val() ,
			  password : $("#login_password").val()
			  
		  },
		  dataType : 'html'
	  }).done(function(data){
		  
		  console.log(data);
		  if(data == "yes")
            {
              //註冊新增成功，轉跳到登入頁面。
              window.location.href = "index.php"; //因為目前的 login.php 跟後端的 index.php 首頁在同一資料夾，所以直接叫他就好
            }
            else
            {
              alert("登入失敗，請確認帳號密碼");
            }
	  }).fail(function(jqXHR, textStatus, errorThrown){
		  
		   alert("有錯誤產生，請看 console log");
            console.log(jqXHR.responseText);
	  });
	  return false;
    }
	
	function addUser() {
      var valid = true;
      //allFields.removeClass( "ui-state-error" );
	  valid = valid && checkLength( register_name, "username", 3, 16 );
      valid = valid && checkLength( email, "email", 6, 80 );
      valid = valid && checkLength( register_password, "password", 5, 16 );
 
      valid = valid && checkRegexp( register_name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
      valid = valid && checkRegexp( register_password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
    
 
      if ( valid ) {
          $.ajax({
		  
		  type : "POST" , 
		  url : "php/add_user.php" ,
		  data : {
			  un : $("#register_name").val() ,
			  pw : $("#register_password").val(),
			  email : $("#email").val()
			  
		  },
		  dataType : 'html'
	  }).done(function(data){
		  
		  console.log(data);
		  if(data == "yes")
            {
              //註冊新增成功，轉跳到登入頁面。
			  alert("註冊新增成功");
              window.location.href = "index.php"; //因為目前的 login.php 跟後端的 index.php 首頁在同一資料夾，所以直接叫他就好
            }
            else
            {
              alert("登入失敗，請確認帳號密碼");
            }
	  }).fail(function(jqXHR, textStatus, errorThrown){
		  
		   alert("有錯誤產生，請看 console log");
            console.log(jqXHR.responseText);
	  });
      }
      return valid;
    }
 
    dialog_login = $( "#dialog-form1" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "登入": login,
        "取消": function() {
          dialog_login.dialog( "close" );
        }
      },
      dialogClass: 'no-close'
    });
	
	
 
    form_login = dialog_login.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      login();
    });
 
    $( "#login" ).button().on( "click", function() {
      dialog_login.dialog( "open" );
    });
	  
	dialog_register = $( "#dialog-form2" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "註冊": addUser,
        "取消": function() {
          dialog_register.dialog( "close" );
        }
      },
      dialogClass: 'no-close'
    });
	
	
  
  $( "#register" ).button().on( "click", function() {
      dialog_register.dialog( "open" );
    });
  
  
  
	    		$("#add_form").on("submit", function(){
    			//加入loading icon
    			
    			
    			if($("#content").val() == ''){
    				alert("請填入內文");
    				
    				//清掉 loading icon
    				
    			}else{
					  //使用 ajax 送出 帳密給 verify_user.php
						$.ajax({
	            type : "POST",
	            url : "php/add_word.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
	            data : {
					title : $("#title").val(),
	              content : $("#content").val() //使用者帳號
	              
	            },
	            dataType : 'html' //設定該網頁回應的會是 html 格式
	          }).done(function(data) {
	            //成功的時候
	            console.log(data);
	            if(data == "yes")
	            {
	              //註冊新增成功，轉跳到登入頁面。
	              alert("新增成功，點擊確認回列表");
	              location.reload(); 
	            }
	            else
	            {
	              alert("新增錯誤");
	            }
	            
	          }).fail(function(jqXHR, textStatus, errorThrown) {
	            //失敗的時候
	            alert("有錯誤產生，請看 console log");
	            console.log(jqXHR.responseText);
	          });
    			}
    			return false;
    		});
			
			$( "a.btn_image" ).on( "click", function() {
				
				$("div.in_image").css("display" , "block");
			});
			$( "a.btn_video" ).on( "click", function() {
				
				$("div.in_video").css("display" , "block");
			});
			
			$("a.btn_image_submit").on("click" , function(){
				if($("#in_image").val() != ""){
					
					$("#content").val($("#content").val() +'<image src =' + '"' + $("#in_image").val() + '"' +'>');
					$("#in_image").val("");
				}
				
				
			});
			$("a.btn_video_submit").on("click" , function(){
				if($("#in_video").val() != ""){
					
					$("#content").val($("#content").val() +'<iframe width="560" height="315" src=" ' + $("#in_video").val().replace("watch?v=" , "embed/") + '"' +  ' frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');
					$("#in_video").val("");
				}
				
				
			});

  });
    
	
	
  
  </script>
  </head>

  <body>
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
		  <label for="register_name">帳號</label>
		  <input type="text" name="register_name" id="register_name"  class="text ui-widget-content ui-corner-all">		  
		  <label for="register_password">密碼</label>
		  <input type="password" name="register_password" id="register_password"  class="text ui-widget-content ui-corner-all">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="jane@smith.com" class="text ui-widget-content ui-corner-all">
		  <!-- Allow form submission with keyboard without duplicating the dialog button -->
		  <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
		</fieldset>
	  </form>
	</div>
    <div class = "main clearfix">
		<div class = "left">
			歡迎光臨
			<?php if(!empty($data)){echo $data['user'];}else{echo '訪客';}?>
			<br>
			
				<?php if(!empty($data)):?>
				<a href = "php/logout.php" class = "btn btn-default">登出</a>
				<?php else:?>
				<button id = "login" class = "btn btn-default">登入</button>
				<button id = "register" class = "btn btn-default">註冊</button>
				<?php endif;?>
			
			<div>
				<a href = "happytime.php">happytime</a>
			</div>
		</div>
		<div class = "right clearfix" style = "margin: 0 auto;">
			<h1>我在右邊</h1>

			<?php if($all_article):?>
                <?php foreach($all_article as $datas):?>
				<div style = "border-style:double; width:1000px; margin: 0 auto; min-height:450px;">

				<div class = "left">
					<?php $user = get_user($datas['user_id']); echo $user['user'];?>
					<?php if($data['user'] == $user['user']):?>
						<br><a href = "edit_article.php?x=<?php echo $article['title'];?>&i=<?php echo $datas['id'];?>">編輯文章</a>
					<?php endif;?>
				</div>
				
				<div class = "right" style = "height:100%;">
					<?php if($all_article):?>
					<p><?php echo $datas['title'];?>&nbsp<?php echo $datas['id'];?>樓</p>
					
					<?php echo $datas['content'];?>
					
					<?php endif; ?>

				</div>
				    <div style = "clear:both;">
					</div>
			</div>
                <?php endforeach;?>
             
              <?php endif;?>
			
			<div>
				<form id = "add_form">
					<div class="form-group">
					<input type = "hidden" id = "title" value = "<?php echo $article['title']; ?>">
					<label for="content">留言區</label>
					<textarea autofocus type="input" style="margin: 0px auto; width: 1000px; height: 90px;" id="content"></textarea>
					</div>
					<div class="form-group in_image" style = "display:none;">					
					<label for="in_image" style = "display:inline-block">嵌入圖片</label>
					<a  class="btn btn-default btn_image_submit" style = "display:inline-block">確定</a>
					<input type="text" style="margin: 0px auto; width: 1000px;" id="in_image" placeholder = "輸入網址">
					</div>
					<div class="form-group in_video" style = "display:none;">					
					<label for="in_video" style = "display:inline-block">嵌入影片</label>
					<a class="btn btn-default btn_video_submit" style = "display:inline-block">確定</a>
					<input type="text" style="margin: 0px auto; width: 1000px;" id="in_video" placeholder = "輸入網址">
					</div>
					<a href ="#in_image" class="btn btn-default btn_image">嵌入圖片</a>
					<a href ="#in_video" class="btn btn-default btn_video">嵌入影片</a>
					<button type="submit" class="btn btn-default">送出</button>
				</form>
			</div>
		</div>
	</div>
  </body>

</html>
