<section class="projects-section bg-light" id="messages">
    <div class="container px-4 px-lg-5">

            <h2 class="row justify-content-center text-black mb-4">Messages</h2>

        <div class="table table-responsive">
            <!-- <div class="row justify-content-center"> -->
            <div class="col-sm-md-lg-xl-3">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Adresse IP</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Message</th>
                            <th scope="col">Archive</th>
                            <th scope="col">Sujet</th>
                            <th scope="col">Poster le :</th>
                            <th scope="col">Modifier le :</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $i = 0;
                        foreach ($messageList as $key => $message) {
                            $i++;
                        ?>

                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $message['ip_message']; ?></th>
                                <td><?= $message['firstname_author']; ?></th>
                                <td><?= $message['lastname_author']; ?></th>
                                <td><?= $message['email_author']; ?></th>
                                <td><?= $message['telephone_author']; ?></th>
                                <td><?= $message['body_message']; ?></th>
                                <td><?= $message['archive_message']; ?></th>
                                <td><?= $message['label_subject']; ?></th>
                                <td><?= $message['created_at']; ?></th>
                                <td><?= $message['updated_at']; ?></th>
                            </tr>
                        <?php
                        } ?>


                    </tbody>
                </table>
            </div>
            <!-- </div> -->
        </div>
    </div>

</section>