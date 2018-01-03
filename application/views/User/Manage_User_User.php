<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>簡易留言板系統</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <?php 
  $user = array(
    'username'    =>  $this->session->userdata('username'),  
    'password'    =>  $this->session->userdata('password'), 
    'name'        =>  $this->session->userdata('name'),  
    'membership'  =>  $this->session->userdata('membership')
   );
    ?>

  <body>

    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/ci/Message/index">留言板系統</a>
        </div>
    </nav>

    <div class="container">
        <div class="col-md-offset-4 col-md-4">
            <h4><center><strong>管理帳號</strong></center></h4>
    
    <?php echo form_open('User/manage');?>

    <div class="input-group">
        <span class="input-group-addon" >帳號</span>
        <h5><?php echo "　", $user['username'];?> </h5>
        <input type="hidden" name="username" value="<?php echo $user['username'] ;?>">
    </div>

    <div class="input-group">
        <span class="input-group-addon" >名字</span>
        <input type="text" class="form-control" name="name" placeholder="請輸入名字" value="<?php echo $user['name'];?>" 
        required oninvalid="setCustomValidity('請輸入名字')" oninput="setCustomValidity('')">
    </div>

    <div class="input-group">
        <span class="input-group-addon" >新的密碼</span>
        <input type="password" class="form-control" name="password" placeholder="請輸入新的密碼"
        required oninvalid="setCustomValidity('請輸入新的密碼')" oninput="setCustomValidity('')">
    </div>

    <div class="input-group">
        <span class="input-group-addon" >舊的密碼</span>
        <input type="password" class="form-control" name="old_password" placeholder="請輸入舊的密碼"
        required oninvalid="setCustomValidity('請輸入舊的密碼')" oninput="setCustomValidity('')">
    </div>

    <input type="hidden" name="membership" value="<?php echo $user['membership'] ;?>">

    <center>
    <button type="submit" class="btn btn-success">確定變更</button>
    <button type="button" class="btn btn-danger" onclick="location.href='/ci/Message/index'">離開</button>
    </center>

  <?php echo form_close(); ?>
    
    </div>
    </div>

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>