<div id="Search_Fields2" style=" margin:0; padding:14px 0px 12px 63px; border:1px solid #b7b8b8; background-color:rgb(231,235,236); height:44px;">
       <ul style="margin:0;padding:0;">
       	
        <!-- Should be Ajax call without form if this bar on Search List page, otherwise should be like a form -->
        <form action="SearchList.php" method="post" id="SearchForm">
    			<li id="Search_Area_li"> <input id="Search_Area_Input" alt="search field" type="text" name="SearchQuery" autocomplete="on" placeholder="SEARCH..."> </li>
            	<li id="Near_Area_li"> <input id="Near_Area_Input" type="text" name="SearchNear" autocomplete="on" placeholder="NEAR"> </li>
           		<li id="Search_Button_li"><input type="button" id="Search_Button_li"></li>
        </form>
        
            <li id="Register_links_2" style="display:none;"><?php if(!isset($_SESSION['Email'])) { echo "<a href='Register.php' title='Click to Sing in'>Sign In</a>"; }else{}?>
       
                
                                <div style="background-color:rgb(231,235,236); background-color:rgba(231,235,236,0.9);" id="Sign_In2">
                                
                                        <form>
                                            <p>Username:</p><span id="Login_span2" style="color:#e74c3c; display:none;">Invalid Email Address</span>
                                            <input name="Login" type="text" id="Login2" size="26" value="">
                                            <p style="margin-top:10px">Password:</p><span style="color:#e74c3c; display:none;" id="Password_span2">Forgot your password</span>
                                            <input name="Password" value="" id="Password2" type="password" size="26">
                                            <input type="submit" name="submit" id="Submit_Login2" value="Submit" style="font-size:10px; margin-top:5px;">
                                        </form>
                                           
                                            <div id="Forgot_Password_Div2">
                                            <p>Please provide your email below:</p>
                                            <span style="color:#e74c3c;">Invalid Email Address</span>
                                            <input style="margin-bottom:5px" type="text" id="Email2" name="Email" size="26">
                                            <input type="submit" id="Submit2" name="Submit" value="Submit" style="font-size:10px;">
                                            </div>
                                            <h6><a id="Forgot_Password2" style="border:none;"href="#">If you forgot Password</a></h6>
                                </div>
		                </li>
          	<li id="Register_links_3" style="display:none;"><?php if(!isset($_SESSION['Email'])) { echo "<a href='Register.php' title='Click to register'>Register</a>";}else{}?></li>
        </ul>
</div>