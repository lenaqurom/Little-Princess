<?php  if (count($errorss) > 0) : ?>
    <div class="error" style="color: red">
        <?php foreach ($errorss as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php  endif ?>
