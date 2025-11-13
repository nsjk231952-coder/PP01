<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Voz y Datos - Dashboard</title>
  <style>
    /* ===== Paleta celeste ===== */
    :root{
      --c-50:#EAF6FF;
      --c-100:#D6EEFF;
      --c-200:#BFE7FF;
      --c-300:#8ED6FF;
      --c-400:#36C3FF;
      --c-500:#2BB2FF;
      --c-600:#1A9DE6;
      --c-700:#1589CC;
      --c-800:#0F74B3;
    }

    /* Reset básico */
    * { box-sizing: border-box; }
    body, html {
      margin: 0;
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f6fb;
    }

    /* Sidebar (blanco + celeste) */
    nav {
      position: fixed; top: 0; left: 0; bottom: 0;
      width: 220px;
      background: #fff;
      color: var(--c-700);
      padding: 30px 20px;
      display: flex; flex-direction: column;
      align-items: flex-start;
      border-right: 1px solid rgba(21,137,204,.12);
      box-shadow: 0 6px 20px rgba(0,0,0,.03);
    }
    nav h2 {
      margin: 0 0 30px;
      font-weight: 700; font-size: 1.55rem;
      display: flex; align-items: center; gap: 12px; height: 90px;
      color: var(--c-700);
    }
    nav h2 img.logo {
      width: 90px; height: 90px; object-fit: contain;
    }
    nav ul {
      list-style: none; padding: 0; margin: 0; width: 100%;
    }
    nav ul li {
      width: 100%; margin-bottom: 15px;
    }
    nav ul li button,
    nav ul li a {
      width: 100%;
      padding: 10px 15px;
      background: #fff;
      border: 2px solid rgba(43,178,255,.25);
      border-radius: 8px;
      color: var(--c-700);
      font-weight: 600; font-size: 1rem;
      cursor: pointer; text-align: left;
      display: flex; justify-content: space-between; align-items: center;
      transition: .2s;
    }
    nav ul li button:hover,
    nav ul li a:hover {
      background: var(--c-500);
      border-color: var(--c-500);
      color: #fff;
    }
    nav ul li button.active,
    nav ul li a.active {
      background: var(--c-700);
      border-color: var(--c-700);
      color: #fff;
    }
    .arrow {
      border: solid currentColor; border-width: 0 2px 2px 0;
      display: inline-block; padding: 4px; margin-left: 10px;
      transition: transform 0.2s;
    }
    .arrow.down { transform: rotate(45deg); }
    .arrow.right { transform: rotate(-45deg); }
    nav ul li button.active .arrow,
    nav ul li a.active .arrow { color:#fff; }

    .submenu {
      margin-top: 8px; margin-left: 10px;
      background: #fff; border-radius: 8px;
      padding: 8px 0; display: none; flex-direction: column;
      border:1px solid rgba(43,178,255,.12);
    }
    .submenu.show { display: flex; }
    .submenu a {
      color: var(--c-700); padding: 6px 15px;
      text-decoration: none; font-size: 0.9rem; font-weight: 500;
      transition:.12s;
    }
    .submenu a:hover { background: var(--c-50); }

    nav .logout {
      margin-top: auto; width: 100%;
      text-align: center; padding: 10px 15px;
      background: #fff; color: var(--c-700);
      text-decoration: none; border-radius: 8px;
      font-weight: 600; transition: .2s;
      border: 2px solid rgba(43,178,255,.25);
      cursor:pointer;
    }
    nav .logout:hover {
      background: var(--c-600);
      border-color: var(--c-600);
      color:#fff;
    }

    /* Contenido principal */
    .content {
      margin-left: 220px; padding: 30px 40px;
      min-height: 100vh; display: flex; flex-direction: column;
      background: radial-gradient(circle at top, #ffffff 0%, #e2f2ff 56%, #d5ecff 100%);
    }
    .content h1 {
      margin: 0 0 20px; font-weight: 700; font-size: 2.1rem;
      color: var(--c-700);
    }

    /* Dashboard embed */
    .dashboard-container {
      flex-grow: 1; background: white;
      border-radius: 14px; box-shadow: 0 6px 22px rgba(0,0,0,.04);
      overflow: hidden; display: flex; flex-direction: column;
      border:1px solid rgba(191,231,255,.6);
    }
    iframe.powerbi {
      flex-grow: 1; border: none; width: 100%; background:#fff;
    }

    @media (max-width: 950px){
      .content{padding:25px 20px}
    }
  </style>
</head>
<body>

<nav>
  <h2>
    <img src="logo.png" class="logo" alt="Logo" />
    Voz y Datos
  </h2>
  <ul>
    <li>
      <button id="btnDashboard" class="active">
        Dashboard
        <i class="arrow down" id="arrowDashboard"></i>
      </button>
      <div id="submenuDashboard" class="submenu show">
        <a href="dashboard.php">Dashboard 1</a>
        <a href="dashboard2.php" class="active">Dashboard 2</a>
      </div>
    </li>
  </ul>

  <a href="index.html" class="logout" id="logoutLink">Cerrar sesión</a>
</nav>

<div class="content">
  <h1>Dashboard 2</h1>
  <div class="dashboard-container">
    <iframe
      class="powerbi"
      src="https://app.powerbi.com/view?r=eyJrIjoiYjU5ZjBhNjktNjYwZS00ZGViLWJhYzgtOTMwMGY5NTJmYTA5IiwidCI6IjE1NGQ5NDY2LTVmZDQtNDQyYS1iYjZkLWY2ODNiYmY1MjMxZiIsImMiOjR9"
      allowfullscreen
      sandbox="allow-scripts allow-same-origin allow-popups">
    </iframe>
  </div>
</div>

<script>
  // Toggle de submenu
  const btnDash      = document.getElementById('btnDashboard');
  const submenuDash  = document.getElementById('submenuDashboard');
  const arrowDash    = document.getElementById('arrowDashboard');
  btnDash.addEventListener('click', () => {
    submenuDash.classList.toggle('show');
    btnDash.classList.toggle('active');
    arrowDash.classList.toggle('down');
    arrowDash.classList.toggle('right');
  });

  // Confirmación de logout
  document.getElementById('logoutLink').addEventListener('click', e => {
    if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) {
      e.preventDefault();
    }
  });
</script>

</body>
</html>
