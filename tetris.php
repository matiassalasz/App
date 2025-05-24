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
  <meta charset="UTF-8" />
  <title>Tetris</title>
  <link rel="stylesheet" href="assets/style.css" />
  <style>
    .game-container {
      background: #2b2b3c;
      margin: 40px auto;
      max-width: 320px;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0,0,0,0.5);
      color: white;
      text-align: center;
    }
    canvas {
      background: #111;
      border: 4px solid #00aaff;
      border-radius: 10px;
      display: block;
      margin: 0 auto 15px auto;
    }
    .back-btn {
      background: #00aaff;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
    }
    .back-btn:hover {
      background: #0088cc;
    }
  </style>
</head>
<body>
  <div class="game-container">
    <h2>🎮 TETRIS</h2>
    <canvas id="tetris" width="300" height="600"></canvas>
    <button class="back-btn" onclick="window.location.href='dashboard.php'">⬅ Volver</button>
  </div>
  <script src="assets/tetris.js"></script>
</body>
</html>
