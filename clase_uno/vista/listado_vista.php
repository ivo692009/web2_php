<?php if(!isset($control)): ?>
    <h1>Morite</h1>
    <?php die(); ?>     
<?php endif;?>

<?php require __DIR__. '/cabeza.php';?>

        <p>Edad ingresada : <?php echo $edad ?></p>
        <p>Nombre ingresado:<?php echo $nombre?></p>
            <?php if($edad > 18) : ?>
                <h2>Bienvenido mayor de edad</h2>
            <?php else:?>
                <h2 style="color: red"> No sos mayor de edad, raja de aca</h2>
            <?php endif;?>
                
                
             <?php foreach ($frutas as $item):?>
                 <li><?php echo $item;?></li>
             <?php endforeach;?>
            
<?php require __DIR__.'/pie.php';?>