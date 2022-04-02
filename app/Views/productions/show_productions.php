<section class="productions-section bg-light" id="projects" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">



        <h2 class="row justify-content-center text-black mb-4">Productions</h2>



        <div class="table table-responsive">

            <div class="col-sm-md-lg-xl-3">

                <table class="table table-striped table-dark">

                    <thead>

                        <tr>

                            <th scope="col">#</th>

                            <th scope="col">Nom de la production</th>

                            <th scope="col">Contenu</th>

                            <th scope="col">Nom du projet</th>

                            <th scope="col">Image d'illustration</th>

                            <th scope="col">PDF</th>

                            <th scope="col">Compétences associées</th>

                            <th scope="col">Date de création</th>

                            <th scope="col">Date de modification</th>

                            <th scope="col">Action</th>

                        </tr>

                    </thead>

                    <tbody>



                        <?php foreach ($productionList as $production) : ?>



                            <tr>

                                <th scope="row"><?= $production['id_production']; ?></td>

                                <td><?= $production['label_production']; ?></td>

                                <td><?= $production['content']; ?></td>

                                <td><?= $production['label_project']; ?></td>

                                <div class="text-center">
                                <td>
                                    <?= '<img class="img-fluid justify-content center" src="'
                                        .base_url('assets/uploads/'.$production['name_file'])
                                        .'" placeholder="'.$production['id_file_img'].'" style="height:4em;" /></td>'; 
                                    ?>
                                </div>
                                <td>
                                    <?= '<img class="img-fluid justify-content center" src="'
                                        .base_url('assets/uploads/'.$production['name_file'])
                                        .'" placeholder="'.$production['id_file_pdf'].'" style="height:4em;" /></td>'; 
                                    ?>
                                </div>
                                <td>
                                <?php foreach ($skillList as $skill) : ?>
                                <p><?= $skill['label_skill']; ?></p>
                                <?php endforeach; ?>
                                </td>
                                <td><?= $production['created_at']; ?></td>

                                <td><?= $production['updated_at']; ?></td>

                                <td class="d-grid gap-2 d-sm-md-block">

                                    <a href="<?= base_url('production/edit/'.$production['id_production'].'/'.$production['id_file_img']); ?>" class="btn btn-success btn-sm">Modifier</a>

                                    <a href="<?= base_url('production/delete/'.$production['id_production'].'/'.$production['id_file_img']); ?>" class="btn btn-danger btn-sm">Supprimer</a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

        <div class="container text-center">

            <a class="btn btn-primary" href="<?= base_url('production/add'); ?>">Ajouter une production</a>

        </div>

    </div>

</section>