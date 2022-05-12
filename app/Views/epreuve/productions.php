       <!-- Projects-->



       <section class="projects-section bg-light" id="projects">

<div class="col-lg-12 text-center" style="padding-bottom: 5rem;">



<h2 class="row justify-content-center text-black mb-4">Mes productions</h2>

</div>

<?php foreach ($projectList as $project) : ?>
    
    <div class="container px-4 px-lg-5" style="padding-bottom: 5rem;">



                        <!-- Project One Row-->
                <?php if(isset($project['productionList'])){

                    $i = 0;
                foreach($project['productionList'] as $production) :
                    $i++;
                    ?>

                        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">




            <div class="col-lg-6" style="object-fit: cover;">



            <figure class="card-production" style="object-fit: cover; width: auto; height: 100%;">

                

            <img class="img-fluid" src="<?= base_url('assets/uploads/'.$production['img_production']); ?>" alt="<?= $production['label_production'] ?>" />
            



            <figcaption class="overlay">

                    
                    <a class="btn btn-primary" href="<?= base_url('assets/uploads/'.$production['pdf_production']); ?>">Consulter</h4></a>


            </figcaption>



            </figure>

        

            </div>

            <?php
            
            
            
                if($i%2 == 0){


                    $first = "order-lg-first";
                }if($i%2 == 1){
                    
                    $first = "";
                }
                
             
            ?>
                <div class="col-lg-6 <?= $first; ?>">

                <div class="bg-black text-center h-100 project">



                    <div class="d-flex h-100">



                        <div class="project-text w-100 my-auto text-center text-lg-left">



                            <h4 style="color: rgb(183 136 57);"><?= $production['label_production'] ?></h4>



                            <p class="mb-0 text-white-50"><?= $production['content'] ?></p>



                            <hr class="d-none d-lg-block mb-0 ms-0" />

                            <h5 style="color: rgb(183 136 57);">Compétences</h5>
                            <?php if(isset($project['skillList'])){ ?>
                            <?php foreach($project['skillList'] as $skill) : ?>
                                <p class="text-white"><?= $skill['label_skill'] ?></p>
                            <?php endforeach ?>
                            <?php }; ?>

                        </div>



                    </div>



                </div>



            </div>



        </div>

    <?php endforeach ?>
    <?php }; ?>

    </div>
<?php endforeach ?>

</section>
