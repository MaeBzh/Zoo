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
                        <h3 class="box-title"><i class="fa fa-tree"></i> Gestion des zones</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="" style="padding-left: 0">
                            <!-- Secretaire + Responsable -->
                            <li class="list-group-item">
                                <a href="<?php echo URL ?>zone/consulter_zones"
                                   class="btn btn-block btn-social btn-warning">
                                    <i class="fa fa-search"></i>
                                    <?php if($utilisateur->type == "secretaire"){
                                        echo "Consulter, modifier, supprimer les zones";
                                    } else {
                                        echo "Consulter les zones";
                                    } ?>
                                </a>
                            </li>

                            <!-- Secretaire -->
                            <?php if ($utilisateur->type == "secretaire") { ?>
                                <li class="list-group-item">
                                    <a href="<?php echo URL ?>zone/formulaire_ajout"
                                       class="btn btn-block btn-social btn-warning">
                                        <i class="fa fa-plus"></i> Ajouter une nouvelle zone
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>
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