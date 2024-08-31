<?php
require_once('./bd/conecta_bd.php');
require_once('valida_session.php');



unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['senha']);

$tasks = [];
$priorityTasks = [];
$conexao = conecta_bd();


//alimentar a variavel $priorityTasks com as tarefas que possuem prioridade como objeto iteravel
$sqlPriorityTasks = "SELECT * FROM task WHERE priority = 1";
$resultPriorityTasks = mysqli_query($conexao, $sqlPriorityTasks);

$sqlNoPriorityTasks = "SELECT * FROM task WHERE priority = 0";
$resultNoPriorityTasks = mysqli_query($conexao, $sqlNoPriorityTasks);



$users = [];

$sqlUsers = "SELECT cod, nome FROM usuario";
$resultUsers = mysqli_query($conexao, $sqlUsers);

if ($resultUsers && mysqli_num_rows($resultUsers) > 0) {
    $users = mysqli_fetch_all($resultUsers, MYSQLI_ASSOC);
}

$sql = "SELECT * FROM task";
$result = mysqli_query($conexao, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_close($conexao);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        /* Estilos adicionais para a sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000;
            padding: 48px 0;
            /* Ajuste o padding conforme necessário */
            background-color: #4B0082;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(10%, #4B0082), to(#224abe));
            background-image: linear-gradient(180deg, #4B0082 10%, #224abe 100%);
            background-size: cover;
            /* Cor de fundo da sidebar */
        }

        .sidebar-brand {
            padding: 0 20px;
            font-size: 1.5rem;
            line-height: 56px;
            color: #fff;
            /* Cor do texto */
        }

        .sidebar-nav {
            margin-top: 20px;
        }

        .sidebar-nav .nav-link {
            color: rgba(255, 255, 255, 0.75);
            /* Cor do texto dos links */
        }

        .sidebar-nav .nav-link.active {
            color: #fff;
            /* Cor do texto dos links ativos */
        }

        #content {
            width: 60%;
            /* Aumentar a largura para 90% da tela */
            max-width: 1200px;
            /* Limitar a largura máxima para não ficar exagerado em telas grandes */
            margin: 20px auto;
            /* Centralizar a div e adicionar espaçamento */
            padding: 20px;
            background-color: #1e1e2f;
            /* Manter o fundo escuro */
            border-radius: 15px;
            /* Bordas arredondadas para dar um visual agradável */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* Adicionar uma sombra suave */
        }

        #to_do {
            width: 100%;
            /* Fazer a div ocupar toda a largura disponível */
            padding: 20px;
        }

        .to-do-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Ajustar o campo de texto e o botão para caberem lado a lado */
        input[name="description"] {
            width: 55%;
            font-size: 25px;
            /* Ajuste fino para aumentar o input */
        }

        select {
            width: 28%;
            /* Diminuir a largura */
            padding: 10px;
            margin-left: 15px;
            border-radius: 10px;
            border: 1px solid #eaeaea;
            background-color: #252839;
            color: #ffffff;
            font-size: 13px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            text-align: center;

        }

        .task-description {
            display: flex;
        }

        .task-description-date {
            font-size: 0.9rem;
            color: #03bb85;
            margin-left: 40px;

            /* Impede que a data quebre para uma nova linha */
        }

        /* Ajustar o tamanho do botão de adição */
        .form-button {
            width: 45px;
            height: 45px;
            margin-left: 10px;
        }

        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #252839;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Icone do botão de adição */
        .form-button i {
            font-size: 20px;

        }

        .container {
            display: flex;
            gap: 20px;
            /* Espaçamento entre as colunas, ajuste conforme necessário */
        }

        .column {
            flex: 1;
            /* Faz com que ambas as colunas tenham o mesmo tamanho */
        }

        input[name="data"] {
            width: 150px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #eaeaea;
            background-color: #252839;
            color: #ffffff;
            font-size: 16px;
            -webkit-appearance: none;
            /* Remove estilos padrões do navegador */
            -moz-appearance: none;
            appearance: none;
        }
        .picture{
            width: 50px;
            height: 50px;
        }
        
        /* Ajustar o estilo para o select em dispositivos móveis */
        @media (max-width: 600px) {
            select {
                width: 100%;
                text-align: left;
            }
        }
    </style>
    <title>Lista de afazeres</title>
</head>

<body>
    <!-- Sidebar -->

    <nav class="sidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
            <img class="picture" src="/img/favicon-alvina.png" alt="fotinha"> <p>TASK ADM</p>
        </a>

        <hr class="sidebar-divider my-0">
        <ul class="sidebar-nav">

            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Prioridades</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="usuario.php">
                    <i class="fa fa-user-circle mr-2"></i>
                    Administradores
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="to_do_list.php">
                    <i class="fas fa-fw fa-clipboard-list mr-2"></i>
                    Tarefas
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="cliente.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Usuários</span></a>
            </li>
            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="contato.php">
                    <i class="fa fa-envelope"></i>
                    <span>Contato</span></a>
            </li>
        </ul>
    </nav>

    </ul>

    <!-- Conteúdo da página -->
    <!-- Conteúdo da página -->
    <div id="content">
        <!-- Aqui vai o conteúdo da sua página -->
        <div id="to_do">
            <h1>Lista de Afazeres</h1>

            <form action="actions/create.php" method="POST" class="to-do-form">
                <input type="text" name="description" placeholder="Escreva aqui a descrição" required>

                <input type="date" name="data" value="2024-08-30" />

                <!-- Novo campo de seleção de usuário -->
                <select name="user_id" required>
                    <option value="">Selecione um usuário</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['cod'] ?>"><?= htmlspecialchars($user['nome']) ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- novo campo para decidir se a tarefa sera prioridade -->
                <select name="priority" required>
                    <option value="0">Normal</option>
                    <option value="1">Prioridade</option>
                </select>

                <button type="submit" class="form-button">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </form>

            <div class="container">
                <div class="column">
                    <h1>Tarefas com prioridade</h1>
                    <div id="tasks">
                        <?php foreach ($resultPriorityTasks as $task): ?>
                            <div class="task">
                                <input
                                    type="checkbox"
                                    name="progress"
                                    class="progress <?= $task['completed'] ? 'done' : '' ?>"
                                    data-task-id="<?= $task['id'] ?>"
                                    <?= $task['completed'] ? 'checked' : '' ?>>
                                <p class="task-description">
                                    <?= htmlspecialchars($task['description']) ?>

                                </p>



                                <div class="task-actions">
                                    <p class="task-description-date"><?= date('d/m/Y', strtotime($task['data'])) ?></p>
                                    <a class="action-button edit-button">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="actions/delete.php?id=<?= $task['id'] ?>" class="action-button delete-button">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                                <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
                                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                    <input type="text" name="description" placeholder="Edite sua tarefa aqui" value='<?= htmlspecialchars($task['description']) ?>'>

                                    <input type="date" name="data" value="2024-08-30" />

                                    <button type="submit" class="form-button confirm-button">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="column">
                    <h1>Tarefas sem prioridade</h1>
                    <div id="tasks">
                        <?php foreach ($resultNoPriorityTasks as $task): ?>
                            <div class="task">
                                <input
                                    type="checkbox"
                                    name="progress"
                                    class="progress <?= $task['completed'] ? 'done' : '' ?>"
                                    data-task-id="<?= $task['id'] ?>"
                                    <?= $task['completed'] ? 'checked' : '' ?>>
                                <p class="task-description">
                                    <?= htmlspecialchars($task['description']) ?>
                                </p>
                                <div class="task-actions">
                                    <p class="task-description-date"><?= date('d/m/Y', strtotime($task['data'])) ?></p>
                                    <a class="action-button edit-button">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="actions/delete.php?id=<?= $task['id'] ?>" class="action-button delete-button">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                                <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
                                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                    <input type="text" name="description" placeholder="Edite sua tarefa aqui" value='<?= htmlspecialchars($task['description']) ?>'>
                                    <input type="date" name="data" value="2024-08-30" />
                                    <button type="submit" class="form-button confirm-button">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>