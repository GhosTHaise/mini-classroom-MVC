<form style="margin-top:121px" action="Admin&modfid=<?= $_GET['modfid'] ?>" method="post">
   <div  class="container mt-5">
       <div class="row mt-5">
       <div class="form-group first mb-4">
                <label class="mb-2" for="username">Username :</label>
                <input class="form-control" value="<?= $OnlyAccount[0]->username() ?>" type="text" name="Musername" id="Musername">
        </div>
        <div class="form-group first mb-4">
                <label class="mb-2" for="username">Password :</label>
                <input class="form-control" value="<?= $OnlyAccount[0]->password() ?>" type="text" name="MPassword" id="Mpassword">
        </div>
        <div class="form-group first mb-4">
                <label class="mb-2" for="username">Email :</label>
                <input class="form-control" value="<?= $OnlyAccount[0]->email() ?>" type="email" name="Memail" id="Memail">
        </div>
            <div class="col-12 col-md-6">
                      <select name="Mstatut" style="font-size: 12px;" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                      <option value="1111">Etudiant</option>
                        <option value="2222">Professeur</option>  
                        <option value="7381">Admin</option> 
                      </select>
                      </div>
            <div class="col-12 col-md-6">
                      <select name="Mclasse" style="font-size: 12px;" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <?php 
                            foreach($ClasseAvailable as $row){
                                echo "<option value=".$row->id_classe().">".$row->niveau()."</option>";
                            }
                        ?>
                      </select>
                      </div>
                <div class="col-12 col-md-4 mt-4">
                    <button   class="btn btn-danger" style="padding:11px 21px;" type="submit">Modifier</button>
                    <button id="redirectmodif" class="btn btn-primary" style="padding:11px 21px;">Terminer</button>
                </div>
       </div>
   </div>  
</form>
<script>
    window.addEventListener("load",function(){
        var button = document.getElementById('redirectmodif');
        button.addEventListener('click',function(event){
            event.preventDefault();
            window.location.href="admin";
        })
    })
</script>
<?php if(isset($message)): ?>
   <?php foreach($message as $error): ?>
   <div style="margin: 0;position:fixed;bottom:0;right:0" class=" text-center alert alert-danger alert-dismissible">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> <?= $error ?>
</div>
   <?php endforeach; ?>
<?php endif; ?>
