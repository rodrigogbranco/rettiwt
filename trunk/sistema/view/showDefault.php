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
					Mensagens de erro:<br>
					<?php
						echo $this->specifiedMsgError;
					?>
					</strong>
				</div>
			</div>
			<div class="rodape">
				Rodapé
			</div>