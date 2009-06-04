<?php
/*Arquivos fonte*/
require_once("sistema/view/View.php");
require_once("sistema/view/AnonimousView.php");
require_once("sistema/view/UserView.php");
require_once("sistema/view/RegisterView.php");
require_once("sistema/model/User.php");
require_once("sistema/model/Twitt.php");

/*Classe do Controlador*/
class TwittController
{
	//ID do Usuário ativo para o controle dos twitts
	var $twittUser = null;
	
	/*Construtor*/
	function __construct ( $userId )
	{
		$this->twittUser = $userId;
	}

	//mostra todos twitts enviados pelo usuário
	//retorna um array com todos objetos twitts do usuário
	function showMessage()
	{
		
		$select =  "SELECT id, id_user, text, id_multimidia, reply , DATE_FORMAT(date,'%d/%m/%Y') as date, TIME_FORMAT(time,'%H:%i:%S') as time FROM twitt where id_user = ".$this->twittUser." ORDER BY date DESC, time DESC" ;
				    
		global $bd;
		
		$twitts = $bd->fetch_object_list($select,'Twitt');
		
		//var_dump($twitts);
		return $twitts;
	}

	//retorna um array com todos objetos  todos twitts enviados pelo usuário, 
	//todos os twits enviados pelas pessoas que ele segue e todos o twitts de resposta aos twitts que ele enviou
	function showAllMessage()
	{
		
		$select =  "SELECT t.id, t.id_user, t.text, t.id_multimidia, t.reply , DATE_FORMAT(t.date,'%d/%m/%Y') as date, TIME_FORMAT(t.time,'%H:%i:%S') as time FROM twitt t where t.id_user = ".$this->twittUser."   	UNION 
		 SELECT t2.id, t2.id_user, t2.text, t2.id_multimidia, t2.reply , DATE_FORMAT(t2.date,'%d/%m/%Y') as date, TIME_FORMAT(t2.time,'%H:%i:%S') as time FROM twitt t2 where t2.reply IN (SELECT t3.id FROM twitt t3 where t3.id_user =  ".$this->twittUser.")  	UNION
		 SELECT t4.id, t4.id_user, t4.text, t4.id_multimidia, t4.reply , DATE_FORMAT(t4.date,'%d/%m/%Y') as date, TIME_FORMAT(t4.time,'%H:%i:%S') as time FROM twitt t4 where t4.id_user IN (SELECT f.id_user_follow FROM follow f where f.id_user =  ".$this->twittUser.")  UNION
		 SELECT t5.id, t5.id_user, t5.text, t5.id_multimidia, t5.reply , DATE_FORMAT(t5.date,'%d/%m/%Y') as date, TIME_FORMAT(t5.time,'%H:%i:%S') as time FROM twitt t5 where t5.reply IN (SELECT t6.id FROM twitt t6 where t6.id_user IN (SELECT f2.id_user_follow FROM follow f2 where f2.id_user =  ".$this->twittUser.")) ORDER BY date DESC, time DESC " ;
				    
		global $bd;
		
		$twitts = $bd->fetch_object_list($select,'Twitt');
		

		return $twitts;
	}
	
	//recebe os paramentros de um twitt e cria um novo twitt e insere no banco de dados
	function insertTwitt( $text, $id_multimidia = null, $reply = null){
		
		$insert = "INSERT INTO twitt (id_user, text, date, time, id_multimidia, reply) 
				 VALUES ('.$this->twittUser.', '.$text', curdate(), curtime() ,'.$id_multimidia.', '.$reply.') "; 
	
		global $bd;
		$bd->query($insert);
	
	}
	
	
	
}
?>
