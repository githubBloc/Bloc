<?php
session_start();
$Email = strtolower($_SESSION['Email']);

	$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
	mysql_select_db("Bloc",$db)or die("Could not select a database");

	$results = mysql_query("SELECT id FROM BizInfo WHERE Email='$Email' AND BizType='Basic'");
	$row = mysql_fetch_array($results);

$allowedExts = array("gif", "jpeg", "jpg", "png");
$BizId = $row["id"];
$uploadDir = "../uploads/".$row['id'];

//foreach loop for each picture

foreach($_FILES['photos']['name'] as $name => $value)
{
$counter = $_SESSION['counter2'];	
$uploadedFile = $_FILES['photos']['tmp_name'][$name];

$temp = explode(".", $_FILES["photos"]["name"][$name]);
$extension = end($temp);
$NewName = $counter.".".$extension;


	if ((($_FILES["photos"]["type"][$name] == "image/gif")
		|| ($_FILES["photos"]["type"][$name] == "image/jpeg")
		|| ($_FILES["photos"]["type"][$name] == "image/jpg")
		|| ($_FILES["photos"]["type"][$name] == "image/pjpeg")
		|| ($_FILES["photos"]["type"][$name] == "image/x-png")
		|| ($_FILES["photos"]["type"][$name] == "image/png"))
		&& ($_FILES["photos"]["size"][$name] < 20000)
		&& in_array($extension, $allowedExts)) 
		{
  
				if ($_FILES["photos"]["error"][$name] > 0) 
				{
					echo "Return Code: " . $_FILES["photos"]["error"][$name] . "<br>";
				} 	
  				else {				
						if(!file_exists($uploadDir))
						{		
		 					 mkdir("../uploads/".$row["id"], 0777);
						}
							
									// resize a Image
									if($extension=="jpg"||$extension=="jpeg") 
									{
										$uploadedFile = $_FILES['photos']['tmp_name'][$name];
										$src = imagecreatefromjpeg($uploadedFile);
									} 
									else if($extension=="png")
									{
										$uploadedFile = $_FILES['photos']['tmp_name'][$name];
										$src = imagecreatefrompng($uploadedFile);	
									}
									else if($extension=="gif")
									{	
										$uploadedFile = $_FILES['photos']['tmp_name'][$name];
										$src = imagecreatefromgif($uploadedFile);
									}	
													
									list($width,$height)=getimagesize($uploadedFile);
									$tmp=imagecreatetruecolor(88,76);
									imagecopyresampled($tmp,$src,0,0,0,0,88,76,$width,$height);
									
									$fileLocation = "../uploads/".$BizId."/".$NewName;
									
									imagejpeg($tmp,$fileLocation,100);							
															
									imagedestroy($src);
									imagedestroy($tmp);						

									//----------------------							

									$PicPath = "../uploads/".$BizId."/".$NewName;	
									$select = $counter."Pic";
									$results2 = mysql_query("SELECT LogoPic FROM BasicPictures WHERE BizId='$BizId'");
									$row2 = mysql_fetch_array($results2);
									
									if($counter==1 && $row2['LogoPic']=="" || $row2['LogoPic']==null)
									{
										mysql_query("INSERT INTO BasicPictures (BizId, $select) VALUES('$BizId','$PicPath')") or die(mysql_error()); 
									}
									 else {	mysql_query("UPDATE BasicPictures SET $select='$PicPath' WHERE BizId='$BizId'") or die(mysql_error()); }
													
									 echo "<li><img id='PictureGal2' src='".$PicPath."'></li>";
									 
									 $_SESSION['counter2']++;
  			  		 }			
		 } 

	
	else 
	{
  		echo "Invalid file";
	}

}

//end of foreach loop
mysql_close($db);
?>