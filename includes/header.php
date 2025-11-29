<?php
// ============================================================
// HEADER.PHP – Carregado em todas as páginas protegidas
// ============================================================

session_start();

// ---------------------------------------
// 1. Verifica se usuário está logado
// ---------------------------------------

// ---------------------------------------
// 2. Carrega dados do usuário
// ---------------------------------------
$user_id = $_SESSION['user_id'];

$query = $pdo->prepare("SELECT nome, avatar, xp, nivel, moedas, streak 
                        FROM users 
                        WHERE id = :id");
$query->execute(['id' => $user_id]);
$usuario = $query->fetch(PDO::FETCH_ASSOC);



// Dados do usuário
$nome       = $usuario['nome'];
$avatar     = $usuario['avatar'];
$xp         = $usuario['xp'];
$nivel      = $usuario['nivel'];
$moedas     = $usuario['moedas'];
$streak     = $usuario['streak'];

?>

<!-- ============================================================
     INÍCIO DO HEADER (HTML)
     ============================================================ -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<header class="header">
    <div class="container">

        <!-- ------------------------------
             LOGO DA PLATAFORMA
        ---------------------------------->
        <div class="logo">
            <a href="index.php">
                <img src="assets/img/logo.png" alt="Felés" height="48">
            </a>
        </div>

        <!-- ------------------------------
             MENU DE NAVEGAÇÃO
        ---------------------------------->
        <nav class="menu">
            <ul>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a href="desafios.php">Desafios</a></li>
                <li><a href="ranking.php">Ranking</a></li>
                <li><a href="loja.php">Loja</a></li>
                <li><a href="perfil.php">Perfil</a></li>
            </ul>
        </nav>

        <!-- ------------------------------
             ÁREA DO USUÁRIO
        ---------------------------------->
        <div class="user-info">

            <div class="user-stats">
                <span class="stat">
                    <i class="fa-solid fa-fire"></i> <strong><?= $streak ?></strong> dias
                </span>

                <span class="stat">
                    <i class="fa-solid fa-star"></i> XP: <strong><?= $xp ?></strong>
                </span>

                <span class="stat">
                    <i class="fa-solid fa-medal"></i> Nível <strong><?= $nivel ?></strong>
                </span>

                <span class="stat">
                    <i class="fa-solid fa-dollar-sign"></i> <strong><?= $moedas ?></strong>
                </span>
            </div>

            <!-- Avatar + menu de dropdown -->
            <div class="user-avatar">
                <img src="uploads/avatars/<?= htmlspecialchars($avatar) ?>"
                     alt="Avatar"
                     class="avatar">

                <div class="dropdown">
                    <a href="perfil.php">Meu Perfil</a>
                    <a href="configuracoes.php">Configurações</a>
                    <a href="logout.php">Sair</a>
                </div>
            </div>

        </div>

    </div>
</header>

<!-- Estilos rápidos (depois pode mover para CSS separado) -->
<style>
    .fa-fire{
        color: #ff8d30ff;
    }
    .fa-star{
        color: #fbff00ff;
    }
    .header {
        background: #ffffff;
        border-bottom: 1px solid #ddd;
        padding: 12px 0;
    }
    .header .container {
        width: 90%;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .menu ul {
        list-style: none;
        display: flex;
        gap: 20px;
    }
    .menu a {
        text-decoration: none;
        font-weight: bold;
        color: #333;
    }
    .user-info {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .user-stats .stat {
        margin-right: 10px;
        font-size: 14px;
    }
    .user-avatar {
        position: relative;
        cursor: pointer;
    }
    .user-avatar .avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        border: 2px solid #444;
    }
    .user-avatar .dropdown {
        display: none;
        position: absolute;
        top: 50px;
        right: 0;
        background: white;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        width: 150px;
    }
    .user-avatar:hover .dropdown {
        display: block;
    }
    .dropdown a {
        display: block;
        padding: 6px;
        text-decoration: none;
        color: #333;
    }
    .dropdown a:hover {
        background: #f2f2f2;
    }
</style>
