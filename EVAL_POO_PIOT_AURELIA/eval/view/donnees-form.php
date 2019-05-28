


<!-- <pre> <?php //print_r($_POST)?></pre> -->

<!-- <pre> <?php //print_r(field)?></pre> -->
<pre> <?php print_r($values)?></pre>
<!-- $values provient du save($op)de controller.php -->

<form action="" method="post" class="col-md-6 offset-md-3 text-center">
    <?php foreach($fields as $value):?>
        <div class="form-group">
            <label for="<?=$value['Field']?>"><?=$value['Field']?></label>

            <input type="text" class="form-control" id="<?=$value['Field']?>"name="<?=$value['Field']?>"placeholder="Enter <?=$value['Field']?>"value="<?=($op == "update")? $values[$value['Field']]:''?>">
        </div>
    <?php endforeach;?>
    <button type="submit" class="col-md-2 btn btn-dark mb-2">GO</button>


</form>




<?php





?>