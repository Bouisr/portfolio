<section class="message-subjects-section bg-light" id="messagesubjects" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">



        <h2 class="row justify-content-center text-black mb-4">Sujets des messages</h2>



        <div class="table table-responsive">

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

                            <th data-sortable="true" scope="col">Création</th>

                            <th data-sortable="true" scope="col">Modification</th>

                            <th scope="col">Action</th>

                        </tr>

                    </thead>

                    <tbody>



                        <?php foreach ($messageSubjectList as $subject) : ?>



                            <tr>

                                <th scope="row"><?= $subject['id_subject']; ?></td>

                                <td><?= $subject['label_subject']; ?></td>

                                <td><?= $subject['created_at']; ?></td>

                                <td><?= $subject['updated_at']; ?></td>

                                <td class="align-item text-center" style="padding:1rem;">

                                <div class="row" style="margin-bottom:1rem;">

                                    <a href="<?= base_url('dashboard/subject/edit/'.$subject['id_subject']); ?>" class="btn btn-success btn-sm">Modifier</a>
                                    </div>

                                    <div class="row">
                                    <a href="<?= base_url('dashboard/subject/delete/'.$subject['id_subject']); ?>" class="btn btn-danger btn-sm">Supprimer</a>
                                    </div>
                                </td>

                            </tr>

                        <?php endforeach; ?>





                    </tbody>

                </table>

            </div>

        </div>

        <div class="container text-center">

            <a class="btn btn-primary" href="<?= base_url('dashboard/subject/add'); ?>">Ajouter un sujet</a>

        </div>

    </div>

</section>