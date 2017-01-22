<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--    <section class="content-header">-->
    <!--        <h1>-->
    <!--            General Form Elements-->
    <!--            <small>Preview</small>-->
    <!--        </h1>-->
    <!--        <ol class="breadcrumb">-->
    <!--            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
    <!--            <li><a href="#">Forms</a></li>-->
    <!--            <li class="active">General Elements</li>-->
    <!--        </ol>-->
    <!--    </section>-->

    <!-- Main content -->
    <section class="content">
        <div class="row ">

            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-cutlery"></i> Ajout d'une fiche repas</h3>
                    </div>
                    <form role="form" method="post" action="<?php echo URL ?>repas/post_formulaire_ajout">
                        <div class="box-body">

                            <div class="form-group">
                                <label>Sélectionnez la zone du repas</label>
                                <select class="form-control" name="zone">
                                    <?php foreach ($zones as $zone) { ?>
                                        <option
                                            value="<?php echo $zone->id ?>"><?php echo $zone->designation ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div id="aliments">
                                <div id="aliment_reference" class="row">
                                    <div class="form-group col-md-5">
                                        <label>Sélectionnez un aliment</label>
                                        <select class="form-control" name="aliment[]" required>
                                            <?php foreach ($aliments as $aliment) { ?>
                                                <option
                                                    value="<?php echo $aliment->id ?>"><?php echo $aliment->designation ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Saisissez une quantité</label>
                                        <input type="number" class="form-control" name="quantite[]" required>
                                    </div>
                                    <div class="supprimer_aliment col-md-2 hide">
                                        <label>Supprimer</label>
                                        <button id="btn_supprimer_aliment" class="btn btn-default form-control" type="button"><i
                                                class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <button id="btn_ajout_aliment" class="btn btn-default" type="button"><i
                                    class="fa fa-plus"></i> Ajouter un aliment
                            </button>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-warning">Valider</button>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>