<?php 

echo '
<div class=formBox>
<form action="index.php?controller=order&action=saveOrder" method="POST" id="form" class="form">
    <p class="formError" id="formError">Acceso inválido. Inténtelo otra vez.</p>
    <h5 class="formTitle">¿Seguro que deseas hacer la compra?</h5>
    
    <div class="formContainer">
    

<input type="submit" value="Si" class="formSumbit">
<a href="index.php" class="formNo"><input type="button" value="No" class="formSumbitNo"></a>
</form>
</div>';


?>


