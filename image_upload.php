<?php
class upload {
	public function getFileExt() {
		$ext = substr($_FILES['user_file']['name'], -3,3);
		return $ext;
	}
	public function check() {
		if (isset($_POST['send'])) {
			$file_ext = array ("jpeg", "gif", "png", "jpg");
			$img_ext = false;
			foreach($file_ext as $f_e) {
				if($f_e==$this->getFileExt()) {
					$img_ext = true;
				} 
			}
			if(is_uploaded_file($_FILES['user_file']['tmp_name'])) {
				$error = false;
				try {
					if (($_FILES['user_file']['size'])>($_POST['maxsize'])) {
						throw new Exception ("<br />Plik jest za duży");
						return false;
					}
				} catch (Exception $e) {
					echo $e->getMessage();
					$error=true;
				}
				try {
					if($img_ext==false) {
						throw new Exception ("<br />Niepoprawne rozszerzenie pliku");
						return false;
					}
				} catch (Exception $e) {
					echo $e->getMessage();
					$error=true;
				}
				if($error==false) {
					return true;
				} 
			}
		}
	}
	public function receive() {
		if($this->check()==true) {
			$destination = $_SERVER['DOCUMENT_ROOT']."/dox/path/";
			$f = new FilesystemIterator($destination, FilesystemIterator::SKIP_DOTS);
			$count = iterator_count($f);
			echo "<br />Plik: ".$_FILES['user_file']['name']." został przesłany na serwer";
			move_uploaded_file($_FILES['user_file']['tmp_name'],$destination."/image".$count++.".".$this->getFileExt());		
		} 
	}
}
$object = new upload;
?>

<!doctype html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Upload zdjęć</title>
	</head>
	<body>
		<form method = "post" ENCTYPE = "multipart/form-data">
		Wybierz plik: <input type = "file" name = "user_file">
		<input type = "hidden" name = "maxsize" value = "512000">
		<?php
			$object -> receive();
		?>
		<br />
		<input type = "submit" name = "send" value = "Prześlij">

	</body>
</html>