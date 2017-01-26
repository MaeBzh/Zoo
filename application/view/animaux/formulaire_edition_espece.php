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
                        <h3 class="box-title"><i class="fa fa-paw"></i> Edition de la fiche <b><?php echo $espece->nom_vulgaire ?></b></h3>
                    </div>
                    <form role="form" method="post" action="<?php echo URL ?>animaux/post_formulaire_edition_espece">
                        <input type="hidden" name="id" value="<?php echo $espece->id ?>">
                        <div class="box-body">

                            <div class="form-group">
                                <label>Nom vulgaire</label>
                                <input type="text" class="form-control" name="nom_vulgaire" required value="<?php echo $espece->nom_vulgaire ?>">
                            </div>
                            <div class="form-group">
                                <label>Nom scientifique</label>>
                                <input type="text" class="form-control" name="nom_scientifique" required value="<?php echo $espece->nom_scientifique ?>">
                            </div>
                            <div class="form-group">
                                <label>Nombre estimé d'individus</label>
                                <input type="text" class="form-control" name="nbre_individus_vivants" required value="<?php echo $espece->nbre_individus_vivants ?>">
                            </div>
                            <div class="form-group">
                                <label>Espèce menacée</label>
                                <select class="form-control" name="espece_menacee">
                                    <?php foreach ($menaces as $menace) { ?>
                                        <option value="<?php echo $menace ?>" <?php if ($menace == $espece->espece_menacee) { echo "selected"; } ?>><?php echo $menace?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sélectionnez la famille</label>
                                <select class="form-control" name="famille">
                                    <?php foreach ($familles as $famille) { ?>
                                        <option value="<?php echo $famille->id ?>" <?php if ($famille->id == $espece->famille_id) { echo "selected"; } ?>><?php echo $famille->designation?></option>
                                    <?php } ?>
                                </select>
                            </div>
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