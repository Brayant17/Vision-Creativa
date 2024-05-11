<?php include_once './src/layouts/login/header.php' ?>
    <main>

        <div class="contenedor__todo">

            <div class="caja__gen">
                <div class="caja__login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar</p>
                    <button id="btn__iniciar-sesion">Inicia sesion</button>
                </div>
                <div class="caja__registro">
                    <h3>¿Aun no tienes cuenta?</h3>
                    <p>Registrate para que puedas iniciar sesion</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>
            <!--Division-->
            <div class="contenedor__login-registro">
                <form action="./resources/php/login.php" method="POST" class="formulario__login">
                    <h2>Inicia sesion</h2>
                    <input type="text" placeholder="Correo electronico" name="email">
                    <input type="password" placeholder="Contraseña" name="password">
                    <button name="login">Entrar</button>
                </form>
                <form action="./resources/php/login.php" method="POST" class="formulario__registro">
                    <h2>Registrate</h2>
                    <input type="text" placeholder="Nombre" name="nombre">
                    <input type="text" placeholder="Apellido" name="apellido">
                    <input type="number" placeholder="Numero" name="numero">
                    <input type="text" placeholder="Direccion" name="direccion">
                    <input type="text" placeholder="Correo electronico" name="email">                
                    <input type="password" placeholder="Contraseña" name="password">
                    <button name="register">Registrarse</button>
                </form>
            </div>
        </div>
    </main>
<?php include_once './src/layouts/footer.php' ?>