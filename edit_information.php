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
    <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="images/favicon.ico">

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
			  email : $("#email").val(),
			  gender : $("input[name='gender']:checked").val(),
			  birthday : $("#birthday").val()
			  
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
  
  $("#edit_information").on("submit", function(){
    			//加入loading icon
    			 var valid = true,
				 edit_email = $("#edit_email"),
					edit_password = $("#edit_password");
      //allFields.removeClass( "ui-state-error" );
	  
      valid = valid && checkLength( edit_email, "email", 6, 80 );
      valid = valid && checkLength( edit_password, "password", 4, 50 );
 
     
      valid = valid && checkRegexp( edit_email, emailRegex, "eg. ui@jquery.com" );
      valid = valid && checkRegexp( edit_password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
    			
    			if(valid){
						$.ajax({
	            type : "POST",
	            url : "php/edit_information.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
	            data : {
					id : $("#edit_id").val(),//使用者帳號
					email : $("#edit_email").val(),
	              password : $("#edit_password").val(),
				
			  gender : $("input[name='gender']:checked").val(),
			  birthday : $("#edit_birthday").val()
	              
	              
	               
	            },
	            dataType : 'html' //設定該網頁回應的會是 html 格式
	          }).done(function(data) {
	            //成功的時候
	            console.log(data);
	            if(data == "yes")
	            {
	              //註冊新增成功，轉跳到登入頁面。
	              alert("修改成功，點擊確認回列表");
	              window.history.back();
	            }
	            else
	            {
	              alert("請修改任一筆資料");
	            }
	            
	          }).fail(function(jqXHR, textStatus, errorThrown) {
	            //失敗的時候
	            alert("有錯誤產生，請看 console log");
	            console.log(jqXHR.responseText);
	          });
					
				}
					  //使用 ajax 送出 帳密給 verify_user.php
			
    			
    			return false;
    		});
  
	
	
	
	
		
		

		

			
			
		
  });
    
	
	
  
  </script>
  </head>

  <body>
	<?php include_once 'menu.php'; ?>
	<div class = "container">
		<div class = "row">
			<div class = "col-xs-3">
			</div>
			<div class = "col-xs-6">
				<form id="edit_information">	
						<input type = "hidden" id = "edit_id" value = "<?php echo $data['id'];?>" >
						<input type = "hidden" id = "hidden_" value = "<?php echo $data['id'];?>" >
					  <div class="form-group">
						<label for="edit_email" >信箱</label>
						<input  class="form-control" type="input" id="edit_email" value = "<?php echo $data['email'];?>">
					  </div>
					  <div class="form-group">
						<label for="edit_password" >密碼</label>
						<input  class="form-control" type="password" id="edit_password" value = "<?php echo $data['password'];?>">
					  </div>
					 <div class="form-group">
						<p style = "font-weight:700;">性別</p>
						<label class="radio-inline">
						  <input type="radio" name="gender" value="1" <?php echo ($data['gender'] == 1)?"checked":"";?>> 男
						</label>
						<label class="radio-inline">
						  <input type="radio" name="gender" value="0" <?php echo ($data['gender'] == 0)?"checked":"";?>> 女 
						</label>
					  </div>
					  <div class="form-group">
						<label for="edit_birthday">生日</label>
						<input class="form-control" type="date" id="edit_birthday" value = "<?php echo $data['birthday'];?>">
					  </div>
					  <button type="submit" class="btn btn-default">修改</button>
					  
				
					  
				</form>
				 <p class="validateTips"></p>
			</div>
			<div class = "col-xs-3">
			</div>
		</div>
	</div>
	<?php include_once 'footer.php'; ?>
  </body>

</html>
