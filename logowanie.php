<?php

	session_start();

	include_once "bazadanych.php";

    if (isset($_GET['logout']) && $_GET['logout']="logout")
    {
        BazaDanych::Wyloguj();
        
    }

	if (BazaDanych::CzyZalogowany())
	{
		header('Location: ogloszenia.php');
		exit(); 
	}


?>













<!DOCTYPE HTML>
<html lang="pl">
<head>
        <title>EduTracker - Zarejestruj się</title>
    <link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon' />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
</head>

<body style="text-align: center;">
	
    
    
    
    <div style="text-align: center;" id="a-background_photo_log_reg">
            <div style="text-align: center;" id="a-log_reg_container">
                <img src="img/logo.png" id="a-log_reg_logo"/>
                <h2 id="a-napis-rejestracja">Zaloguj się</h2>
                	<form style="text-align: center;"  method="post" action="zaloguj.php">
                        
                        
                        <input class="a-input-login" placeholder="E-mail" type="text" name="email" ><br><br>

                        <input class="a-input-login" placeholder="Hasło" type="password" name="haslo"  ><br><br>

                        	
                        <?php
                           if(isset($_SESSION['blad']))	echo '<span id="a-error">'.$_SESSION['blad']."</span>";
                            unset($_SESSION['blad']);
                        ?>
                        <br><br>

                        <input id="a-form-rejestracja" type="submit" value="Zaloguj"><br>
                        

                        
	               </form>
    
                    <a href="rejestracja.php">Rejestracja</a>
                
            </div>
        </div>
    
    </body>

</html>