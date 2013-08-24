{include file="header.tpl" title=Index}
<script type="text/javascript">
function checkMe(){
if(document.forms[0].cache.checked==1){
document.forms[0].timecache.disabled=false;
document.forms[0].timecache.value='{$settings.timecache.value}';
}
else if(document.forms[0].cache.checked==0){
document.forms[0].timecache.disabled=true;
}
} 
</script>
      <div id="left_column">
 		<div class="text_area" align="justify">
                        <div class="title">Admin settings</div>

                    <form method="POST" action="index.php?page=admincp&act=settings">
                    <table class="listing" cellpadding="0" cellspacing="0" id="tabella">
                    <thead>
                        <tr>
                            <th class="first" width="177"> </th>
                            <th class="last"  width="177"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td class="first">Base url</td> 
                            <td class="last"><input type="text" name="baseurl" id="baseurl" value="{$settings.baseurl.value}"></td>
                        </tr>
                        <tr> 
                            <td class="first">Email</td> 
                            <td class="last"><input type="text" name="mail" id="mail" value="{$settings.mail.value}"></td>
                        </tr>
                        <tr>
                            <td class="first">Article on index</td> 
                            <td class="last"><input type="text" name="artindex" id="artindex" value="{$settings.artindex.value}"></td>
                        </tr>  
 
                        <tr>
                            <td class="first">Article per page</td> 
                            <td class="last"><input type="text" name="artpp" id="artpp" value="{$settings.artpp.value}"></td>
                        </tr>  
                        <tr>
                            <td class="first">About us</td> 
                            <td class="last"><textarea name="aboutus" id="aboutus" style="width: 300px; height: 100px;">{$settings.aboutus.value}</textarea></td>
                        </tr>  
                                                
                        <tr> 
                            <td class="title"><br /> <br />Cache Settings</td>  
                        </tr>   
                        <tr>
                            <td class="first">Active Cache</td> 
                            <td class="last"><input type="checkbox" name="cache" onclick="checkMe()" /></td>
                        </tr>
                        <tr>
                            <td class="first">Cache time</td> 
                            <td class="last"><input type="text" name="timecache" disabled="disabled" /></td>
                        </tr>
                        <tr>
                            <td class="first">Actual settings</td> 
                            <td class="last">Cache: {$settings.cache.value} <br />Cache lifetime: {$settings.timecache.value}</td>
                        </tr>
                                                                                                                           
                        <tr> 
                            <td class="title"><br /> <br />Security</td>  
                        </tr>                         
                        <tr>
                            <td class="first">Name of cookie?</td> 
                            <td class="last"><input type="text" name="cookie" id="cookie" value="{$settings.cookie.value}"></td>
                        </tr> 
                        <tr> 
                            <td class="title"><br /> <br />Paypal</td>  
                        </tr>                         
                        <tr>
                            <td class="first">Paypal mail</td> 
                            <td class="last"><input type="text" name="pmail" id="pmail" value="{$settings.pmail.value}"></td>
                        </tr> 
                        <tr> 
                            <td class="title"><br /> <br />Seo</td>  
                        </tr>                         
                        <tr>
                            <td class="first">Title</td> 
                            <td class="last"><input type="text" name="title" id="title" value="{$settings.title.value}"></td>
                        </tr>
                        <tr>
                            <td class="first">Meta description</td> 
                            <td class="last"><input type="text" name="metad" id="metad" value="{$settings.metad.value}"></td>
                        </tr> 
                        <tr>
                            <td class="first">Meta keyword</td> 
                            <td class="last"><input type="text" name="metak" id="metak" value="{$settings.metak.value}"></td>
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
