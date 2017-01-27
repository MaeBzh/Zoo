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
                        <h3 class="box-title"><i class="fa fa-paw"></i> Gestion des animaux</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="" style="padding-left: 0">
                            <li class="list-group-item">
                                <a href="<?php echo URL ?>animaux/afficher_zones" class="btn btn-block btn-social btn-warning">
                                    <i class="fa fa-search"></i> Consulter les animaux par zone
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="<?php echo URL ?>animaux/afficher_especes" class="btn btn-block btn-social btn-warning">
                                    <i class="fa fa-search"></i> Consulter les animaux par espèce
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="list-group-item">
                                <a href="<?php echo URL ?>animaux/formulaire_ajout" class="btn btn-block btn-social btn-warning">
                                    <i class="fa fa-plus"></i> Ajouter une nouvelle fiche animal
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="<?php echo URL ?>animaux/afficher_especes" class="btn btn-block btn-social btn-warning">
                                    <i class="fa fa-pencil"></i> Modifier une fiche animal
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="list-group-item">
                                <a href="<?php echo URL ?>animaux/formulaire_ajout_espece" class="btn btn-block btn-social btn-warning">
                                    <i class="fa fa-plus"></i> Ajouter une nouvelle fiche espèce
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a  href="<?php echo URL ?>animaux/afficher_liste_especes" class="btn btn-block btn-social btn-warning">
                                    <i class="fa fa-pencil"></i> Modifier/supprimer une fiche espèce
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="list-group-item">
                                <a href="<?php echo URL ?>animaux/formulaire_ajout_famille" class="btn btn-block btn-social btn-warning">
                                    <i class="fa fa-plus"></i> Ajouter une nouvelle fiche famille
                                </a>
                            </li>
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
