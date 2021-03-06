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

$cat=(isset($_GET["cat"])?$_GET["cat"]:"");

if (!empty($cat))
$setUrl = 'index.php?page=news&cat='.$cat;
else 
$setUrl = 'index.php?page=news';

// Pagination
require('libs/SmartyPaginate.class.php');   
SmartyPaginate::connect();
SmartyPaginate::setLimit($config['artpp']['value']);
SmartyPaginate::setUrl($setUrl);
SmartyPaginate::assign($smarty);



if (!empty($cat)){
	$smarty->assign("getNews",$startUp->getNews($cat));
} else {
	$smarty->assign("getNews",$startUp->getNews());
}
