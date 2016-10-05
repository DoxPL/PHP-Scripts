<?php
interface project
{
	public function generate();
	public function filter();
	public function action();
}
class game implements project
{
	public $correct;
	public function generate()
	{
		session_start();
		if(!isset($_SESSION['number']))
		{
			$random_num=rand(1,100);
			$_SESSION['number']=$random_num;
		}
		else
		{
			$this->action();
		}
	}
	public function filter()
	{
		if(isset($_POST['send']))
		{
			$this->correct=true;
			$u_try=trim($_POST['user_try']);
				try 
				{
					if($u_try==NULL)
					{
						throw new Exception("Pole nie zostało uzupełnione <br />");
					}
				}
				catch (Exception $e)
				{
					$this->correct=false;					
					echo $e->getMessage();
				}
				try 
				{
					if(!is_numeric($u_try))
					{
						throw new Exception("Podana wartość nie jest liczbą <br />");
					}
				}
				catch(Exception $e)
				{
					$this->correct=false;
					echo $e->getMessage();
				}
				try
				{
					if($u_try>100 || $u_try<1)
					{
						throw new Exception("Liczba nie spełnia kryterium");
					}
				}
				catch(Exception $e)
				{
					$this->correct=false;
					echo $e->getMessage();
				}
		}
	}
	public function action()
	{
		if($this->correct==true)
		{	
			if(!isset($_SESSION['attempts']))
			{
				$_SESSION['attempts']=1;
			}
			if($_POST['user_try']==$_SESSION['number'])
			{
				echo "Liczba <b>".$_SESSION['number']."</b> została odgadnięta za: <b>".$_SESSION['attempts']. "</b> razem";
				session_destroy();
			}
			elseif($_POST['user_try']>$_SESSION['number'])
			{
				echo "Liczba jest za duża";
				$_SESSION['attempts']++;
			}
			elseif($_POST['user_try']<$_SESSION['number'])
			{
				echo "Liczba jest za mała";
				$_SESSION['attempts']++;
			}
		} 
	}
}
$obj = new game;
$obj->generate();
$obj->filter();
$obj->action();
?>
<!doctype html>
<html>
	<head>
	<meta charset = "utf-8">
		<title>Gra - zgadnij numer</title>
	</head>
	<body>
		<form method = "post">
		<h3>Zgadnij numer od 1 do 100</h3>
		<input type = "text" name = "user_try"> 
		<input type = "submit" name = "send" value = "Zgaduj">
		</form>
		</body>
</html>