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

    <div class="panel panel-info">
      <div class="panel-heading">
        <h4><center><strong>管理員帳號密碼管理</strong></center></h4>
      </div>
    
      <table class="table table-striped">
        <thead>
          <tr>
            <th>編號</th>
            <th>帳號</th>                   
            <th>密碼</th>
            <th>名字</th>
            <th>管理權限</th>
            <th>功能</th>  
          </tr>
        </thead>

        <tbody>　                   
          <?php if(isset($record)) : foreach($record as $row) : ?>
          <tr>
            <td><?php echo $row->id ?></td>
            <td><?php echo $row->username ?></td>
            <td>**********</td>
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->membership; ?></td>
            
            <td>
                <form style="margin:0px; display:inline" action="<?php echo base_url('User/manage_view_admin');?>" method="post" >
                <input type="hidden" name="username" value="<?php echo $row->username ?>">
                <button type="submit" class="btn btn-success" aria-label="Left Align">
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </button>
                </form>
                
                <form style="margin:0px; display:inline" action="<?php echo base_url('User/delete');?>" method="post">
                <input type="hidden" name="id" value="<?php echo $row->id ?>">
                <button type="submit" class="btn btn-danger" aria-label="Left Align">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                </form>
              </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>

    <?php else : ?>
    <h2>目前查無紀錄。</h2>

    <?php endif ; ?>
    </div>

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>