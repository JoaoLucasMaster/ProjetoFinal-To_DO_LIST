<?php
session_start();
require_once('header.php'); 
?>

<body class="bg-gradient-primary bg-gradient-primary d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="container">

        <!--TODO: MAKE THIS CARD HAVE NO ROWS OR COLS, ONLY CENTER ELEMENT-->
        
        <div class="row justify-content-center">
        <div class="container-fluid">

<div class="card shadow mb-2">
    <div class="card-header py-3 ">
        <div class="row justify-content-center">
            <div class="justify-content-center">
                <h6 class="m-0 font-weight-bold text-primary" id="title">CADASTRE-SE</h6>
            </div>
        </div>
    </div>
    
    <div class="card-body">
        <?php if (isset($_SESSION['texto_erro'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['texto_erro']); endif; ?>

        <?php if (isset($_SESSION['texto_sucesso'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check"></i>&nbsp;&nbsp;<?= $_SESSION['texto_sucesso'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['texto_sucesso']); endif; ?>

        <form class="user" action="cad_cliente_envia.php" method="post">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label> Nome Completo </label>
                    <input type="text" class="form-control form-control-user" id="nome" name="nome" value="<?php if (!empty($_SESSION['nome'])) { echo $_SESSION['nome'];} ?>" placeholder="Nome Completo" required>
                </div>
                <div class="col-sm-6">
                    <label> Email </label>
                    <input type="email" class="form-control form-control-user" id="email" name="email" value="<?php if (!empty($_SESSION['email'])) { echo $_SESSION['email'];} ?>" placeholder="Endereço de Email" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label> Senha </label>
                    <input type="password" class="form-control form-control-user" id="senha" name="senha" placeholder="Senha" required>
                </div>
                <div class="col-sm-6">
                    <label> Confirmar Senha </label>
                    <input type="password" class="form-control form-control-user" id="confirma_senha" name="confirma_senha" placeholder="Confirmar Senha" oninput="validatepassword(this)" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Telefone</label>
                    <input type="tel" class="form-control form-control-user" id="telefone" name="telefone" placeholder="(xx)xxxxx-xxxx" value="<?php if (!empty($_SESSION['telefone'])) { echo $_SESSION['telefone'];} ?>" maxlength="15" required>
                </div>
                <div class="col-sm-6">
                    <label> Situação </label>
                    <select class="form-control" id="status" name="status" required>
                        <option value=""> </option>
                        <option value="1">Ativo</option>
                        <option value="2">Inativo</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label> Estado </label>
                    <input type="text" class="form-control form-control-user" id="estado" name="estado" value="<?php if (!empty($_SESSION['estado'])) { echo $_SESSION['estado'];} ?>" required>
                </div>
                <div class="col-sm-6">
                    <label> CEP </label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-user" id="cep" name="cep" value="<?php if (!empty($_SESSION['cep'])) { echo $_SESSION['cep'];} ?>" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" id="buscaCepBtn">Buscar CEP</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label> Endereço </label>
                    <input type="text" class="form-control form-control-user" id="endereco" name="endereco" value="<?php if (!empty($_SESSION['endereco'])) { echo $_SESSION['endereco'];} ?>" required>
                </div>
                <div class="col-sm-6">
                    <label> Número </label>
                    <input type="number" class="form-control form-control-user" id="numero" name="numero" value="<?php if (!empty($_SESSION['numero'])) { echo $_SESSION['numero'];} ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label> Bairro </label>
                    <input type="text" class="form-control form-control-user" id="bairro" name="bairro" value="<?php if (!empty($_SESSION['bairro'])) { echo $_SESSION['bairro'];} ?>" required>
                </div>
                <div class="col-sm-6">
                    <label> Cidade </label>
                    <input type="text" class="form-control form-control-user" id="cidade" name="cidade" value="<?php if (!empty($_SESSION['cidade'])) { echo $_SESSION['cidade'];} ?>" required>
                </div>
            </div>

            <div class="card-footer text-muted" id="btn-form">
                <div class="text-right">
                    <a title="Voltar" href="cliente.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar</button></a>
                    <a title="Adicionar"><button type="submit" name="updatebtn" class="btn btn-primary updatebtn"><i class="fas fa-fw fa-user">&nbsp;</i>Adicionar</button></a>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
  
            
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
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#buscaCepBtn').click(function() {
            var cep = $('#cep').val().replace(/\D/g, '');
            if (cep != "") {
                $.post('buscaCep.php', { cep: cep }, function(dados) {
                    if (!dados.erro) {
                        if (dados.logradouro) {
                            $('#endereco').val(dados.logradouro);
                        }
                        if (dados.bairro) {
                            $('#bairro').val(dados.bairro);
                        }
                        if (dados.localidade) {
                            $('#cidade').val(dados.localidade);
                        }
                        if (dados.uf) {
                            $('#estado').val(dados.uf);
                        }
                    } else {
                        alert('CEP não encontrado.');
                    }
                }, 'json').fail(function() {
                    alert('Erro ao buscar o CEP.');
                });
            } else {
                alert('Formato de CEP inválido.');
            }
        });
    });
</script>


