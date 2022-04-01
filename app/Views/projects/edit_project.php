<section class="projects-section bg-light" id="messagesubjects" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">


    <div class="row gx-4 gx-lg-5">

    <div class="col-md-10 col-lg-8 mx-auto text-center"  id="projet">

        <h2 class="row justify-content-center text-black mb-4">Modifier le projet</h2>



        <?= form_open_multipart('project/update'); ?>

        <?php

        $data = [



            'type'                  => 'hidden',



            'name'                  =>  'id_project',



             'value'                 =>  $project['id_project'],



        ];

        echo form_input($data);

        $data = [



            'type'                  => 'hidden',



            'name'                  =>  'id_file_img',



             'value'                 =>  $project['id_file_img'],



        ];

        echo form_input($data);

        echo form_label('Titre du projet', 'label_project');

        $data = [



            'class'                 => 'form-control',



            'id'                    => 'label_project',



            'type'                  => 'text',



            'placeholder'           => $project['label_project'],



            'aria-label'            => 'Titre du projet',



            'data-sb-validations'   => '',



            'name'                  =>  'label_project',



            'value'                 =>  set_value('label_project', $project['label_project']),



        ];


        echo form_input($data);

        echo form_label('Contexte du projet', 'context');

        $data = [



            'class'                 => 'form-control',



            'id'                    => 'context',



            'type'                  => 'text',



            'placeholder'           => $project['context'],



            'aria-label'            => 'Titre du projet',



            'data-sb-validations'   => '',



            'name'                  =>  'context',



            'value'                 =>  set_value('context', $project['context']),



        ];


        echo form_textarea($data);

        echo '<div class="col justify-content text-center">';
        echo '<div class="row">';
        echo form_label('Image actuelle', 'file');
        echo '</div>';
        echo '<img class="row img-fluid rounded mx-auto d-block" style="margin-bottom: 1rem" src="'
        .base_url('assets/uploads/'.$project['name_file'])
        .'" placeholder="'.$project['id_file_img'].'" style="height:4em;" /></td>';
        echo '<div class="row" style="margin-bottom: 1rem;">';
        echo form_label('Changer l\'image d\'illustration', 'file');
        echo '</div>';


    $data = [

        'name'  =>  'file',

    ];

  
    echo form_upload($data);

    echo '</div>';



        echo '<div class="col" style="margin: 1rem;">';



        $data = [



            'class'                 => 'btn btn-success btn-sm',



            'id'                    => 'submitProject',



            'type'                  => 'submit',



            'name'                  =>  'submitProject',



            'value'                 =>  'Modifier'



        ];



        echo form_submit($data);



        echo '<div class="col" style="margin: 1rem;">';



        ?>

        <?= form_close(); ?>

    </div>
    </div>

    </div>



</section>