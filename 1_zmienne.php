<?php

	//$liczba = 10;
	//echo "test <BR> $liczba";
	$tekst = 'Janusz';
	//echo "Mam na imię: $tekst"
	echo 'Mam na imię ' . $tekst.", uczę się w ZSK";
	//typy zmiennych
	//typ skalarny (prosty)

	//typ boolean
		$prawda = true;
		$fałsz = false;
	//typ integer
		$całkowita = 70;
		$szestnastkowa = 0xA;
		$oktalna = 010;
		$binarna = 0b1010;

	echo '<br><br>szestnastkowa: '.$szestnastkowa.'<br>ósemkowa: '.$oktalna.'<br>binarna: '.$binarna;
	
	//typ float

		$zmiennoprzecinkowa = 5.7;


	//typ string

		$imie = 'Janusz';

	//składnia heredoc

		$nazwisko = 'Nowak';

		$napis = <<<ETYKIETA
		<br>Twoje nazwisko: $nazwisko. Masz na imię Janusz
ETYKIETA;
		echo $napis."<br>";
	//składnia nowdoc

	$nazwisko1 = "Nowak";
	
	$tekst1 = <<<'B'
	twoje nazwisko to $nazwisko1
B;

	echo $tekst1;
	
	//typy złożone
		//typ array (tablicowy)
			
		//typ object (obiektowy)
	
	//typy specjalne
		//typ resource (źródło)

		//typ null
		$inna = null;
		$inna1 = NULL;

//*********************************************************************

echo "<br>Zmienna o nazwie \$nazwisko1 ma wartość: $nazwisko1"












?>