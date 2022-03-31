<section class="projects-section bg-light" id="messagesubjects" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">



        <h2 class="row justify-content-center text-black mb-4">Projets</h2>



        <div class="table table-responsive">

            <div class="col-sm-md-lg-xl-3">

                <table class="table table-striped table-dark">

                    <thead>

                        <tr>

                            <th scope="col">#</th>

                            <th scope="col">Nom du projet</th>

                            <th scope="col">Contexte du projet</th>

                            <th scope="col">Identifiant de l'image</th>

                            <th scope="col">Date de création</th>

                            <th scope="col">Date de modification</th>

                            <th scope="col">Action</th>

                        </tr>

                    </thead>

                    <tbody>



                        <?php foreach ($projectList as $project) : ?>



                            <tr>

                                <th scope="row"><?= $project['id_project']; ?></td>

                                <td><?= $project['label_project']; ?></td>

                                <td><?= $project['context']; ?></td>

                                <td><?= $project['id_file_img']; ?></td>

                                <td><?= $project['created_at']; ?></td>

                                <td><?= $project['updated_at']; ?></td>

                                <td class="d-grid gap-2 d-sm-md-block">

                                    <a href="<?= base_url('project/edit/'.$project['id_project']); ?>" class="btn btn-success btn-sm">Modifier</a>

                                    <a href="<?= base_url('project/delete/'.$project['id_project'].'/'.$project['id_file_img']); ?>" class="btn btn-danger btn-sm">Supprimer</a>

                                </td>

                            </tr>

                        <?php endforeach; ?>





                    </tbody>

                </table>

            </div>

        </div>

        <div class="container text-center">

            <a class="btn btn-primary" href="<?= base_url('project/add'); ?>">Ajouter un projet</a>

        </div>

    </div>

</section>