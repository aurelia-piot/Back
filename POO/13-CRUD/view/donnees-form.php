


<pre> <?php print_r($_POST)?></pre>


<form action="" method="post" class="col-md-6 offset-md-3 text-center">
    <?php foreach($fields as $value):?>
        <div class="form-group">
            <label for="<?=$value['Field']?>"><?=$value['Field']?></label>
            <input type="text" class="form-control" id="<?=$value['Field']?>"name="<?=$value['Field']?>"placeholder="Enter <?=$value['Field']?>">
        </div>
    <?php endforeach;?>
    <input type="submit" class="col-md-2 btn btn-dark mb-2">


</form>




<?php





?>