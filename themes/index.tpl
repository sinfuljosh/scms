{include file="header.tpl" title=Index}



      <div id="left_column">
       		<div class="text_area" align="justify">
 

 

{foreach from=$getNews key=k item=v}
		<div class="section_box2" align="justify">
        <div class="post_title"><a href="index.php?page=detail&id={$v.id}">{$v.title}</a></div>
        <div class="text_area">
   	      {$v.longdesc}
   	      <div class="publish_date">Post Date: {$v.date} . Categorie: <a href="index.php?page=news&cat={$v.categorie}">{$v.cat_name}</a> . Author: {$v.user_name}</div>
          </div>
      	</div>
{/foreach}
 
 
        </div>
      </div>
    
{include file="menu.tpl"}

    </div>


{include file="footer.tpl"}
