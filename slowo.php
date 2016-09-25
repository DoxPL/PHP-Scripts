<?php
	//skrypt sprawdza, czy dane słowo występuje na stronie
	$strona = file_get_contents("http://adres-strony.com");
	$f=false;
	$i=0;
	while($f==false) {
		if($i==strpos($strona,"tekst do wyszukania")) {
			$f=true;
			$pos = $i;
		}else{
		$i++;
		}
	}
	if ($f==true) {
		echo "Znaleziono, pozycja: ".$i;
	} else {
		echo "Nie znaleziono.";
	}
?>