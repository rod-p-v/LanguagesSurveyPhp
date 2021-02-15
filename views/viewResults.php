<div class="opcion">

<?php 

$widthBar = $porcentage*5;
$style="bar";

if ($survey->getOptionSelected() == $result['opcion']) {
    $style="selected";
}

echo $result['opcion'];

?>

<div class="<?php echo $style; ?>" style="width: <?php echo $widthBar.'px'?>"><?php echo $porcentage.'%'?></div>

</div>

