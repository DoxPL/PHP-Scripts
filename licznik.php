<?php
	class licznik {
		public $licznik;
		public function __construct($licz) {
			$this->licznik=$licz;

		}
		public function licz($ods) {
			if(!isset($_POST['zeruj'])) {
			$ods++;
			$cookie = setcookie("licznik", $ods, time()+3600);
			echo isset($_COOKIE['licznik']) ? $_COOKIE['licznik'] :  0;
			} 
		}
		public function zeruj() {
			if(isset($_POST['reset'])) {
				unset($_COOKIE['licznik']);
				setcookie("licznik", null, -1);
				$_COOKIE['licznik']=0;
				header ("Location: licznik.php");
			}
		}
	} 
	if (!isset($_COOKIE['licznik'])) {
		$ods = 0;
	} else {
		$ods = $_COOKIE['licznik'];
	}
	
	$odslony = new licznik($ods);
	$odslony->licz($ods);
	licznik::zeruj();
?>
<form action = "" method = "post">
	<input type = "submit" name = "reset" value = "Zeruj odslony">
</form>