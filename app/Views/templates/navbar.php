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


                        <?php if (strpos(current_url(), 'home')): ?>
                            <li class="nav-item"><a class="nav-link" href="#about">À propos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#projects">Projets</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Contactez-moi</a></li>
                        <?php endif ?>

                        <?php if (!strpos(current_url(), 'home')): ?>
                            <li class="nav-item"><?php echo anchor('home', 'Accueil', 'class="nav-link"') ?></li>
                            <?php endif ?>
                        <?php if (session()->get('isLoggedIn')): ?>

                            <li class="nav-item"><?php echo anchor('user/signout', 'Déconnexion', 'class="nav-link"') ?></li>

                            <!-- Page épreuve E4 à faire + Méthode -->
                            <?php if (!strpos(current_url(), 'epreuve_e4')): ?>
                            <li class="nav-item"><?php echo anchor('user/e4', 'Épreuve E4', 'class="nav-link"') ?></li>
                            <?php endif ?>
                                <!-- <p>Afficher la navbar du tableau de bord admin</p> -->
                                <?php if (session()->get('role') == 999): ?>
                                    <?php if(strpos(current_url(), 'dashboard')): ?>
                                        <li class="nav-item"><a class="nav-link" href="#messages">Messages</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#projects">Projets</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#skills">Compétences</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#productions">Productions</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#files">Fichiers</a></li>
                                    <?php endif ?>
                                        
                                    <?php if(!strpos(current_url(), 'dashboard')): ?>
                                        <li class="nav-item"><?php echo anchor('dashboard', 'Tableau de bord', 'class="nav-link"') ?></li>
                                    <?php endif ?>
                                <?php endif ?>

                        <?php endif ?>
                        <!-- Page s'identifier -->
                    <?php if (strpos(current_url(), 'signin')): ?>
                        <li class="nav-item"><a class="nav-link" href="#signin">S'indentifier</a></li>  
                    <?php endif ?>
                            
                    </ul>
                </div>
            </div>
        </nav>