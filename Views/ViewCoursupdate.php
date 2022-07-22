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
        <h4>Modifiez vos cours ici.</h4>
        <hr class="light">
      </div></div></div>
    <div class="box">

      <form method="post" enctype="multipart/form-data">
        
          
            
        <?php foreach ($cours as $rowcours ): ?>
          
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Nom du cours:</label>
            <input type="text" class="form-control" name="nom_cours" id="formGroupExampleInput2" placeholder="<?= $nom_cours=$rowcours->nom_cours(); ?>">
          </div>
        <?php endforeach; ?>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Titre du contenu:</label>
          <input type="text" class="form-control" name="titre_contenu" id="formGroupExampleInput" placeholder="<?= $titre_contenu=$contenu[0]->titre_contenu(); ?>">
        </div>
        
          
            <input class="btn btn-primary " type="submit" name="update" value="Modifier">
            <?php foreach($cours as $rowcours){

$res=$rowcours->code_cours(); 
echo'
<a href="index.php?url=Courscontent&vcodecours='.$res.'"><button type="button" class="btn btn-primary">Retour</button></a>';
} ?>
          
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