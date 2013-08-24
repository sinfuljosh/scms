<?php session_start(); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SmallCms - Install</title>
<link href="themes/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="container_wrapper">
	<div class="spacer"></div>
<div id="container">
<div id="top"> 
 
</div>
  <div id="header">
      <div id="header">
        <div id="site_title">Free Blog script</div>
          <div id="site_slogan">By Small-Cms</div>
      </div>
  </div>
      <div id="left_column">
       		<div class="text_area" align="justify">
 
<?php 

if (empty($_GET["step"])) {
    echo "Welcome to the installation of smallcms.<br />
To install this scirpt, you must have:<br /><br />
- server Web<br />
- server Mysql<br />
- Server Mail<br /><br />
<a href=\"install.php?step=1\">Start installation</a>
";
} 

	// Installation
/*	function is_already_installed(){
	      if(file_exists("inc/db.php"))
		  return true;
	      else
		  return false;

	} */
 
	function is__writable($path) {
	  $i = 0;
	  $error = "";
	  while($i < count($path)){
		if (is_writable($path[$i])) 
		  echo '- '.$path[$i].' -> <img src="themes/images/Actions-dialog-ok-apply-icon.png"> <font color="green">The file is writable</font><br />';
		else {
		  echo '- '.$path[$i].' -> <img src="themes/images/Actions-edit-delete-icon.png"> <font color="red">The file is not writable</font><br />';
		  $error .= "1";
		}
		$i++;
	  }
	  if(empty($error))
	      return true;
	  else
	      return false;
	}		
	function redirect($location){
		header("location:".$location);
	}	
 
/* if(is_already_installed()){
    echo "Your install is ok ! <br />";        
    echo "Think to remove install";
    echo "<br /><br /><a href=\"/\" target=\"_blank\">Go to your website</a>";
    echo '</div></div>';   
    echo '<br />';
    echo "<b><u>Step 1</u></b> <img src=\"lib/icons/Actions-dialog-ok-apply-icon.png\"><br />"; 
    echo "<b><u>Step 2</u></b> <img src=\"lib/icons/Actions-dialog-ok-apply-icon.png\"><br />"; 
    echo "<b><u>Step 3</u></b> <img src=\"lib/icons/Actions-dialog-ok-apply-icon.png\"><br />"; 
     
}else{ */

if ($_GET["step"] == "1") {
    echo "Check chmod:<br /><br />";
    $error = "1";
    $path = 'upload';
    echo "<b><u>Folders:</u></b><br />\n";
    $path_check = array('cache', 'cache/compile_tpl', 'libs/db.php');
    if (is__writable($path_check)){
      echo "<br /><a href=\"install.php?step=2\">Step 2</a>\n";
      $_SESSION['step_one'] = 'ok';
    }
    else 
      echo "<br /><a href=\"install.php?step=1\">Permissions test</a>\n";
     
} 

if ($_GET["step"] == "2") {
 
if (empty($_GET["action"])) { ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?step=2&action=test" id="mail" method="post">

	<table cellpadding="2">
		<tr>
			<td>Hostname</td>
			<td><input type="text" name="hostname" id="hostname" value="" size="30" tabindex="1" /></td>
			<td>(usually "localhost")</td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" id="username" value="" size="30" tabindex="2" /></td>
			<td></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" name="password" id="password" value="" size="30" tabindex="3" /></td>
			<td></td>
		</tr>
		<tr>
			<td>Database</td>
			<td><input type="text" name="database" id="database" value="" size="30" tabindex="4" /></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" id="submit" value="Test Connection" tabindex="5" /></td>
			<td></td>
		</tr>
	</table>

</form>
<?php }
if (!empty($_GET["action"]) and $_GET["action"] == "test") {
	$hostname = trim($_POST['hostname']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$database = trim($_POST['database']);

	$link = mysql_connect("$hostname", "$username", "$password");
		if (!$link) {
			echo "<img src=\"themes/images/Actions-edit-delete-icon.png\"> Could not connect to the server '" . $hostname . "'\n";
        	echo mysql_error();
		}else{
			echo "<img src=\"themes/images/Actions-dialog-ok-apply-icon.png\"> Successfully connected to the server '" . $hostname . "'<br />\n";
		}
		if ($link && !$database) {
		echo "<br /><br /><img src=\"themes/images/Actions-edit-delete-icon.png\"> No database name was given. <br />Available databases:</p>\n";
		$db_list = mysql_list_dbs($link);
		echo "<pre>\n";
		while ($row = mysql_fetch_array($db_list)) {
     		echo $row['Database'] . "\n";
		}
		echo "</pre>\n";
	}
		if ($database) {
    $dbcheck = mysql_select_db("$database");
		if (!$dbcheck) {
        	echo "<img src=\"lib/icons/Actions-edit-delete-icon.png\"> ".mysql_error();
		}else{
			echo "<img src=\"themes/images/Actions-dialog-ok-apply-icon.png\"> Successfully connected to the database '" . $database . "' \n<br /><br />";
			echo "<form action=\"install.php?step=2&action=w\" id=\"mail\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"hostname\" value=\"".$hostname."\">\n";
			echo "<input type=\"hidden\" name=\"username\" value=\"".$username."\">\n";
			echo "<input type=\"hidden\" name=\"password\" value=\"".$password."\">\n";
			echo "<input type=\"hidden\" name=\"database\" value=\"".$database."\">\n";
			echo "<input type=\"submit\" id=\"submit\" value=\"Install database !\" tabindex=\"5\" />\n";
			echo "</form>\n";
			}
		}
	
}

    if (!empty($_GET["action"]) and $_GET["action"] == "w") {
      if (is_writable("libs/db.php"))
      
         {
         $fd = fopen("libs/db.php", "a");
         $foutput = "<?php\n";
         $foutput.= "// Generate the ".date("j F, Y, h-i-s")."\n";
         $foutput.= "// For Small-cms\n";
         $foutput.= "\$host = \"".$_POST["hostname"]."\";\n";
         $foutput.= "\$user = \"".$_POST["username"]."\";\n";
         $foutput.= "\$pass = \"".$_POST["password"]."\";\n";
         $foutput.= "\$db = \"".$_POST["database"]."\";\n";
         $foutput.= "// Please ! manipulate this file if you know what you made​​!\n";
         $foutput.= "";
         fwrite($fd,$foutput);
         fclose($fd); 
         }
    require_once 'libs/default.class.php'; 
	$startup = new StartUp;

	    $sql = "CREATE TABLE IF NOT EXISTS `articles` (
		  `id` int(20) NOT NULL AUTO_INCREMENT,
		  `date` datetime NOT NULL,
		  `title` varchar(200) NOT NULL,
		  `url_title` varchar(200) NOT NULL,
		  `longdesc` varchar(2000) NOT NULL,
		  `categorie` varchar(50) NOT NULL,
		  `author` varchar(50) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
	
	mysql_query($sql) or die("Database Error: ".mysql_error());
	$data = "<img style='width: 112px; height: 92px;' alt='blog' src='http://lagenerationy.com/wp-content/uploads/2009/12/blog.jpg' align='left'>Small-Cms <span id='result_box' class='' lang='en'><span class='hps'>is a</span> <span class='hps'>Content Management</span> <span class='hps'>System</span> <span class='hps'>written in</span> <span class='hps'>PHP and</span> <span class='hps'>MySQL</span> <span class='hps'>running</span><span>.</span> </span><span id='result_box' class='' lang='en'><span class='hps'><br>Display</span> <span class='hps'>items</span> <span class='hps'>by date</span> <span class='hps'>and/or</span> <span class='hps'>categories</span><span>,&nbsp;</span><span class='hps'>search engine</span><span class='hps'></span><span class=''>.</span> <span class='hps'>Its appeal</span> <span class='hps'>is</span> <span class='hps'>as</span> <span class='hps'>much</span> <span class='hps'>part of</span> <span class='hps'>his</span> <span class='hps'>administration</span> <span class='hps'>that allows</span> <span class='hps'>direct</span> <span class='hps'>management</span></span>";
	$sql = "INSERT INTO `articles` (`id`, `date`, `title`, `url_title`, `longdesc`, `categorie`, `author`) VALUES
		('NULL', '2012-01-28 14:41:47', 'Welcome', 'Welcome', '".mysql_real_escape_string($data)."', '1', '1');";
	mysql_query($sql) or die("Database Error: ".mysql_error());
	
	$sql = "CREATE TABLE IF NOT EXISTS `categories` (
		  `id` int(20) NOT NULL AUTO_INCREMENT,
		  `name` varchar(50) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;";
	
	mysql_query($sql) or die("Database Error: ".mysql_error());
	
	$sql = "INSERT INTO `categories` (`id`, `name`) VALUES
		(1, 'News'),
		(2, 'Computer'),
		(3, 'Programming'),
		(4, 'Linux'),
		(5, 'Hardware');";
	mysql_query($sql) or die("Database Error: ".mysql_error());

	$sql = "CREATE TABLE IF NOT EXISTS `settings` (
		  `key` varchar(30) NOT NULL,
		  `value` varchar(3000) NOT NULL,
		  PRIMARY KEY (`key`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
	
	mysql_query($sql) or die("Database Error: ".mysql_error());

    $sql = "INSERT INTO `settings` (`key`, `value`) VALUES
		('baseurl', 'http://".$_SERVER['HTTP_HOST']."/'),
		('mail', 'contact@yourdomain.com'),
		('title', 'Small-cms'),
		('artpp', '5'),
		('artindex', '5'),
		('cookie', 'sessionUsers'),
		('pmail', 'contact@yourdomain.com'),
		('metad', 'your meta description'),
		('metak', 'your meta keywords'),
		('aboutus', 'Here, you can insert a description about your site. You can edit this text in the admin panel'),
		('cache', '0'),
		('timecache', '0');";

	mysql_query($sql) or die("Database Error: ".mysql_error());

    $sql = "CREATE TABLE IF NOT EXISTS `users` (
		  `id` int(15) NOT NULL AUTO_INCREMENT,
		  `user_name` varchar(50) NOT NULL,
		  `user_pass` varchar(50) NOT NULL,
		  `user_mail` varchar(50) NOT NULL,
		  `user_active` varchar(5) NOT NULL,
		  `user_hash` varchar(15) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";

	mysql_query($sql) or die("Database Error: ".mysql_error());
	
	$sql = "INSERT INTO `users` (`id`, `user_name`, `user_pass`, `user_mail`, `user_active`, `user_hash`) VALUES
		(1, 'admin', 'cb87afa24841fa54c5588a9c72bf22e67739b0a6', 'contact@yourdomain.com', '1', '11111111');
		";	
	mysql_query($sql) or die("Database Error: ".mysql_error());

        // Install OK :) 
	$_SESSION['step_two'] = 'ok';
	redirect("install.php?step=3");
       }
 
}
    if ($_GET["step"] == "3") {
	if(empty($_SESSION['step_two']))
	    header('Location: install.php?step=2');
	else{
	    echo "Your install is ok ! <br />";        
	    echo "Thinks to remove install.php of your ftp and chmod 644 inc/db.php ";
	    echo "<br /><br /><a href=\"/\" target=\"_blank\">Go to your website</a>";
        }
    }

?>
 


        </div>
      </div>
    	<div id="right_column">
 
          <div class="section_box" align="center">
			<?php 
			    if (empty($_GET["step"])) {
				    echo "<br />";        
				echo "Step 1<br />"; 
				echo "Step 2<br />"; 
				echo "Step 3<br />"; 
				} 
			    if ($_GET["step"] == "1") {
				    echo "<br />";        
				echo "<b><u>Step 1</u></b><br />"; 
				echo "Step 2<br />"; 
				echo "Step 3<br />"; 
				}
			    if ($_GET["step"] == "2") {
				    echo "<br />";        
				echo "<b><u>Step 1</u></b> <img src=\"themes/images/Actions-dialog-ok-apply-icon.png\"><br />"; 
				echo "<b><u>Step 2</u></b><br />"; 
				echo "Step 3<br />"; 
				}
			    if ($_GET["step"] == "3") {
				    echo "<br />";        
				echo "<b><u>Step 1</u></b> <img src=\"themes/images/Actions-dialog-ok-apply-icon.png\"><br />"; 
				echo "<b><u>Step 2</u></b> <img src=\"themes/images/lib/icons/Actions-dialog-ok-apply-icon.png\"><br />"; 
				echo "<b><u>Step 3</u></b> <img src=\"themes/images/lib/icons/Actions-dialog-ok-apply-icon.png\"><br />"; 
				}
			/* } */

			?>
          </div>
 </div> 



	<div id="footer">
    Copyright © 2012 . Small-Cms 
    </div>
        
</div>
<div class="spacer"></div>
</div>
</body>
</html>
