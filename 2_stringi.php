<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dokument bez tytułu</title>
</head>

<body>
	Masz na imię:
	<?php

		$imie = 'Janusz';
		echo "$imie<hr>";
		$text = <<<TEKST
		ZSK - Zespół
		Szkół
		Komunikacji
TEKST;

		echo "Przed użyciem funkcji nl2br: <br>$text<hr>";
		echo "Po użyciu funkcji nl2br: <br>";
		echo nl2br($text)."<hr>";


	//zamiana na małe litery
		echo strtolower($text)."<br>";
	//zamiana na duże litery
		echo strtoupper($text)."<br>";
	//zamiana 1 litery na dużą
		$tekst = "jaN KowaL noWak";
		echo ucfirst($tekst);
	//zamiana wszystkich 1 liter na duże
		echo "<br>".ucwords($tekst);
	//****************************************************************

		$lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elit turpis, fermentum nec gravida a, placerat et quam. Donec arcu est, tincidunt at bibendum in, malesuada eget urna. Nulla venenatis sit amet felis id condimentum. Aenean gravida leo eu arcu placerat, nec lacinia lectus tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Proin ac tincidunt tellus. In quis felis lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer congue augue vitae lorem dapibus molestie. Nam ultricies justo rutrum lacus sollicitudin volutpat. Integer venenatis, nibh quis viverra viverra, nibh eros tempor velit, non vehicula libero tellus a nunc. Quisque mollis orci at mauris dapibus, nec ultricies erat imperdiet. Integer et leo a metus dapibus varius. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eu lectus quis mi ullamcorper ullamcorper sollicitudin eleifend ipsum.";

		echo "<br>$lorem<br>";
		$kolumna = wordwrap($lorem, 40, "<br>");
		echo $kolumna;

	//usuwanie białych znaków

		$imie = "Filip";
		$imie2 = "    Filip   ";

		echo "<br>".strlen($imie)."<br>"; //5 znaków
		echo strlen($imie2); //12 znaków

		echo "<br>".strlen(ltrim($imie2)); //8 znaków
		echo "<br>".strlen(rtrim($imie2)); //9 znaków
		echo "<br>".strlen(trim($imie2)); //5 znaków

	//przeszukiwanie

		$adres = "Poznań, ul. Fredry 13, tel. (61) 445-44-58";

		$szukaj = strstr($adres, "tel");

		echo "<br>".$szukaj."<br>";

		$szukaj1 = strstr($adres, "tel", true);

		echo "<br>".$szukaj1."<br>";

		$szukaj2 = strstr($adres, "Tel");

		echo "<br>".$szukaj2."<br>"; //nic nie wyświetli

		$szukaj3 = stristr($adres, "Tel");

		echo "<br>".$szukaj3."<br>";


		$mail = strstr("zsk@poznan.pl",64);

		echo $mail."<br>";
//**********************************************************

		$ciag1 = "a";

		$ciag2 = "aa";

		echo strcmp($ciag1, $ciag2)."<br>"; //-1
		echo strcmp($ciag2, $ciag1)."<br>"; //1
		echo strcmp($ciag1, "a")."<br>"; //0

//**********************************************************

		$poz = strpos("abcdefg", "cde");

		echo $poz."<br>"; //2

		$poz1 = strpos("abcabc", "abc");

		echo $poz1."<br>"; //0

//zad.1

	$tekst1 = "abcdabcd";
	$tekst2 = "ab";

	if (strpos($tekst1,$tekst2) === false)
	{
		echo "Ciąg $tekst2 nie został znaleziony w ciągu $tekst1";
	}else
	{
		echo "Ciąg $tekst2 został znaleziony w ciągu $tekst1";
	}
//*************************************************************

//przetwarzanie ciągu znaków

	$zamien = str_replace("%imie%", "Janusz", "%imie% to nie imie, %imie% to styl życia!");
	echo "<br> $zamien <br>";

//************************************

	$nazwisko = substr("Janusz Nowak", 7, 5);
	echo '<br>'.$nazwisko.'<br>'; //Nowak


//************************************

	$login = "bączek";
	$cenzura = array("ą", "ę", "ś", "ż", "ć", "ź", "ó", "ń", "ł");
	$zamiana = array("a", "e", "s", "z", "c", "z", "o", "n", "l");

	$poprawnylogin = str_replace($cenzura, $zamiana, $login);

	echo $poprawnylogin.'<br>'; //baczek


/*
	Napisz program, któy będzie cenzurował zdanie podane przez użytkownika w formularzu.
	słowa do cenury: zsk, zse, zsł *__*
*/

	echo <<<FORM
		<form method="post">
			<input type="text" name="dane"><br>
			<input type="submit">
		</form>
FORM;


	if(isset($_POST['dane']))
	{
		$cenzura = array("zsk", "zse", "zsł");
		//$zamiana = array("*__*", "*__*", "*__*");
		$dane = $_POST['dane'];
		$zamiana = "*__*";
		$poprawione_dane = str_replace($cenzura, $zamiana, $dane);

		echo "Dane przed zamianą: ".$dane."<br>";
		echo "Dane po zamianie: ".$poprawione_dane."<br>";
	}







	?>

</body>
</html>
