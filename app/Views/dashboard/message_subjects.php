<section class="projects-section bg-light" id="messagesubjects">
    <div class="container px-4 px-lg-5">

        <h2 class="row justify-content-center text-black mb-4">Sujets des messages</h2>

        <div class="table table-responsive">
            <div class="col-sm-md-lg-xl-3">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom du sujet</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        foreach ($messageSubjectList as $subject) {

                        ?>

                            <tr>
                                <th scope="row"><?= $subject['id_subject']; ?></th>
                                <td><?= $subject['label_subject']; ?></th>
                            </tr>
                        <?php
                        } ?>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="container text-center">
            <a class="btn btn-primary" href="">Voir le détail</a>
        </div>
    </div>
</section>