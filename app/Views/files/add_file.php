<div class="justify-content text-center">
<?= '<h2>Ajouter un fichier</h2>'; ?>
<?= form_open_multipart('file/upload') ?>
<?php
    $data = [

        'name'  =>  'file',

    ];
?>
<?= form_upload($data) ?>
<?php

    $data = [

        'class'                 => 'btn btn-success btn-sm',

        'id'                    => 'submitFile',

        'name'                  =>  'submitFile',

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