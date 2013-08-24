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


if (!empty($_POST["baseurl"])) {
 
$settings["baseurl"] = $_POST["baseurl"]; // Base url
$settings["mail"] = $_POST["mail"]; // Email
$settings["title"] = $_POST["title"]; // Title website
$settings["artpp"] = $_POST["artpp"]; // Article per pages
$settings["artindex"] = $_POST["artindex"]; // Article on index
$settings["cookie"] = $_POST["cookie"]; // Cookie
$settings["pmail"] = $_POST["pmail"]; // Paypal mail
$settings["metad"] = $_POST["metad"]; // Meta description
$settings["metak"] = $_POST["metak"]; // Meta keyword
$settings["aboutus"] = $_POST["aboutus"]; // Meta keyword
if(!empty($_POST['cache'])){
$settings["cache"] = '1'; // active cache
$settings["timecache"] = $_POST["timecache"]; // timing of cache
} else {
$settings["cache"] = '0'; // active cache
$settings["timecache"] = '0'; // timing of cache
}



        foreach($settings as $key=>$value) {
              if (is_bool($value))
               $value==true ? $value='true' : $value='false';

            $values[]="(".$startUp->sqlesc($key).",".$startUp->sqlesc($value).")";
        }
        mysql_query("DELETE FROM ".$startUp->prefix_db."settings") or die("Database Error: ".mysql_error());
        mysql_query("INSERT INTO ".$startUp->prefix_db."settings (`key`,`value`) VALUES ".implode(",",$values).";") or die("Database Error: ".mysql_error());

}

$config = $startUp->getConfigs();
$smarty->assign("settings",$config);

