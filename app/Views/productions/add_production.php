<section class="productions-section bg-light" id="productions" style="padding-top: 5rem; padding-bottom: 5rem">



    <div class="container px-4 px-lg-5 text-center">





        <div class="row gx-4 gx-lg-5">



            <div class="col-md-10 col-lg-8 mx-auto text-center" id="production">



                <h2 class="row justify-content-center text-black mb-4">Ajouter une production</h2>



                <?= form_open_multipart('dashboard/production/addproduction') ?>



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



                <?= form_label('S??lectionner le projet associ?? ?? la production', 'id_project') ?>







                <?php







                $data = [



                    'class'                 => 'form-select',



                    'type'                  => 'select',



                    'data-sb-validations'   => 'required',



                ];







                // Liste d??roulante contenant les projets



                echo form_dropdown('id_project', $projectList, '', $data);







                ?>







                <?= form_label('S??lectionner une image d\'illustration', 'file_img') ?>



                <?= '<div class="col" style="margin: 1rem;">'; ?>



                <?php







                $data = [







                    'name'  =>  'file_img',







                ];







                ?>







                <?= form_upload($data) ?>







                <?= form_label('S??lectionner un pdf pour la production', 'file_pdf') ?>







<?php







$data = [







    'name'  =>  'file_pdf',







];







?>







<?= form_upload($data) ?>



<?= '<div class="col" style="margin: 1rem;">'; ?>



<div class="multi_select_box">



    <?php

        $data = [



            'class'     =>      'form-label select-label',



        ];



    ?>



<?= form_label('S??lectionner les comp??tences associ??es ?? la production', 'id_skill', $data) ?>



<?php







$data = [



    'class'                 => 'select form-select multi_select',



    'type'                  => 'select',



    'data-sb-validations'   => 'required',



    'optgroup label'     =>      'Liste des comp??tences',



];





// Liste d??roulante contenant les comp??tences



echo form_multiselect('id_skill[]', $skillList, $data);





?>

</div>



                <?php







                $data = [







                    'class'                 => 'btn btn-success btn-sm',







                    'id'                    => 'submitProduction',







                    'name'                  =>  'submitProduction',







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