{include file="header.tpl" title=Index}

      <div id="left_column">
 		<div class="text_area" align="justify">
      <div class="title">Login</div>
                    <form method="POST" action="index.php?page=login">
                    <table class="listing" cellpadding="0" cellspacing="0" id="tabella">
                    <thead>
                        <tr>
                            <th class="first" width="177"> </th>
                            <th class="last"  width="177"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td class="first">Username</td> 
                            <td class="last"><input type="text" name="username" id="username"></td>
                        </tr>
                        <tr>
                            <td class="first">Password</td> 
                            <td class="last"><input type="password" name="password" id="password"></td>
                        </tr>
                        <tr>
                            <td class="first">Remember Me?</td> 
                            <td class="last"><input type="checkbox" name="cookie" id="cookie" checked="true"/></td>
                        </tr>
                    </tbody>
                    </table>
                    <input type="hidden" name="_check" value="1"/>
                    <input type="submit" value="Login">
                    </form>
      </div>
      </div>
    
    	<div id="right_column">
           
            <ul class="menu">
              <li><a href="#">Homepage</a></li>
              <li><a href="http://www.templatemo.com" target="_parent">CSS Website Templates</a></li>
              <li><a href="#">Web Design Services</a></li>
              <li><a href="#">Specialized Portfolio</a></li>
              <li><a href="#">Our Partners</a></li>
              <li><a href="http://www.templatemo.com" target="_parent">Jobs &amp; Internships</a></li>
          </ul>
          
          <div class="section_box" align="justify">
            <div class="subtitle">Quick Contact</div>
              Tel: 002-040-0240<br />
              Fax: 001-050-0480<br />
              Email: info[at]templatemo.com<br />
              <br />
          </div>
          <div class="section_box" align="justify">
          <div class="subtitle">About this website</div>
            Curabitur velit tellus, placerat et, dapibus varius,  aliquet quis, purus. Lorem ipsum dolor sit amet, consectetuer  adipiscing elit.<br />
            <a href="http://validator.w3.org/check?uri=referer"><img  src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a> 
          </div>
          
          <div class="section_box">
            <div class="subtitle">Special Thanks</div>
              <a href="#">Website Link One</a><br />
              <a href="#">Blog Link Two</a><br />
              <a href="#">Template Link Three</a><br />
              <a href="#">Text Link Four</a><br />
              <a href="http://www.templatemo.com" target="_parent">Free Templates</a><br />
          </div>
    </div>


{include file="footer.tpl"}
