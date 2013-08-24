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

if (file_exists("install.php")) header("location:install.php"); 

require('libs/Smarty.class.php');
$smarty = new Smarty;

 
require('libs/default.class.php'); 
$startUp = new StartUp; 
  
$config = $startUp->getConfigs();
$smarty->assign("getCats",$startUp->getCats());


$smarty->addPluginsDir('/var/www/libs/plugins/');
$smarty->template_dir = '/var/www/themes/';
$smarty->compile_dir  = '/var/www/cache/compile_tpl/';
$smarty->cache_dir    = '/var/www/cache/';

 
$smarty->debugging = false;
$smarty->caching = $config['cache']['value'];
$smarty->cache_lifetime = $config['timecache']['value'];

$smarty->assign("Name",$config['title']['value'],true);
$smarty->assign("settings",$config);


$page = (isset($_GET["page"])?$_GET["page"]:"");

switch ($page){

        case 'news': 
                # code...
                include 'pages/news.php';
                $smarty->display('news.tpl');
        break;    

        case 'detail': 
                # code...
                include 'pages/detail.php';
                $smarty->display('detail.tpl');
        break;  

        case 'login': 
                # code...
                include 'pages/login.php';
                $smarty->display('login.tpl');
        break; 
        
        case 'logout': 
                # code...
                include 'pages/logout.php';
        break;  

        case 'admincp': 
                # code...
                include 'pages/admincp/admincp.index.php';
        break; 
                             
        default:
        case '':  
        case 'index': 
                # code...
                include 'pages/main.php';
                $smarty->display('index.tpl');
        break;
}
 
 
