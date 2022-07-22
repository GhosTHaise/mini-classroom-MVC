
<?php $this->_t = "Admin" ?>
<div class="mt-5" id="Account-content">
<br>
<h2 style="text-transform: uppercase;" class="mt-5 text-center">Liste de tous les Comptes</h2>
<div class="container w-50">
<form class="d-flex">
        <input id="search-count" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button id="search-button" class="btn btn-outline-primary" type="submit">Search</button>
</form>
</div>
<div class="container  mt-5 ">
    <div class="row">
    <table class="table-hover text-center" style="margin-left: 41px;">
    <tr class="" style="color:white;background:#4d94ff;box-shadow: 1px 1px 2px white;height:61px" class="pt-4">
        <th>ID</th>
        <th>Username</th>
        <th>Statut</th>
        <th>Email</th>
        <th>Classe</th>
        <th>Action</th>
    </tr>
    <?php foreach($account as $row): ?>
        <tr  style="transform:translateY(41px);" class="my-2">
        <td ><?= $row->id(); ?></td>
        <td ><?= $row->username(); ?></td>
        <td ><?= $row->statut(); ?></td>
        <td ><?= $row->email(); ?></td>     
        <td><?= $row->niveau(); ?></td>  
        <?php if($row->niveau() != 'All'): ?>
        <td><a style="opacity: .75;color:white" class="mb-1 btn btn-warning" id="modifRequestXML" href="admin&modfid=<?= $row->id(); ?>">Modifier</a>  <a style="opacity:.75" class="ml-2 mb-1 btn btn-primary" href="admin&supprid=<?= $row->id() ;?> ">Supprimer</a></td>
        <?php else: ?>
        <td></td>
        <?php endif; ?>    
    </tr> 
    <?php endforeach; ?>
</table>
    </div>
</div>
</div>
<script>
    window.addEventListener('load',function(){
        var Account_content = document.getElementById("Account-content");
        var btn_search  = document.querySelector('#search-button');
        btn_search.addEventListener('click',function(event){
            event.preventDefault();
            var replace = document.querySelector('#content')
            var search_value = document.getElementById('search-count').value;
            var HTTPRequest = new XMLHttpRequest();
            var Account_content = document.getElementById("Account-content");
                        HTTPRequest.onreadystatechange = function(){
                            if(HTTPRequest.readyState == 4){
                                Account_content.innerHTML= HTTPRequest.responseText;
                            }else{
                                Account_content.innerHTML = "<div style='margin-top:251px' class='container-fluid'><div class='mt-5 row justify-content-center'><div class='mt-4 spinner-border text-primary'></div></div></div>"
                            }
                        }
                        HTTPRequest.open('GET','index.php?url=admin&search='+search_value,true);
                        HTTPRequest.send();
                    })
        })  
</script>
