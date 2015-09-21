<?php session_start();
$Email = trim($_GET['Email']); 
$Bloc = 'Bloc';
$localhost = 'localhost';
$Parameters =  array(
		':Activation' => 1,
		':Email' => $Email
	);

if(isset($_GET['code']) && isset($_GET['Email'])) {
	$code =$_GET['code'];
	$Email=$_GET['Email']; 
} else {
	exit("You are trying to log in without conformation of your registration.<br><a href='../index.php'>Bloc</a>");	 
	} 

require_once('DB_connections.php');
$bdd = new DB_connections($localhost, $Bloc, 'root', 'root');
$query = 'SELECT id, Activation FROM users WHERE Email =:parameter';
$User = $bdd -> getOne($query, $Email);

$Kill_Link = $User['Activation'];
		if($Kill_Link=='1'){
			exit("You did confirm your Registration already");
		}
$activation = md5($User['id']).md5($Email);	

	if ($activation == $code) {
		$update_query = "UPDATE users SET Activation =:Activation WHERE Email =:Email";
		$bdd = new DB_connections($localhost, $Bloc, 'root', 'root');
		$bdd->execute($update_query, $Parameters);
		$bdd->disconnect();
		$_SESSION['Email'] = $Email;

	    header('Location: ../BackOffice.php');            	 
	} else {
		exit("Error, your confirmation email does not match our database <br> <p>Home Page: <a href='../index.php'>Bloc</a></p>".$activation.'<br/>'.$code);
	  } 

?>
