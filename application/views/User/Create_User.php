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

  <body>

    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/ci/Message/index">留言板系統</a>
        </div>
    </nav>

    <div class="container">
        <div class="col-md-offset-4 col-md-4">
            <h4><center><strong>建立新帳號</strong></center></h4>
    
    <?php echo form_open('User/create_user');?>

    <div class="input-group">
        <span class="input-group-addon" >帳號</span>
        <input type="text" class="form-control" name="username" placeholder="請輸入帳號"
        required oninvalid="setCustomValidity('請輸入帳號')" oninput="setCustomValidity('')" >
    </div>

    <div class="input-group">
        <span class="input-group-addon" >密碼</span>
        <input type="password" class="form-control" name="password" placeholder="請輸入密碼"
        required oninvalid="setCustomValidity('請輸入密碼')" oninput="setCustomValidity('')">
    </div>

    <div class="input-group">
        <span class="input-group-addon" >名字</span>
        <input type="text" class="form-control" name="name" placeholder="請輸入名字"
        required oninvalid="setCustomValidity('請輸入名字')" oninput="setCustomValidity('')">
    </div>

    <div class="input-group">
        <span class="input-group-addon" >權限</span>
        <select name="membership" class="form-control">
　       <option value="user">一般會員</option>
　       <option value="admin">系統管理者</option>
        </select> 
    </div>

    <center>
    <button type="submit" class="btn btn-success">建立新帳號</button>
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