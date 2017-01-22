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
                <div class="well" style="background-color: transparent; border-color: transparent">
                    <img class="img img-responsive center-block" src="<?php echo URL ?>img/zoo_bermal.jpg">
                </div>
            </div>
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title">Interface de connexion</h1>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo URL ?>auth/post_login" method="post">
                        <div class="box-body">
                            <?php if (isset($erreur) and (bool)$erreur == true) { ?>
                                <div class="callout callout-danger">
                                    <p><i class="fa fa-exclamation-triangle"></i> L'identifiant et le mot de passe
                                        renseigné ne correspondent pas.</p>
                                </div>
                            <?php } ?>

                            <div class="form-group">
                                <label for="identifiant"><i class="fa fa-user"></i> Identifiant employé </label>
                                <input type="text" required class="form-control" id="identifiant" name="identifiant"
                                       placeholder="Saisir votre identifiant employé"
                                       value="<?php if (!empty($identifiant)) {
                                           echo $identifiant;
                                       } ?>">
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fa fa-key"></i> Mot de passe</label>
                                <input type="password" required class="form-control" id="password" name="password"
                                       placeholder="Saisir votre mot de passe">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-warning">Se connecter</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h1 class="box-title">Bienvenue sur l'interface de gestion du Zoo Bermal</h1>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="callout callout-warning">
                            <p style="font-size: 1.2em"><i class="fa fa-exclamation-triangle"></i> Cette interface est
                                uniquement réservé au personnel du zoo.</p>
                        </div>
                        <p style="font-size: 1.2em">Afin d'accéder au contenu de la plateforme de gestion du Zoo Bermal
                            vous devez vous munir de :</p>
                        <ul style="font-size: 1.2em">
                            <li><i class="fa fa-user"></i> Votre identifiant de connexion</li>
                            <li><i class="fa fa-key"></i> Votre mot de passe</li>
                        </ul>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <p style="font-size: 1.2em"><i class="fa fa-info-circle"></i> En cas de perte de vos
                            identifiants, adressez vous au responsable informatique du parc.</p>
                    </div>
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>