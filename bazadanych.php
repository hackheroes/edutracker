<?php
	class BazaDanych {
		private static $mysqli;
		
		public static function polacz() {
			$nazwa_serwera = "localhost";
			$uzytkownik = "root";
			$haslo = "";
			$nazwa_bazy = "hackers";
			
			self::$mysqli = new mysqli($nazwa_serwera, $uzytkownik, $haslo, $nazwa_bazy);
			self::wykonajZapytanie("SET NAMES utf8;");
			self::$mysqli->set_charset("utf-8");
		}
		
		public static function rozlacz() {
			self::$mysqli->close();
		}
		
        
		
		public static function pobierzZapytanieJakoTablica($zapytanie) {
			$rezultat = self::$mysqli->query($zapytanie);
			$tablica = array();
			if ($rezultat && $rezultat->num_rows > 0) {
				while ($wiersz = $rezultat->fetch_assoc()) {
					array_push($tablica, $wiersz);
				}
				return $tablica;
			} else return false;
		}
		
		public static function wykonajZapytanie($zapytanie) {
			return self::$mysqli->query($zapytanie);
		}
		
		public static function zabezpieczCiagZnakow($ciagZnakow) {
			$zabezpieczony = trim(self::$mysqli->real_escape_string($ciagZnakow));
			return $zabezpieczony;
		}
				
		public static function hashPasswd($ciagZnakow) {
			$hash = password_hash($ciagZnakow , PASSWORD_DEFAULT);
			return $hash;
		}
				
		public static function Wyloguj() {
			if (isset($_SESSION['name'])) {
                unset($_SESSION['name']);
            }
            if (isset($_SESSION['id'])) {
                unset($_SESSION['id']);
            }
            if (isset($_SESSION['zalogowany'])) {
                unset($_SESSION['zalogowany']);
            }
		}
		
		public static function zabezpieczTabliceCiagowZnakow($tablica) {
			if (is_array($tablica)) {
				foreach ($tablica as &$element) {
					if (is_string($element))
						$element = trim(self::$mysqli->real_escape_string($element));
				}
				return $tablica;
			} else return false;
		}
		
		public static function wyswietlBlad() {
			echo self::$mysqli->error;
		}
		
        public static function CzyZalogowany() {
            if (isset($_SESSION['zalogowany']) && isset($_SESSION['name']) && isset($_SESSION['id'])) 
            {
                return true;
            }else
            {
                return false;
            }
        }
	}
?>