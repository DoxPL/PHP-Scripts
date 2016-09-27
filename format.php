<?php
/* Przykład działania kodu pod adresem
	http://szukajgry.pl/format */
	class textFormatting {
		public function init() {
			if(isset($_POST['text_field'])) {
				$text = $_POST['text_field'];
				return $text;
			} else {
				$text = NULL;
				return $text;
			}
		}
		public function valid() {
			$correct = true;
			if(isset($_POST['format'])) {
				try {
					if(!isset($_POST['select'])) {
						throw new Exception ("Wybierz sposób formatowania <br />");
					}
				} catch (Exception $exception) {
					echo "Błąd: ".$exception->getMessage();
					$correct = false;
				} try {
					if($_POST['text_field']==NULL) {
						throw new Exception ("Pole tekstowe nie może być puste <br />");
					}
				} catch (Exception $exception2) {
					echo "Błąd: ".$exception2->getMessage();
					$correct = false; 
				} try {
					if(!is_string($this->init())) {
						throw new Exception ("Niepoprawny typ tekstu <br />");
					}	
				} catch (Exception $exception3) {
					echo "Błąd: ".$exception3->getMessage();
					$correct = false;
				}
				return $correct;
			}
		}
		
		public function format() {
			if(($this->valid())==true) {
				switch($_POST['select']) {
					case "upper": echo strtoupper(strip_tags($this->init()));
					break;
					case "lower": echo strtolower(strip_tags($this->init()));
					break;
					case "ucfirst": echo ucfirst(strip_tags($this->init()));
					break;
					case "ucwords": echo ucwords(strip_tags($this->init()));
					break;
					default: echo "Tekst nie został sformatowany";
					break;
				}
			}
		}
	}
	$object = new textFormatting;
	$object->init();
	$object->format();
?>

<!doctype html>
<html>
	<head>
	<meta charset = "utf-8">
		<title>Formatuj swój tekst</title>
	</head>
	<body>
		<form method = "post">
			<p><b>Tekst do sformatowania: </b></p>
			<textarea name = "text_field"></textarea>
			<br />
			<input type = "radio" name = "select" value = "upper">Duże litery <br />
			<input type = "radio" name = "select" value = "lower">Małe litery <br />
			<input type = "radio" name = "select" value = "ucfirst">Pierwsza litera duża <br />
			<input type = "radio" name = "select" value = "ucwords">Każde słowo z dużej <br />
			<input type = "submit" name = "format" value = "Formatuj">
			
		</form>
	</body>
</html>