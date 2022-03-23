<section class="signup-section" id="signin">

    <div class="container px-4 px-lg-5">

        <div class="row gx-4 gx-lg-5">

            <div class="col-md-10 col-lg-8 mx-auto text-center">

                <h2 class="text-white mb-5">S'identifier</h2>

                <?php echo '<pre class="text-white">';
                echo strlen($_SERVER['REMOTE_ADDR']) . ' : ' . $_SERVER['REMOTE_ADDR'];
                echo '</pre>'; ?>

                <?php echo form_open('user/signinform', 'class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN"'); ?>

                <div class="col" style="margin: 1rem;">

                    <?php

                    $data = [
                        'class'                 => 'form-control',
                        'id'                    => 'email',
                        'type'                  => 'text',
                        'placeholder'           => 'Email',
                        'aria-label'            => 'Email',

                        'name'                  =>  'email',
                        'value'                  =>  set_value('email'),
                    ];

                    echo form_input($data);

                    ?>

                </div>

                <div class="col" style="margin: 1rem;">

                    <?php

                    $data = [
                        'class'                 => 'form-control',
                        'id'                    => 'password',
                        'type'                  => 'text',
                        'placeholder'           => 'Mot de passe',
                        'aria-label'            => 'Mot de passe',

                        'name'                  =>  'password',
                        'value'                  =>  set_value('password'),
                    ];

                    echo form_password($data);

                    ?>

                </div>

                <?php if (isset($validation)) : ?>

                    <div class="col-auto alert alert-danger" style="margin: 1rem;" role="alert">

                        <?php echo $validation->listErrors(); ?>

                    </div>

                    

                <?php endif; ?>


                <div class="col-auto">

                    <?php

                    $data = [

                        'class'                 => 'btn btn-primary',
                        'id'                    => 'submitConnect',
                        'type'                  => 'submit',
                        'name'                  =>  'submitConnect',
                        'value'                 =>  'Connexion',
                    ];

                    echo form_submit($data);

                    ?>

                    <!-- <button class="btn btn-primary disabled" id="submitButton" type="submit">Notify Me!</button> -->

                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>