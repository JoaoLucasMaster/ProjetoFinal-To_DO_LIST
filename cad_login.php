<?php
session_start();
require_once('header.php'); 
?>

<body class="bg-gradient-primary bg-gradient-primary d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="container">

        
        <div class="row justify-content-center">

            <div class="">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-4">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class=" ">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">CADASTRE-SE</h1>
                                    </div>
                                   <?php
                                    if (isset($_SESSION['texto_erro_login'])):
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro_login'] ?></strong> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                   <?php
									unset($_SESSION['texto_erro_login']);
                                    endif;
                                   ?>
                                   
                                    <form class="user" action="valida_senha.php" method="post">
                                        <div class="form-group">
                                            <label> Email </label>
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Endereço de Email..." required>
                                        </div>
                                        <div class="form-group">
                                            <label> Senha </label>
                                            <input type="password" class="form-control form-control-user"
                                                id="senha" name="senha" placeholder="Senha" required>
                                        </div>

                                        
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Alterar Senha
                                        </button>   
                                        
                                        

                                    </form>
                                    
                                    <div class="text-center">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/validate.js"></script>


