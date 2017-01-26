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
        <div class="row">
            <div class="col-md-8">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quantité de stock disponible par aliment (avec indice de stock critique)</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart">
                            <canvas id="stocks_aliments" height="1" width="3"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-4">
                <!-- LINE CHART -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Répartition des animaux par espèce</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart">
                            <canvas id="nb_animaux_especes" height="2" width="3"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quantité estimative des aliments mangés chaque jour</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart">
                            <canvas id="nb_aliments_manges_jour" height="1" width="3"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>

            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Répartition des animaux par zone</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart">
                            <canvas id="nb_animaux_zones" height="1" width="3"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (RIGHT) -->
        </div>

    </section>
    <!-- /.content -->
</div>

