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
                        <h3 class="box-title"><i class="fa fa-cutlery"></i> Ajout d'une fiche repas pour la zone :
                            <b><?php echo $zone->designation; ?></b></h3>
                    </div>
                    <form role="form" method="post" action="<?php echo URL ?>repas/post_formulaire_ajout">
                        <div class="box-body">
                            <input type="hidden" name="zone" value="<?php echo $zone->id; ?>">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Aliment</th>
                                    <th>Quantité à distribuer</th>
                                    <th>Quantité en stock</th>
                                    <th>Aliment de substitut</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($aliments_zone as $aliment_id => $aliment) { ?>
                                    <tr <?php if ($aliment["quantite_voulue"] > $aliment["quantite_dispo"]) { echo "class='danger'"; } ?>>
                                        <td>
                                            <?php echo $aliment["designation"]; ?>
                                            <?php if ($aliment["quantite_voulue"] > $aliment["quantite_dispo"]) { ?>
                                                <span class="text-danger" style="margin: 0px 7px "><i class="fa fa-exclamation-triangle"></i> Quantité en stock insuffisant !</span>
                                            <?php } ?>
                                            <input type="hidden" name="aliment[]" value="<?php echo $aliment_id; ?>" >
                                        </td>
                                        <td><input type="number" class="form-control" name="quantite[]" value="<?php echo $aliment["quantite_voulue"]; ?>" min="0" max="<?php echo $aliment["quantite_dispo"]; ?>" required></td>
                                        <td><?php echo $aliment["quantite_dispo"]; ?></td>
                                        <td><?php echo $aliment["substitut"]; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

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