			<?php //Variavel $this é uma instancia de AnonimousView// ?>
			
		<div id="top">
		
		</div>
	
		<div id="container">
		
			<div id="welcome">			
				<?php if($controller->activeSession)
				{?>
					<div id="menu">
						<form method="get" action="index.php">
							<input class="button" type="submit" value="Home"> |
							<input type="hidden" name="alias" value="<?php echo $controller->activeUser->alias; ?>">
							<input class="button" type="submit" name="logout" value="Sair">
						</form> 
					</div>
				<?php 
				}else
				{
				?>
					<div id="nouser">
                    <?php echo $this->user->alias; ?> está no Rettwit. Você está? Faça parte agora!
					  <form method="post" action="index.php">
                        <input type="submit" value="Cadastre agora!">
                        <input type="hidden" name="cadastro" value="newcadastro">
                    </form>
                    </div>
				<?php
				}
				?>
				<div id="informacoes">
				
                    <?php echo $this->user->returnAvatar(); ?>
					<strong><?php echo $this->user->alias; ?></strong>
				
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

				<?php if($this->type != "error")
				{
				?>
				<div id="navcontainer">
					<ul class="navlist">
						<li><a href="#">Seguindo</a>
							<ul class="subnavlist">
								<form method="get" action="index">
								<?php
									$seguindo = $controller->follow->showFollowed();
									if ($seguindo != null)
									{
										?>
										<form method="get" action="index.php">
										<?php
										foreach($seguindo as $seg)
										{
											?>
											<li>
											<input type="submit" name="alias" class="button" 
											value="<?php echo $seg->alias; ?>" 
											src="<?php echo $seg->getUser()->returnAvatarAddress(); ?>"></li>
											<?php
              						}
              						?>
              						</form>
              						<?php
									}
									else
									{
									?>
									<li>Você não está seguindo ninguém</li>
									<?php
									}
									?>
								</form>
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
							<div class="msg_alias">
								<form method="get" action="index.php">
									<?php 
										if ($msgInstance->reply != null)
											echo "#";
									?>
									<input class="button" type="submit" name="alias" 
										value="
										<?php echo $msgInstance->getUser()->alias; ?>">
								<?php
									if($msgInstance->reply != null)
											echo "para ".$controller->twitt->returnUser($msgInstance->reply)->alias;
								?>	
								</form>						
							</div>
							<div class="msg_content"><?php echo $msgInstance->text;?></div>
							<div class="msg_user">
                                  <?php echo $msgInstance->getUser()->returnAvatar(); ?>
                            </div>
							<div class="msg_hour">
								<em>Mensagem enviada em <?php echo $msgInstance->date; ?>
									às <?php echo $msgInstance->time; ?></em>
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
		<?php
		}
		?>
			<div id="borderbottom">&nbsp;</div>
			Rodapé
		</div>
