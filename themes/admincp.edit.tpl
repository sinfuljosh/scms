{include file="header.tpl" title=News}
<script type="text/javascript" src="libs/editor/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
      <div id="left_column">
 		<div class="text_area" align="justify">
      <div class="title">Edit article</div>

	{if !empty($smarty.get.id)}
                    <form method="POST" action="index.php?page=admincp&act=edit&id={$getNewsone.id}">
                    <table class="listing" cellpadding="0" cellspacing="0" id="tabella">
                    <thead>
                        <tr>
                            <th class="first" width="130"></th>
                            <th class="last"  width="130"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td class="first">Title</td> 
                            <td class="last"><input type="text" name="title" id="title" value="{$getNewsone.title}"></td>
                        </tr>
                        <tr>
                            <td class="first">Title seo</td> 
                            <td class="last"><input type="text" name="titleseo" id="titleseo" value="{$getNewsone.title}"></td>
                        </tr>
                        <tr>
                            <td class="first">Categorie</td> 
                            <td class="last">			
                            <select name="cat" id="cat">
				{foreach key=key item=item from=$getCats}
	 				<option value="{$item.id}" name="{$item.name}">{$item.name}</option>
				{/foreach} 
			    </select>
			    </td>
                        </tr>
                        <tr>
                            <td class="first">Article</td> 
                            <td class="last">
                            	<textarea name="article" id="article" style="width: 300px; height: 100px;">{$getNewsone.longdesc}</textarea>
			    </td>
                        </tr>                        

                    </tbody>
                    </table> 
                    <br /><br />
                    <input type="submit" value="Submit">
                    </form>	
	{else}

	<div align="center">   
        {* display pagination header *}
        Items {$paginate.first}-{$paginate.last} out of {$paginate.total} displayed.
        <br />

        {* display pagination info *}
        {paginate_prev} {paginate_middle} {paginate_next}
	</div>  

{foreach from=$getNews key=k item=v}
	<div class="section_box2" align="justify">
        <div class="post_title"><a href="index.php?page=admincp&act=edit&id={$v.id}">{$v.title}</a></div>
        <div class="text_area">
   	      {$v.longdesc}
   	      <div class="publish_date">Post Date: {$v.date} . Categorie: <a href="">{$v.cat_name}</a> . Author: <a href="">{$v.user_name}</a> </div>
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



 {/if}   
       </div>
      </div>   
{include file="admincp.menu.tpl"}

 


{include file="footer.tpl"}
