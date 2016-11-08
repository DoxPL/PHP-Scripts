<?php
	function valid_mail($email)
	{
		if(preg_match('/^[0-9a-zA-Z._-]{1,}@[0-9a-z._-]{1,}.[a-z]{2,}$/',$email))
		{
			echo "Adres email jest poprawny.";
		}
		else
		{
			echo "Adres email jest niepoprawny.";
		}
	}
	function valid_url($url)
	{
		if(preg_match('/^(http|https|www):\/\/[a-z0-9-.ąćęłńóśźż]{1,}.[a-z]{2,}$/u', $url))
		{
			echo "Adres strony internetowej jest poprawny.";
		}
		else
		{
			echo "Adres strony jest niepoprawny.";
		}
	}
	$mail = "test.user123@mail_domain.pl";
	$url = "https://test.site.info";
	valid_mail($mail);
	echo "<br />";
	valid_url($url);
?>