 <!-- Masthead-->
 <header class="masthead">

     <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
         <div class="d-flex justify-content-center">
             <div class="text-center">
             <?php if (strpos(current_url(), 'home')): ?>
                 <h1 class="mx-auto my-0">Portfolio</h1>
                 <h2 class="text-white-50 mx-auto mt-2 mb-5">Bienvenue sur le Portfolio de Romain Bouis</h2>
                 <a class="btn btn-primary" href="#about">Qui suis-je ?</a>
                 <?php endif ?>

                 <?php if (strpos(current_url(), 'signin')): ?>
                    <h1 class="mx-auto my-0">Formulaire de connexion</h1>
                <?php endif ?>

                <?php if (strpos(current_url(), 'dashboard')): ?>
                    <h1 class="mx-auto my-0">Tableau de bord</h1>
                <?php endif ?>
             </div>
         </div>
     </div>
 </header>