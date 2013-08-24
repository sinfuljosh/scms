<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$title} - {$settings.title.value}</title>
<meta name="description" content="{$settings.metak.value}" />
<meta name="keywords" content="{$settings.metad.value}" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link href="themes/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="container_wrapper">
<div class="spacer"></div>
<div id="container">
<div id="top"> 
<a href="/" target="_parent">Homepage</a> · <a href="index.php?page=news" target="_parent">News</a> · 
{if $smarty.cookies.sessionUsers}<a href="index.php?page=admincp">AdminCp</a>{else}<a href="index.php?page=login">Login</a>{/if}
</div>
  <div id="header">
      <div id="header">
        <div id="site_title">Free Blog script</div>
          <div id="site_slogan">By Small-Cms</div>
      </div>
  </div>
