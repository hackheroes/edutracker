<?php

	session_start();
	
    include_once "bazadanych.php";
    
	if (isset($_POST['email']) && isset($_POST['haslo1']) && isset($_POST['haslo2']))
	{
	   $email = $_POST['email'];
       $email = filter_var($email, FILTER_SANITIZE_EMAIL);
	   $haslo1 = $_POST['haslo1'];
	   $haslo2 = $_POST['haslo2'];
        if($haslo1 != $haslo2)
        {
            $blad = "Hasła nie są takie same";
        }elseif(strlen($haslo1)<6)
        {
            $blad = "Hasło jest za krótkie, powinno mieć ponad 6 znaków";
        }elseif (!isset($_POST['regulamin']))
		{
			$blad = "Aby przejść dalej należy zaakceptować regulamin";
		}else
        {
            $haslo1 = BazaDanych::hashPasswd($haslo1);

            BazaDanych::polacz();
         
                $zapytanie = "SELECT * FROM users WHERE name='".$email."'";

                if($wiersz = BazaDanych::pobierzZapytanieJakoTablica($zapytanie))
                {
                    $blad = "Konto z tym e-mailem już istnieje";
                }else
                {
                    $zapytanie = "INSERT INTO users (name, passwd) VALUES ('$email','$haslo1')";
                    BazaDanych::wykonajZapytanie($zapytanie);
                }
       
        		
                $zapytanie = "SELECT * FROM users WHERE name='".$email."'";
                

                $wiersz = BazaDanych::pobierzZapytanieJakoTablica($zapytanie);
                
					$_SESSION['id'] = $wiersz[0]['id'];
					$_SESSION['name'] = $email;
                    $_SESSION['zalogowany']=true;
            
                header('Location: ogloszenia.php');
                BazaDanych::rozlacz();
		          exit(); 
            }

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
                <h2 id="a-napis-rejestracja">Zarejestruj się</h2>
                	<form style="text-align: center;"  method="post">
                        <input class="a-input-login" placeholder="E-mail" name='email' required type="email" value=<?php if (isset($_POST['email'])) echo ($_POST['email']).""   ?>><br><br>

                        <input class="a-input-login" placeholder="Hasło" type="password" name='haslo1' required><br><br>

                        <input class="a-input-login" placeholder="Powtórz hasło" type="password" name='haslo2' required>
                        <br><br>
                        
                            <?php
                                if(isset($blad))	echo '<span id="a-error">'.$blad."</span>";
                                unset($blad);
                            ?>

                        <label>
                            <input type="checkbox" name="regulamin" > Akceptuję regulamin
                        </label><br><br>
                        <input id="a-form-rejestracja" type="submit" value="Rejestracja"><br>
                        

                        
	               </form>
    
                    <a id="a-konto-link" href="logowanie.php">mam już konto</a>
                
            </div>
        </div>
    
    
    
    
    
    
    
    
    
    
    

    
</body>
</html>