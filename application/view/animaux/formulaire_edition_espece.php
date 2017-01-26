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
                        <h3 class="box-title"><i class="fa fa-paw"></i> Edition de la fiche de <?php echo $animal->nom ?></h3>
                    </div>
                    <form role="form" method="post" action="<?php echo URL ?>animaux/post_formulaire_edition">
                        <input type="hidden" name="id" value="<?php echo $animal->id ?>">
                        <div class="box-body">

                            <div class="form-group">
                                <label>Sélectionnez l'espèce</label>
                                <select class="form-control" name="espece">
                                    <?php foreach ($especes as $espece) { ?>
                                        <option value="<?php echo $espece->id ?>" <?php if ($espece->id == $animal->espece_id) { echo "selected"; } ?>><?php echo $espece->nom_vulgaire?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sélectionnez la zone</label>
                                <select class="form-control" name="zone">
                                    <?php foreach ($zones as $zone) { ?>
                                        <option value="<?php echo $zone->id ?>" <?php if ($zone->id == $animal->zone_id) { echo "selected"; } ?>><?php echo $zone->designation?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="nom" required value="<?php echo $animal->nom ?>">
                            </div>
                            <div class="form-group">
                                <label>Sexe</label>
                                <select class="form-control" name="sexe">
                                    <?php foreach ($sexes as $sexe) { ?>
                                        <option value="<?php echo $sexe ?>" <?php if ($sexe == $animal->sexe) { echo "selected"; } ?>><?php echo $sexe?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date de naissance</label>
                                <input type="date" class="form-control" name="date_naissance" required value="<?php echo $animal->date_naissance ?>">
                            </div>
                            <div class="form-group">
                                <label>Date d'arrivée</label>
                                <input type="date" class="form-control" name="date_arrivee" required value="<?php echo $animal->date_arrivee ?>">
                            </div>
                            <div class="form-group">
                                <label>Date de décès</label>
                                <input type="date" class="form-control" name="date_deces"  value="<?php echo $animal->date_deces ?>">
                            </div>
                            <div class="form-group">
                                <label>Procéde d'identification</label>
                                <select class="form-control" name="procede_identification">
                                    <?php foreach ($procedes_identification as $procede_identification) { ?>
                                        <option value="<?php echo $procede_identification ?>" <?php if ($procede_identification == $animal->procede_identification) { echo "selected"; } ?>><?php echo $procede_identification?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Numéro d'identification</label>
                                <input type="text" class="form-control" name="numero" required value="<?php echo $animal->numero ?>">
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