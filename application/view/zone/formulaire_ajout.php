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
                        <h3 class="box-title"><i class="fa fa-tree"></i> Ajout d'une zone</h3>
                    </div>
                    <form role="form" method="post" action="<?php echo URL ?>zone/post_formulaire_ajout">
                        <div class="box-body">

                            <div class="form-group">
                                <label>Sélectionnez le responsable</label>
                                <select class="form-control" name="responsable">
                                    <?php foreach ($responsables as $responsable) { ?>
                                        <option
                                            value="<?php echo $responsable->id ?>"><?php echo $responsable->nom." ".$responsable->prenom ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Saisissez un nom de zone</label>
                                <input type="text" class="form-control" name="designation" required>
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