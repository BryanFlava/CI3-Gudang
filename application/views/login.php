<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>LOGIN - SI GUDANG</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #98A8F8;
}
.form-control {
	min-height: 41px;
	background: #FAF7F0;
	box-shadow: none !important;
	border-color: #e3e3e3;

}
.form-control:focus {
	border-color: #70c5c0;
}
.form-control, .btn {        
	border-radius: 40px;
	box-shadow: #98A8F8;
}
.login-form {
	width: 350px;
	margin: 0 auto;
	padding: 100px 0 30px;		
	border-radius: 30px;
}
.login-form form {
	color: #7a7a7a;
	border-radius: 2px;
	margin-bottom: 15px;
	font-size: 13px;
	background: #ececec;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;	
	position: relative;	
	border-radius: 30px;
}
.login-form h2 {
	font-size: 22px;
	margin: 35px 0 25px;
	border-radius: 30px;
}
.login-form .avatar {
	position: absolute;
	margin: 0 auto;
	left: 0;
	right: 0;
	top: -50px;
	width: 95px;
	height: 95px;
	border-radius: 50%;
	z-index: 9;
	background: #BCCEF8;
	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.login-form .avatar img {
	width: 100%;
}	
.login-form input[type="checkbox"] {
	position: relative;
	top: 1px;
}
.login-form .btn, .login-form .btn:active {        
	font-size: 16px;
	font-weight: bold;
	background: #BCCEF8 !important;
	border: none;
	margin-bottom: 20px;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #50b8b3 !important;
}    
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #7a7a7a;
	text-decoration: none;
}
.login-form form a:hover {
	text-decoration: underline;
}
.login-form .bottom-action {
	font-size: 14px;
}
</style>
</head>
<body>
<div class="login-form">
    <form action="<?php echo base_url('welcome/login') ?>" method="post">
		<div class="avatar">
			<img src="<?php echo base_url('assets/') ?>image/avatar.PNG" alt="Avatar">
		</div>
        <h2 class="text-center">Login Administrator</h2>
        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="form-group">
        	<input type="checkbox" id="checkbox"> Show Password
        </div>      
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </div>
    </form>
</div>
</body>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 2000);
</script>
<script>
	$(document).ready(function() {
		$('#checkbox').click(function() {
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			} else {
				$('#password').attr('type','password');
			}
		});
	});
</script>
</html>