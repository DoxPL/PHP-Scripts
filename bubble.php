<?php
	//sortowanie babelkowe
	class sortuj {
		public $tablica;
		public function sortBabelkowe() {
				for ($i = 0; $i<8; $i++) {
					$losuj = rand(1,9);
					$tab[$i]=$losuj;
				}
				echo "<b>Przed sortowaniem: </b><br />";
				foreach ($tab as $t) {
					echo $t.", ";
				}
				//rozpoczecie sortowania
				for($j=0; $j<8; $j++) {
					for ($k=0; $k<8-1; $k++) {
						if ($tab[$k]>$tab[$k+1]) {
							$tmp = $tab[$k];
							$tab[$k] = $tab[$k+1];
							$tab[$k+1] = $tmp;
						}
					}
				}
				echo "<br /><b>Po sortowaniu: </b><br />";
				foreach ($tab as $d) {
					echo $d.", ";
				}
 		}
	}
	sortuj::sortBabelkowe();
?>