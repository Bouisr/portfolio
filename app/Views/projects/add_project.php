<section class="projects-section bg-light" id="messagesubjects" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">


    <div class="row gx-4 gx-lg-5">

    <div class="col-md-10 col-lg-8 mx-auto text-center"  id="projet">

        <h2 class="row justify-content-center text-black mb-4">Ajouter un projet</h2>

    <?= form_open_multipart('project/addproject') ?>

    <?php



    $data = [



        'class'                 => 'form-control',



        'id'                    => 'label_project',



        'type'                  => 'text',



        'placeholder'           => 'Titre du projet',



        'name'                  =>  'label_project',



        'value'                 =>  set_value('label_project'),



    ];



    echo form_input($data);

    ?>



    <?php



    $data = [



        'class'                 => 'form-control',



        'id'                    => 'context',



        'type'                  => 'text',



        'placeholder'           => 'Contexte du projet ... ',



        'name'                  =>  'context',



        'value'                 =>  set_value('context'),



    ];



    echo form_textarea($data);



    ?>



<?= form_label('Sélectionner une image d\'illustration', 'file') ?>



    <?php



    $data = [



        'name'  =>  'file',



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