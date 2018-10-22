<?php
	require_once("autoryzacja.php");
	class Uzytkownik {
		private static $daneUzytkownika = null;
		
		private static $opc_komorkiKierujacego = null;
		private static $opc_jednostkiIOD = null;
		private static $opc_jednostkiInformatyka = null;
		
		
		
		public static function zaladujUprawnienia() {
			if (isset($_COOKIE[Autoryzacja::NAZWA_CIASTECZKA])) {
				$idSesji = BazaDanych::zabezpieczCiagZnakow($_COOKIE[Autoryzacja::NAZWA_CIASTECZKA]);
				$zapytanie = "SELECT id, CONCAT(imie, ' ', nazwisko) AS 'imie_i_nazwisko', uprawnienia, id_jednostki AS 'jednostka', id_komorki AS 'komorka' FROM uzytkownicy JOIN sesje ON sesje.id_uzytkownika = uzytkownicy.id WHERE sesje.id_sesji = '$idSesji' LIMIT 0,1";
				
				self::$daneUzytkownika = BazaDanych::pobierzZapytanieJakoTablica($zapytanie)[0];
				
				$id = self::$daneUzytkownika["id"];
				
				// Załaduj uprawnienia kierującego
				if (self::czyPosiadaUprawnienie("K")) {
					$zapytanie = "SELECT * FROM opc_kierujacy_komorki WHERE id_uzytkownika = $id";
					$komorkiKierujacego = BazaDanych::pobierzZapytanieJakoTablica($zapytanie);
					
					if ($komorkiKierujacego) {
						self::$opc_komorkiKierujacego = array();
						foreach ($komorkiKierujacego as $komorka) {
							array_push(self::$opc_komorkiKierujacego, $komorka["id_komorki"]);
						}
					}
				}
				
				// Załaduj uprawnienia IOD
				if (self::czyPosiadaUprawnienie("D")) {
					$zapytanie = "SELECT * FROM opc_iod_jednostki WHERE id_uzytkownika = $id";
					$jednostkiIOD = BazaDanych::pobierzZapytanieJakoTablica($zapytanie);
					
					if ($jednostkiIOD) {
						self::$opc_jednostkiIOD = array();
						foreach ($jednostkiIOD as $jednostka) {
							array_push(self::$opc_jednostkiIOD, $jednostka["id_jednostki"]);
						}
					}
				}
				
				// Załaduj uprawnienia Informatyka
				if (self::czyPosiadaUprawnienie("I")) {
					$zapytanie = "SELECT * FROM opc_informatyk_jednostki WHERE id_uzytkownika = $id";
					$jednostkiInformatyka = BazaDanych::pobierzZapytanieJakoTablica($zapytanie);
					
					if ($jednostkiInformatyka) {
						self::$opc_jednostkiInformatyka = array();
						foreach ($jednostkiInformatyka as $jednostka) {
							array_push(self::$opc_jednostkiInformatyka, $jednostka["id_jednostki"]);
						}
					}
				}
			}
		}
		
		public static function pobierzInformacje($informacja) {
			if (is_string($informacja) && self::$daneUzytkownika[$informacja])
				return self::$daneUzytkownika[$informacja];
			else return "";
		}
		
		public static function pobierzKomorkiKierujacego() {
			if (self::$opc_komorkiKierujacego)
				return self::$opc_komorkiKierujacego;
			else return array();
		}
		public static function pobierzJednostkiIOD() {
			if (self::$opc_jednostkiIOD)
				return self::$opc_jednostkiIOD;
			else return array();
		}
		public static function pobierzJednostkiInformatyka() {
			if (self::$opc_jednostkiInformatyka)
				return self::$opc_jednostkiInformatyka;
			else return array();
		}
		
		public static function czyPosiadaUprawnienie($uprawnienie) {
			if (strlen($uprawnienie) == 1 && strpos(self::$daneUzytkownika["uprawnienia"], $uprawnienie) !== false) {
				return true;
			} else return false;
		}
	}
?>