			<?php //Variavel $this é uma instancia de AnonimousView// ?>
			
			<div class="principal">
				<div class="criar_conta">
					<div class="criar_conta_texto">
						Algo como: <strong><?php echo $this->user->alias; ?></strong> faz parte do RETTIWT.<br>
						Faça você também
					</div>
					<div class="criar_conta_botao">
						<form method="post" action="index.php">
							<input type="hidden" name="cadastrar" value="cadastrar">
							<input type="submit" value="Criar Agora!">
						</form>
					</div>
				</div>
				<div class="quadro_principal">
					<div class="figura_alias">
						Aqui vai uma figura
					</div>
					<div class="texto_alias">
						Aqui vai o alias, ou whatever
					</div>
					<div class="first_msg">
						Aparentemente, a primeira msg é maior né?
					</div>
					<div class="others_msg">
						As outras vem pitititicas
					</div>
					<div class="pagination">
						Exibir a guia de paginação
					</div>
				</div>
				<div class="quadro_direito">
					<div class="dados_user">
						Vai fazer diferente do original?
					</div>
				</div>
				<div class="rodape">
					Rodapé
				</div>
			</div>