<?php


	session_start();
	
    include_once "bazadanych.php";
    

	if (BazaDanych::CzyZalogowany())
	{
		header('Location: ogloszenia.php');
		exit(); 
	}
	
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EduTracker - Znajdź swoją przyszłość</title>
        <link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon' />
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <div id="background_photo_log_reg">
            <div id="log_reg_container">
                <img src="img/logo.png" id="log_reg_logo"/>
                <h2>EduTracker</h2>
                <a href="rejestracja.php">
                    <div id="register_container">
                        <h3>Zarejestruj się </h3>
                    </div>
                </a>
                <a href="logowanie.php">
                    <div id="login_container" >
                        <h3>Zaloguj się </h3>
                    </div>
                </a>
            </div>
        </div>
    </body>
</html>
