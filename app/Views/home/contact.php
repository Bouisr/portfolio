<!-- ContactForm-->



 <section class="signup-section">



            <div class="container px-4 px-lg-5">



                <div class="row gx-4 gx-lg-5">



                    <div class="col-md-10 col-lg-8 mx-auto text-center"  id="contact">



                        <i class="far fa-paper-plane fa-2x mb-2 text-white"  style="margin-top: 1rem"></i>



                        <h2 class="text-white mb-5">Contactez-moi ici !</h2>

                        

                        <!-- * * * * * * * * * * * * * * *-->



                        <!-- * * SB Forms Contact Form * *-->



                        <!-- * * * * * * * * * * * * * * *-->



                        <!-- This form is pre-integrated with SB Forms.-->



                        <!-- To make this form functional, sign up at-->



                        <!-- https://startbootstrap.com/solution/contact-forms-->



                        <!-- to get an API token!-->

                        <?php echo form_open('home/sendmessage', 'class="form-contact" id="contactForm" data-sb-form-api-token="API_TOKEN"'); ?>

                       

                                <!-- FirstName input-->



                                <div class="col" style="margin: 1rem;">

                                    

                                    <?php 

                                    

                                    $data = [

                                        'class'                 => 'form-control',

                                        'id'                    => 'firstname',

                                        'type'                  => 'text',

                                        'placeholder'           => 'Prénom',

                                        'aria-label'            => 'Prénom',

                                        'data-sb-validations'   => 'required',

                                        'name'                  =>  'firstname',

                                        'value'                 =>  set_value('firstname'),

                                    ];



                                    echo form_input($data); 

                                    

                                    ?>

                                

                                </div>



                                <!-- LastName input-->



                                <div class="col" style="margin: 1rem;">

                                    

                                    <?php 

                                    

                                    $data = [

                                        'class'                 => 'form-control',

                                        'id'                    => 'lastname',

                                        'type'                  => 'text',

                                        'placeholder'           => 'Nom',

                                        'aria-label'            => 'Nom',

                                        'data-sb-validations'   => 'required',

                                        'name'                  =>  'lastname',

                                        'value'                 =>  set_value('lastname'),

                                    ];



                                    echo form_input($data); 

                                    

                                    ?>

                                

                                </div>



                                <!-- Email address input-->



                                <div class="col" style="margin: 1rem;">

                                    

                                    <?php 

                                    

                                    $data = [

                                        'class'                 => 'form-control',

                                        'id'                    => 'emailAddress',

                                        'type'                  => 'text',

                                        'placeholder'           => 'Adresse email',

                                        'aria-label'            => 'Adresse email',

                                        'data-sb-validations'   => 'required,email',

                                        'name'                  =>  'email',

                                        'value'                 =>  set_value('email'),

                                    ];



                                    echo form_input($data); 

                                    

                                    ?>

                                

                                </div>



                                <!-- Phone number input-->



                                <div class="col" style="margin: 1rem;">

                                    

                                    <?php 

                                    

                                    $data = [

                                        'class'                 => 'form-control',

                                        'id'                    => 'telephone',

                                        'type'                  => 'text',

                                        'placeholder'           => 'Numéro de téléphone',

                                        'aria-label'            => 'Numéro de téléphone',

                                        'data-sb-validations'   => '',

                                        'name'                  =>  'telephone',

                                        'value'                 =>  set_value('telephone'),

                                    ];



                                    echo form_input($data); 

                                    

                                    ?>

                                

                                </div>



                                <!-- Body message input-->



                                <div class="col" style="margin: 1rem;">

                                    

                                    <?php 

                                    

                                    $data = [

                                        'class'                 => 'form-control',

                                        'id'                    => 'body',

                                        'type'                  => 'text',

                                        'placeholder'           => 'Votre message ...',

                                        'aria-label'            => 'Votre message ...',

                                        'data-sb-validations'   => 'required',

                                        'name'                  =>  'body',

                                        'value'                 =>  set_value('body'),

                                    ];



                                    echo form_textarea($data); 

                                    

                                    ?>

                                

                                </div>



                                <!-- Body message input-->



                                <div class="col" style="margin: 1rem;">

                                    

                                    <?php 

                                    

                                    $data = [

                                        'class'                 => 'form-select', 

                                        'type'                  => 'select',

                                        'placeholder'           => 'Objet du message',

                                    ];

                                    

                                    // Liste déroulante contenant les sujets des messages

                                    echo form_dropdown('id_subject', $subjectList, '', $data);



                                    ?>

                                

                                </div>

                                <?php if (isset($validation)) : ?>



<div class="col-auto alert alert-danger" style="margin: 1rem;" role="alert">


<pre>
<?php echo $validation->listErrors(); ?>
</pre>


</div>

<?php endif; ?>


                                <div class="col-auto">

                                    

                                <?php 

                                    

                                    $data = [

                                        'class'                 => 'btn btn-primary',

                                        'id'                    => 'submitMessage',

                                        'type'                  => 'submit',

                                        'name'                  =>  'submitMessage',

                                        'value'                 =>  'envoyer'

                                    ];



                                    echo form_submit($data); 

                                    

                                    ?>



                                    <!-- <button class="btn btn-primary disabled" id="submitButton" type="submit">Notify Me!</button> -->

                            

                                </div>



                            <!-- </div> -->



                            <div class="invalid-feedback mt-2" data-sb-feedback="email:required">An email is required.</div>



                            <div class="invalid-feedback mt-2" data-sb-feedback="email:email">Email is not valid.</div>



                            <!-- Submit success message-->



                            <!---->



                            <!-- This is what your users will see when the form-->



                            <!-- has successfully submitted-->



                            <div class="d-none" id="submitSuccessMessage">



                                <div class="text-center mb-3 mt-2 text-white">



                                    <div class="fw-bolder">Form submission successful!</div>



                                    To activate this form, sign up at



                                    <br />



                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>



                                </div>



                            </div>



                            <!-- Submit error message-->



                            <!---->



                            <!-- This is what your users will see when there is-->



                            <!-- an error submitting the form-->



                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Error sending message!</div></div>



                        <?php echo form_close(); ?>



                    </div>



                </div>



            </div>



        </section>