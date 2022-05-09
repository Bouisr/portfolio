<section class="projects-section bg-light" id="projects" style="padding-top: 5rem; padding-bottom: 5rem">



    <div class="container px-4 px-lg-5 text-center" style="padding:1rem;">







        <h2 class="row justify-content-center text-black mb-4">Projets</h2>



            <div class="col-sm-md-lg-xl-3">



            <table class="  table table-dark" 
                            data-toggle="table" 
                            data-search="true"
                            data-search-class="text-center"
                            data-show-columns="true" 
                            data-buttons-class="primary">



                    <thead>



                        <tr>



                            <th data-sortable="true" scope="col">ID</th>



                            <th data-sortable="true" scope="col">Nom</th>



                            <th scope="col">Contexte</th>



                            <th scope="col">Illustration</th>



                            <th data-sortable="true" scope="col">Création</th>



                            <th data-sortable="true" scope="col">Modification</th>



                            <th scope="col">Action</th>



                        </tr>



                    </thead>



                    <tbody>







                        <?php foreach ($projectList as $project) : ?>







                            <tr>



                                <th scope="row"><?= $project['id_project']; ?></td>



                                <td><?= $project['label_project']; ?></td>



                                <td><?= $project['context']; ?></td>

                                <div class="text-center">

                                <td>

                                    <?= '<img class="img-fluid justify-content center" src="'

                                        .base_url('assets/uploads/'.$project['name_file'])

                                        .'" placeholder="'.$project['id_file'].'" style="height:4em;" /></td>'; 

                                    ?>

                                </div>

                                <td><?= $project['created_at']; ?></td>



                                <td><?= $project['updated_at']; ?></td>



                                <td class="align-item text-center" style="padding:1rem;">

                                <div class="row" style="margin-bottom:1rem;">



                                    <a href="<?= base_url('dashboard/project/edit/'.$project['id_project'].'/'.$project['id_file']); ?>" class="btn btn-success btn-sm">Modifier</a>

                                    </div>

<div class="row">

                                    <a href="<?= base_url('dashboard/project/delete/'.$project['id_project'].'/'.$project['id_file']); ?>" class="btn btn-danger btn-sm">Supprimer</a>

</div>

                                </td>



                            </tr>



                        <?php endforeach; ?>




        






                    </tbody>



                </table>

                </div>

            </div>



        <div class="container text-center">



            <a class="btn btn-primary" href="<?= base_url('dashboard/project/add'); ?>">Ajouter un projet</a>



        </div>



    </div>



</section>