<?php
session_start();
$Email = strtolower($_SESSION['Email']);

	$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
	mysql_select_db("Bloc",$db)or die("Could not select a database");

	$results = mysql_query("SELECT id FROM BizInfo WHERE Email='$Email' AND BizType='Premium'");
	$row = mysql_fetch_array($results);

$uploadedFile = $_FILES['file']['tmp_name'];
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$uploadDir = "../uploads/".$row['id'];
$NewName = "Logo.".$extension;
$BizId = $row["id"];

	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 20000)
	&& in_array($extension, $allowedExts)) 
	{
  
  	if ($_FILES["file"]["error"] > 0) 
	{
    	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  	} 	
  		else {				
						if(!file_exists($uploadDir))
						{		
		 					 mkdir("../uploads/".$row["id"], 0777);
						}
							
							if(glob("../uploads/".$row['id']."/Logo.*"))
							{
								array_map('unlink', glob("../uploads/".$row['id']."/Logo.*"));
							}
							
// resize a Image
if($extension=="jpg"||$extension=="jpeg") 
{
	$uploadedFile = $_FILES['file']['tmp_name'];
	$src = imagecreatefromjpeg($uploadedFile);
} 
else if($extension=="png")
{
	$uploadedFile = $_FILES['file']['tmp_name'];
	$src = imagecreatefrompng($uploadedFile);	
}
else if($extension=="gif")
{	
    $uploadedFile = $_FILES['file']['tmp_name'];
	$src = imagecreatefromjpeg($uploadedFile);
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
				
				$results2 = mysql_query("SELECT id, 1Pic, LogoPic FROM PremiumPictures WHERE BizId='$BizId'");
				$row2 = mysql_fetch_array($results2);
				$id=$row2['id'];
				
					if($row2['LogoPic']=="" || $row2['1Pic']=="" && $_SESSION['counter']==1)
					{
						mysql_query("INSERT INTO PremiumPictures SET BizId='$BizId', LogoPic='$PicPath'") or die(mysql_error()); 
					}
					 else {	mysql_query("UPDATE PremiumPictures SET LogoPic='$PicPath' WHERE id='$id'") or die(mysql_error()); }
					 
					 echo "<img id='Picture' src='".$PicPath."'>";
  			  }			
	} 
	
	else 
	{
  		echo "Invalid file";
	}
mysql_close($db);
?>