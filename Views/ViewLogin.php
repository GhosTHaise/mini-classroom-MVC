<?php 
    $this->_t = "Acceuil";
?>
<div style="margin-top: 91px;padding:0" class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <img src="Views/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents pt-5 mb-5">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h1 style="text-align: center;">Sign In</h1>
            </div>
            <form action="index.php?url=login" method="post">
                <div class="form-group first mb-4">
                <label class="" for="username">Username :</label>
                <input name="username" type="text" class="form-control" id="username">
              </div>
              <div class="form-group last mb-4">
                <label class="" for="password">Password :</label>
                <input name="password" type="text" class="form-control" id="password">                
              </div>
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">I agree to the <b>terms of User</b></span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span style="margin-left: auto;" class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>
              <button type="submit" class="btn btn-outline-primary w-100">Log In</button>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
    <?php if(isset($message)): ?>
   <?php foreach($message as $error): ?>
   <div style="margin: 0;" class=" text-center alert alert-danger alert-dismissible">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> <?= $error ?>
</div>
   <?php endforeach; ?>
<?php endif; ?>