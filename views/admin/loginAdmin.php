<?php

echo '
<div class=formBox>
<form action="index.php?controller=Admin&action=loginAuth" method="POST" id="form" class="form">
    <p class="formError" id="formError">Acceso inválido. Inténtelo otra vez.</p>
    <h2 class="formTitle">Inicio administrador</h2>
    <p class="formParagraph">¿No eres administrador? <a href="index.php" class="formLink">Entra aquí</a></p>
    
    <div class="formContainer">
    <div class="formGroup">
    <input type="text" name="admin" id="userName" class="formInput" placeholder=" " required>
    <label for="userName" class="formLabel">Usuario:</label>
    <span class="formLine"></span>
</div>
<div class="formGroup">
    <input type="password" name="password" id="userPass" class="formInput" placeholder=" " required>
    <label for="userPass" class="formLabel">Contraseña:</label>
    <span class="formLine"></span>
</div>

<input type="submit" value="Acceder" class="formSumbit">
</div>
</form>
<div>';




if ($_GET && isset($_GET['log']) && $_GET['log'] == 'false') {

    echo "<script>invalidSession()</script>";
}
?>