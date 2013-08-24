    	<div id="right_column">
           
            <ul class="menu">
              <li><a rel="#">Categories</a></li>
              {foreach from=$getCats key=k item=v}
              <li><a href="index.php?page=news&cat={$v.id}">{$v.name}</a></li>
              {/foreach}
          </ul>
          
          <div class="section_box" align="justify">
          <div class="subtitle">About this website</div>
            {$settings.aboutus.value}<br />
          </div>
          <div class="section_box" align="center">
            <div class="subtitle">Make donation</div>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_donations">
            <input type="hidden" name="business" value="{$settings.pmail.value}">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="item_name" value="Donate">
            <input type="hidden" name="no_note" value="0">
            <input type="hidden" name="currency_code" value="EUR">
            <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>
 
