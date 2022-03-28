<section class="skills-section bg-light" id="messagesubjects" style="padding-top: 5rem; padding-bottom: 5rem">

    <div class="container px-4 px-lg-5 text-center">



        <h2 class="row justify-content-center text-black mb-4">Modifier la compétence</h2>



        <?= form_open('skill/update', 'class="" id=""'); ?>



        <?php



        $data = [



            'type'                  => 'hidden',



            'name'                  =>  'id_skill',



            'value'                 =>  $skill['id_skill'],



        ];



        echo form_input($data);



        $data = [



            'class'                 => 'form-control',



            'id'                    => 'label_skill',



            'type'                  => 'text',



            'placeholder'           => $skill['label_skill'],



            'name'                  =>  'label_skill',



            'value'                 =>  set_value('label_skill'),



        ];







        echo form_input($data);



        echo '<div class="col" style="margin: 1rem;">';



        $data = [



            'class'                 => 'btn btn-success btn-sm',



            'id'                    => 'submitSkill',



            'type'                  => 'submit',



            'name'                  =>  'submitSkill',



            'value'                 =>  'Modifier'



        ];



        echo form_submit($data);



        echo '<div class="col" style="margin: 1rem;">';



        ?>

        <?= form_close(); ?>



    </div>



</section>