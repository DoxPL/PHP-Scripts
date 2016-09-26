<?php
class kalkulator {
	public function __construct() {
		
	}
	public static function sprawdz() {
		$sprawdz = 0;
		if(isset($_POST['pole1']) AND is_numeric($_POST['pole1'])) {
			$sprawdz+=1;
		}
		if(isset($_POST['pole2']) AND is_numeric($_POST['pole2'])) {
			$sprawdz+=1;
		}
		if($sprawdz==2) {
			return 1;
		}
	}
	public function licz() {
		if($this->sprawdz()==1) {
		if(isset($_POST['licz']) AND ($_POST['licz'])) {
			$a=$_POST['pole1'];
			$b=$_POST['pole2'];
			if(isset($_POST['wybierz'])) {
				switch($_POST['wybierz']) {
					case "dodaj": echo $a+$b;
					break;
					case "odejmij": echo $a-$b;
					break;
					case "mnoz": echo $a*$b;
					break;
					case "dziel": echo $a/$b;
					break;
					case "mod": echo $a%$b;
					break;
					default: echo "Wybierz działanie";
					break;
				}
			}
			}
		} else {
			echo "Wypełnij wszystkie potrzebne pola";
		}
	}
}
$o = new kalkulator;
$o->sprawdz();
$o->licz();
?>
<!doctype html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Kalkulator PHP</title>
	</head>
		<body>
			<form method = "post">
				<input type = "text" name = "pole1"> <br /> <br />
				<input type = "text" name = "pole2"> <br />
				<input type = "radio" name = "wybierz" value = "dodaj">Dodaj <br />
				<input type = "radio" name = "wybierz" value = "odejmij">Odejmij <br />
				<input type = "radio" name = "wybierz" value = "mnoz">Pomnóż<br />
				<input type = "radio" name = "wybierz" value = "dziel">Podziel <br />
				<input type = "radio" name = "wybierz" value = "mod">Reszta z dzielenia <br />
				<input type = "submit" name = "licz" value = "Przelicz">
			</form>
		</body>
</html>