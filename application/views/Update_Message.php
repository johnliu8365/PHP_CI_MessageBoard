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
      'name'          =>  $this->session->userdata('name'),
      'membership'    =>  $this->session->userdata('membership'), 
      'id'            =>  $this->session->userdata('id')
      );
  ?>

    <?php
   foreach($record as $row){
      $id = $row->form_id;
      $name_1 = $row->name;
      $message_1 = $row->message;
      }
  ?>

  <body>

    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/ci/Message/index">留言板系統</a>
        </div>

      <?php
        if($user['name'] != FALSE)
        {
          ?>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
              <li><p class="navbar-text"><?php echo $user['name'], " 歡迎回來<br>";?></p></li>
              <li><a href="/ci/User/logout">登出帳號</a></li>
              <li><a href="create_view">發佈新留言</a></li>
              <li><a href="/ci/User/manage_view_user">管理帳號</a></li>
              </ul>
            </div>
          <?php
        }
        else
        {
          ?><ul class="nav navbar-nav navbar-right">
            <li><a href="/ci/User/index">登入帳號</a></li>
            </ul>
          <?php
        }
        ?>
      </div>
    </nav>

    <div class="panel panel-info">
      <div class="panel-heading">
        <h4><center><strong>編輯留言</strong></center></h4>
      </div>
    
    <?php echo form_open('Message/update');?>

    <div class="input-group">
        <span class="input-group-addon">姓名</span>
        <h5><?php echo "　", $name_1; ?> </h5>
    </div>

    <div class="input-group">
        <span class="input-group-addon" >訊息</span>
        <input type="text" class="form-control" name="message"
         placeholder="訊息" value="<?php echo $message_1?>"
         required oninvalid="setCustomValidity('請輸入訊息')" oninput="setCustomValidity('')">
    </div>

    <input type="hidden" name="form_id" value="<?php echo $id ;?>"> 

    <button type="submit" class="btn btn-success">確定編輯</button>
    <button type="button" class="btn btn-danger" onclick="location.href='index'">離開</button>

  <?php echo form_close(); ?>
    </div>

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>