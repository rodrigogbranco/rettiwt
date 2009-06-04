			<?php //Variavel $this é uma instancia de AnonimousView// ?>
			
		<div id="top">
		
		</div>
	
		<div id="container">
		
			<div id="welcome">			
				<?php if($controller->activeSession)
				{?>
					<div id="menu">
						<a href="#">Home</a> | 
						<a href="#">Configurações</a> |
						<a href="#">Ajuda</a> |
						<a href="sistema/view/include/logout.php">Sair</a>
					</div>
				<?php 
				}else
				{
				?>
					<p><?php echo $this->user->alias; ?> está no Rettwit. Você está? Faça parte agora!
					  <form method="post" action="index.php">
                    <input type="submit" value="Cadastre agora!">
                    <input type="hidden" name="cadastro" value="newcadastro">
                 </form>
					 </p>					
				<?php
				}
				?>
				<div id="informacoes">
				<p>
<?php
$avatar = $this->user->returnAvatar();
echo '<img width="60" height="60" src="';
if (!empty($avatar))
{
	echo $avatar;
}
else
{
	echo 'templates/theme/image/teste.png';
}
echo ' ">';
?>
					<strong>figura<?php echo $this->user->alias; ?></strong></p>
				
					<?php if($controller->activeSession)
					{
						if($controller->activeUser->alias != $controller->visualisedUser->alias)
						{
						?>
							<a href="#">Seguir</a>
						<?php
						}
					}
					?>
				</div>
				
				<?php if($this->msg != "")
				{
					switch($this->type)
					{
						case "error":
							?>
							<div id="msgerror">
							<?php
							break;
						case "alert":
							?>
							<div id="msgalert">
							<?php
							break;
						case "information":
							?>
							<div id="msginfo">
							<?php
							break;
					}
					echo $this->specifiedMsg;
					?>
					</div>
					<?php
				}
				?>	

			
				<div id="navcontainer">
					<ul class="navlist">
						<li><a href="#">Seguindo</a>
							<ul class="subnavlist">
								<li><a href="#"><img src="templates/theme/image/teste.png"></a></li>
								<li><a href="#"><img src="templates/theme/image/teste.png"></a></li>
								<li><a href="#"><img src="templates/theme/image/teste.png"></a></li>
								<li><a href="#"><img src="templates/theme/image/teste.png"></a></li>
								<li><a href="#"><img src="templates/theme/image/teste.png"></a></li>
								<li><a href="#"><img src="templates/theme/image/teste.png"></a></li>
								<li><a href="#"><img src="templates/theme/image/teste.png"></a></li>
							</ul>
						</li>
						
						<li><a href="#">Seguido por</a>
							<ul class="subnavlist">
								<li><a href="#"><img src="templates/theme/image/teste.png"></a></li>
								<li><a href="#"><img src="templates/theme/image/teste.png"></a></li>
								<li><a href="#"><img src="templates/theme/image/teste.png"></a></li>
							</ul>
						</li>
						
						<li><a href="#">Mensagens</a></li>
					</ul>
				</div>

			</div>
		&nbsp;
			<div id="bordertop">&nbsp;</div>
			
			<?php 
				if($controller->activeUser->alias == $controller->visualisedUser->alias)
					$twittMsgs = $controller->twitt->showAllMessage();
				else
					$twittMsgs = $controller->twitt->showMessage(); ?>			
			
			<div id="content">
					<?php
					if ($twittMsgs != null)
					{
					foreach($twittMsgs as $msgInstance)
					{
					?>
						<div class="msg">
							<div class="msg_alias"><?php echo $msgInstance->getUser()->alias; ?></div>
							<div class="msg_content"><?php echo $msgInstance->text;?></div>
							<div class="msg_user">
								<img src="<?php echo $msgInstance->getUser()->returnAvatar; ?>"/>
							</div>
						</div>
						<hr>
					<?php
					}
					}
					else
					{
					?>
					Não a Mensagens a exibir.
					<?php
					}
					?>
			</div>
			
			<div id="borderbottom">&nbsp;</div>
		
		</div>
		
		<div id="bottom">
			<p>Bottom</p>
		</div>
