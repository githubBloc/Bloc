
<div id="header">
    <div id="Logo_pic">
        <a href="../index.php" title="Back Home"><img src="../Images/Logo.gif" alt="Logo"></a>
    </div>
	
    <!--Sign Register-->
  <div id="Sign_Register">
        	<ul class="Register_links">
            	<li id="SignIn1" class="Register_links"><?php if(!isset($_SESSION['Email'])){ echo "<a href='#'>Sign In</a>";}else{}?>
                <div id="Sign_In">
                		<form>
                			<p>Username:</p><span id="Login_span" style="color:#e74c3c; display:none;">Invalid Email Address</span>
                            <input name="Login" id="Login" type="text" size="27" value="">
                        	<p style="margin-top:10px">Password:</p><span style="color:#e74c3c; display:none;" id="Password_span">Forgot your password</span>
                            <input name="Password" value="" id="Password" type="password" size="27">
                    		<input type="submit" id="Submit_Login" name="submit" value="Submit" style="font-size:10px; margin-top:5px;">
                            </form>
                            <div id="Forgot_Password_Div">
                            <p>Please provide your email below:</p>
                            <span style="color:#e74c3c;">Invalid Email Address</span>
                            <input style="margin-bottom:5px" type="text" id="Email" name="Email" size="27">
                            <input type="submit" id="Submit" value="Submit" style="font-size:10px">
                            </div>
                            <h6><a id="Forgot_Password" style="border:none;"href="#">If you forgot Password</a></h6>
                		
                </div>
                </li>
            	<li class="Register_links"> <?php if(!isset($_SESSION['Email'])){echo "<a style='border:none; background-color:#FFF;' href='../Register.php'>Register</a>";}else{}?></li>
            </ul>
        </div>
        
        	<!--Languages-->
        	<div id="Languages">

        		<div id="ENG">
            		<a href="../ENG.html" title="Click to change language">ENG</a></li>
            	</div>

                    <div id="RUS">   
                        <a href="../Index.html">RUS</a></li>
            	    </div>

        	</div>
            
            	<!--Navigation Menu-->
                <div id="Navi_Menu">
                	<ul> 
                		<li><a href="../index.php" title="Home">HOME</a></li>
                        <li><a href="#" title="Repair">CATEGORIES</a></li>
                        <li><a href="../OfferPage.php">ADVERTISE</a></li>
                        <li><a href="#">BLOG</a></li>
                        <li><a href="../AboutUS.php">ABOUT</a></li>
                        <li><a href="../AboutUS.php" title="About">CONTACT US</a></li>
                        <li><a href="#" title="About">AFISHA</a></li>
                	</ul>
                </div>
        
</div>