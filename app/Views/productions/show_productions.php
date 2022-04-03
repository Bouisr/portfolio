<section class="container text-center" id="projects">

    <div class="row">

        <div class="col-12">

            <h2 class="text-center">Productions</h2>

            <table class="table table-dark" 
            data-toggle="table" 
            data-search="true"
            data-search-class="text-center"
            data-show-columns="true" 
            
            data-buttons-class="primary"
            >

                <thead>

                    <tr>

                        <th data-sortable="true" scope="col">ID</th>

                        <th scope="col">Nom de la production</th>

                        <th scope="col">Contenu</th>

                        <th data-sortable="true" scope="col">Nom du projet</th>

                        <th scope="col">Image d'illustration</th>

                        <th scope="col">PDF associé à la production</th>

                        <th scope="col">Compétences associées</th>

                        <th data-sortable="true" scope="col">Date de création</th>

                        <th scope="col">Date de modification</th>

                        <th scope="col">Action</th>

                    </tr>

                </thead>

                <tbody>
                    <pre>
                    <?php print_r($productionList); ?>
                    </pre>
                    <?php foreach ($productionList as $production) : ?>



                        <tr>

                            <th scope="row"><?= $production['id_production']; ?></td>

                            <td><?= $production['label_production']; ?></td>

                            <td><?= $production['content']; ?></td>

                            <td><?= $production['label_project']; ?></td>

                            <div class="text-center">
                                <td>
                                    <?= '<img class="img-fluid" src="'
                                        . base_url('assets/uploads/' . $production['name_file'])
                                        . '" placeholder="' . $production['id_file_img'] . '" style="height:4em; margin:0 auto;" /></td>';
                                    ?>
                            </div>
                            <td>
                                <?= '<img class="img-fluid" src="'
                                    . base_url('assets/uploads/' . $production['name_file'])
                                    . '" placeholder="' . $production['id_file_pdf'] . '" style="height:4em; margin:0 auto;;" /></td>';
                                ?>
        </div>
        <td>
            <?php foreach ($skillList as $skill) : ?>
                <p><?= $skill['label_skill']; ?></p>
            <?php endforeach; ?>
        </td>
        <td><?= $production['created_at']; ?></td>

        <td><?= $production['updated_at']; ?></td>

        <td class="align-item text-center" style="padding:1rem;">
                <div class="row" style="margin-bottom:1rem;">
            <a href="<?= base_url('production/edit/' . $production['id_production'] . '/' . $production['id_file_img']); ?>" class="btn btn-success btn-sm">Modifier</a>

            </div>
            <div class="row">

            <a href="<?= base_url('production/delete/' . $production['id_production'] . '/' . $production['id_file_img']); ?>" class="btn btn-danger btn-sm">Supprimer</a>
            </div>        </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

    </table>





    <div class="container text-center">

        <a class="btn btn-primary" href="<?= base_url('production/add'); ?>" style="margin-bottom:1rem; margin-top:1rem;">Ajouter une production</a>

    </div>
    </div>
    </div>

</section>