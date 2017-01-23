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
                        <h3 class="box-title"><i class="fa fa-tree"></i> Liste des zones</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Responsable</th>
                                    <th>Zone</th>
                                    <?php if ($utilisateur->type == "secretaire") { ?>
                                        <th>Editer</th>
                                        <th>Supprimer</th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($zones as $zone) { ?>
                                    <tr>
                                        <!-- Responsable -->
                                        <td><?php echo $zone->responsable->nom . " " . $zone->responsable->prenom ?></td>

                                        <!-- Zone -->
                                        <td><?php echo $zone->designation ?></td>

                                        <?php if ($utilisateur->type == "secretaire") { ?>
                                            <!-- Editer -->
                                            <td>
                                                <a href="<?php echo URL ?>zone/formulaire_edition?id=<?php echo $zone->id ?>"
                                                   class="btn btn-warning btn-lg">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>

                                            <!-- Supprimer -->
                                            <td>
                                                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal"
                                                        data-target="#zone_<?php echo $zone->id ?>">
                                                    <i class="fa fa-times"></i>
                                                </button>

                                                <div id="zone_<?php echo $zone->id ?>" class="modal fade" tabindex="-1"
                                                     role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form role="form" method="POST"
                                                                  action="<?php echo URL ?>zone/post_formulaire_suppression">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title">Suppression de la zone</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id"
                                                                           value="<?php echo $zone->id ?>">
                                                                    <p>Etes-vous sûr de vouloir supprimer la
                                                                        zone <?php echo $zone->designation ?> ?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Annuler
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Supprimer
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>