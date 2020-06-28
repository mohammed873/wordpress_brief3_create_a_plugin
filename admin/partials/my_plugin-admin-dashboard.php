<?php

class DB
{

  private $servername;
  private $username;
  private $password;
  private $dbname;


  public function connect()
  {

    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "plugin";


    $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

    return $conn;
  }
}
$data = new DB();
$con = $data->connect();

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://medmestery.xzy
 * @since      1.0.0
 *
 * @package    My_plugin
 * @subpackage My_plugin/admin/partials
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>display plugin detail</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<body>
  
</body>
</html>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap col-md-8" style="margin: auto; margin-top:122px;">
  <h2 class="text-center">Plugin details</h2><br>        
  <table class="table table-dark">
      <?php
        $sql="SELECT * FROM wp_plugin_data";  
        $stm=$con->prepare($sql);
        $stm->execute();
        $result=$stm->get_result();
      ?>
    <thead>
      <tr>
        <th>plugin name </th>
        <th>plugin description</th>
        <th>plugin option</th>
        <th>plugin author</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row=$result->fetch_assoc()){ ?>
      <tr>
        <td><?=$row['plugin_name'];?></td>
        <td><?=$row['plugin_description'];?></td>
        <td><?=$row['plugin_option'];?></td>
        <td>mohammed elhachimi</td>
      </tr>
    <?php } ?> 
    </tbody>
  </table>
</div>
