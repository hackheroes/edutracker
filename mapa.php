
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
        html,body {
            margin: 0 auto;
            padding: 0 auto;
            background-image: linear-gradient(rgb(240,240,240), rgb(220,220,220));
        }
        
        #box {
            background-color: white;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }
        
        #header {
            background-image: url(img/zdjszkola.jpg);
            background-position: 50% 68%;
            background-size: cover;
            height: 350px;
        }
        
        #square {
            background-color: rgba(10,10,10,0.5);
            width: 100%;
            height: 350px;
        }
        
        #school-name {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        #school-name>h1 {
            color: white;
            margin-top: 200px;
            padding: 0 auto;
            font-family: helvetica;
            font-weight: 200;
            font-size: 45px;
            text-align: center;
        }
        
        #container {
            width: 100%;
            height: 32em;
        }
        
        #infos{
            margin-left: 30px;
        }
        
        #infos>h3,h4,h5 {
            margin: 0 auto;
            padding: 0 auto;
            font-family: helvetica;
        }
        
        #infos>h3{
            font-size: 25px;
            font-weight: 400;
            margin-top: 10px;
        }
        
        #infos>h4{
            font-size: 25px;
            font-weight: 200;
            line-height: 30px;
        }
        
        #infos>h5{
            font-size: 20px;
            font-weight: 200;
            color: rgb(81,90,105);
            margin-top: 10px;
            margin-bottom: 10px;
        }
        
        #opinion {
            width: 14em;
            height: 20em;
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
        }
        
        #opinion>div{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .star {
            width: 50px;
        }
        
        #opinion-btn{
            width: 160px;
            margin-top: 10px;
            height: 30px;
            font-size: 14px;
            background-color: rgb(31,77,119);
            color: white;
            border: none;
            border-radius: 10px 10px 10px 10px;
            cursor: pointer;
            transition: 0.3s all;
        }
        
        #opinion-btn:hover{
            box-shadow: 0px 0px 10px rgb(31,77,119);
        }
        
        #opinion>#shield>img{
            width: 180px;
        }
        
        #footer{
            background-color: rgb(31,77,119);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 4em;
        }
        
        #footer>div>button{
            width: 100px;
            height: 34px;
            font-size: 15px;
            font-family: helvetica;
            border-radius: 10px;
            border: none;
            background-color: white;
            margin-left: 10px;
            cursor: pointer;
            transition: 0.3s all;
        }
        
        #footer>div>button:hover{
            box-shadow: 0px 0px 10px white;
        }
    </style>
    <script></script>
</head>
    
<body>
    <div id="box">
        <div id="content">
            
            
            <div id="header">
            <div id="square">
                <div id="school-name">
                    <h1>Technikum Mechatroniczne w ZSLiT nr 1<br>Warszawa, Wiśniowa 56</h1>
                </div>
            </div>
            </div>
            
            <div id="container">
                <div id="infos">
                    <h3>Technikum</h3>
                    <h4>Warszawa, ul. Wiśniowa 56, 02-520</h4>
                    <h5>mail: szkola@staff.edu.pl<br>
                        tel: &nbsp;&nbsp;(22)&nbsp;646&nbsp;44&nbsp;99<br>
                        url: &nbsp;&nbsp;https://tm1.edu.pl
                    </h5>
                </div>
            <hr color="#8190A5">
                
                <div id="opinion">
                    <div>
                        <img src="img/star.png" class="star">
                        <img src="img/star.png" class="star">
                        <img src="img/star.png" class="star">
                    </div>
                    <div>
                        <button id="opinion-btn">Opinie</button>
                    </div>
                    <div id="shield">
                        <img src="img/tarcza.png">
                    </div>
                </div>
            </div>
            
            <div id="footer">
                <div>
                    <button>O Szkole</button>
                    <button>Egzaminy</button>
                    <button>Wspołpraca</button>
                    <button>Ranking</button>
                </div>
            </div>
            
            <div id="googleMap" style="width:100%;height:400px;"></div>
        </div>
    </div>
    <script>
        function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(52.210105,21.014134),
            zoom:17,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYGmfubWUQYU5lx5uvJcFswrsrH7Qi1l4&callback=myMap"></script>
    
</body>

</html>