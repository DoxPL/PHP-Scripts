<?php
interface project
{
	public function toBinary();
	public function toHex();
	public function toOct();
}
class convert implements project
{
	public $num;
	public function __construct($number)
	{
		$this->num=$number;
	}
	public function toBinary()
	{
		$bin=decbin($this->num);
		echo "Liczba dziesietna ".$this->num." w systemie binarnym: <b>".$bin."</b><br />";
	}
	public function toHex()
	{
		$hex=dechex($this->num);
		echo "W systemie szesnastkowym: <b>".$hex."</b><br />";
	} 
	public function toOct()
	{
		$oct=decoct($this->num);
		echo "W osemkowym: <b>".$oct."</b><br />";
	}
}
//nowy obiekt z przykładową liczbą 
$cnv=new convert(20);
$cnv->toBinary();
$cnv->toHex();
$cnv->toOct();
?>