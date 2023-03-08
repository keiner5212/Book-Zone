<?php
$_SESSION['id'] = $cliente->id; ?>
<div class=formBox>
    <form action="index.php?c=Client&a=modifyClient" method="POST" id="form" class="formReg">
        <p class="formError" id="formError">Las contraseñas no coinciden.</p>
        <h2 class="formTitle">Editar usuario</h2>
        <div class="parent">
            <div class="formGroup">
                <input type="text" name="userDNI" id="userDNI" class="formInput" value=<?php echo $cliente->dni ?> placeholder=" " readonly required>
                <label for="userDNI" class="formLabel">DNI:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="text" name="userDiretion" id="userDiretion" class="formInput" value=<?php echo $cliente->calle  ?> placeholder=" " required>
                <label for="userDirection" class="formLabel">Dirección:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="text" name="userMail" id="userMail" class="formInput" value=<?php echo $cliente->email ?> placeholder=" " required>
                <label for="userMail" class="formLabel">Correo electrónico:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="text" name="formNumber" id="formNumber" class="formInput" value=<?php echo  $cliente->numero ?> placeholder=" " required>
                <label for="formNumber" class="formLabel">Nº:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="text" name="userName" id="userName" class="formInput" value=<?php echo $cliente->nombre ?> placeholder=" " required>
                <label for="userName" class="formLabel">Nombre:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="text" name="userLastName" id="userLastName" class="formInput" value=<?php echo  $cliente->apellidos ?> placeholder=" " required>
                <label for="userLastName" class="formLabel">Apellidos:</label>
                <span class="formLine"></span>
            </div>
        </div>
        <input type="submit" value="Guardar" class="formSumbit">
    </form>
</div>