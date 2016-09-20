<?php
class dekoder {
	private $tekst;
	public function __construct($tekst) {
		$this->tekst=$tekst;
	}
	public function zakoduj() {
		$txt = $this->tekst;
		$koduj = base64_encode($txt);
		echo $koduj;	
	}
	public function odkoduj() {
		$txt = $this->tekst;
		$koduj = base64_decode($txt);
		echo $koduj;
	}
}	
			if (isset($_POST['koduj'])) {
				$napis = new dekoder($_POST['z_napis']);
				$napis->zakoduj();
			}
			elseif (isset($_POST['dekoduj'])) {
				$napis = new dekoder($_POST['o_napis']);
				$napis->odkoduj();
			}

?>

<html>
	<head>
		<title>Dekoder</title>
	</head>
	
		<body>
			<form action = "" method = "post">
				<label>Tekst do zakodowania: </label>
				<input type = "text" name = "z_napis"> 
				<input type = "submit" name = "koduj" value = "Zakoduj">
				<br />
				<label>Tekst do odkodowania: </label>
				<input type = "text" name = "o_napis">
				<input type = "submit" name = "dekoduj" value = "Odkoduj">
			</form>
		</body>
</html>