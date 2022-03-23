<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Romain Bouis</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                    
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">

                // Barre de naviguation à faire
                    <?php if (strpos(current_url(), '') OR strpos(current_url(), 'home/index') && (session()->get('isLoggedIn') == true)): ?>
                        <li class="nav-item"><a class="nav-link" href="#about">À propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">Projets</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contactez-moi</a></li>
                        <?php endif ?>
                        <?php if (session()->get('isLoggedIn')): ?>

                            <li class="nav-item"><?php echo anchor('user/signout', 'Déconnexion', 'class="nav-link"') ?></li>

                                <?php if (session()->get('role') == 999): ?>

                                    <!-- <p>Afficher la navbar du tableau de bord admin</p> -->

                                <?php endif ?>

                        <?php endif ?>
                    <?php if (strpos(current_url(), 'user/singin')): ?>
                        <li class="nav-item"><a class="nav-link" href="#signin">S'indentifier</a></li>
                        <li class="nav-item"><?php echo anchor('home/index', 'Retour à la page d\'accueil', 'class="nav-link"') ?></li>
                        
                    <?php endif ?>
                            
                    </ul>
                </div>
            </div>
        </nav>