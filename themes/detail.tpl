{include file="header.tpl" title=Detail}
 

      <div id="left_column">
 		  <div class="text_area" align="justify">
      <div class="title">Detail of {$getNewsone.title}</div>

		<div class="section_box2" align="justify">
        <div class="post_title">{$getNewsone.title}</div>
        <div class="text_area">
   	      {$getNewsone.longdesc}
   	      <div class="publish_date">Post Date: {$getNewsone.date} . Categorie: <a href="http://localhost/index.php?page=news&cat={$getNewsone.categorie}">{$getNewsone.cat_name}</a> . Author: <b>{$getNewsone.user_name}</b></div>
          </div>
      	</div>

      </div>
      </div>
    
{include file="menu.tpl"}

    </div>


{include file="footer.tpl"}
