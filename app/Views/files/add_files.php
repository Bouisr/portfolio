<div class="justify-content text-center">
<?= '<h2>Ajouter des fichiers</h2>'; ?>
<?= form_open_multipart('file/uploadmultiple') ?>
<?php
    $data = [

        'name'  =>  'files[]',
        'multiple'  =>  'multiple',

    ];
?>
<?= form_upload($data) ?>
<?php

    $data = [

        'class'                 => 'btn btn-success btn-sm',

        'id'                    => 'submitFiles',

        'name'                  =>  'submitFiles',

        'value'                 =>  'Ajouter'

    ];

?>

<?= form_submit($data) ?>
<?= form_close() ?>
</div>