<section class="messages-section bg-light" id="messages" style="padding-top: 5rem; padding-bottom: 5rem">
    <div class="container px-4 px-lg-5 text-center">

        <h2 class="row justify-content-center text-black mb-4">Messages</h2>

        <div class="table table-responsive">
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
                            <th scope="col">Sujet</th>
                            <th scope="col">Date de réception</th>
                            <th scope="col">Date de modification</th>
                            <td class="d-grid gap-2 d-sm-md-block">
                                <a href="" class="btn btn-success btn-sm">Archiver</a>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($messageList as $message) : ?>

                            <tr>
                                <th scope="row"><?= $message['id_message']; ?></td>
                                <td><?= $message['ip_message']; ?></td>
                                <td><?= $message['firstname_author']; ?></td>
                                <td><?= $message['lastname_author']; ?></td>
                                <td><?= $message['email_author']; ?></td>
                                <td><?= $message['telephone_author']; ?></td>
                                <td><?= $message['body_message']; ?></td>
                                <td><?= $message['label_subject']; ?></td>
                                <td><?= $message['created_at']; ?></td>
                                <td><?= $message['updated_at']; ?></td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
            <!-- </div> -->
        </div>
    </div>

</section>