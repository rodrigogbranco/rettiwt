		<div id="login" >
			<form action="index.php" method="POST">
				<table>
					<tr>
						<td>email:</td>
					</tr>
					<tr>
						<td><input type="text" name="email"></td>
					</tr>
					<tr>
						<td>senha:</td>
					</tr>
					<tr>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td><input type="submit" value="entrar"></td>
					</tr>
				</table>
				
			</form>
			
			<?php if($this->specifiedMsgError != "")
			{?>
				<div id="fail">
					<?php echo $this->specifiedMsgError; ?>
				</div>
			<?php 
			} 
			?>
		</div>
		<div id="divcad">
			<p id="testee">Não é cadastrado?</p>
			<form method="post" action="index.php">
				<input type="submit" value="Cadastre agora!">
				<input type="hidden" name="cadastro" value="newcadastro">
			</form>
		</div>