<html lang="en">
    <script type="text/javascript">
        
        
        window.onload = function () {
        document.formulario.nombre.focus();
        document.formulario.addEventListener('submit',formulario);
            }
        
        function formulario(f) {
            
            var username = document.getElementById("username").value;
            var password1 = document.getElementById("password1").value;
            var password2 = document.getElementById("password2").value;

            if (username == null) {
                alert('El nombre esta vacío');
                f.username.focus();
                return false;
            }
            if (password1 != password2) {
                alert('Las contraseñas no coinciden');
                f.password1.focus();
                f.password2.focus();
                return false;
            }

    </script>
    <head>
        <title>Registrarse</title>

        <meta charset = "utf-8">
    </head>

    <body>

        <h1>Registrar nuevo Usuario</h1>
        <hr />

        <form name="formulario" onsubmit="return formulario(this)" action="alta.php" method="post" >

            <label>Nombre Usuario:</label><br>
            <input name="username" type="text" id="username" required>
            <br><br>

            <label>Password:</label><br>
            <input name="password1" type="password" id="password1" required>
            <br><br>
            <label>Confirmar Password:</label><br>
            <input name="password2" type="password" id="password2" required>
            <br><br>

            <input type="submit" name="Submit" value="Registrar">

        </form>
        <label>Volver al Inicio</label><br>
        <a href="index.php">Inicio</a><br><br>
        <hr/>