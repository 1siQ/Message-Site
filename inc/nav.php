
<nav style="background-color:#92A9BD;" class="navbar navbar-light ">
    <div class="container-fluid">
      <a class="navbar-brand text-light ms-lg- 5">Message</a>
      <div class="d-<?=$btn?> me-lg-5">
        <a class="btn btn-success"  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Giriş Yap</a>
        <a class="btn btn-danger ms-2" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register">Kayıt ol</a>
      </div>
      <div class="d-<?=$name?> me-lg-5">
        <a class="btn btn-primary"  type="button" class="btn btn-primary" href="?logout"><?=$name?></a>
      </div>

    </div>
</nav>
  
<!-- The Login  -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0" style="background-color:#7C99AC;">

      <!-- Login Header -->
      <div class="modal-header border-0 ">
        <h4 class="modal-title text-light">Giriş Yap</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Login body -->
      <div  class="modal-body">
        <form action="" method="post">
          <div class="form-floating mb-3 mt-3">
            <input style="background-color:#cad8e0;" type="text" class="form-control  " id="name" name="name">
            <label for="name">İsim</label>
          </div>
            <div id="log"></div>
          <div class="form-floating mt-3 mb-3">
            <input style="background-color:#cad8e0;" type="password" class="form-control" id="pass" name="pass">
            <label for="pass">Şifre</label>
          </div>
          <div class="form-check">
            <input  class="form-check-input" type="checkbox" id="check1" name="check" value="hatırla">
            <label class="form-check-label">Beni Hatırla</label>
          </div>
        
      </div>

      <!-- Login footer -->
      <div class="modal-footer border-0">
        <button name="login" type="submit" class="btn btn-success">Giriş Yap</button>
      </div>
      </form> 
    </div>
  </div>
</div>
<!-- The Login  -->

<!------------------------------------------------------------------->

<!-- The register  -->
<div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content " style="background-color:#7C99AC;">

      <!-- register Header -->
      <div class="modal-header border-0">
        <h4 class="modal-title text-light">Kayıt Ol</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- register body -->
      <div  class="modal-body ">
        <form action="" method="post">
            <div class="form-floating mb-3 mt-3">
              <input style="background-color:#cad8e0;" type="text" class="form-control  " id="name" placeholder="Enter email" name="name">
              <label for="name">İsim</label>
            </div>

            <div class="form-floating mt-3 mb-3">
              <input style="background-color:#cad8e0;" type="password" class="form-control  " id="pass" placeholder="Enter password" name="pass">
              <label for="pass">Şifre</label>
            </div>
            <div class="form-floating mt-3 mb-3">
              <input style="background-color:#cad8e0;" type="password" class="form-control  " id="pass" placeholder="Enter password" name="pass_again">
              <label for="pass">Şifre Tekrar</label>
            </div>
            <div class="form-check">
              <input  class="form-check-input" required type="checkbox" id="check1" name="option1" value="hatırla">
              <label class="form-check-label ">Sözleşmeyi Kabul Ediyorum</label>
            </div>
          
      </div>

      <!-- register footer -->
      <div class="modal-footer border-0">
        <button name="register" type="submit" class="btn btn-success">Kayıt Ol</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- The register  -->
