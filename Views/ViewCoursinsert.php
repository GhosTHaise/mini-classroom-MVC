<?php $this->_t = 'Cours';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Views/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
  </head>
  <body>
  <div class="container-fluid">
    <div class="row jumbotron">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
        <h4>Ajoutez vos cours ici.</h4>
        <hr class="light">
      </div></div></div>
    <div class="box">

      <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Code cours:</label>
              <input type="number" class="form-control" name="code_cours" id="formGroupExampleInput" placeholder="">
            </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2"  class="form-label">Nom du cours:</label>
          <input type="text" class="form-control" name="nom_cours" id="formGroupExampleInput2" placeholder="">
        </div>
        <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Titre du contenu:</label>
              <input type="text" class="form-control" name="titre_contenu" id="formGroupExampleInput" placeholder="">
            </div>
          <div class="mb-3">

            <label for="formFileMultiple" class="form-label">Emplacement:</label>
              <input type="file" class="form-control" name="emplacement[]" id="formFileMultiple" accept="image/*, .pdf, .docx" multiple/>
          </div>
          
          
          <div class="p-inline"><input class="btn btn-primary" type="submit" name="ajout" value="Ajouter"></div>
          <a href="index.php?url=Cours"><div class="p-inline"><input class="btn btn-primary" type="button" value="Retour"></div></a>
            
          
        
      </form>
    </div>
  </body>
</html>
<style>
  body {
  color: #222;
}
.box {
  margin-right: 20px;
  margin-left: 30px;
}
.p-2 {
  margin-top: 10px;
  margin-bottom: 10px;
}
a {
  text-decoration: none;
}
.content {
  margin-left: 20px;
  margin-right: 10px;
}
.jumbotron {
  padding: 1rem;
}
.padding {
  padding-bottom: 2rem;
}
.col-md-4 {
  margin-bottom: 10px;
}
.welcome {
  margin: 0 auto;
}
.welcome hr {
  border-top: 2px solid #b4b4b4;
  width: 95%;
  margin-left: 2%;
}
.lead {
  color: #00aced;
}
label {
  color: #00aced;
}
.form-control {
  outline: none;
}
.mb-3 {
  margin-right: 200px;
}
.p-inline {
  display: inline;
}
</style>
