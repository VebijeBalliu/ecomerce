
<?php if(count($errors)>0 && count($errors)):?>
<div class="error">
<?php foreach($errors as $error):?>
<p><?php echo $error;?></p>
<?php endforeach ?>
</div>
<?php endif ?>
