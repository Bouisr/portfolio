<section class="productions-section bg-light" id="productions" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">


        <div class="row gx-4 gx-lg-5">

            <div class="col-md-10 col-lg-8 mx-auto text-center" id="production">

                <h2 class="row justify-content-center text-black mb-4">Ajouter une production</h2>

                <?= form_open_multipart('project/addproject') ?>

                <?php

                $data = [



                    'class'                 => 'form-control',



                    'id'                    => 'label_production',



                    'type'                  => 'text',



                    'placeholder'           => 'Titre de la production',



                    'name'                  =>  'label_production',



                    'value'                 =>  set_value('label_production'),



                ];



                echo form_input($data);

                ?>



                <?php



                $data = [



                    'class'                 => 'form-control',



                    'id'                    => 'content',



                    'type'                  => 'text',



                    'placeholder'           => 'Contenu du projet ... ',



                    'name'                  =>  'content',



                    'value'                 =>  set_value('content'),



                ];



                echo form_textarea($data);



                ?>

                <?= form_label('Sélectionner le projet associé à la production', 'project') ?>

                <?php



                $data = [

                    'class'                 => 'form-select',

                    'type'                  => 'select',

                    'data-sb-validations'   => 'required',

                    'name'                  =>  'project',

                ];



                // Liste déroulante contenant les projets

                echo form_dropdown('id_project', $projectList, '', $data);



                ?>



                <?= form_label('Sélectionner une image d\'illustration', 'file_img') ?>



                <?php



                $data = [



                    'name'  =>  'file_img',



                ];



                ?>



                <?= form_upload($data) ?>

                <?= form_label('Sélectionner un pdf pour la production', 'file_pdf') ?>



<?php



$data = [



    'name'  =>  'file_pdf',



];



?>



<?= form_upload($data) ?>

                <?php



                $data = [



                    'class'                 => 'btn btn-success btn-sm',



                    'id'                    => 'submitProject',



                    'name'                  =>  'submitProject',



                    'value'                 =>  'Ajouter'



                ];



                ?>



                <?= form_submit($data) ?>

                <?= form_close() ?>

                <?php if (isset($validation)) : ?>

                    <div class="col-auto alert alert-danger" style="margin: 1rem;" role="alert">



                        <?php echo $validation->listErrors(); ?>

                    </div>

                <?php endif; ?>

            </div>
        </div>

    </div>



</section>