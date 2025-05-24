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
  <title>Calculadora Científica</title>
  <link rel="stylesheet" href="assets/style.css" />
  <style>
    /* Estilos específicos para la calculadora */
    .calculator {
      background: #2b2b3c;
      border-radius: 15px;
      padding: 20px;
      margin: 40px auto;
      max-width: 360px;
      box-shadow: 0 0 20px rgba(0,0,0,0.5);
      color: white;
    }
    .display {
      width: 100%;
      height: 60px;
      font-size: 24px;
      padding: 10px;
      margin-bottom: 15px;
      text-align: right;
      border: none;
      border-radius: 10px;
      background: #3b3b4f;
      color: white;
    }
    .buttons {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 10px;
    }
    button {
      padding: 18px;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      background: #505068;
      color: white;
      cursor: pointer;
    }
    button:hover {
      background: #606080;
    }
    .copy-btn {
      margin-top: 12px;
      width: 100%;
      padding: 12px;
      background: #00aaff;
      border: none;
      color: white;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="calculator">
    <input type="text" id="display" class="display" readonly />
    <div class="buttons">
      <button onclick="clearDisplay()">C</button>
      <button onclick="append('(')">(</button>
      <button onclick="append(')')">)</button>
      <button onclick="backspace()">⌫</button>
      <button onclick="append('/')">÷</button>

      <button onclick="append('7')">7</button>
      <button onclick="append('8')">8</button>
      <button onclick="append('9')">9</button>
      <button onclick="append('*')">×</button>
      <button onclick="append('Math.pow(')">xʸ</button>

      <button onclick="append('4')">4</button>
      <button onclick="append('5')">5</button>
      <button onclick="append('6')">6</button>
      <button onclick="append('-')">−</button>
      <button onclick="append('Math.sqrt(')">√</button>

      <button onclick="append('1')">1</button>
      <button onclick="append('2')">2</button>
      <button onclick="append('3')">3</button>
      <button onclick="append('+')">+</button>
      <button onclick="append('Math.log10(')">log</button>

      <button onclick="append('0')">0</button>
      <button onclick="append('.')">.</button>
      <button onclick="append('%')">%</button>
      <button onclick="calculate()">=</button>
      <button onclick="append('Math.log(')">ln</button>

      <button onclick="append('Math.sin(toRadians(')">sin</button>
      <button onclick="append('Math.cos(toRadians(')">cos</button>
      <button onclick="append('Math.tan(toRadians(')">tan</button>
      <button onclick="append('1/')">1/x</button>
      <button onclick="append('Math.PI')">π</button>

      <button onclick="append('Math.E')">e</button>
      <button onclick="toggleSign()">+/-</button>
    </div>
    <button class="copy-btn" onclick="copyResult()">Copiar resultado</button>
  </div>

  <script>
    const display = document.getElementById('display');

    function append(char) { display.value += char; }
    function clearDisplay() { display.value = ''; }
    function backspace() { display.value = display.value.slice(0, -1); }
    function calculate() {
      try {
        display.value = eval(display.value.replace('%', '/100'));
      } catch {
        alert("Expresión inválida");
      }
    }
    function copyResult() {
      display.select();
      document.execCommand('copy');
      alert("Resultado copiado");
    }
    function toggleSign() {
      if (display.value) {
        if (display.value.startsWith('-')) display.value = display.value.substring(1);
        else display.value = '-' + display.value;
      }
    }
    function toRadians(deg) { return deg * (Math.PI / 180); }

    document.addEventListener('keydown', (e) => {
      if ('0123456789/*-+().%'.includes(e.key)) append(e.key);
      if (e.key === 'Enter') calculate();
      if (e.key === 'Backspace') backspace();
      if (e.key === 'Escape') clearDisplay();
    });
  </script>
</body>
</html>
