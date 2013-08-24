{include file="header.tpl" title=Index}
 
{literal}  <script type="text/javascript">
$(document).ready(function() {
$('#load').hide();
});

$(function() {
$(".delete").click(function() {
$('#load').fadeIn();
var commentContainer = $(this).parent();
var id = $(this).attr("id");
var string = 'id='+ id ;

	
$.ajax({
   type: "POST",
   url: "index.php?page=admincp&act=cat",
   data: string,
   cache: false,
   success: function(){
	commentContainer.slideUp('slow', function() {$(this).remove();});
	$('#load').fadeOut();
  } 
   
 })
return false;
	});
});
</script>
<style type="text/css">
 
.delete {
	margin-top:0px;
	float:left;
	margin-left:30px;
}
a.delete {
	padding:3px;
	text-align:center;
	font-size:18px;
	font-weight:700;
	text-decoration:none;
	color:#C00;
}
a.delete:hover {
	background-color:#900;
	color:#FFF;
}
#load {
	position:absolute;
	left:225px;
	background-image:url(jquery-delete/images/loading-bg.png);
	background-position:center;
	background-repeat:no-repeat;
	width:159px;
	color:#999;
	font-size:18px;
	font-family:Arial, Helvetica, sans-serif;
	height:40px;
	font-weight:300;
	padding-top:14px;
	top: 23px;
}
 
</style>
{/literal}
      <div id="left_column">
 		<div class="text_area" align="justify">
                        <div class="title">Categories</div>
 
  <span style="float: left"> 
 
 
                    <form method="POST" action="index.php?page=admincp&act=cat">
                    <table class="listing" cellpadding="0" cellspacing="0" id="tabella">
                    <thead>
                        <tr>
                            <th class="first" width="130"></th>
                            <th class="last"  width="130"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td class="first">Title categorie</td> 
                            <td class="last"><input type="text" name="cname" id="cname" value=""></td>
                        </tr>
                    </tbody>
                    </table> 
                    <br /><br />
                    <input type="submit" value="Submit">
                    </form>  
                    </span>                      
		    <span style="float: right">
			    {foreach key=key item=item from=$getCats}
					<p id="{$item.id}">{$item.name}<a href="#" id="{$item.id}" class="delete">x</a></p> 
			    {/foreach}  
		    </span>
                        </div>
                   </div>

{include file="admincp.menu.tpl"} 

{include file="footer.tpl"}
