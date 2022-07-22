<?php $this->_t = "Sign up !" ?>
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 contents pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h1 class="text-center">Create your Account</h1>
            </div>
            <form action="index.php?url=crtaccount" method="post" enctype="multipart/form-data">
                <div class="form-group first mb-4">
                <label class="mb-2" for="username">Username :</label>
                <input name="Username" value="" type="text" class="form-control" id="username">
              </div>
              <div class="form-group last mb-4">
                <label class="mb-2" for="email">Email :</label>
                <input name="Email" value="" type="password" class="form-control" id="password">                
              </div>
              <div class="container ">
                  <div class="row justify-content-center">
                      <div class="col-12 col-md-6">
                        <div class="form-group last mb-6">
                          <label class="mb-2" for="password">Password :</label>
                          <input name="Password" type="text" class="form-control" id="password">                
                        </div>
             
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group last mb-5">
                            <label class="mb-2" for="password">Confirm Password :</label>
                            <input name="ConfirmPassword" type="text" class="form-control" id="password">                
                        </div>
                      </div>
                      
                  </div>
              </div>
              <div class="container mb-4">
                  <div class="row justify-content-center">
                      <div class="col-12 col-md-5">
                      
                      <select name="Classe" style="font-size: 12px;" class="form-select form-select-ms mb-3" aria-label=".form-select-lg example">
                      <?php 
                        foreach($ClasseAvailable as $row){
                             echo "<option value=".$row->id_classe().">".$row->niveau()."</option>";
                        }
        ?>
                                  </select>
             
                      </div>
                      <div class="col-12 col-md-5">
                      <select name="Status" style="font-size: 12px;" class="form-select form-select-ms mb-3" aria-label=".form-select-lg example">
                            <option value="b59c67bf196a4758191e42f76670ceba">Etudiant</option>
                            <option value="934b535800b1cba8f96a5d72f72f1611">Professeur</option>
                      </select>
                      </div>
                      
                  </div>
              </div>
              <div class="form-group field--not-empty last mb-4">
                    <label for="formFileMultiple" class="form-label ">Picture :</label>
                    <input name="Photo_Profil" style="color: #5252d0;background:tranparent" class="form-control" type="file" id="formFileMultiple" multiple>               
              </div>
              <button type="submit" class="btn btn-outline-primary w-100">Sign Up</button>
            </form>
            </div>
          </div>

        </div>
        <div class="col-md-6 ">
        <img style="padding-top: 4px;" src="Views/Design/crtaccount.png" alt="Image" class="img-fluid">
          
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