// JavaScript Document

$(document).ready(function(){ 
	
	function ScrollFunction(div){ $('html,body').animate({scrollTop: div.offset().top-30},2000);}
	
	$('#AddCityLink').click(function(e){e.preventDefault(); $("#Add_City").css("display","block"); });
		
	//required
	var Business_Name = $('#Business_Name');
	var Phone_Number = $('#Phone_Number');
	var Reg_Exp_Number = /^\d{10}$/;
	var City = $('#City');
	var State = $('#State');
	var Zip_Code = $('#Zip_Code');
	var Reg_Exp_Zip = /^\d{5}(-\d{4})?(?!-)$/;
	var Reg_Exp_Email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	var Business_Email = $('#Business_Email');
	
	var first = $("#Categories");
	var second = $("#Sub_Categories");
	var Tag1 = $("input[name='Tag1']");
	var Discription = $("textarea[name='About_Company']");
	

	function Check(Check_Array,id)
	{for (var i in Check_Array)	{if(i.val()==null || i.val()==""){ id.html("<label>These fields reguired</label>"); return false; }else{ return true;}}}
	
	//Checking if field empty
	function IsEmpty(Variable, id) 
	{if(Variable.val()==null || Variable.val()=="") { id.html("<label style='color:red'>This field reguired</label>"); $('html,body').animate({scrollTop: id.offset().top-20},2000);return false; } return true}
	
	//Checking field when focusout
	function Check_Blur(Variable,id){Variable.blur(function (){if(Variable.val()!==null || Varible.val()!=="") { id.html(" ");}})}
	//Check Array
	function Check_Array_Blur(f, s, id)
	{
		f.blur(function(){if(f.val()!==""&& s.val()!==""){id.html(" ");}});
		s.blur(function(){if(f.val()!==""&& s.val()!==""){id.html(" ");}});
		}
		
	var duplicateDiv = $('#DuplicateDiv');	
	
	Phone_Number.blur(function (){
		 var phone = Phone_Number.val();
		 var biz =  Business_Name.val();
	  
		 $.ajax({
			type:"POST",	 
			url:"../DB/CheckDuplicate.php", 
			data: {bizName:biz,phoneNumber:phone},
			success:function(callback){duplicateDiv.html(callback); duplicateDiv.animate({right:'340px'}); Claim();},
			error:function() {duplicateDiv.html("Error, please contact our support");}
		 });
	});
	
	//Claim form
	function Claim(){
	$('#DuplicateResults a').click(function (e){
			
			e.preventDefault();
			$('#ClaimForm').animate({height:'toggle'});
		
	});
	}
		
	//Claim Form Submit verifications
	
	$('#ClaimSubmit').click( function (e) {
		e.preventDefault();
		
		if(!IsEmpty($('#FirstN'),$('#FN'))) { return false;}
			if(!IsEmpty($('#LastN'),$('#LN'))) { return false;}
				if(!IsEmpty($('#ContactPN'),$('#CPN'))) { return false;}
if(!Reg_Exp_Number.test($('#ContactPN').val())){$('#CPN').html("<label style='color:red'>Incorrect Phone Number Format</label>"); $('html,body').animate({scrollTop: $('#CPN').offset().top-20},2000);return false;}
					if(!IsEmpty($('#PersonalE'),$('#PE'))) { return false;}
if(!Reg_Exp_Email.test($('#PersonalE').val())){$('#PE').html("<label style='color:red'>Incorrect Email Format</label>"); $('html,body').animate({scrollTop: $('#PE').offset().top-20},2000); return false;}					
						if(!IsEmpty($('#BusinessN'),$('#BN'))) { return false;}
							if(!IsEmpty($('#UBINumber'),$('#UBI'))) { return false;}
								if(!IsEmpty($('#BusinessA'),$('#BA'))) { return false;}
									if(!IsEmpty($('#BusinessC'),$('#BC'))) { return false;}
										if(!IsEmpty($('#BusinessS'),$('#BS'))) { return false;}
											if(!IsEmpty($('#ZipC'),$('#ZC'))) { return false;}
												if(!IsEmpty($('#BusinessE'),$('#BE'))) { return false;}
if(!Reg_Exp_Email.test($('#BusinessE').val())){$('#BE').html("<label style='color:red'>Incorrect Email Format</label>"); $('html,body').animate({scrollTop: $('#BE').offset().top-20},2000); return false;}												
													if(!IsEmpty($('#RegisteredON'),$('#RON'))) { return false;}
		
		
		
		
			$.ajax({
			type: "POST",
			url: "../Ajax/SendClaim.php",
			data: {'BizName': $('#Business_Name').val(), 'PhoneNumber': $('#Phone_Number').val(), 'FirstName': $('#FirstN').val(), 'LastName': $('#LastN').val(),
			 'ContactPN': $('#ContactPN').val(),  'PersonalEmail': $('#PersonalE').val(), 'BusinessNumber': $('#BusinessN').val(), 'UBINumber': $('#UBINumber').val(),
			 'BusinessAddress': $('#BusinessA').val(), 'BusinessCity': $('#BusinessC').val(), 'BusinessState': $('#BusinessS').val(), 'ZipCode': $('#ZipC').val(),
			 'BusinessEmail': $('#BusinessE').val(),  'RegisteredON': $('#RegisteredON').val(), },
			success: function (callback)
			{			window.location.href="../BackOffice.php"; 
				alert(callback);},
			error: function ()
			{alert("Error: PLease contact technical support.");}		
			});
		
	});// end Claim Submit Form
	
// arrays instead of comma separated list and added base key
var data = {
        "" : ["Please choose from above"],
        "Automotive": ["Auto Customization", "Auto Detailing", "Auto Glass Services", "Auto Loan Provider", "Auto Parts & Supplies", "Auto Repair", "Body Shops", "Car Dealers",	
 	 	 "Car Stereo Installation", "Car Wash",	"Motorcycle Repair", "Oil Change Station", "Tires", "Towing", "Vehicle Shipping"],
        
		"Beauty_Spas": ["Barbers", "Cosmetics & Beauty Supply", "Day Spas", "Eyelash Service", "Hair Extensions", "Hair Removal", "Hair Salons", "Makeup Artists",
		"Massage", "Medical Spas", "Nail Salons", "Permanent Makeup", "Skin Care", "Tanning"],
		
		"Education": ["Adult Education", "Art Classes", "Collega Counseling", "Collages & Universities", "Educational Services", "Elementary Schools", "Middle Schools & High Schools",
		"Preschools", "Private Tutors", "Religious Schools", "Special Education", "Specialty Schools", "Test Preparation","Tutoring Centers"],
		
		"Financial_Services": ["Banks & Credit Unions", "Financial Advising", "Insurance", "Investing", "Tax Services"],
		
		"Food":["Bakeries", "Coffee & Tea", "Convenience store", "Desserts", "Farmers Market", "Food Delivery Services", "Grocery", "Specialty Food", "Restaurants"],
		
		"Health_Medicine":["Chiropractors", "Dentists", "Diagnostic Services", "Doctor", "Hearing Aid Providers", "Home Health Care", "Massage Therapy", "Medicine Center",
		"Nutritionists", "Retirement Homes", "Speech Therapists", "Urgent Care", "Weight Loss Centers"],
		
		"Home_Services":["Architect", "Building Supplies", "Cabinetry", "Carpet Installation", "Carpeting", "Contractors", "Damage Restoration", "Door Sale / Instaation",
		"Drywall Installation & Repair", "Electricians", "Fences & Gates", "Fireplace Services", "Flooring", "Garage door Services", "Gardeners", "Glass & Mirrors",
		"Gutter Services", "Handyman", "Heating & Air Cooling HVAC", "Home Cleaning", "Home Inspectors", "Home Organization", "Home Theatre Installation", "Insulation",
		"Interior Design", "Landscaping", "Masonry / Concrete", "Movers", "Painters", "Plumbing", "Pressure Washer", "Real Estate", "Roofing", "Security Systems",
		"Shades & Blinds", "Solar installation", "Structural Engineers", "Windows Installation"],
		
		"Local_Services":["Appliances Repair", "Carpet Cleaning", "Child Care & Day Care", "Community Services", "Couriers & Delivery Services", "Dry Cleaning & Laundry",
		"Electronics Repair", "Funeral Services", "IT Services & Computer Repair", "Jewelry Repair", "Junk Removal & Hauling", "Knife Sharpening", "Metal Fabricators",
		"Nanny Services", "Notaries", "Pest Control", "Printing Services", "Recording & Rehearsal Studio", "Recycling Center", "Screen Printing", "Self Storage", 
		"Septic Services", "Sewing & Alterations", "Shipping Center", "Shoe Repair", "Snow Removal", "Watch Repair", "Water Delivery"],
		
		"Mass_Media":["Print Media", "Radio Stations", "Television Stations"],
		
		"Professional Services":["Accountants", "Advertising", "Architects", "Boat Repair", "Career Counseling", "Editorial Services", "Employment Agencies", "Graphic Design",
		"Lawyers", "Legal Services", "Life Coach", "Marketing", "Matchmakers", "Office Cleaning", "Payroll Services", "Personal Assistants", "Private Investigation",
		"Public Relations", "Security Services", "Software Development", "Talent Agencies", "Translation Services", "Video Production", "Web Design"],
		
		"Real_Estate":["Apartments", "Commercial Real Estate", "Home Staging", "Mortgage Brokers", "Property Management", "Real Estate Agents", "Real Estate Services"],
		
		"Religious_Organizations":["Churches"],
}
    
$("#Categories").change(function() {

        var first = $(this),
            second = $("#Sub_Categories"),
            key = first.val(),
            // instead of the original switch code
            vals = data[key] == undefined ? data.base : data[key],
            html = [];
         // create insert html before adding
         $.each(vals,function(i,val){
              html.push('<option>'+val+'</option>')
         });
         // no need to empty the element before adding the new content
         second.html(html.join());        
});

$("#Categories2").change(function() {

        var first = $(this),
            second = $("#Sub_Categories2"),
            key = first.val(),
            // instead of the original switch code
            vals = data[key] == undefined ? data.base : data[key],
            html = [];
         // create insert html before adding
         $.each(vals,function(i,val){
              html.push('<option>'+val+'</option>')
         });
         // no need to empty the element before adding the new content
         second.html(html.join());        
});
		
	//About Limit check
	var limitInt =2000;
	var LimitId = $('#Limit').css('color','#00bbb5').html(limitInt);
	$('textarea[name="About_Company"]').keyup(function (e){
		
		 var text = $(this).val();
		 var chars = text.length;
		 if(e.keyCode==8||e.keyCode==46){limitInt++;}else{limitInt--;}	
		 if(limitInt<100){LimitId.css('color','#e74c3c');}else{LimitId.css('color','#00bbb5');}
		 LimitId.html(limitInt);
		
		
		});	
		
	
	//Click event
	$('#BizSubmit').click(function(e){
	
		e.preventDefault();
				
		if(!IsEmpty(Business_Name,$('#Name_Required'))) { return false;}
			if(!IsEmpty(Phone_Number,$('#Phone_Required'))) { return false; }
if(!Reg_Exp_Number.test(Phone_Number.val())){$('#Phone_Required').html("<label style='color:red'>Incorrect Phone Number Format</label>"); $('html,body').animate({scrollTop: $('#Phone_Required').offset().top-20},2000);return false;}
	if(!IsEmpty(City, $('#City_Required'))){return false}
				if(!IsEmpty(State,$('#State_Required'))) {return false;}
					if(!IsEmpty(Zip_Code,$('#Zip_Required'))) { return false; }
if(!Reg_Exp_Zip.test(Zip_Code.val())){$('#Zip_Required').html("<label style='color:red'>Incorrect Zip Code Format</label>"); $('html,body').animate({scrollTop: $('#Zip_Required').offset().top-20},2000);return false;}
					
						if(!IsEmpty(Business_Email,$('#BizEmail_Required'))) { return false; }
if(!Reg_Exp_Email.test(Business_Email.val())){$('#BizEmail_Required').html("<label style='color:red'>Incorrect Email Format</label>"); $('html,body').animate({scrollTop: $('#BizEmail_Required').offset().top-20},2000); return false;}
							
if(!IsEmpty(first,$('#Categories_Required'))){ return false; } if(!IsEmpty(second,$('#Categories_Required'))){ return false; } 
			if(!IsEmpty(Tag1, $('#Tag_Required'))){ return false; }
					if(!IsEmpty(Discription, $('#About_Required'))) { return false; }
					
					
			//Ajax
			
			var myData = $('form').serialize();
			$.ajax({
			type: "POST",
			url: "../Ajax/SaveBasicInfo.php",
			data: myData,
			success: function (callback)
			{$('#Content').html(callback);},
			error: function ()
			{$('#Content').html("Error, lost connection");}		
			});
					
	});
	
	Check_Blur(Business_Name,$('#Name_Required'));
	Check_Blur(Phone_Number,$('#Phone_Required'));
	Check_Blur(Zip_Code, $('#Zip_Required'));
	Check_Blur(City, $('#City_Required'));
	Check_Blur(State,$('#State_Required'));	
	Check_Blur(Business_Email,$('#BizEmail_Required'));
	Check_Array_Blur(first, second, $('#Categories_Required'));
	Check_Blur(Tag1, $('#Tag_Required'));
	Check_Blur(Discription, $('#About_Required'));
		Check_Blur($('#ContactPN'), $('#CPN'));
	Check_Blur($('#Personal'), $('#PE'));
	Check_Blur($('#BusinessE'), $('#BE'));
	
	

	
	
});//end ready function