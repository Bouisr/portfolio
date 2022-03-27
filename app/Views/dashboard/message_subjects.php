<section class="message-subjects-section bg-light" id="messagesubjects" style="padding-top: 5rem; padding-bottom: 5rem">
    <div class="container px-4 px-lg-5 text-center">

        <h2 class="row justify-content-center text-black mb-4">Sujets des messages</h2>

        <div class="table table-responsive">
            <div class="col-sm-md-lg-xl-3">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom du sujet</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">Date de modification</th>
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
                                <td class="d-grid gap-2 d-sm-md-block">
                                    <a href="<?= base_url('subject/edit/'.$subject['id_subject']); ?>" class="btn btn-success btn-sm">Modifier</a>
                                    <a href="<?= base_url('subject/delete/'.$subject['id_subject']); ?>" class="btn btn-danger btn-sm">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="container text-center">
            <a class="btn btn-primary" href="<?= base_url('subject/add'); ?>">Ajouter un sujet</a>
        </div>
    </div>
</section>