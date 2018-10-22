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
    <meta charset="utf-8">
    <link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon' />
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
            z-index:20;
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
        div#help_container{
            max-width:1000px;
            margin:0 auto;
            padding:20px;
            background: rgba(0,0,0,0.05);
        }
        div.help_single_row{
            position:relative;
        }
        div.help_single_row:hover{
            background: rgba(0,0,0,0.2);
            cursor: pointer;
        }
        div.help_single_row:not(:last-of-type):after{
            content:"";
            display: block;
            width:100%;
            position:absolute;
            bottom:0;
            background: rgba(0,0,0,0.1);
            height:1px;
        }
        div#all{
            height:100%;
            display:flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
        a
        {
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
        <a href="edufinder.php">
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
        
        
        <style>
            
            h1
            {
                margin-top: 90px;
                margin-bottom: 70px;
                font-size: 60px;
                font-weight: 500;
                    color: #1F4D77;

            }
            
                        
        

            
        </style>
    </div>
    <div id='all'>
    
        
        <h1>Ranking Liceów</h1>
        
        
     
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 90%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
td:first-child {
    width: 30px;
    background-color: grey;
}
    tr:hover
    {
        background-color: #1F4D77;
    }
</style>



<table>
  <tr>
    <th>L.p.</th>
    <th>Nazwa szkoły</th>
    <th>Miasto</th>
  </tr>
  <tr>
    <td>1</td>
    <td>XIII Liceum Ogólnokształcące	</td>
    <td>Szczecin</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Liceum Akademickie UMK</td>
    <td>Toruń</td>
  </tr>
  <tr>
    <td>3</td>
    <td>XIV Liceum Ogólnokształcące im. St. Staszica</td>
    <td>Warszawa</td>
  </tr>
  <tr>
    <td>4</td>
    <td>	V Liceum Ogólnokształcące im. A. Witkowskiego</td>
    <td>Kraków</td>
  </tr>
  <tr>
    <td>5</td>
    <td>III LO z Oddz. Dwujęz. im. Marynarki Wojennej RP</td>
    <td>Gdynia</td>
  </tr>
  <tr>
    <td>6</td>
    <td>LO nr III im. Adama Mickiewicza</td>
    <td>Wrocław</td>
  </tr>
    <tr>
    <td>7</td>
    <td>LO nr XIV im. Polonii Belgijskiej	</td>
    <td>Wrocław</td>
  </tr>
  <tr>
    <td>8</td>
    <td>II LO z Oddz. Dwujęz. im. Stefana Batorego</td>
    <td>Warszawa</td>
  </tr>
  <tr>
    <td>9</td>
    <td>VIII Liceum Ogólnokształcące im. Władysława IV</td>
    <td>Warszawa</td>
  </tr>
  <tr>
    <td>10</td>
    <td>LXVII LO im. Jana Nowaka-Jeziorańskiego</td>
    <td>Warszawa</td>
  </tr>
  <tr>
    <td>11</td>
    <td>XXVII LO im. Tadeusza Czackiego</td>
    <td>Warszawa</td>
  </tr>
  <tr>
    <td>12</td>
    <td>VI LO z Oddz. Dwujęz. im. Jana Kochanowskiego</td>
    <td>Radom</td>
  </tr>
    <tr>
    <td>13</td>
    <td>2 Społeczne LO STO im. Pawła Jasienicy</td>
    <td>Warszawa</td>
  </tr>
  <tr>
    <td>14</td>
    <td>Liceum Ogólnokształcące im. św. Jadwigi Królowej</td>
    <td>Kielce</td>
  </tr>
  <tr>
    <td>15</td>
    <td>LXIV LO im. Stanisława Ignacego Witkiewicza</td>
    <td>Warszawa</td>
  </tr>
  <tr>
    <td>16</td>
    <td>IX LO im. Klementyny Hoffmanowej</td>
    <td>Warszawa</td>
  </tr>
  <tr>
    <td>17</td>
    <td>XXXIII LO Dwujęzyczne im. Mikołaja Kopernika</td>
    <td>Warszawa</td>
  </tr>
  <tr>
    <td>18</td>
    <td>I Liceum Ogólnokształcące</td>
    <td>Swarzędz</td>
  </tr>
</table>

        <br>
        1 | 2 | 3 | 4 ... | 54
        <br><br><br><br>
        
    </div>
        
    
</body>
</html>