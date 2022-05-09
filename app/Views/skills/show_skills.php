<section class="skills-section bg-light" id="skills" style="padding-top: 5rem; padding-bottom: 5rem">



    <div class="container px-4 px-lg-5 text-center" style="padding:1rem;">







        <h2 class="row justify-content-center text-black mb-4">Compétences</h2>







        <table class="  table table-dark" 
                            data-toggle="table" 
                            data-search="true"
                            data-search-class="text-center"
                            data-show-columns="true" 
                            data-buttons-class="primary">



            <div class="col-sm-md-lg-xl-3">



                    <thead>



                        <tr>



                            <th data-sortable="true" scope="col">ID</th>



                            <th data-sortable="true" scope="col">Intitulé</th>



                            <th data-sortable="true" scope="col">Création</th>



                            <th data-sortable="true" scope="col">Modification</th>



                            <th scope="col">Action</th>



                        </tr>



                    </thead>



                    <tbody>



                        <?php foreach ($skillList as $skill) : ?>



                            <tr>



                                <th scope="row"><?= $skill['id_skill']; ?></th>



                                <td><?= $skill['label_skill']; ?></td>



                                <td><?= $skill['created_at']; ?></td>



                                <td><?= $skill['updated_at']; ?></td>



                                <td class="align-item text-center" style="padding:1rem;">

                                <div class="row" style="margin-bottom:1rem;">



                                <a href="<?= base_url('dashboard/skill/edit/'.$skill['id_skill']); ?>" class="btn btn-success btn-sm">Modifier</a>

                                </div>

<div class="row">

                                <a href="<?= base_url('dashboard/skill/delete/'.$skill['id_skill']); ?>" class="btn btn-danger btn-sm">Supprimer</a>

</div>

                                </td>



                            </tr>



                        <?php endforeach; ?>



                    </tbody>



                </table>



            </div>



        </div>

        <div class="container text-center">



<a class="btn btn-primary" href="<?= base_url('dashboard/skill/add'); ?>">Ajouter une compétence</a>



</div>

    </div>



</section>