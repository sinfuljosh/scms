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

$id=(isset($_GET["id"])?$_GET["id"]:"");
 
$admin = new Admin; 
 
if (!empty($id)) {
if(!empty($_POST['title'])){ 
$smarty->assign("updateNews",$admin->updateNews($id,$_POST['title'],$_POST['titleseo'],$_POST['article'],$_POST['cat'],$uid));
        }  
$smarty->assign("getNewsone",$admin->getNewsone($id));
 
} else {

require('libs/SmartyPaginate.class.php');   
SmartyPaginate::connect();
SmartyPaginate::setLimit($config['artpp']['value']);
SmartyPaginate::setUrl('index.php?page=admincp&act=edit');
$smarty->assign("getNews",$startUp->getNews());
SmartyPaginate::assign($smarty);
 

}

 
