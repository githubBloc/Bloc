<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Register Free Business</title>
<script type="text/javascript" src="../js/RegisterFree.js"></script>
<script type="text/javascript" src="js/Timeout.js"></script>
<style type="text/css">
p {color:#565656;font-family:"Gotham Rounded Book";font-size:11px;text-transform:uppercase;margin:5px 0px;}
#Star {color:red;}
label {color:#565656; font-family:"Gotham Rounded Book"; font-size:10px; text-transform:uppercase; margin-left:7px;}

#DuplicateDiv{position:absolute; margin-left:455px;}
#ClaimForm{position:absolute;margin-left:455px;margin-top:180px;}
#DuplicateResults, #ClaimForm{width:473px; padding:15px;border:1px solid #565656;background-color:#F6F7F9;}
#DuplicateResults h2 {margin:0px; padding:0px; font-family:"Gotham Rounded Medium"; font-size:15px;color:#565656; }
#DuplicateResults h3 {margin:0px; padding:0px; font-family:"Gotham Rounded Medium"; font-size:15px;color:#00bbb5;text-transform:uppercase;}
#DuplicateResults h4, #ClaimForm h3 {margin:10px 0px 10px 0px; padding:0px; font-family:"Gotham Rounded Book";font-size:14px;color:#565656; line-height:1.5;}
#DuplicateResults a{font-family:"Gotham Rounded Book Italic";font-size:13px;color:#e74c3c;}
#DuplicateResults a:hover {color:#00bbb5;}

#ClaimForm{display:none;}
</style>
</head>

<body>
<div id="DuplicateDiv">
    
            
    </div>
    
    <div id="ClaimForm">
            	<form action="#" name="ClaimF" id="FormClaim">
                <h3>Please provide your information below: </h3>
                <p><b>Personal Information</b></p><br>
                <p>First Name: <span id="Star">* </span><span id="FN"></span></p><input id="FirstN" type="text" size="30" name="FirstName">
                <p>Last Name: <span id="Star">* </span><span id="LN"></span></p><input id="LastN" type="text" size="30" name="LastName">
                <p>Contact Phone Number: <span id="Star">* </span><span id="CPN"></span></p><input id="ContactPN" type="text" size="30" name="ContactPhoneNumber">
                <p>Email: <span id="Star">* </span><span id="PE"></span></p><input id="PersonalE" type="text" size="30" name="Email">
                <br><br>
                <p><b>Business Information</b></p><br>
                <p>Business Name: <span id="Star">* </span><span id="BN"></span></p><input id="BusinessN" type="text" size="30" name="BizName">
                <p>UBI#: <span id="Star">* </span><span id="UBI"></span></p><input id="UBINumber" type="text" size="30" name="UBI">
                <p>Address: <span id="Star">* </span><span id="BA"></span></p><input id="BusinessA" type="text" size="30" name="Address">
                <p>City: <span id="Star">* </span><span id="BC"></span></p><input id="BusinessC" type="text" size="30" name="City">
                <p>State: <span id="Star">* </span><span id="BS"></span></p><input id="BusinessS" type="text" size="30" name="State">
                <p>Zip Code: <span id="Star">* </span><span id="ZC"></span></p><input id="ZipC" type="text" size="30" name="ZipCode">
                <p>Email: <span id="Star">* </span><span id="BE"></span></p><input id="BusinessE" type="text" size="30" name="Email">
                <p>Registered owner's name: <span id="Star">* </span><span id="RON"></span></p><input id="RegisteredON" type="text" size="30" name="RegisteredName">
                <br><br>
                <input type="submit" id="ClaimSubmit">
                </form>
				            
     </div>
<form name="form">
					 <p>Business Name: <span id="Star">* </span><span id="Name_Required"></span></p><input id="Business_Name" name="Business_Name" type="text" size="30">
                     <p>Phone Number: <span id="Star">* </span><span id="Phone_Required"></span></p><input  id="Phone_Number" name="Phone_Number" type="text" size="30">
                     <p>Address: </p><input  id="Address" name="Address" type="text" size="30">
                     <p>City: <span id="Star">* </span><span id="City_Required"></span></p><input  id="City" name="City" type="text" size="30"><!--maybe we should try drop down menu here-->
                     <p>State: <span id="Star">*</span><span id="State_Required"></span></p>
<select id="State" name="State">
<option value="">Select a State</option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option>
<option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option>
<option value="DC">District Of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option>
<option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option>
<option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option>
<option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option>
<option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option>
<option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option>
<option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option><option value="WY">Wyoming</option>
</select>
						<br>
                     <p>Zip code: <span id="Star">*</span><span id="Zip_Required"></span></p><input  id="Zip_Code" name="Zip_Code" type="text" size="30"><br>
                     <p>Business Email: <span id="Star">*</span><span id="BizEmail_Required"></span></p><input  id="Business_Email" name="Business_Email" type="text" size="30">
                     <br><br>
                        <p>Categories: <span id="Star">*</span><span id="Categories_Required"></span></p>
                     <select id="Categories" name="Categories">
                      	<option value="">Please Select</option>
                      	<option value="Automotive">Automotive</option>
                      	<option value="Beauty_Spas">Beauty & Spas</option>
                        <option value="Education">Education</option>
                        <option value="Financial_Services">Financial Services</option>
                        <option value="Food">Food</option>
                        <option value="Health_Medicine">Health & Medicine</option>
                        <option value="Home_Services">Home Services</option>
                        <option value="Local_Services">Local Services</option>
                        <option value="Mass_Media">Mass Media</option>
                        <option value="Professional_Services">Professional Services</option>
                        <option value="Real_Estate">Real Estate</option>
                        <option value="Religious_Organizations">Religious Organizations</option>
                      </select>
                      
                      <select id="Sub_Categories" name="Sub_Categories">
                      <option>Please choice from left</option>	
                      
                      </select>
                    <br><br>
                      <input name="Submit" type="Submit" id="BizSubmit" value="Upload Pictures">
                      
                      
</form>
<div id="Space" style="display:none; height:520px;"></div>                     
</body>
</html>