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
					<p><?php echo $this->user->alias; ?> está no Rettwit. Você está? Faça parte agora!</p>
				<?php
				}
				?>
				<div id="informacoes">
					<p>Figura    <strong><?php echo $this->user->alias; ?></strong>
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
								<li><a href="#"><img src="teste.png"></a></li>
								<li><a href="#"><img src="teste.png"></a></li>
								<li><a href="#"><img src="teste.png"></a></li>
								<li><a href="#"><img src="teste.png"></a></li>
								<li><a href="#"><img src="teste.png"></a></li>
								<li><a href="#"><img src="teste.png"></a></li>
								<li><a href="#"><img src="teste.png"></a></li>
							</ul>
						</li>
						
						<li><a href="#">Seguido por</a>
							<ul class="subnavlist">
								<li><a href="#"><img src="teste.png"></a></li>
								<li><a href="#"><img src="teste.png"></a></li>
							</ul>
						</li>
						
						<li><a href="#">Mensagens</a></li>
					</ul>
				</div>

			</div>
		&nbsp;
			<div id="bordertop">&nbsp;</div>
			
			<div id="content">
				<div class="msg">
					<div class="msg_content">texto hauhsuhaushua teste ahauahuahuahauhau</div>
					<div class="msg_user">
						<a href="#">foto</a>
					</div>
				</div>
				
				<div class="msg">
					<div class="msg_content">mensagem a ser exibida</div>
					<div class="msg_user">
						<a href="#">foto</a>
					</div>
				</div>
			</div>
			
			<div id="borderbottom">Rodapé</div>
		
		</div>
		
		<div id="bottom">
			<p>Bottom</p>
		</div>