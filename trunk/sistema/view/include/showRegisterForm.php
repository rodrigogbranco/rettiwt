		<div id="newcadastro" >
			<p>Informe seus Dados:</p>
			<form action="index.php" method="POST">
				<table>
					<tr>
						<td>Email:</td><td><input type="text" name="email"></td>
					</tr>
					<tr>
						<td>Alias:</td><td><input type="text" name="alias"></td>
					</tr>
					<tr>
						<td>Senha:</td><td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td>Confirme a senha:</td><td><input type="password" name="confirm"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Cadastrar"></td>
					</tr>
					<input type="hidden" name="validarcadastro" value="validarcadastro">
				</table>
				
			</form>
			
			<?php if($this->specifiedMsg != "")
			{?>
				<div id="fail">
					<?php echo $this->specifiedMsg; ?>
				</div>
			<?php 
			} 
			?>
		</div>