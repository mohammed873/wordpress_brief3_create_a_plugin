
<?php

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
  public function insert_plugin_data($plugin_name,$plugin_description,$plugin_option)
  {
	$sql="INSERT INTO `wp_plugin_data` (plugin_name, plugin_description,plugin_option) VALUES ('$plugin_name',' $plugin_description','$plugin_option')";
	$result = $this->connect()->query($sql);
    return $result;
  }
}

$data = new DB();
 if(isset($_POST['save'])){
	$plugin_name = $_POST['plugin_name'];
    $plugin_description = $_POST['plugin_description'];
	$plugin_option = $_POST['plugin_option'];

	$data->insert_plugin_data($plugin_name,$plugin_description,$plugin_option);

 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>display setting</title>
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
<div class="wrap col-md-6 bg-info" style="margin: auto; margin-top:280px;padding:1%">
		        <div id="icon-themes" class="icon32"></div>  
		        <h2 class="text-white text-center">Plugin Name Settings</h2><br>  
		         <!--NEED THE settings_errors below so that the errors/success messages are shown after submission - wasn't working once we started using add_menu_page and stopped using add_options_page so needed this-->
				<?php settings_errors(); ?>  
            <form action="#" method="POST">
                <div class="form-group">
                  <label>plugin name</label>
                  <input type="text" class="form-control" placeholder="Enter plugin name" name="plugin_name">
                </div>
                <div class="form-group">
                  <label>plugin description</label>
                  <textarea name="plugin_description" class="form-control" placeholder="plugin description"></textarea>
                </div>
                <div class="form-group form-check">
                  <label>plugin option</label>
                    <select name="plugin_option" class="form-control">
                      <option value="option1">option1</option>
                      <option value="option2">option2</option>
                      <option value="option3">option3</option>
                    </select>
                  
                </div>
                <button type="submit" class="btn btn-primary" name="save">save changes</button>
            </form>
</div>
</body>
</html>
