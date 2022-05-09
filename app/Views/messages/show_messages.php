<section class="messages-section bg-light" id="messages" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">



        <h2 class="row justify-content-center text-black mb-4">Messages</h2>





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

                            <th data-sortable="true" scope="col">IP</th>

                            <th data-sortable="true" scope="col">Prénom</th>

                            <th data-sortable="true" scope="col">Nom</th>

                            <th data-sortable="true" scope="col">Email</th>

                            <th data-sortable="true" scope="col">Téléphone</th>

                            <th scope="col">Message</th>

                            <th data-sortable="true" scope="col">Sujet</th>

                            <th data-sortable="true" scope="col">Réception</th>

                            <th data-sortable="true" scope="col">Modification</th>

                            <th scope="col">Action</th>

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

                                <td class="align-item text-center" style="padding:1rem;">
                                    <div class="row" style="margin-bottom:1rem;">
                                    <a class="btn btn-success btn-sm" href="<?= base_url('dashboard/message/archive/' .$message['id_message'] . '/' .$message['archive_message']); ?>">Archiver</a>
                                    </div>
                                </td>

                            </tr>

                        <?php endforeach; ?>





                    </tbody>

                </table>

            </div>

            <!-- </div> -->



    </div>



</section>