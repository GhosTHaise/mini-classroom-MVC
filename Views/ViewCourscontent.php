<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Views/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="view">
    <div class="container-fluid">
    <div class="row jumbotron">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
      <?php  foreach($cours as $rowcours): ?>
        <h3><?= $rowcours->nom_cours(); ?></h3>
        <hr class="light">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
        <a href="index.php?url=Coursupdate&mcodecours=<?= $rowcours->code_cours() ;?>"><button type="button" class="btn btn-outline-secondary">Modifier</button></a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="content">

      <div class="container-fluid padding">
          <div class="row padding">
              <div class="col-lg-6">
            
                  <h5><?= $contenu[0]->titre_contenu(); ?></h5>
                  <?php foreach($profes as $prof): ?>
                  <p>Enseigné par <?= $prof->username();?></p>
                  <?php endforeach; ?>
              </div>
              <div class="col-lg-6">
                  <?php foreach($contenu as $rowcontenu): ?>
              <?php if($rowcontenu->emplacement()) {?>
                              
                                <a href="file_path/<?= $rowcontenu->emplacement(); ?>">
                                  <div class="p-2 bg-dark text-white"><?= $rowcontenu->emplacement(); ?></div>
                              </a>
                            
                              <a href="index.php?url=Coursretire&idfile=<?= $rowcontenu->id_contenu(); ?>"><input class="btn btn-primary" type="submit" name="retirev" value="Retirer"></a>
                              
                              <?php }?>
                              <?php endforeach; ?>
              </div>
          </div>
      </div>
  </div>

        
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