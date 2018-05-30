<?php
	require_once 'php/db.php';
	require_once 'php/functions.php';
	if(!empty($_SESSION['login_user_id'])){
		
		$data = get_user($_SESSION['login_user_id']);
	}
	else{
		
		$data = null;
	}
	
	$list2 = array();
	
	if(!empty($_GET['search_article']) && !empty($_GET['text'])){
						
	$list2 = search($_GET['search_article'] , $_GET['text']);
	}
	
	
		
		$list = get_all_article();
	

?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>文章列表</title>
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
	  email1 = $("#email1"),
	  password = $("#password"),
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
  
 /* $("#search").on("submit", function(){
    			
    			if($("#text").val() == '' ){
    				alert("請填入標題或內文");
    				
    				
    			}
    			else{
						$.ajax({
	            type : "POST",
	            url : "php/search.php", //因為此檔案是放在 admin 資料夾內，若要前往 php，就要回上一層 ../ 找到 php 才能進入 add_article.php
	            data : {
					search_article : $("input[name='search_article']:checked").val(),
					text : $("#text").val()
					
	              
	              
	               
	            },
	            dataType : 'html' //設定該網頁回應的會是 html 格式
	          }).done(function(data) {
	            //成功的時候
	            console.log(data);
	            if(data == "yes")
	            {
	              
	              
	            }
	            else
	            {
	           
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
  
	
	
	
	
		*/
		

				
		
  });
  </script>

  </head>

  <body>
	
		<?php include_once 'menu.php'; ?>
			<div style = "min-height:500px;">
			  <div class="container">
				<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
				<div class="row">
				  <!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
				  <div class="col-xs-12" >
					
						
					
					
						<form id = "search"  method="get" action="" class="form-inline" style = "margin-bottom:10px;">
						<a href = "add_article.php" class = "btn btn-default" style = "margin-right:10px;">新增文章</a>
						<label class="radio-inline">
						  <input type="radio" name="search_article" value="2" checked> 依帳號
						</label>
						<label class="radio-inline">
						  <input type="radio" name="search_article" value="1" > 依文章 
						</label>
						
		
					  		
						<label for="title" class="radio-inline"></label>
						<input type="input" class="form-control" id="text" name = "text" placeholder = "請輸入...">	
					
					
						<button type="submit" class="btn btn-default">搜尋文章</button>
				
					  
						</form>
			
					
					
					

					<?php if(!empty($list2)):?>
							<?php foreach($list2 as $row2):?>
							<?php 
								//處理 摘要
								//去除所有html標籤
								$abstract = strip_tags($row2['content']);
								//取得100個字
								$abstract = mb_substr($abstract, 0, 100, "UTF-8") 
							?>
							<!-- 使用 bootstrap 的 panel 來呈現 http://getbootstrap.com/components/#panels-->
							<div class="panel panel-primary">
						        <div class="panel-heading">
						            <h3 class="panel-title">
						            	<a href="article.php?p=<?php echo $row2['id']; ?>"><?php echo $row2['title']; ?></a>
						            </h3>
						        </div>
						        <div class="panel-body">
						        	<p>
										<?php $data2 = get_user($row2['create_id']);?>
										<span class="label label-info"><?php echo $data2['user']; ?></span>&nbsp;
						        		<span class="label label-danger"><?php echo $row2['create_date']; ?></span>
						        	</p>
						            <?php echo $abstract; ?>
						        </div>
						    </div>
						    <?php endforeach; ?>
						<?php elseif(empty($list2)): ?>
							<?php foreach($list as $row):?>
							<?php 
								//處理 摘要
								//去除所有html標籤
								$abstract = strip_tags($row['content']);
								//取得100個字
								$abstract = mb_substr($abstract, 0, 100, "UTF-8") 
							?>
							<!-- 使用 bootstrap 的 panel 來呈現 http://getbootstrap.com/components/#panels-->
							<div class="panel panel-primary">
						        <div class="panel-heading">
						            <h3 class="panel-title">
						            	<a href="article.php?p=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
						            </h3>
						        </div>
						        <div class="panel-body">
						        	<p>
										<?php $data = get_user($row['create_id']);?>
										<span class="label label-info"><?php echo $data['user']; ?></span>&nbsp;
						        		<span class="label label-danger"><?php echo $row['create_date']; ?></span>
						        	</p>
						            <?php echo $abstract; ?>
						        </div>
						    </div>
						    <?php endforeach; ?>
						<?php else:?>
						<h3 class="text-center">尚無文章</h3>
					    <?php endif; ?>
				  </div>
				</div>
			  </div>
			</div>

    <!-- 頁底 -->
    <?php include_once 'footer.php'; ?>
		

  </body>

</html>
