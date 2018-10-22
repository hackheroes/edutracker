<?php


	session_start();
	
    include_once "bazadanych.php";
    

	if (!BazaDanych::CzyZalogowany())
	{
		header('Location: index.php');
		exit(); 
	}
	
?>

<!DOCTYPE html>
<html lang="pl">
<head>
        <title>EduTracker - Znajdź swoją przyszłość</title>
        <meta charset="UTF-8">
    <link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon' />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            box-sizing: border-box;
            font-family: Helvetica;
            transition:  all 0.5s;
        }
        html,body{
            margin: 0 auto;
            padding: 0 auto;
            height:100%;
        }
        #menu{
            width: 300px;
            height: 100%;
            transform: translateX(-90%);
            background-image: linear-gradient(rgb(31,77,119),rgb(17,187,244));
            position: fixed;
            transition: 0.3s all;
            z-index:10;
        }
        
        #menu:hover{
           transform:  translateX(0);
        }
        
        #menu:hover>#menu-banner{
            box-shadow: -4px 4px 14px rgb(44,44,44);
        }
        
        #menu-banner{
            width: 100%;
            height: 20vh;
            display:flex;
            flex-direction: column;
            background-color: rgba(0,0,0,0.4);
            align-items: center;
            justify-content: center;
            padding-bottom:  5px;
        }
        #menu-banner:hover img#menu-logo{
            transform:  translateY(30%);
            
        }
        
        #menu-logo{
            display: block;
            height:calc(10vh -  10px);
            width:calc(10vh -  10px);
            z-index: 20;
        }
        
        #menu-banner-a>div>img{
            width: 8vw;
            margin-top: 10px;
        }
        
        #awatar-block {
            width: calc(10vh -  10px);
            height: calc(10vh -  10px);
            background-color: darkgray;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer; 
            position:relative;
        }
        
        #awatar-block img {
            width: 5vh;
            top:50%;
            transform: translateY(-35%);
            position:absolute;
            padding-bottom:  5px;
        }
        
        #awatar-block p{
            margin: 0 auto;
            padding: 0 auto;
            font-family: helvetica;
            color: rgb(255,255,255);
            text-shadow: 2px 2px black;
            text-align: center;
            font-size: 16px;
            margin-bottom: 10px;
            z-index:10;
            align-self: flex-end;
        }
        
        #menu-banner-b{
            height: 40%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .menu-block{
            width: 100%;
            min-width: 300px;
            height: 10vh;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s all;
            position: relative;
        }
        
        .menu-block:hover{
            background: rgba(0,0,0,0.3);
        }
        .menu-block:after{
            content:"";
            display: block;
            width:100%;
            position:absolute;
            bottom:0;
            background:white;
            height:1px;
        }
        
        .menu-block>h1{
            margin: 0 auto;
            padding: 0 auto;
            color: white;
            font-family: helvetica;
            font-weight: 200;
            font-size: 25px;
        }
        
        
        
        
        
        h1, h2{
            text-align: center;
            margin:0;
            padding: 0.6em;
        }
        h1{
            font-size:  40px;
        }
        h2{
            font-size: 30px;
        }
        div#annoucement_container{
            max-width:1000px;
            margin:0 auto;
            padding:20px;
            background: rgba(0,0,0,0.05);
        }
        div.announcement_single_row{
            position:relative;
        }
        div.announcement_single_row:not(:last-of-type):after{
            content:"";
            display: block;
            width:100%;
            position:absolute;
            bottom:0;
            background: rgba(0,0,0,0.1);
            height:1px;
        }
        div.announcement_single_row p{
            padding:0 20px  20px;
            font-size:  20px;
        }
        div#all{
            height:100%;
            display:flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        a{
            text-decoration: none;
        }
        
        
    </style>
</head>
    
<body>
    <div id="menu">
        <div id="menu-banner">
            <img src="img/logo.png" id="menu-logo">
            
                <a href="profil.php">

                <div id="awatar-block">
                    <img src="img/awatar.png">
                    <p>PIOTR</p>
                </div>
                </a>
            
            
            </div>
               <a href="mapa.php">
            <div class="menu-block">
                <h1>EduFinder</h1>
            </div>
        </a>
        <a href="mapa.php" target="_blank">
            <div class="menu-block">
                <h1>Mapa</h1>
            </div>
        </a>
        <a href="https://men.gov.pl/" target="_blank">
            <div class="menu-block">
                <h1>Ministerstwo Edukacji</h1>
            </div>
        </a>
        <a href="ranking.php">
            <div class="menu-block">
                <h1>Ranking</h1>
            </div>
        </a>
        <a href="obserwowane.php">
            <div class="menu-block">
                <h1>Obserwowane</h1>
            </div>
        </a>
        <a href="ogloszenia.php">
            <div class="menu-block">
                <h1>Aktualności</h1>
            </div>
        </a>
        <a href="pomoc.php">
            <div class="menu-block">
                <h1>Pomoc</h1>
            </div>
        </a>
        <a href="logowanie.php?logout=logout">
            <div class="menu-block">
                <h1>Wyloguj</h1>
            </div>
        </a>
    </div>
    <div  id="all">
        <h1>EduTracker</h1>
        <div id="annoucement_container">
            <div class="announcement_single_row">
                <h2>Wielka integracja rocznika 2000</h2>
                <p>W środę dnia 28.10.2018 organizujemy wielką integrację rocznika  2000. Zapraszamy wszyskich, którzy w roku 2018 rozpoczę...</p>
            </div>
            <div class="announcement_single_row">
                <h2>Aktualizacja 1.3.4!
</h2>
                <p>W aktualizacji 1.3.4 dodaliśmy wiele usprawnień. Zaktualizuj aplikację i już teraz zacznij dodawać szkoły do obserwowanych...</p>
            </div>
            <div class="announcement_single_row">
                <h2>Aktualizacja 1.3.3!
</h2>
                <p>W aktualizacji 1.3.3 dodaliśmy nową politykę bezpieczeństwa. Zapoznaj się z nowymi regulacjami oraz nowościami...
</p>
            </div>
            <div class="announcement_single_row">
                <h2>Uwaga!</h2>
                <p>Uwaga! Tylko dla naszych użytkowników, którzy zarejestrowali się po 30 sierpnia 2018 roku, przygotowaliśmy specjalną ofertę...
                </p>
            </div>
        </div>
    </div>
    </body>
</html>