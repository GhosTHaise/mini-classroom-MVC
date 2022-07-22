<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fff"> 
    <title>Study2Learn</title>
    <link rel="stylesheet" href="Views/style/loading.css">
    <link rel="stylesheet" href="Views/style/loading.css.map">
</head>
<body>
    <div id="wrapper" class="wrapper">
        <div class="box-wrap">
            <div class="box one"></div>
            <div class="box two"></div>
            <div class="box three"></div>
            <div class="box four"></div>
            <div class="box five"></div>
            <div class="box six"></div>
        </div>
    </div>
    <h4 class="GhosT">Powered by GhosT.</h4>
    <script>
        var reference = document.getElementById('wrapper');

        window.addEventListener("load",function(){
            setTimeout(function(){
                //changement de page dynamique
        var responseRequest = document.querySelector('body');
        
        var HTTPRequest = new XMLHttpRequest() ;
        HTTPRequest.onreadystatechange = function(){
            if(HTTPRequest.readyState === 4){
                
                if(HTTPRequest.status === 200){
                    window.location.href = 'login' ;
                    
                }
            }else{
                console.log("Requete en cours de chargement");
            }
            //var data = new FormData();
            //data.append('url','acceuil');
            
        }
        HTTPRequest.open('GET','index.php?url=login',true);
        //HTTPRequest.setRequestHeader("content-type","application/x-www-form-urlencoded");
        HTTPRequest.send();
            },5000);
        })
        
    </script>
</body>
</html>