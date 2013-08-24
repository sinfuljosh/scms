<?php

/////////////////////////////////////////////////////////////////////////////////////
//
//    This file is part of Small-cms.
//
// Small-cms is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Small-cms is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License
// along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
//
////////////////////////////////////////////////////////////////////////////////////
 
class StartUp {

	var $query_current_count = false;
	var $prefix_db = '';
 		
	###
	function __construct() {
		header('Content-type:text/html; charset=utf-8');
		$this->initSQL();
		$this->secureGlobals(); // Credit: @author Bendikt Martin Myklebust <bendikt@armed.nu>
		ob_start();
 
	}
	###
	function initSQL(){
	include "db.php";
 		mysql_connect($host,$user,$pass);
 		mysql_select_db($db) or die("Database Error: ".mysql_error());
 	}
	###
	function secureSuperGlobalGET(&$value, $key) {
		$_GET[$key] = htmlspecialchars(stripslashes($_GET[$key]));
		$_GET[$key] = str_ireplace("script", "blocked", $_GET[$key]);
		$_GET[$key] = mysql_escape_string($_GET[$key]);
		return $_GET[$key];
	}
	###	
	function secureSuperGlobalPOST(&$value, $key) { 
	$page = (isset($_GET["page"])?$_GET["page"]:"");
		if($page != 'admincp') {
		$_POST[$key] = htmlspecialchars(stripslashes($_POST[$key]));
		$_POST[$key] = str_ireplace("script", "blocked", $_POST[$key]);
		$_POST[$key] = mysql_escape_string($_POST[$key]);
		return $_POST[$key];
		} else {
		return $_POST[$key];
		}
	}
	###		
	function secureGlobals() {
		array_walk($_GET, array($this, 'secureSuperGlobalGET'));
		array_walk($_POST, array($this, 'secureSuperGlobalPOST'));
	}
	###
	function sqlesc($x) {
	  return '\''.mysql_real_escape_string($x).'\'';
	}
	###
	function getConfigs(){
		$sql = "SELECT `key`,`value` FROM ".$this->prefix_db."settings";
    		$items = mysql_query($sql) or die("Database Error: ".mysql_error());
		while ($obj = mysql_fetch_object($items)) { 
			$array[$obj->key]['value'] = $obj->value;
	        }
    	return $array;
 	}
	###
 	function redirect($location) {
  		header("Location:".$location);
   	} 
	###
	function getNews($cat=false){		
		$sql = "SELECT SQL_CALC_FOUND_ROWS
		a.id,a.date,a.title,a.url_title,a.longdesc,a.categorie,a.author, users.user_name as user_name, categories.name as cat_name 
		FROM ".$this->prefix_db."articles AS a ";
		$sql .= "JOIN ".$this->prefix_db."categories as categories on categories.id = a.categorie ";
		$sql .= "JOIN ".$this->prefix_db."users as users on users.id = a.author ";	
		if ($cat) { 
			$sql .= "WHERE categorie='$cat' "; 
		} else {
			$sql .= "ORDER BY a.date DESC LIMIT %d,%d ";
		}
 		$sql_p = sprintf($sql, SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit());
		
		$items = mysql_query($sql_p) or die("Database Error: ".mysql_error());
		//Populate the array
		while ($obj = mysql_fetch_object($items)) {
        		$array[$obj->id]['id'] = $obj->id;
            		$array[$obj->id]['date'] = $obj->date;
			$array[$obj->id]['title'] = $obj->title;  
			$array[$obj->id]['url_title'] = $obj->url_title; 
           		$array[$obj->id]['longdesc'] = $obj->longdesc;
           		$array[$obj->id]['categorie'] = $obj->categorie; 
           		$array[$obj->id]['user_name'] = $obj->user_name; 
           		$array[$obj->id]['cat_name'] = $obj->cat_name; 
	        }
                $_query = "SELECT FOUND_ROWS() as total";
                $_result = mysql_query($_query);
                $_row = mysql_fetch_array($_result, MYSQL_ASSOC);        
                SmartyPaginate::setTotal($_row['total']);
 		mysql_free_result($items);

 
		return $array;
	}
	function lastNews(){	
		$conf = $this->getConfigs();	
		
		$sql = "SELECT a.id,a.date,a.title,a.url_title,a.longdesc,a.categorie,a.author, users.user_name as user_name, categories.name as cat_name 
		FROM ".$this->prefix_db."articles AS a ";
		$sql .= "JOIN ".$this->prefix_db."categories as categories on categories.id = a.categorie ";
		$sql .= "JOIN ".$this->prefix_db."users as users on users.id = a.author ";	
		$sql .= "ORDER BY a.date DESC LIMIT 0,".$conf['artindex']['value']." ";
 
		$items = mysql_query($sql) or die("Database Error: ".mysql_error());
		//Populate the array
		while ($obj = mysql_fetch_object($items)) {
        		$array[$obj->id]['id'] = $obj->id;
            		$array[$obj->id]['date'] = $obj->date;
			$array[$obj->id]['title'] = $obj->title;  
			$array[$obj->id]['url_title'] = $obj->url_title; 
           		$array[$obj->id]['longdesc'] = $obj->longdesc;
           		$array[$obj->id]['categorie'] = $obj->categorie; 
           		$array[$obj->id]['user_name'] = $obj->user_name; 
           		$array[$obj->id]['cat_name'] = $obj->cat_name; 
	        }
 
		return $array;
	}
	###
	function getNewsone($id) {
		$sql = "SELECT a.id,a.date,a.title,a.url_title,a.longdesc,a.categorie,a.author, users.user_name as user_name, categories.name as cat_name 
		 FROM ".$this->prefix_db."articles AS a ";
		$sql .= "JOIN ".$this->prefix_db."categories as categories on categories.id = a.categorie ";
		$sql .= "JOIN ".$this->prefix_db."users as users on users.id = a.author ";	
		$sql .= "WHERE a.id = '$id' ";
		
    		$items = mysql_query($sql) or die("Database Error: ".mysql_error());
		//Populate the array
		while ($obj = mysql_fetch_object($items)) {
        		$array['id'] = $obj->id;
            		$array['date'] = $obj->date;
			$array['title'] = $obj->title;  
			$array['url_title'] = $obj->url_title; 
           		$array['longdesc'] = $obj->longdesc;
           		$array['categorie'] = $obj->categorie; 
           		$array['user_name'] = $obj->user_name; 
           		$array['cat_name'] = $obj->cat_name; 
	        }
	
		$this->query_current_count = count($array);
		return $array;
    	return true;
	}
	###
	function getCats() {
		$sql = "SELECT id, name FROM ".$this->prefix_db."categories ";

		
    		$items = mysql_query($sql) or die("Database Error: ".mysql_error());
		//Populate the array
		while ($obj = mysql_fetch_object($items)) {
        		$array[$obj->id]['id'] = $obj->id;
            		$array[$obj->id]['name'] = $obj->name;
	        }
		return $array;
    	return true;
	}
}
class Login extends startUp {
	
	var $session_name = '';	
	var $hash = '0900124461779baebd4e030b813535ac';	
	var $session_username = "";
	var $session_password = "";
	var $uid = "";

	function Login(){
		$conf = $this->getConfigs();
		$this->session_name = $conf['cookie']['value'];
		// print_r($this->session_name);
	return true;
	} 

	//isLogged()
	function isLogged(){
		if($this->checkUser()){
			return $this->uid;
		} else {
			$this->redirect();
			$this->reset();
		}
	}
	//checkUser()
	function checkUser(){
		if($this->checkCookie()){
			$username = $this->session_username;
			$password = $this->session_password;
			$query = "SELECT id FROM ".$this->prefix_db."users WHERE user_name = '$username' AND user_pass = '$password' AND user_active = '1' LIMIT 1;";
			$result = mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result);
			$this->uid = $row['id'];
			return true;			
		} else {
			return false;
		}
	}
	//checkCredentials($username, $password)
	function checkCredentials($username, $password){	 
		$obscure = $this->obscure($password);				
		$query = "SELECT * FROM ".$this->prefix_db."users WHERE user_name = '$username' AND user_pass = '$obscure' AND user_active = '1' LIMIT 1;";
    		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);		
		if ($row) {
			return true;
		} else {
			return false;
		}
	}
	//
	function getUserdata($uid=FALSE){
		if($uid==FALSE){
			$id = $this->uid;
		} else {
			$id = $uid;
		}
		$query = "SELECT id, user_name, user_mail, user_active FROM ".$this->prefix_db."users WHERE user_active = '1' AND id = '$id' LIMIT 1";
    		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		return $row;
	}
	//
	function checkCookie(){
		if (isset($_COOKIE["$this->session_name"]) || isset($_SESSION["$this->session_name"])) {
			if( isset($_SESSION["$this->session_name"]) ){
				$cookie = explode(",",$_SESSION["$this->session_name"]);	
			} else {
				$cookie = explode(",",$_COOKIE["$this->session_name"]);
			}
			$this->session_username = $cookie['0'];
			$this->session_password = $cookie['1'];
			$this->uid = $cookie['2'];
			return true;
		} else {
			return false;
		}
	}
	// setSession
	function setSession($username,$password,$cookie){
	
			$query = "SELECT id FROM ".$this->prefix_db."users WHERE user_name = '$username' AND user_pass = '$password' AND user_active = '1' LIMIT 1;";
			$result = mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result);
			
					
		$values = array($username,$this->obscure($password),$row['id']);
		$session = implode(",",$values);
		if($cookie=='on'){
			//cookies
			setcookie("$this->session_name", $session, time()+60*60*24*100,'/');
		} else {
			$_SESSION["$this->session_name"] = $session;
		}
	}
	// utils
	function logout($redirect=true){
		setcookie("$this->session_name", "", time()-60*60*24*100, "/");
		unset($_SESSION["$this->session_name"]);
		session_unset();
		if($redirect===true){
			$this->redirect();
		}
	}
	function redirect($location='index.php'){
		header("location:".$location);
	}
	
	function reset(){
		$this->username = "";
		$this->password = "";
	}
	// Obscure
	function obscure($password, $algorythm = "sha1"){
		$password = strtolower($password);
		$salt = hash($algorythm, $this->hash);
		$hash_length = strlen($salt);
		$password_length = strlen($password);
		$password_max_length = $hash_length / 2;
		if ($password_length >= $password_max_length){
			$salt = substr($salt, 0, $password_max_length);
		} else {
			$salt = substr($salt, 0, $password_length);
		}
		$salt_length = strlen($salt);
		$salted_password = hash($algorythm, $salt . $password);
		$used_chars = ($hash_length - $salt_length) * -1;
		$final_result = $salt . substr($salted_password, $used_chars);
	
		return $final_result;
	}
}
#doc
#	classname:	admin
#	scope:		PUBLIC
#
#/doc

class Admin extends Login
{
	#	internal variables
	
	#	Constructor
	function deleteCat($id){
		# code...
		mysql_query("DELETE FROM ".$this->table_pre."categories WHERE id = '$id'") or die( mysql_error());
		
	return $id;
	}
	###
	function numNews(){
		# code...
		$select = 'SELECT count(*) FROM articles';
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$row = mysql_fetch_row($result);
	return $row[0];
	}
	###
	function numCat(){
		# code...
		$select = 'SELECT count(*) FROM categories';
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$row = mysql_fetch_row($result);
	return $row[0];
	}
	###
	function addCat($cname){
		# code...
		$a = array("'", "\"", " ", "(", ")");
		$strip = str_replace($a,"-",$cname);
		$query = "INSERT INTO ".$this->table_pre."categories (id,name) 
	          VALUES (
			  'NULL',
			  '".mysql_real_escape_string($cname)."'
			  )";
    		$result = mysql_query($query) or die(mysql_error());
 
    	return true;		
	}
	###
	function addArticle($title,$url_title,$longdesc,$categorie,$author) {
		$date = date('Y-m-d G:i:s');
		$query = "INSERT INTO ".$this->prefix_db."articles (date,title,url_title,longdesc,categorie,author) 
	          VALUES (
			  '$date',
			  '".mysql_real_escape_string($title)."',
			  '".mysql_real_escape_string($url_title)."',
			  '".mysql_real_escape_string($longdesc)."',
			  '$categorie',
			  '$author'
			  )";
    		$result = mysql_query($query) or die(mysql_error());
     	return true;
	}	
 	###
	function updateNews($id,$title,$url_title,$longdesc,$categorie,$author) {
		$date = date('Y-m-d G:i:s');
		mysql_query("UPDATE ".$this->table_pre."articles SET title = '".$title."', url_title = '".$url_title."', longdesc = '".$longdesc."', categorie = '".$categorie."', author = '".$author."' WHERE id = '".$id."'") or die( mysql_error());
     	return true;
	}
	###
}
###
 
