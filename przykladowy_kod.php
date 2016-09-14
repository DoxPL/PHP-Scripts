<?php 
//Autor: Dominik Galoch
session_start();
class shop
{
	function __construct()
	{
	}
	
	function getItems()
	{
		include "conf.php";
		$query="SELECT * FROM items";
		$res=($connect->query($query));
		while($r=$res->fetch_assoc()) 
		{
			echo $r['name'];
	
			echo "<br />";
			echo $r['price']." PLN";
			echo "<br />";
			echo "<form method='post'><input type = 'hidden' name = 'item_name' value = '$r[name]'>
			<input type = 'hidden' name = 'item_price' value = '$r[price]'>
			<input type = 'hidden' name = 'item_id' value = '$r[id_item]'>
			<input type='submit' name = 'tobasket' value = 'Do koszyka'>
			</form>";
		}
		$connect->close();
	}
	
	function getBasket()
	{	
			
		if(!isset($_SESSION['inbasket']))
		{
		$_SESSION['inbasket']=0;
		}
		if(isset($_POST['tobasket']))
			{
			$count=$_SESSION['inbasket'];
			$_SESSION['item_name'][$count]=$_POST['item_name'];
			$_SESSION['item_price'][$count]=$_POST['item_price'];
			$_SESSION['item_id'][$count]=$_POST['item_id'];
			$_SESSION['inbasket']++;
			}	
		if(isset($_GET['del']))
		{
			session_start();
			$_SESSION['inbasket'];
			session_destroy();
			header('Location: index.php');
		}

		if($_SESSION['inbasket']>0)
		{
			echo "Koszyk: <b>".$_SESSION['inbasket']."</b> przedmiotow <br />";
			for($a=0; $a<=$_SESSION['inbasket']-1; $a++)
			{
				echo $_SESSION['item_name'][$a]." ".$_SESSION['item_price'][$a]." PLN";
				echo "<br>";
			}
			echo "<br /><a href='index.php?del'>Usuń przedmioty</a> <br /> <a href = 'buy.php'>Kup teraz</a>";
		}
		else
		{
			echo "Brak przedmiotów w koszyku."; 
		}
	}
}

?>


<html>
<head>
<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
<title>Sklep</title>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<style>
html {
	background-color: #DFFFFF;
}

a {
	color: #FFFFFF;
}

#open {
	background-color: #6699CC;
	width: 120px;
	height: 30px;
	border-radius: 10px;
	color: #FFFFFF;
	font-size: x-large;
	text-align: center;
}

#koszyk {
	background-color: #6699CC;
	width: 15%;
	border-radius: 5px;
	color: #FFFFFF;
	text-align: center;
	display: none;
	position: relative;
}

.exit {	
	position: absolute;
	text-align: right;
	color: #F80000;
	right: 4px;
	width: 20px;
}
</style>
</head>
<body>
<?php 
shop::getItems();
?>
<div id = "open">
Koszyk (<?php if (isset($_SESSION['inbasket'])){echo $_SESSION['inbasket']+1;}else{echo 0;} ?>)
</div>
<div id = "koszyk">
<div class="exit">
[X]
</div>
<?php 
shop::getBasket();
?>
</div>
<script>
$(document).ready(function(){
		$('div#open').click(function(){
			$('div#koszyk').show('slow');
			$('div#open').hide();
			$('.exit').show('slow');
		});
		
		$('.exit').click(function(){
			$('div#open').show('slow');
			$('div#koszyk').hide();
			$('.exit').hide();
		});
	});

</script>
</body>
</html>