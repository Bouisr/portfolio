<?php if (isset($validation)) : ?>



<div class="col-auto alert alert-danger" style="margin: 1rem;" role="alert">


<pre>
<?= print_r($validation->listErrors()); ?>

</pre>


</div>

<?php endif; ?>