<!DOCTYPE html>
<html>
    <head>
        <title>EduTracker - Znajdź swoją przyszłość</title>
        <link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon' />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            *{
    font-family: Helvetica;
}
body, html {
    margin:0;
    padding:0;
    height:100%;
}
a, a:link, a:hover, a:visited, a:focus{
    text-decoration:  none;
    color: inherit;
}
            
div#user_container{
    display: flex;
    justify-content: center;
    align-items:  center;
    margin:  auto;
    flex-direction: column;
    max-width:1000px;
    height:100%;
}
div#user_photo{
    height:200px;
    width:200px;
    border-radius:50%;
    background: url("img/user_photo.jpg");
    background-size:  cover;
    background-position: center center;
}
div#user_info_container{
    display: flex;
    justify-content: center;
    align-items:  center;
    flex-direction: column;
}
div.user_info_row{
    margin:10px;
}
div#back_button{
    position: absolute;
    top:10px;
    left:10px;
    background: #1F4D77;
    color:white;
    padding:  10px;
    border-radius:  5px;
}

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
        </div>
        <div id="all">
        
    <div  id="user_container">
            <div id="user_photo"></div>
            <div id="user_info_container">
                <div class="user_info_row">
                    Imię: <input type="text"  placeholder="Kasia"/>
                </div>
                <div class="user_info_row">
                    Nazwisko: <input type="text"  placeholder="Nowak"/>
                </div>
                <div class="user_info_row">
                    Typ szkoły: <select><option>Liceum</option><option>Technikum</option><option>Zawodówka</option></select>
                </div>
                <div class="user_info_row">
                    Rozszerzenie 1: <select><option>Matematyka</option><option>Polski</option></select>
                </div>
                <div class="user_info_row">
                    Rozszerzenie 2: <select><option>Fizyka</option><option>Chemia</option><option>Biologia</option><option>Geografia</option></select>
                </div>
                <div class="user_info_row">
                    Język dodatkowy: <select><option>Hiszpański</option><option>Niemiecki</option><option>Francuski</option><option>Rosyjski</option></select>
                </div>
                <div class="user_info_row">
                    Twoja miejscowość: <input type="text"  placeholder="Warszawa"/>
                </div>
                <div class="user_info_row">
                    Preferowany transport: <select><option>Metro</option><option>Autobus</option><option>Tramwaj</option><option>Rower</option></select>
                </div>
                <div class="user_info_row">
                    Promień wyszukiwania: <input  type="number"  placeholder="20km">
                </div>
                <div class="user_info_row">
                    Twoja liczba punktów: <input  type="number"  placeholder="160">
                </div>
                <div class="user_info_row">
<a style="text-decoration: none;" href="mapa.php">
                    <input  type="submit"  value="Szukaj">
</a>
                </div>
            </div>
        </div>

        </div>
    </body>
</html>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    