
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?php if (!empty($utilisateur)) { ?>
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="info" style="">
                    <p><i class="fa fa-user"></i> <?php echo $utilisateur->prenom . " " . $utilisateur->nom; ?></p>
                    <p><i class="fa fa-circle text-success"></i> Connecté</p>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Rechercher...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">Menu principal</li>
                <li>
                    <a href="<?php echo URL ?>dashboard">
                        <i class="fa fa-dashboard"></i> Tableau de bord
                    </a>
                </li>
                <?php if ($utilisateur->type == "secretaire") { ?>
                    <li>
                        <a href="<?php echo URL ?>animaux">
                            <i class="fa fa-paw"></i> Gestion des animaux
                        </a>
                    </li>
                <?php } ?>
                <?php if ($utilisateur->type == "secretaire" || $utilisateur->type == "magasinier") { ?>
                    <li>
                        <a href="<?php echo URL ?>aliments">
                            <i class="fa fa-shopping-basket"></i> Gestion des aliments
                        </a>
                    </li>
                <?php } ?>
                <?php if ($utilisateur->type == "responsable_zone") { ?>
                    <li>
                        <a href="<?php echo URL ?>repas">
                            <i class="fa fa-cutlery"></i> Gestion des repas
                        </a>
                    </li>
                <?php } ?>
                <?php if ($utilisateur->type == "secretaire" || $utilisateur->type == "responsable_zone") { ?>
                    <li>
                        <a href="<?php echo URL ?>zone">
                            <i class="fa fa-tree"></i> Gestion des zones
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </section>
        <!-- /.sidebar -->
    </aside>
