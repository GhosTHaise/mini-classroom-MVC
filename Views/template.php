<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="Views/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="Views/js/script.js" defer></script>
    <script src="Views/js/jquery-3.4.1.min.js" defer></script>
    <title><?= $t ?></title>
</head>
<body>
    <!---Navbar-->
    <nav style="box-shadow:1px 1px 9px 	#a6a6a6" class="navbar navbar-expand-lg navbar-dark bg-light fixed-top">
  <div class="container-fluid">
  <div class="logonav mx-4">
        <a style="text-decoration:none;" href="<?= URL ?>"><video width="85px" height="60px" class="logonavContent" src="Views/Design/S.mp4" autoplay loop></video></div> 
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon link-dark"></span>
    </button>
    <div class="collapse navbar-collapse mx-4" id="navbarScroll">
      <ul class="navbar-nav me-auto  my-2 my-lg-0 navbar-nav-scroll m-4" style="--bs-scroll-height: 100px;">
        <li class="nav-item accesmenu">
          <a class="nav-link text-dark" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item accesmenu">
          <a class="nav-link text-dark" href="#">About Us</a>
        </li>
        <li class="nav-item accesmenu">
          <a class="nav-link text-dark" href="Etudiant">School</a>
        </li>
        <li class="nav-item accesmenu">
          <a class="nav-link text-dark" href="#">Teacher</a>
        </li>
        <li class="nav-item accesmenu">
          <a class="nav-link text-dark" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
      <?php 
      if(isset($_SESSION['Auth'])){
        echo"<a class='link-dark m-3' style='text-decoration:none;float: right;' href=".URL."login&logout_var=Deconnection>Log out</a>";
      }else{
          echo "<a class='link-dark mt-3 mb-3 ml-3' style='padding-right:1rem;border-right:1px solid black;text-decoration:none;float: right;margin-left:21px' href=".URL."login>Logging</a>";
          echo "<a class='link-dark mt-3 ml-3 mb-3' style='text-decoration:none;float: right;margin-left:21px' href=".URL."Crtaccount>Signup</a>";
      }
    ?>  
    </div>
  </div>
</nav>

<?= $content ?>
</body>
</html>

<script>
  window.addEventListener('load',function(){
    var resetValue = document.querySelectorAll('.form-group')
    for(var i = 0;i<resetValue.length;i++){
        resetValue[i].placeholder = '';
    }
    $(function() {
	'use strict';
	
  $('.form-control').on('input', function() {
	  var $field = $(this).closest('.form-group');
	  if (this.value != '') {  
	    $field.addClass('field--not-empty');
	  } else {
	    $field.removeClass('field--not-empty');
	  }
	});

});
  })
</script>
