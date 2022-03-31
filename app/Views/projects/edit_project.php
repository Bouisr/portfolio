<section class="projects-section bg-light" id="messagesubjects" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">



        <h2 class="row justify-content-center text-black mb-4">Modifier le projet : <?= $project['label_project']; ?> </h2>



        <?= form_open_multipart('project/addproject'); ?>

        <?php

        $data = [



            'type'                  => 'hidden',



            'name'                  =>  'id_project',



            'value'                 =>  $project['id_project'],



        ];

        echo form_input($data);



        $data = [



            'class'                 => 'form-control',



            'id'                    => 'label_project',



            'type'                  => 'text',



            'placeholder'           => $project['label_project'],



            'aria-label'            => 'Titre du projet',



            'data-sb-validations'   => '',



            'name'                  =>  'label_project',



            'value'                 =>  set_value('label_project'),



        ];







        echo form_input($data);



        echo '<div class="col" style="margin: 1rem;">';



        $data = [



            'class'                 => 'btn btn-success btn-sm',



            'id'                    => 'submitSubject',



            'type'                  => 'submit',



            'name'                  =>  'submitSubject',



            'value'                 =>  'Modifier'



        ];



        echo form_submit($data);



        echo '<div class="col" style="margin: 1rem;">';



        ?>

        <?= form_close(); ?>



    </div>



</section>