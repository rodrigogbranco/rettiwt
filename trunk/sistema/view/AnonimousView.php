<?php

/*Arquivo da classe base View*/
include_once("View.php");

/*Classe do Controlador*/
class AnonimousView extends View
{	
	var $specifiedMsgError = "";
	/*Função de visualização*/
	function show()
	{
		//Algum erro foi cometido?
		if($this->error == "")
		{
			//Não ocorreu erro, mas existe um usuário especificado?
			if($this->user)
				$this->showUser();
			else
				$this->showDefault();
		}
		else
		{
			//Um erro foi detectado, vamos ver qual é...
			switch($this->error)
			{
				//Usuário desconhecido
				case "unknownUser":
					$this->specifiedMsgError = "Usuário Desconhecido";
					break;
			}
			$this->showDefault();
		}
	}

	/*Função específica para mostrar um usuário*/
	function showUser()
	{
		echo "Usuario especifico"; //O usuário foi especificado
	}

	/*Função da tela padrão*/
	function showDefault()
	{
		?>
			<div class="principal">
				<div class="imagem">
					Incluir imagem, se tiver
				</div>
				<div class="texto">
					Incluir texto aqui
				</div>
				<div class="init_form">
					<form method="post" action="index.php">
						<p>
							email: <input type="text" name="email" value="Digite aqui o email">
						</p>
						<p>
							senha: <input type="text" name="password" value="">
						</p>
						<p>
							<input type="submit" value="Logar">
						</p>
					</form>
				</div>
				<div class="error">
					<strong>
					<?php
						echo $this->specifiedMsgError;
					?>
					</strong>
				</div>
			</div>
			<div class="rodape">
				Rodapé?
			</div>
		<?php
	}
}

?>