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
        <h4><center><strong>留言板</strong></center></h4>
      </div>
    
      <table class="table table-striped">
        <thead>
          <tr>
            <th>編號</th>
            <th>姓名</th>                   
            <th>留言內容</th>
            <th>留言時間</th>
            <th>功能</th>    
          </tr>
        </thead>

        <tbody>　                   
          <?php if(isset($record)) : foreach($record as $row) : ?>
          <tr>
            <td><?php echo $row->form_id ?></td>
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->message ?></td>
            <td><?php echo $row->time; ?></td>

          <?php 
            if($row->user_id == $user['id'] || $user['membership'] == 'admin')
            {?>
              <td>
                <form style="margin:0px; display:inline" action="<?php echo base_url('Message/update_view');?>" method="post" >
                <input type="hidden" name="form_id" value="<?php echo $row->form_id ?>">
                <button type="submit" class="btn btn-success" aria-label="Left Align">
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </button>
                </form>
                
                <form style="margin:0px; display:inline" action="<?php echo base_url('Message/delete');?>" method="post">
                <input type="hidden" name="form_id" value="<?php echo $row->form_id ?>">
                <button type="submit" class="btn btn-danger" aria-label="Left Align">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                </form>
              </td>
                <?php
            }
            else
            {?>
              <td></td>
              <?php
            }
              ?>
          </tr>
          <?php endforeach; ?>
        </tbody>

      </table>
        <?php endif ; ?>
    </div>

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>