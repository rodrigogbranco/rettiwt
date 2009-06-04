  <div id="divBase">

            <div id="imageBack"><!--IMAGEM BACK VAI AQUI--></div>

            <div id="divcad">
                <form method="post" action="index.php">
                    <div id="signUp">Não é cadastrado?</div>
                    <input type="submit" value="Cadastre agora!">
                    <input type="hidden" name="cadastro" value="newcadastro">
                </form>
            </div>

            <div id="login" >
                <form action="index.php" method="POST">
                    <div id="loginRegion">
                        e-mail: <input type="text" name="email">
                    </div>
                    <div id="passRegion">
                        senha: <input type="password" name="password">
                    </div>
                    <div id="submitRegion">
                        <input type="submit" value="Entrar">
                    </div>
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
        </div>
