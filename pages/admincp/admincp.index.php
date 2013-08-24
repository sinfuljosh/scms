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

$login = new Login; 
$uid = $login->isLogged();
 
$admin = new Admin;
 
$do = (isset($_GET["act"])?$_GET["act"]:"");
	
switch ($do){

    case 'settings':
    include("admincp.settings.php");
    $smarty->display('admincp.settings.tpl');
    break;

    case 'cat':
    include("admincp.cat.php");
    $smarty->display('admincp.cat.tpl');
    break;

    case 'new':
    include("admincp.newarticles.php");
    $smarty->display('admincp.newarticles.tpl');
    break;

    case 'edit':
    include("admincp.edit.php");
    $smarty->display('admincp.edit.tpl');
    break;

    default:
    include("admincp.controlpanel.php");
    $smarty->display('admincp.index.tpl');
    break;
}

 
