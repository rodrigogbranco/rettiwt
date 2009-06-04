<?php
/*Arquivos fonte*/
require_once("sistema/view/View.php");
require_once("sistema/view/AnonimousView.php");
require_once("sistema/view/UserView.php");
require_once("sistema/view/RegisterView.php");
require_once("sistema/model/User.php");
require_once("sistema/model/Follow.php");

/*Classe do Controlador*/
class FollowController
{
	//ID do Usuário ativo para o controle dos twitts
	var $userId = null;
	
	/*Construtor*/
	function __construct ( $id )
	{
		$this->userId = $id;
	}

	
	//retorna um array de objetos user  com todos os usuários seguidos pelo usuário userId 
	function showFollowed()
	{
		
		$select =  "SELECT * FROM user u WHERE u.id  IN  (SELECT f.id_user_follow FROM follow f WHERE f.id_user = ".$this->userId.") ORDER BY u.alias" ;
				    
		global $bd;
		
		$follow = $bd->fetch_object_list($select,'Twitt');
		
		var_dump($follow);
		return $follow;
	}

	
	//retorna um array de objetos user com todos  o usuário que seguem o usuário userId 
	function showFollowMe()
	{
		
		$select =  "SELECT * FROM user u WHERE u.id  IN  (SELECT f.id_user FROM follow f WHERE f.id_user_follow = ".$this->userId.") ORDER BY u.alias" ;
				    
		global $bd;
		
		$follow = $bd->fetch_object_list($select,'Twitt');
		
		var_dump($follow);
		return $follow;
	}
	
	//o usuário userId passa a seguir outro usuário
	// a função insere  este relacionamento no banco de dados
	function insert($id_user_follow)
	{
		$follow = new Follow();
		
		$follow->id_user = $this->userId;
		$follow->id_user_follow = $id_user_follow;
		
		$follow->save();
		echo "qq merda"; 
	}
	
}
?>
