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
    <div class="container">
        <div class="col-md-3 col-md-offset-1">
            <img src="<?php echo base_url('assets/img/header.png'); ?>">
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $titulo ?></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <?php
                                    if ($msg = get_msg()) {
                                        echo $msg;
                                        echo '</br>';
                                    }
                                    echo form_open();
                                ?>
                                <div class="form-group">
                                    <?php
                                        $extra = [
                                            'class' => 'form-control',
                                            'autofocus' => 'autofocus',
                                            'placeholder' => 'Usuário'
                                        ];
                                        echo form_input('usuario', set_value('usuario'), $extra);
                                    ?>
                                    <!--<input class="form-control" placeholder="Usuário" name="usuario" autofocus> -->
                                </div>
                                <div class="form-group">
                                    <?php
                                        $extra = [
                                            'class' => 'form-control',
                                            'placeholder' => 'Senha'
                                        ];
                                        echo form_password('senha', set_value('senha'), $extra);
                                    ?>
                                    <!--<input class="form-control" placeholder="Senha" name="password" type="password" value=""> -->
                                </div>
                                <?php
                                        $extra = [
                                            'class' => 'btn btn-lg btn-success btn-block'
                                        ];
                                        echo form_submit('botao', 'Entrar', $extra);
                                        echo form_close();
                                ?>
                                <!-- Change this to a button or input when using this as a form -->
                                <p> <br>Não tem uma conta? <a href="<?php echo base_url('Usuario/incluir'); ?>">Crie uma!</a></p>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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