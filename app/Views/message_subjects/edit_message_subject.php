<section class="message-subjects-section bg-light" id="messagesubjects" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">

    <div class="row gx-4 gx-lg-5">

    <div class="col-md-10 col-lg-8 mx-auto text-center"  id="subject">

        <h2 class="row justify-content-center text-black mb-4">Modifier le sujet de message</h2>



        <?= form_open('messagesubject/update', 'class="" id=""'); ?>



        <?php
        // 'name'   =>  'value'
        $data = [

            'id_subject'                  =>  $subject['id_subject'],

        ];

        echo form_hidden($data);



        $data = [



            'class'                 => 'form-control',



            'id'                    => 'label_subject',



            'type'                  => 'text',



            'placeholder'           => $subject['label_subject'],



            'aria-label'            => 'Intitulé du sujet',



            'data-sb-validations'   => '',



            'name'                  =>  'label_subject',



            'value'                 =>  set_value('label_subject'),



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
    </div>

    </div>



</section>