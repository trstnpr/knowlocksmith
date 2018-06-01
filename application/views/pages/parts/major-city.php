<?php
    if(!empty(major_area())) {
?>
<div class="popcity-wrap">

    <ul class="row">

    <?php
        foreach(major_area() as $popcity) {
    ?>
    	<li class="col-md-3 col-sm-4 col-xs-6"><a href="<?php echo base_url('city/'.$popcity->slug); ?>"><?php echo $popcity->name; ?></a></li>
    <?php } ?>
    </ul>
    
</div>
<?php } ?>