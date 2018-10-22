<?php
	
	session_start();
	
	if ((!isset($_POST['email'])) || (!isset($_POST['haslo'])) || $_POST['haslo']=="" || $_POST['email']=="")
	{
		header('Location: logowanie.php');
        $_SESSION['blad']="Nie podano hasła lub loginu";
		exit();
	}

	
	include_once "bazadanych.php";

        BazaDanych::polacz();
		$login = $_POST['email'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
                
        $zapytanie = "SELECT * FROM users WHERE name='".$login."'";
                

        if($wiersz = BazaDanych::pobierzZapytanieJakoTablica($zapytanie))
        {

            if (password_verify($haslo, $wiersz[0]['passwd']))
				{
					
					$_SESSION['zalogowany'] = true;
					$_SESSION['id'] = $wiersz[0]['id'];
					$_SESSION['name'] = $wiersz[0]['name'];
					
					
					unset($_SESSION['blad']);
                
                    header('Location: ogloszenia.php');
					
				}
				else 
				{
                    BazaDanych::rozlacz();
                    header('Location: logowanie.php');
                    $_SESSION['blad']="Nieprawidłowe hasło";
                    exit();
				}
        }else
        {
            BazaDanych::rozlacz();
            header('Location: logowanie.php');
            $_SESSION['blad']="Nieprawidłowy login";
		    exit();
        }

		
		BazaDanych::rozlacz();
	
?>