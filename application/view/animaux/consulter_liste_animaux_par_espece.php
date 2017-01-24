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
                        <h3 class="box-title"><i class="fa fa-paw"></i> Liste des animaux par espece</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Sexe</th>
                                    <th>Date de naissance</th>
                                    <th>Date d'arrivée</th>
                                    <th>Procédé d'identification</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($animaux as $animal) { ?>
                                    <tr>
                                        <td><?php echo $animal->nom?></td>
                                        <td><?php echo $animal->sexe?></td>
                                        <td><?php echo $animal->date_naissance?></td>
                                        <td><?php echo $animal->date_arrivee?></td>
                                        <td><?php echo $animal->procede_identification?></td>

                                       <!-- <td>
                                            <a href="<?php /*echo URL */?>animaux/consulter_liste_animaux_par_zone?id=<?php /*echo $animal->zone_id */?>" class="btn btn-warning btn-lg">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php /*echo URL */?>animaux/formulaire_edition?id=<?php /*echo $animal->id */?>" class="btn btn-warning btn-lg">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>-->


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
            <button type="button" class="btn btn-warning btn_retour"><a class="btn_retour" href="<?php echo URL ?>animaux/afficher_especes" >Retour à la liste des espèces</a></button>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>