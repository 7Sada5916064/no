<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
	<img class="log_img" src="<?php echo base_url("public/logo/logo.png");?>" alt="but" height="100px" width="100px">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			
		</ul>
	</div>
</nav>
<div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form action="<?php echo site_url('Main_controller/check_login');?>" method="post">
	<div class="col-md-12">
		<div class="row  col-md-12" >
			<div class="form-group row col-md-12">
				<div class="col-md-12">
					<center><h1>Login</h1></center>
				</div>
			</div>
		</div>
		<div class="row  col-md-12" >
			<div class="form-group row col-md-12">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<center><input type="username" class="form-control input-sm" placeholder="Username" name="username"></center>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<div class="row  col-md-12" >
			<div class="form-group row col-md-12">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<center><input type="password" class="form-control" placeholder="Password" name="password"></center>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<div class="row  col-md-12" >
			<div class="form-group row col-md-12">
				<div class="col-md-12">
					<center><button class="btn btn-success" type="submit">Login</center>
				</div>
			</div>
		</div>
		<div class="row  col-md-12" >
			<div class="form-group row col-md-12">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<center><a href="<?php echo site_url('Main_controller/register_show');?>">Register</a></center>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</form>
	
	
	
	
	
	
	
	
	
	
	
