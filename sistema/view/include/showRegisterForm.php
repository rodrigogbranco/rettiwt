		<div id="newcadastro" >
            <div id="imageCad">
                <!--IMAGEM FUNDO-->
                <p>Informe seus Dados:</p>
                <form action="index.php" method="POST">
                    <div id="cadForm">
                        <div id="formDados">
                            <div class="formDadosAll"> Email: </div> <input type="text" name="email">
                            <div class="formDadosAll"> Alias: </div> <input type="text" name="alias">
                            <div class="formDadosAll"> Senha: </div> <input type="password" name="password">
                            <div class="formDadosAll"> Confirme a senha: </div> <input type="password" name="confirm">
                        </div>
                        <div id="formConf">
                            <input type="submit" value="Cadastrar">
                            <input type="hidden" name="validarcadastro" value="validarcadastro">
                        </div>
                    </div>

                </form>
			</div>
			<?php if($this->specifiedMsg != "")
			{?>
				<div id="fail">
					<?php echo $this->specifiedMsg; ?>
				</div>
			<?php
			}
			?>
		</div>