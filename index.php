<?php  $title = "Listes des contacts";  ?> 
<?php  $description = "Hello voici notre agenda digital et vous êtes sur la page d'accueil";  ?> 
   
   <?php
    require __DIR__ . "/partials/head.php";
    ?>

   <?php
    require __DIR__ . "/partials/nav.php";
    ?>

   <main class="container">
       <h1 class="text-center my-3 display-5">Liste des constacts</h1>
       <div class="d-flex justify-content-end align-items-center">
        <a href="create.php"class="btn btn-primary shadow"> <i class="fa-solid fa-plus"></i> Nouveau Contact</a>
       </div>
   </main>

   <?php
    require __DIR__ . "/partials/footer.php";
    ?>

   <?php
    require __DIR__ . "/partials/foot.php";
    ?>