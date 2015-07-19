
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pays <a class="button pull-right" href="<?php echo base_url() . 'walkadmin/pays_admin/creer/'; ?>"><i class="fa fa-plus"></i> Ajouter</a></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row"style="height:auto;">
        <div class="col-md-12">
            <div class="contain-svg">
                <?php 
                    $svg = file_get_contents(img_url('walkadmin/world.svg'));
                    echo $svg;
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    <?php foreach($pays as $paysActuel){?>
        $('#<?php echo $paysActuel->code_pays; ?>')[0].setAttribute("class", "land active");
        $('#<?php echo $paysActuel->code_pays; ?>')[0].setAttribute("onclick", "document.location.href='<?php echo base_url().'walkadmin/pays_admin/detail/'.$paysActuel->idPays; ?>'");
    <?php } ?>
</script>