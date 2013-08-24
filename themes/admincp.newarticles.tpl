{include file="header.tpl" title=Index}
<script type="text/javascript" src="libs/editor/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
      <div id="left_column">
 		<div class="text_area" align="justify">
			<div class="title">Add new article</div>

                    <form method="POST" action="index.php?page=admincp&act=new">
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
                            <td class="last"><input type="text" name="title" id="title" value=""></td>
                        </tr>
                        <tr>
                            <td class="first">Title seo</td> 
                            <td class="last"><input type="text" name="titleseo" id="titleseo" value=""></td>
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
                            	<textarea name="article" id="article" style="width: 300px; height: 100px;"></textarea>
			    </td>
                        </tr>                        

                    </tbody>
                    </table> 
                    <br /><br />
                    <input type="submit" value="Submit">
                    </form>
        </div>
      </div>
    
{include file="admincp.menu.tpl"}



{include file="footer.tpl"}
