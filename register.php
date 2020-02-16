<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form Register</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container" >
	<div class="row">
		<div class="col-md-7 col-xs-12">
   
    <form  name="register" action="register_db.php" method="POST" id="register" class="form-horizontal">
       <div class="form-group">
       <div class="col-sm-2">  </div>
       <div class="col-sm-5" align="left">
       <br>
       <h4> สมัครสมาชิก </h4>
       </div>
       <input name="Admin_level" type="hidden" id="Admin_level" value="2" />
       </div>
       <div class="form-group">
       	<div class="col-sm-2" align="right"> Username : </div>
          <div class="col-sm-5" align="left">
            <input  name="m_user" type="text" required class="form-control" id="m_user" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
          </div>
      </div>
        
        <div class="form-group">
        <div class="col-sm-2" align="right"> Password : </div>
          <div class="col-sm-5" align="left">
            <input  name="m_pass" type="password" required class="form-control" id="m_pass" placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2" align="right"> ชื่อ-สกุล : </div>
          <div class="col-sm-7" align="left">
            <input  name="m_name" type="text" required class="form-control" id="m_name" placeholder="ชื่อ-สกุล" />
          </div>
        </div>
        
  
        <div class="form-group">
        <div class="col-sm-2" align="right"> อีเมล์ : </div>
          <div class="col-sm-6" align="left">
            <input  name="m_email" type="email" class="form-control" id="m_email"   placeholder="อีเมล์"/>
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2" align="right"> เบอร์โทร : </div>
          <div class="col-sm-6" align="left">
            <input  name="m_tel" type="text" class="form-control" id="m_tel"  placeholder="เบอร์โทร" />
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2" align="right"> ที่อยู่ : </div>
          <div class="col-sm-6" align="left">
            <textarea name="m_address" class="form-control"></textarea> 
          </div>
        </div>
      <div class="form-group">
      <div class="col-sm-2"> </div>
          <div class="col-sm-6">
          <button type="submit" class="btn btn-primary" id="btn">  สมัครสมาชิก  </button>
          </div>
           
      </div>
      </form>
</div>
</div>
</div>
</body>
</html>