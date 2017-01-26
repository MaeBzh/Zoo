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
                        <h3 class="box-title"><i class="fa fa-paw"></i> Edition de la fiche <b><?php echo $famille->designation ?></b></h3>
                    </div>
                    <form role="form" method="post" action="<?php echo URL ?>animaux/post_formulaire_edition_famille">
                        <input type="hidden" name="id" value="<?php echo $famille->id ?>">
                        <div class="box-body">

                            <div class="form-group">
                                <label>Désignation</label>
                                <input type="text" class="form-control" name="designation" required value="<?php echo $famille->designation ?>">
                            </div>
                            <div class="form-group">
                                <label>Code</label>>
                                <input type="text" class="form-control" name="code" required value="<?php echo $famille->code ?>">
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