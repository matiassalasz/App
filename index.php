<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === 'admin' && $_POST['password'] === '1234') {
        $_SESSION['user'] = 'admin';
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="login-box">
    <h2>Iniciar sesión</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Usuario" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <button type="submit">Entrar</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:#f88;'>$error</p>"; ?>
  </div>
</body>
</html>
