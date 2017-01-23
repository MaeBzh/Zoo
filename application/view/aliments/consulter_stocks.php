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
                        <h3 class="box-title"><i class="fa fa-shopping-basket"></i> Liste des stocks</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Aliment</th>
                                    <th>Quantité en stock</th>
                                    <th>Aliment de substitution</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($aliments as $aliment) { ?>
                                    <tr>
                                        <!-- Aliment -->
                                        <td><?php echo $aliment->designation ?></td>

                                        <!-- Quantité -->
                                        <td><?php echo $aliment->quantite_dispo ?></td>

                                        <!-- Substitution -->
                                        <td><?php echo $aliment->substitut->designation ?></td>

                                        <!--<td>
                                            <a href="<?php /*echo URL */?>zone/formulaire_edition?id=<?php /*echo $zone->id */?>"
                                               class="btn btn-warning btn-lg">
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
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>