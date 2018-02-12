<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MovimenteSE</title>

    <link rel="shortcut icon" href="<?php echo base_url('clicknrun.ico') ?>" type="image/x-icon" />

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('Perfil'); ?>">MovimenteSE</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <label><?php echo $this->session->userdata('usuario_logado'); ?></label>
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="<?php echo base_url('Usuario/alterar'); ?>"><i class="fa fa-edit fa-fw"></i> Alterar Usuário</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('Usuario/excluir'); ?>"><i class="fa fa-trash-o fa-fw"></i> Excluir Usuário</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url('Perfil'); ?>"><i class="glyphicon glyphicon-home"></i> Página Inicial</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Modalidade'); ?>"><i class="glyphicon glyphicon-th-list"></i> Modalidades</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Recompensa'); ?>"><i class="glyphicon glyphicon-usd"></i> Recompensas</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Login/deslogar'); ?>"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pagina Inicial</h1>
                    </div>
                </div>
                <?php
                    if ($msg = get_msg()) {
                        echo $msg;
                        echo '</br>';
                    }
                ?>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Perfil</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>Nome:</b> <?php echo $nome; ?>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>E-mail:</b> <?php echo $email; ?>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>Data Nascimento:</b> <?php echo $dataNascimento; ?>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>Idade:</b> <?php echo $idade; ?>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>Medidas Corporais</b>
                            </div>
                            <div class="panel-body">
                            <p><b>Altura:</b> <?php echo $altura; ?></p>
                            <p><b>Peso:</b> <?php echo $peso; ?></p>
                            <p><b>Biceps:</b> <?php echo $biceps; ?></p>
                            <p><b>Antebraço:</b> <?php echo $antebraco; ?></p>
                            <p><b>Peito:</b> <?php echo $peito; ?></p>
                            <p><b>Cintura:</b> <?php echo $cintura; ?></p>
                            <p><b>Quadris:</b> <?php echo $quadris; ?></p>
                            <p><b>Coxas:</b> <?php echo $coxas; ?></p>
                            <p><b>Panturrilha:</b> <?php echo $panturrilha; ?></p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"">Cadastrar / Atualizar</button>
                            <a class="btn btn-primary" href="<?php echo base_url('MedidasCorporais') ?>">Histórico de Medias Corporais</a>
                            </div>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Medidas Corporais</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="panel-body">
                                                <form role="form" method="post" action="<?php echo base_url('Perfil/incluirMedidasCorporais'); ?>">
                                                    <fieldset>                                                        
                                                        <div class="form-group">
                                                            <input type="text" name="altura" value="" class="form-control" autofocus="autofocus" placeholder="Altura">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="peso" value="" class="form-control" placeholder="Peso">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="biceps" value="" class="form-control" placeholder="Biceps">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="antebraco" value="" class="form-control" placeholder="Antebraço">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="peito" value="" class="form-control" placeholder="Peito">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="cintura" value="" class="form-control" placeholder="Cintura">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="quadris" value="" class="form-control" placeholder="Quadris">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="coxas" value="" class="form-control" placeholder="Coxas">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="panturrilha" value="" class="form-control" placeholder="Panturrilha">
                                                        </div>
                                                        <div>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                            <input type="submit" class="btn btn-primary" value="Salvar Alterações">
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>

</body>

</html>