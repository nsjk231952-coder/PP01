<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Voz y Datos - Listar Coordinadores</title>

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

  /* ——— Estilos generales ——— */
  *{box-sizing:border-box}
  body,html{
    margin:0;
    height:100%;
    font-family:'Segoe UI',Tahoma,Verdana,sans-serif;
    background:#f0f6fb;
  }

  /* ——— Sidebar (mismo look blanco+celeste) ——— */
  nav{
    position:fixed;top:0;left:0;bottom:0;
    width:220px;
    background:#fff;
    color:var(--c-700);
    padding:30px 20px;
    display:flex;flex-direction:column;
    border-right:1px solid rgba(21,137,204,.1);
    box-shadow:0 6px 20px rgba(0,0,0,.03);
  }
  nav h2{
    margin:0 0 30px 0;
    font-weight:700;
    font-size:1.55rem;
    display:flex;align-items:center;gap:12px;
    height:90px;line-height:1.2;
    color:var(--c-700);
  }
  nav h2 img{width:90px;height:90px;object-fit:contain}
  nav ul{list-style:none;padding:0;margin:0 0 30px 0;width:100%}
  nav ul li{margin-bottom:15px;width:100%}

  nav ul li button,
  nav ul li a.button-link{
    width:100%;
    padding:10px 15px;
    background:#fff;
    border:2px solid rgba(43,178,255,.25);
    border-radius:8px;
    color:var(--c-700);
    font-weight:600;
    font-size:1rem;
    cursor:pointer;
    text-align:left;
    display:flex;justify-content:space-between;align-items:center;
    transition:.2s;
  }
  nav ul li button:hover,
  nav ul li a.button-link:hover{
    background:var(--c-500);
    border-color:var(--c-500);
    color:#fff;
  }
  nav ul li button.active,
  nav ul li a.button-link.active{
    background:var(--c-700);
    border-color:var(--c-700);
    color:#fff;
  }

  .arrow{
    border:solid currentColor;
    border-width:0 2px 2px 0;
    display:inline-block;
    padding:4px;
    margin-left:10px;
    transition:.2s;
  }
  .arrow.down{transform:rotate(45deg)}
  .arrow.right{transform:rotate(-45deg)}
  nav ul li button.active .arrow,
  nav ul li a.button-link.active .arrow{color:#fff}

  .submenu{
    margin-top:8px;margin-left:10px;
    background:#fff;
    border-radius:8px;
    padding:8px 0;
    display:none;
    flex-direction:column;
    border:1px solid rgba(43,178,255,.12);
  }
  .submenu.show{display:flex}
  .submenu a{
    color:var(--c-700);
    padding:6px 15px;
    text-decoration:none;
    font-size:.9rem;
    font-weight:500;
    transition:.12s;
  }
  .submenu a:hover{background:var(--c-50)}
  .submenu a.active{
    background:rgba(21,137,204,.08);
    font-weight:600;
  }

  nav .logout{
    margin-top:auto;
    background:#fff;
    color:var(--c-700);
    padding:10px;
    text-align:center;
    border-radius:8px;
    font-weight:600;
    cursor:pointer;
    transition:.2s;
    border:2px solid rgba(43,178,255,.25);
  }
  nav .logout:hover{
    background:var(--c-600);
    border-color:var(--c-600);
    color:#fff;
  }

  /* ——— Contenido principal ——— */
  .content{
    margin-left:220px;
    padding:30px 40px;
    min-height:100vh;
    background:radial-gradient(circle at top, #ffffff 0%, #e2f2ff 56%, #d5ecff 100%);
  }
  .content h1{
    margin-top:0;
    font-size:2.05rem;
    font-weight:700;
    color:var(--c-700);
    margin-bottom:20px;
  }

  /* ——— Buscador ——— */
  .search-box{margin-bottom:15px}
  .search-box input{
    width:300px;
    padding:8px 12px;
    font-size:1rem;
    border:1px solid rgba(21,137,204,.35);
    border-radius:999px;
    background:#fff;
    transition:.2s;
  }
  .search-box input:focus{
    outline:none;
    border-color:var(--c-400);
    box-shadow:0 0 0 3px rgba(54,195,255,.12);
  }

  /* ——— Tabla ——— */
  table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 10px 26px rgba(0,0,0,.035);
    border:1px solid rgba(191,231,255,.6);
  }
  thead{
    background:linear-gradient(120deg, var(--c-500) 0%, var(--c-700) 85%);
    color:#fff;
  }
  th,td{
    padding:10px 12px;
    text-align:left;
    border-bottom:1px solid rgba(0,0,0,.025);
    font-size:.95rem;
  }
  tbody tr:hover{background:rgba(234,246,255,.5)}

  /* ——— Select ——— */
  select{
    padding:6px 8px;
    border:1px solid rgba(21,137,204,.25);
    border-radius:6px;
    background:#fff;
    font-size:.9rem;
    min-width:200px;
    transition:.15s;
  }
  select:focus{
    outline:none;
    border-color:var(--c-400);
    box-shadow:0 0 0 3px rgba(54,195,255,.1);
  }

  /* ——— Botón confirmar ——— */
  .btn-confirmar{
    margin-top:20px;
    padding:12px 26px;
    background:var(--c-500);
    color:#fff;
    font-weight:700;
    border:none;
    border-radius:999px;
    font-size:1rem;
    cursor:pointer;
    transition:.2s;
    box-shadow:0 6px 16px rgba(43,178,255,.25);
  }
  .btn-confirmar:hover{background:var(--c-600)}
  .btn-confirmar:active{background:var(--c-700);transform:translateY(1px)}

  /* ——— Responsive ——— */
  @media (max-width:950px){
    .content{padding:25px 20px}
    table{font-size:.85rem}
    select{min-width:140px}
  }
</style>
</head>
<body>

<nav>
  <h2><img src="logo.png" alt="Logo" />Voz y Datos</h2>
  <ul>
    <li>
      <button id="btnGestionUsuarios">
        Gestionar Usuarios
        <i class="arrow right" id="arrowGestionUsuarios"></i>
      </button>
      <div id="submenuGestionUsuarios" class="submenu">
        <a href="agregarusuario.php">Agregar usuario</a>
        <a href="listarusuario.php">Listar usuario</a>
      </div>
    </li>

    <li>
      <button id="btnGestionCoordinadores" class="active">
        Gestionar Coordinadores
        <i class="arrow down" id="arrowGestionCoordinadores"></i>
      </button>
      <div id="submenuGestionCoordinadores" class="submenu show">
        <a href="listarcoordinador.php" class="active">Listar Coordinadores</a>
      </div>
    </li>

    <li>
      <button id="btnGestionDashboards">
        Gestionar Dashboards
        <i class="arrow right" id="arrowGestionDashboards"></i>
      </button>
      <div id="submenuGestionDashboards" class="submenu">
        <a href="agregardashboard.php">Agregar Dashboard</a>
        <a href="asignardashboard.php">Asignar Dashboard</a>
      </div>
    </li>
  </ul>
  <a href="index.html" class="logout" id="logoutLink">Cerrar sesión</a>
</nav>

<div class="content">
  <h1>Asignar Dashboard a Coordinadores</h1>

  <div class="search-box">
    <input type="text" id="searchInput" placeholder="Buscar coordinador" />
  </div>

  <table id="coordTable">
    <thead>
      <tr>
        <th>Nombre del Coordinador</th>
        <th>Dashboard a Asignar</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Lucía Pérez</td>
        <td>
          <select>
            <option value="">Seleccionar...</option>
            <option>Dashboard Mujeres</option>
            <option>Dashboard Abuelos</option>
            <option>Dashboard Niñez</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Carlos Gutiérrez</td>
        <td>
          <select>
            <option value="">Seleccionar...</option>
            <option>Dashboard Mujeres</option>
            <option>Dashboard Abuelos</option>
            <option>Dashboard Niñez</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Rosa Fernández</td>
        <td>
          <select>
            <option value="">Seleccionar...</option>
            <option>Dashboard Mujeres</option>
            <option>Dashboard Abuelos</option>
            <option>Dashboard Niñez</option>
          </select>
        </td>
      </tr>
    </tbody>
  </table>

  <button class="btn-confirmar">Confirmar asignaciones</button>
</div>

<script>
/* ——--- Sidebar toggles ---—— */
const toggles = [
  ['btnGestionUsuarios','submenuGestionUsuarios','arrowGestionUsuarios'],
  ['btnGestionCoordinadores','submenuGestionCoordinadores','arrowGestionCoordinadores'],
  ['btnGestionDashboards','submenuGestionDashboards','arrowGestionDashboards']
];
toggles.forEach(([btnId,menuId,arrowId])=>{
  const btn   = document.getElementById(btnId);
  const menu  = document.getElementById(menuId);
  const arrow = document.getElementById(arrowId);
  btn.addEventListener('click',()=>{
    menu.classList.toggle('show');
    btn.classList.toggle('active');
    arrow.classList.toggle('down');
    arrow.classList.toggle('right');
  });
});

/* ——--- Filtro de búsqueda ---—— */
const searchInput = document.getElementById('searchInput');
const coordTable  = document.getElementById('coordTable').getElementsByTagName('tbody')[0];
searchInput.addEventListener('keyup',()=>{
  const filter = searchInput.value.toLowerCase();
  Array.from(coordTable.rows).forEach(row=>{
    row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
  });
});

/* ——--- Logout ---—— */
document.getElementById('logoutLink').addEventListener('click',e=>{
  e.preventDefault();
  if(confirm('¿Estás seguro de que deseas cerrar sesión?')){
    window.location.href = e.currentTarget.href;
  }
});

/* ——--- Confirmar ---—— */
document.querySelector('.btn-confirmar').addEventListener('click',()=>{
  alert('Asignaciones registradas.');
});
</script>
</body>
</html>
