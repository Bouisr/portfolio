<section class="message-subjects-section bg-light" id="messagesubjects" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">



        <h2 class="row justify-content-center text-black mb-4">Modifier le sujet de message</h2>



        <?= form_open('messagesubject/update', 'class="" id=""'); ?>



        <?php



        $data = [



            'type'                  => 'hidden',



            'name'                  =>  'id_subject',



            'value'                 =>  $subject['id_subject'],



        ];



        echo form_input($data);



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



</section>