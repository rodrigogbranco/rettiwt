			<?php //Variavel $this é uma instancia de AnonimousView// ?>
			
		<div id="top">
			<p>top</p>
		</div>
	
		<div id="container">
		
			<div id="welcome">
				<?php if($controller->activeUser)
				{?>
					<p>Olá, <?php echo $this->user->alias; ?></p>
				<?php 
				}else
				{
				?>
					<p><?php echo $this->user->alias; ?> está no Rettwit. Você está? Faça parte agora!</p>
				<?php
				}
				?>
			
				<div id="navcontainer">
					<ul class="navlist">
						<li><a href="#">Seguindo</a>
							<ul class="subnavlist">
								<li><a href="#"> >> Subitem one</a></li>
								<li><a href="#"> >> Subitem two</a></li>
								<li><a href="#"> >> Subitem three</a></li>
								<li><a href="#"> >> Subitem four</a></li>
							</ul>
						</li>
						
						<li><a href="#">Seguido por</a>
							<ul class="subnavlist">
								<li><a href="#"> >> 1</a></li>
								<li><a href="#"> >> 2</a></li>
								<li><a href="#"> >> 3</a></li>
								<li><a href="#"> >> 4</a></li>
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