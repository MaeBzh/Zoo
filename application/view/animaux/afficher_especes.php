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
                        <h3 class="box-title"><i class="fa fa-paw"></i> Liste des espèces</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Désignation</th>
                                    <th>Afficher la liste des animaux</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($especes as $espece) { ?>
                                    <tr>
                                        <!-- Zone -->
                                        <td><?php echo $espece->nom_vulgaire ?></td>
                                        <td>
                                            <a href="<?php echo URL ?>animaux/consulter_liste_animaux_par_espece?id=<?php echo $espece->id ?>"
                                               class="btn btn-warning btn-lg">
                                                <i class="fa fa-paw"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php }?>
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