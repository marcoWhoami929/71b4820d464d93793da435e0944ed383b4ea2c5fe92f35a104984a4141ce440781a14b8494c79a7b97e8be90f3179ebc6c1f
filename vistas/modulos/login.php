<div class="container" id="contenedorLogin">
<img class="wave" src="vistas/img/login/wave.png">
  <div class="container">
    <div class="img">
      <img src="vistas/img/login/bg.svg">
    </div>
    <div class="login-content">
      <form method="POST">
        <img src="vistas/img/login/logo.png">
        <h2 class="title">CRM</h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Correo</h5>
                    <input type="email" class="input" name="ingEmail" required>
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Contraseña</h5>
                    <input type="password" class="input" name="ingPassword" required>
                 </div>
              </div>
              
              <input type="submit" class="btn" value="Acceder">

              <?php

                $login = new ControladorAdministradores();
                $login -> ctrIngresoAdministrador();

              ?>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
  const inputs = document.querySelectorAll(".input");

console.log(inputs);
function addcl(){
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

function remcl(){
  let parent = this.parentNode.parentNode;
  if(this.value == ""){
    parent.classList.remove("focus");
  }
}


inputs.forEach(input => {
  input.addEventListener("focus", addcl);
  input.addEventListener("blur", remcl);
});

</script>