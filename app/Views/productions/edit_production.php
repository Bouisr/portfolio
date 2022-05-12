<section class="production-section bg-light" id="messagesubjects" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">

    <div class="row gx-4 gx-lg-5">

    <div class="col-md-10 col-lg-8 mx-auto text-center"  id="production">

        <h2 class="row justify-content-center text-black mb-4">Modifier la production</h2>

        <?= form_open_multipart('dashboard/production/update'); ?>

        <?php

        $data = [

            'type'                  => 'hidden',

            'name'                  =>  'id_production',

             'value'                 =>  $production['id_production'],

        ];

        echo form_input($data);

        $data = [

            'type'                  => 'hidden',

            'name'                  =>  'id_file_img',

             'value'                 =>  $production['id_file_img'],

        ];

        echo form_input($data);

        $data = [

            'type'                  => 'hidden',

            'name'                  =>  'id_file_pdf',

             'value'                 =>  $production['id_file_pdf'],

        ];

        echo form_input($data);

        echo form_label('Titre de la production', 'label_production');

        $data = [

            'class'                 => 'form-control',

            'id'                    => 'label_production',

            'type'                  => 'text',

            'placeholder'           => $production['label_production'],

            'name'                  =>  'label_production',

            'value'                 =>  set_value('label_production', $production['label_production']),

        ];

        echo form_input($data);

        echo form_label('contenu de la production', 'content');

        $data = [

            'class'                 => 'form-control',

            'id'                    => 'content',

            'type'                  => 'text',

            'name'                  =>  'content',

            'value'                 =>  set_value('content', $production['content']),

        ];

        echo form_textarea($data);

        echo '<div class="col justify-content text-center">';

        echo '<div class="row">';

        echo form_label('Image actuelle', 'file_img');

        echo '</div>';

        echo '<img class="row img-fluid rounded mx-auto d-block" style="margin-bottom: 1rem height: auto; width: 20%;" src="'

        .base_url('assets/uploads/'.$production['name_file'])

        .'" placeholder="'.$production['id_file'].'" style="height:4em;" /></td>';

        echo '<div class="row" style="margin-bottom: 1rem;">';

        echo form_label('Modifier l\'image d\'illustration', 'file');

        echo '</div>';

    $data = [

        'name'  =>  'file_img',

    ];

    echo form_upload($data);

    echo '</div>';

    echo '<div class="col justify-content text-center">';

    echo '<div class="row">';

    echo form_label('PDF actuelle', 'file_pdf');

    echo '</div>';

    echo '<img class="row img-fluid rounded mx-auto d-block" style="margin-bottom: 1rem; height: auto; width: 20%;" src="'

    .base_url('assets/uploads/'.$production['name_file'])

    .'" placeholder="'.$production['id_file'].'" style="height:5px;" /></td>';

    echo '<div class="row" style="margin-bottom: 1rem;">';

    echo form_label('Modifier le pdf', 'file_pdf');

    echo '</div>';

$data = [

    'name'  =>  'file_pdf',

];

echo form_upload($data);

        echo '<div class="col" style="margin: 1rem;">';

        echo form_label('Modifier le projet associé à la production', 'id_project');

        $data = [

            'class'                 => 'form-select',

            'type'                  => 'select',

            'data-sb-validations'   => 'required',

        ];

        // Liste déroulante contenant les projets
        echo form_dropdown('id_project', $projectList, '', $data);

        echo '<div class="col" style="margin: 1rem;">';

        echo '<div class="multi_select_box">';

        $data = [

            'class'     =>      'form-label select-label',

        ];

    ?>

<?= form_label('Modifier les compétences associées à la production', 'id_skill', $data) ?>

<?php

$data = [

    'class'                 => 'select form-select multi_select',

    'type'                  => 'select',

    'data-sb-validations'   => 'required',

    'optgroup label'     =>      'Liste des compétences',

];

// Liste déroulante contenant les compétences

echo form_multiselect('id_skill[]', $skillList, $data);

?>

</div>

<?php

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