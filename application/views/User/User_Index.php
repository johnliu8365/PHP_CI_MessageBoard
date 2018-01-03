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
      </div>
    </nav>

    <div class="container">
        <div class="col-md-offset-4 col-md-4">
            <h2><center>用戶登入系統</center></h2>

            <form action="check_login" method="post" >

            <div class="form-group has-error">
                <label for="uname">帳號</label>
                <input type="text" class="form-control" name="uname" placeholder="請輸入帳號"
                required oninvalid="setCustomValidity('請輸入帳號')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group has-warning">
                <label for="upass">密碼</label>
                <input type="password" class="form-control" name="upass" placeholder="請輸入密碼"
                required oninvalid="setCustomValidity('請輸入密碼')" oninput="setCustomValidity('')">
            </div>

            <center><button type="submit" class="btn btn-success">登入</button></center>
            </form>

            <center><button type="button" class="btn btn-info" onclick="location.href='create_user_view'">建立新帳號</button></center>

        </div>
    </div>

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>