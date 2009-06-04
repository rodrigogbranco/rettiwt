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
	//Usuário ativo para controle de seção
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
		
		$select =  "SELECT id, id_user, text, id_multimida, reply , DATE_FORMAT(date,'%d/%m/%Y') as date, TIME_FORMAT(time,'%H:%i:%S') as time FROM twitt where id_user = ".$this->twittUser." ORDER BY date DESC, time DESC" ;
				    
		global $bd;
		
		$twitts = $bd->fetch_array_list($select,'Twitt');
/*		
		foreach($twitts as $twitt)
		{
			$twitt->texto;
		}
		*/
		
		var_dump($twitts);
		return $twitts;
	}

}
?>
