<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
	<a class="navbar-brand text-white" href="#"><h1>Water Drinking</h1></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			
		</ul>
	</div>
</nav>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">

    <div class="wrapper" style="background-image: url('image/bg.jpg');">
    <br>
    <br>
    <br>
    <div class="inner">
    <form action="/action_page.php">
        <div class="container">
          <h1>สมัครสมาชิก</h1>
          <p>กรุณากรอกข้อมูลให้ครบทุกช่อง.</p>
          <hr>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="ชื่อจริง" >
            <input class="form-control" type="text" placeholder="นามสกุล" >
        </div> 
          
          <input class="form-control" type="text" placeholder="ชื่อผู้ใช้" name="Username">
      
          
          <div class="form-wrapper">
            <select class="form-control" name="" id="selectgender" class="form-control">
                <option value="" disabled selected>เพศ</option>
                <option value="male">ชาย</option>
                <option value="femal">หญิง</option>
                <option value="other">อิ่นๆ</option>
            </select>
            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
        </div>
        <br>
          
          <input class="form-control" type="password" placeholder="รหัสผ่าน" name="psw" >
            
          
          <input class="form-control" type="password" placeholder="ยืนยัน รหัสผ่าน" name="psw-repeat" >
          <hr>
          <center><button type="submit" class="btn btn-success">สมัครสมาชิก</button></center>
        </div>
        
       
      </form>
    </div>
    </div>
