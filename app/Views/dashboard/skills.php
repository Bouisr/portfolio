<section class="skills-section bg-light" id="skills" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">



        <h2 class="row justify-content-center text-black mb-4">Compétences</h2>



        <div class="table table-responsive">

            <div class="col-sm-md-lg-xl-3">

                <table class="table table-striped table-dark">

                    <thead>

                        <tr>

                            <th scope="col">#</th>

                            <th scope="col">Intitulé de la compétence</th>

                            <th scope="col">Date de création</th>

                            <th scope="col">Date de modification</th>

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

                                <td class="d-grid gap-2 d-sm-md-block">

                                <a href="<?= base_url('skill/edit/'.$skill['id_skill']); ?>" class="btn btn-success btn-sm">Modifier</a>

                                <a href="<?= base_url('skill/delete/'.$skill['id_skill']); ?>" class="btn btn-danger btn-sm">Supprimer</a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>
        <div class="container text-center">

<a class="btn btn-primary" href="<?= base_url('skill/add'); ?>">Ajouter une compétence</a>

</div>
    </div>

</section>