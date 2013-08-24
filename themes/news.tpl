{include file="header.tpl" title=News}

      <div id="left_column">
 		<div class="text_area" align="justify">
      <div class="title">News</div>


	<div align="center">   
        {* display pagination header *}
        Items {$paginate.first}-{$paginate.last} out of {$paginate.total} displayed.
        <br />

        {* display pagination info *}
        {paginate_prev} {paginate_middle} {paginate_next}
	</div>  

{foreach from=$getNews key=k item=v}
		<div class="section_box2" align="justify">
        <div class="post_title"><a href="index.php?page=detail&id={$v.id}" alt="{$v.title}">{$v.title}</a></div>
        <div class="text_area">
   	      {$v.longdesc}
   	      <div class="publish_date">Post Date: {$v.date} . Categorie: <a href="">{$v.cat_name}</a> . Author: {$v.user_name}</div>
          </div>
      	</div>
{/foreach}


	<div align="center">   
        {* display pagination header *}
        Items {$paginate.first}-{$paginate.last} out of {$paginate.total} displayed.
        <br />
        {* display pagination info *}
        {paginate_prev} {paginate_middle} {paginate_next}
	</div>  


      </div>
      </div>
    
    
{include file="menu.tpl"}


    </div>


{include file="footer.tpl"}
