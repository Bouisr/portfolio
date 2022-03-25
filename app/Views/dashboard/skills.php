<section class="message-subjects-section bg-light" id="messagesubjects">
    <div class="container px-4 px-lg-5">

            <h2 class="row justify-content-center text-black mb-4">Compétences</h2>

        <div class="table table-responsive">
            <div class="col-sm-md-lg-xl-3">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Intitulé de la compétence</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                    
                        foreach ($skillList as $id_skill => $skill) {
                            
                        ?>

                            <tr>
                                <th scope="row"><?= $id_skill; ?></th>
                                <td><?= $skill['label_skill']; ?></th>
                            </tr>
                        <?php
                        } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>