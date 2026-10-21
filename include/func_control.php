<?php

	function CheckEmail($email)
	{
		$bValue = true;
		$email = trim($email);
		
		if(!$email) {
			$bValue=false;
		}
		
		if(!preg_match( '/^[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}$/', $email)) {
			$bValue=false;
		}
		
				
		return ($bValue);
	
	}
	
	function db_Connessione()
	{
		$connessione=mysql_connect("localhost","root","")
			or die ("Connessione Fallita");
		return ($connessione);
	}
	
	function db_Insert_Utente($nome,$cognome,$registrato,$conferma,$email,$rnd)
	{
		$sql = "INSERT into utente (nome, cognome, registrato, conferma, email, rndConferma)"
			. "VALUES ('$nome','$cognome','$registrato' ,'$conferma' ,'$email','$rnd')";
			
		$ris = MySql_query($sql)
			or die ("Inserimento fallito");
			
		return($ris);
	
	}
	
	function SessioneCasuale(){
		$N_Caratteri = 5;
		$Stringa = "";
		For($I=0;$I<$N_Caratteri;$I++){
			do{
				$N = Ceil(rand(48,122));
			}while(!((($N >= 48) && ($N <= 57)) || (($N >= 65) && ($N <= 90)) || (($N >= 97) && ($N <= 122))));
				
			
			$Stringa = $Stringa.Chr ($N);
		}
		return $Stringa;
	}
	
	function db_Update_Utente($rnd)
	{
		$sql = "UPDATE utente SET conferma = 'si' WHERE rndConferma='$rnd'";
		
		$ris = MySql_query($sql)
			or die ("Update fallito");
			
		return($ris);
	}


?>