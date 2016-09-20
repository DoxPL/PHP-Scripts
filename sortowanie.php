<?php
class sortuj {
	public $tab;
	public function __construct($tablica) {
		$this->tab=$tablica;
	}
	//funcja sortująca 
	public function sortowanie($obiekt) {
		if (isset($_POST['typ'])) {
			switch ($_POST['typ']) {
				case "a_sort": 
					asort($this->tab);
					break;
				case "ar_sort":
					arsort($this->tab);
					break;
				case "k_sort":
					ksort($this->tab);
					break;
			}
			reset ($this->tab);
			while(list($klucz, $wartosc) = each ($this->tab)) {
				echo " $klucz = $wartosc ";
			}
		}
	}	
}		//tworzenie nowej tablicy
		$tablica = Array(
		"m"=>"marchewka",
		"p"=>"pietruszka",
		"z"=>"ziemniak",
		"d"=>"dynia",
		"s"=>"slonecznik",
		);	
	
	$obiekt = new sortuj($tablica);	
	if (isset($_POST['wyslij_typ'])) {
	$obiekt->sortowanie($tablica);
	}
?>
<html>
	<head>
		<title>Sortuj</title>
	</head>
		<body>
			<form action = "" method = "post">
				<input type = "radio" name = "typ" value = "a_sort">Asort<br />
				<input type = "radio" name = "typ" value = "ar_sort">Arsort<br />
				<input type = "radio" name = "typ" value = "k_sort">Ksort<br />
				<input type = "submit" name = "wyslij_typ" value = "Sortuj">
			</form>
		</body>
</html>