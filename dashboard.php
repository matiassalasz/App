<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Menú Principal</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="menu-box">
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']); ?></h1>
    <a href="calculator.php" class="menu-btn">🧮 Calculadora</a>
    <a href="tetris.php" class="menu-btn">🎮 Jugar Tetris</a>
    <a href="logout.php" class="menu-btn">🔓 Cerrar sesión</a>
  </div>
</body>
</html>
