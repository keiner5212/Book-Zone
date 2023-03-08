<div class=formBox>
    <form action="index.php?c=Client&a=singInClient" method="POST" id="form" class="formReg">
        <p class="formError" id="formError">Las contraseñas no coinciden.</p>
        <h2 class="formTitle">Registro de Usuario</h2>
        <div class="parent">
            <div class="formGroup">
                <input type="text" name="userDNI" id="userDNI" class="formInput" placeholder=" " required>
                <label for="userDNI" class="formLabel">DNI:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="text" name="userDiretion" id="userDiretion" class="formInput" placeholder=" " required>
                <label for="userDirection" class="formLabel">Dirección:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="text" name="userMail" id="userMail" class="formInput" placeholder=" " required>
                <label for="userMail" class="formLabel">Correo electrónico:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="text" name="formNumber" id="formNumber" class="formInput" placeholder=" " required>
                <label for="formNumber" class="formLabel">Nº:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="text" name="userName" id="userName" class="formInput" placeholder=" " required>
                <label for="userName" class="formLabel">Nombre:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="password" name="userPass" id="userPass" class="formInput" placeholder=" " required oninput="return samePass()">
                <label for="userPass" class="formLabel">Contraseña:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="text" name="userLastName" id="userLastName" class="formInput" placeholder=" " required>
                <label for="userLastName" class="formLabel">Apellidos:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <input type="password" name="userRepeatPass" id="userRepeatPass" class="formInput" placeholder=" " required oninput="return samePass()">
                <label for="userRepeatPass" class="formLabel">Repite la contraseña:</label>
                <span class="formLine"></span>
            </div>
        </div>
        <input type="checkbox" name="formConditions" id="formConditions" required> Estoy de acuerdo con los <a href="/T&C.pdf" target="_blank">Terminos y Condiciones</a>
        <input type="submit" value="Registrar" class="formSumbit">
        <p class="formParagraph">¿Ya tienes cuenta? <a href="index.php?c=Client&a=loginClient&t=Inicia%20sesion" class="formLink">Entra aquí</a></p>
    </form>
</div>