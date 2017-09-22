 <include file="Common/header" />

<body class="login-body">

    <div class="container">

      <form class="form-signin" action="" method="post" class="submit">
        <h2 class="form-signin-heading">油气经纪人</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="用户名" autofocus name='username' id='username'>
            <input type="password" class="form-control" placeholder="密码" name='password' id='password'>
            
            <button class="btn btn-lg btn-login btn-block" type="submit" id='submit'>登录</button>
            <p id='text' style="color:red; display:none; font-size:12px;">or you can sign in via social network</p>
          

        </div>

      </form>

    </div>
   

<?php

          //    $args = array(
          //                   "referer"=>urlencode(get_url()),
          //               );
          //               echo (get_url());
          //               $login_url = add_url_args(C('LOGIN_URL'), $args);
          //               $register_url = add_url_args(C('REGISTER_URL'), $args);
          //               echo sprintf('<li><a href="%s">%s</a></li>', $login_url, '登录');
          //               echo sprintf('<li><a  href="%s">%s</a></li>', $register_url,'注册');
          // p($_COOKIE);






?>
  </body>
</html>
<script>
$(function(){
  
    $('form').submit(function(){
       var ass=$(this).serialize();
        $.ajax({
				type:"post",
				url:"{:U('/Admin/Login/login')}",
				data:ass,
				dataType:'json',
				success:function(data){
			    if(data==1){
                   $('#text').show();
                   $('#text').html('登录成功');
                   location.href="<?php echo U('Admin/Index/index');?>";
                }else if(data==2){
                  $('#text').show();
                  $('#text').html('用户名或者密码不正确，请重新输入');
              
                }else{
                  $('#text').show();
                  $('#text').html('用户名或者密码不能为空，请重新输入');
                }
				}
			});
       return false;     
    
    })
    
})
</script>
