			<?php //Variavel $this � uma instancia de AnonimousView// ?>
			
		<div id="top">
		
		</div>
	
		<div id="container">
		
			<div id="welcome">
				<div id="menu">
					<a href="#">Home</a> | 
					<a href="#">Configura��es</a> |
					<a href="#">Ajuda</a> |
					<a href="sistema/view/include/logout.php">Sair</a>
				</div>
				
				<?php if($controller->activeUser)
				{?>
					<p>Ol�, <?php echo $this->user->alias; ?></p>
				<?php 
				}else
				{
				?>
					<p><?php echo $this->user->alias; ?> est� no Rettwit. Voc� est�? Fa�a parte agora!</p>
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
			
			<div id="borderbottom">Rodap�</div>
		
		</div>
		
		<div id="bottom">
			<p>Bottom</p>
		</div>