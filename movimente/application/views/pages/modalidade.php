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
                <a class="navbar-brand" href="<?php echo base_url('perfil'); ?>">MovimenteSE</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
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
                        <h1 class="page-header">Modalidades</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div>
                <?php
                    if ($msg = get_msg()) {
                        echo $msg;
                        echo '</br>';
                    }
                ?>
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><b><?php echo $modalidades[0]['nome']; ?></b></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p><b><?php echo $modalidades[0]['descricao']; ?></p>
                            <?php
                                if (empty($modalidades[0]['id_usuario'])) {
                                    $nameButton = "Aderir Modalidade";
                                    $disabled = false;
                                } else {
                                    $nameButton = "Modalidade Aderida";
                                    $disabled = true;
                                }
                            ?>
                           <a href="<?php echo base_url('Modalidade/aderir/'.$modalidades[0]['id']); ?>" class="btn btn-primary <?php echo ($disabled ? 'disabled' : ''); ?>"><?php echo $nameButton; ?></a>
                           <a href="<?php echo base_url('Atividade/index/'.$modalidades[0]['id']); ?>" class="btn btn-primary <?php echo (!$disabled ? 'disabled' : ''); ?>">Atividades</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $modalidades[1]['nome']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p><b><?php echo $modalidades[1]['descricao']; ?></p><br><br>
                            <?php
                                if (empty($modalidades[1]['id_usuario'])) {
                                    $nameButton = "Aderir Modalidade";
                                    $disabled = false;
                                } else {
                                    $nameButton = "Modalidade Aderida";
                                    $disabled = true;
                                }
                            ?>
                           <a href="<?php echo base_url('Modalidade/aderir/'.$modalidades[1]['id']); ?>" class="btn btn-success <?php echo ($disabled ? 'disabled' : ''); ?>"><?php echo $nameButton; ?></a>
                           <a href="<?php echo base_url('Atividade/index/'.$modalidades[1]['id']); ?>" class="btn btn-success <?php echo (!$disabled ? 'disabled' : ''); ?>">Atividades</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $modalidades[2]['nome']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p><b><?php echo $modalidades[2]['descricao']; ?></p>
                            <?php
                                if (empty($modalidades[2]['id_usuario'])) {
                                    $nameButton = "Aderir Modalidade";
                                    $disabled = false;
                                } else {
                                    $nameButton = "Modalidade Aderida";
                                    $disabled = true;
                                }
                            ?>
                           <a href="<?php echo base_url('Modalidade/aderir/'.$modalidades[2]['id']); ?>" class="btn btn-warning <?php echo ($disabled ? 'disabled' : ''); ?>"><?php echo $nameButton; ?></a>
                           <a href="<?php echo base_url('Atividade/index/'.$modalidades[2]['id']); ?>" class="btn btn-warning <?php echo (!$disabled ? 'disabled' : ''); ?>">Atividades</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $modalidades[3]['nome']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p><b><?php echo $modalidades[3]['descricao']; ?></p><br>
                            <?php
                                if (empty($modalidades[3]['id_usuario'])) {
                                    $nameButton = "Aderir Modalidade";
                                    $disabled = false;
                                } else {
                                    $nameButton = "Modalidade Aderida";
                                    $disabled = true;
                                }
                            ?>
                           <a href="<?php echo base_url('Modalidade/aderir/'.$modalidades[3]['id']); ?>" class="btn btn-danger <?php echo ($disabled ? 'disabled' : ''); ?>"><?php echo $nameButton; ?></a>
                           <a href="<?php echo base_url('Atividade/index/'.$modalidades[3]['id']); ?>" class="btn btn-danger <?php echo (!$disabled ? 'disabled' : ''); ?>">Atividades</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $modalidades[4]['nome']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p><b><?php echo $modalidades[4]['descricao']; ?></p>
                            <?php
                                if (empty($modalidades[4]['id_usuario'])) {
                                    $nameButton = "Aderir Modalidade";
                                    $disabled = false;
                                } else {
                                    $nameButton = "Modalidade Aderida";
                                    $disabled = true;
                                }
                            ?>
                           <a href="<?php echo base_url('Modalidade/aderir/'.$modalidades[4]['id']); ?>" class="btn btn-danger <?php echo ($disabled ? 'disabled' : ''); ?>"><?php echo $nameButton; ?></a>
                           <a href="<?php echo base_url('Atividade/index/'.$modalidades[4]['id']); ?>" class="btn btn-danger <?php echo (!$disabled ? 'disabled' : ''); ?>">Atividades</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $modalidades[5]['nome']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p><b><?php echo $modalidades[5]['descricao']; ?></p>
                            <?php
                                if (empty($modalidades[5]['id_usuario'])) {
                                    $nameButton = "Aderir Modalidade";
                                    $disabled = false;
                                } else {
                                    $nameButton = "Modalidade Aderida";
                                    $disabled = true;
                                }
                            ?>
                           <a href="<?php echo base_url('Modalidade/aderir/'.$modalidades[5]['id']); ?>" class="btn btn-primary <?php echo ($disabled ? 'disabled' : ''); ?>"><?php echo $nameButton; ?></a>
                           <a href="<?php echo base_url('Atividade/index/'.$modalidades[5]['id']); ?>" class="btn btn-primary <?php echo (!$disabled ? 'disabled' : ''); ?>">Atividades</a>
                        </div>
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