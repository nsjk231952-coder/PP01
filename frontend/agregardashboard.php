<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Voz y Datos - Agregar Dashboard</title>
<style>
 /* ——— Sidebar (fondo blanco, texto celeste) ——— */
:root{
  --celeste-50:#EAF6FF;
  --celeste-200:#BFE7FF;
  --celeste-400:#36C3FF;
  --celeste-500:#2BB2FF;
  --celeste-600:#1A9DE6;
  --celeste-700:#1589CC;
}

nav{
  position:fixed;top:0;left:0;bottom:0;width:220px;
  background:#fff; /* fondo blanco */
  color:var(--celeste-700);
  padding:30px 20px;display:flex;flex-direction:column;
  border-right:1px solid var(--celeste-200);
}

nav h2{
  margin:0 0 30px;font-weight:700;font-size:1.8rem;
  display:flex;align-items:center;gap:12px;line-height:1.2;height:90px;
  color:var(--celeste-700);
}
nav h2 .logo{width:90px;height:90px;object-fit:contain}

nav ul{list-style:none;padding:0;margin:0 0 30px;width:100%}
nav ul li{margin-bottom:15px;width:100%}

/* Botones: texto celeste, borde celeste; hover/active se rellenan */
nav ul li button,
nav ul li a.button-link{
  width:100%;padding:10px 15px;background:#fff;
  border:2px solid var(--celeste-400);
  border-radius:6px;color:var(--celeste-700);
  font-weight:700;font-size:1rem;cursor:pointer;
  text-align:left;display:flex;justify-content:space-between;align-items:center;
  transition:.25s;
}
nav ul li button:hover,
nav ul li a.button-link:hover{
  background:var(--celeste-500);
  border-color:var(--celeste-500);
  color:#fff;
}
nav ul li button.active,
nav ul li a.button-link.active{
  background:var(--celeste-700);
  border-color:var(--celeste-700);
  color:#fff;
}

/* Flecha ahora en celeste; cambia a blanco en hover/active */
.arrow{
  border:solid currentColor;border-width:0 2px 2px 0;
  padding:4px;margin-left:10px;transition:.25s;
  color:var(--celeste-700);
}
nav ul li button:hover .arrow,
nav ul li a.button-link:hover .arrow,
nav ul li button.active .arrow,
nav ul li a.button-link.active .arrow{ color:#fff; }
.arrow.down{transform:rotate(45deg)}
.arrow.right{transform:rotate(-45deg)}

/* Submenú: fondo blanco con borde suave; enlaces celestes */
.submenu{
  margin-top:8px;margin-left:10px;background:#fff;border-radius:6px;
  padding:8px 0;display:none;flex-direction:column;
  border:1px solid var(--celeste-200);
}
.submenu.show{display:flex}
.submenu a{
  color:var(--celeste-700);padding:6px 15px;text-decoration:none;
  font-size:.9rem;font-weight:600;transition:.2s;
}
.submenu a:hover{
  background:var(--celeste-50);
}

/* Logout igual estilo botón */
.logout{
  cursor:pointer;font-weight:700;color:var(--celeste-700);
  padding:10px 15px;border-radius:6px;background:#fff;
  border:2px solid var(--celeste-400);transition:.25s;margin-top:auto;
  text-align:center;
}
.logout:hover{
  background:var(--celeste-600);border-color:var(--celeste-600);color:#fff;
}

  /* Contenido principal */
 /* ========= Paleta celeste ========= */
:root{
  --celeste-50:#EAF6FF;
  --celeste-150:#E4F2FF;
  --celeste-200:#BFE7FF;
  --celeste-400:#36C3FF;
  --celeste-500:#2BB2FF;
  --celeste-600:#1A9DE6;
  --celeste-700:#1589CC;
}

/* -------- Content -------- */
.content{
  margin-left:220px;
  padding:30px 40px;
  min-height:100vh;
  max-width:calc(100% - 240px);
  background:linear-gradient(180deg, var(--celeste-150), #fff); /* sutil */
  color:#1f2d3d;
}

.content h1{
  margin-top:0;margin-bottom:20px;
  font-weight:700;font-size:2.2rem;color:var(--celeste-700);
}

.content label{font-weight:600;margin-right:10px;color:#2c3e50}

.content .form-group{display:flex;align-items:center;gap:10px}

.content input[type="text"]{
  flex-grow:1;padding:8px 12px;border-radius:6px;
  border:1px solid var(--celeste-200);font-size:1rem;background:#fff;
  transition:border-color .2s, box-shadow .2s, background-color .2s;
}
.content input[type="text"]:hover{background:var(--celeste-50);border-color:var(--celeste-400)}
.content input[type="text"]:focus{
  outline:none;border-color:var(--celeste-400);
  box-shadow:0 0 0 3px rgba(54,195,255,.18);
}

/* Botón primario en celeste suave */
.content button{
  padding:10px 22px;background:var(--celeste-400);color:#fff;
  font-weight:700;border:none;border-radius:8px;cursor:pointer;
  transition:transform .06s ease, background-color .2s, box-shadow .2s;
  box-shadow:0 4px 12px rgba(54,195,255,.22);
}
.content button:hover{background:var(--celeste-500);box-shadow:0 6px 16px rgba(43,178,255,.28)}
.content button:active{background:var(--celeste-600);transform:translateY(1px)}

/* -------- Card / Form -------- */
.card{
  background:#fff;border-radius:12px;
  box-shadow:0 6px 22px rgba(0,0,0,.08);
  padding:30px 35px;max-width:900px;margin:auto;
  border:1px solid var(--celeste-200);
}

form{display:flex;flex-direction:column;gap:22px}

.form-row{
  display:grid;grid-template-columns:150px 1fr 150px 1fr;
  gap:15px 20px;align-items:center;
}

/* Etiquetas del form en celeste oscuro */
form label{font-weight:600;color:var(--celeste-700)}

/* Campos del form coherentes con content */
form input{
  width:100%;padding:9px 12px;border:1px solid var(--celeste-200);
  border-radius:8px;font-size:1rem;background:#fff;
  transition:border-color .2s, box-shadow .2s, background-color .2s;
}
form input:hover{background:var(--celeste-50);border-color:var(--celeste-400)}
form input:focus{outline:none;border-color:var(--celeste-400);box-shadow:0 0 0 3px rgba(54,195,255,.18)}

/* Botonera */
.btn-row{display:flex;justify-content:flex-end}
.btn-row button{
  background:var(--celeste-400);border:none;color:#fff;
  padding:10px 28px;font-weight:700;border-radius:10px;cursor:pointer;transition:.25s;
  box-shadow:0 6px 18px rgba(54,195,255,.24);
}
.btn-row button:hover{background:var(--celeste-500)}
.btn-row button:active{background:var(--celeste-600);transform:translateY(1px)}
.btn-row button:disabled{opacity:.6;cursor:not-allowed;box-shadow:none}

/* Accesibilidad: foco visible también para teclas */
.card :is(button,input):focus-visible{
  outline:3px solid rgba(43,178,255,.45);
  outline-offset:2px;
}
/* Acorta los campos para que no se peguen a las etiquetas de la derecha */
:root{ --field-w: 200px; } /* ajusta 300–360px a gusto */

.form-row{
  grid-template-columns: 150px var(--field-w) 150px var(--field-w);
  column-gap: 34px; /* más aire entre columnas */
}

/* Mantén los inputs al 100% de su columna (que ahora es más corta) */
form input{ width: 100%; }

/* (Opcional) más compacto aún en pantallas medianas */
@media (max-width: 1200px){
  :root{ --field-w: 300px; }
}

/* (Opcional) una sola columna en móviles */
@media (max-width: 780px){
  .form-row{
    grid-template-columns: 1fr;
    row-gap: 14px;
  }
}

</style>
</head>
<body>

<nav>
  <h2>
    <img src="logo.png" alt="Logo Voz y Datos" class="logo" />
    Voz y Datos
  </h2>
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
      <button id="btnGestionDashboards">
        Gestionar Dashboards
        <i class="arrow right" id="arrowGestionDashboards"></i>
      </button>
      <div id="submenuGestionDashboards" class="submenu">
        <a href="agregardashboard.php">Agregar Dashboard</a>
        <a href="asignardashboard.php">Listar Dashboard</a>
      </div>
    </li>
<li>
  <button id="btnGestionCoordinadores">
    Gestionar Coordinadores
    <i class="arrow right" id="arrowGestionCoordinadores"></i>
  </button>
  <div id="submenuGestionCoordinadores" class="submenu">
    <a href="listarcoordinador.php">Listar Coordinadores</a>
  </div>
</li>



  </ul>







  <a href="index.html" class="logout" id="logoutLink">Cerrar sesión</a>
</nav>

<div class="content">


  <section class="card">
      <h1>Agregar Dashboard</h1>

    <form id="formDashboard" autocomplete="off">

      <div class="form-row">
        <label for="dashName">Nombre:</label>
        <input  type="text" id="dashName" name="dashName" placeholder="Nombre del dashboard" required>

        <label for="dashDesc">Descripción:</label>
        <input  type="text" id="dashDesc" name="dashDesc" placeholder="Breve descripción" required>
      </div>

      <div class="form-row">
        <label for="dashOwner">Asignado a:</label>
        <input type="text" id="dashOwner" name="dashOwner" placeholder="Responsable / Usuario">

        <label for="dashLink">Link (URL):</label>
        <input type="text" id="dashLink" name="dashLink" placeholder="https://app.powerbi.com/…" required>
      </div>

      <div class="btn-row">
        <button type="submit">Agregar dashboard</button>
      </div>
    </form>
  </section>

</div>

<script>
  // Sidebar desplegables
  // Removed: const btnDashboard = document.getElementById('btnDashboard');
  // Removed: const submenuDashboard = document.getElementById('submenuDashboard');
  // Removed: const arrowDashboard = document.getElementById('arrowDashboard');

  // Removed: btnDashboard.addEventListener('click', () => {
  // Removed:   submenuDashboard.classList.toggle('show');
  // Removed:   btnDashboard.classList.toggle('active');

  // Removed:   if (submenuDashboard.classList.contains('show')) {
  // Removed:     arrowDashboard.classList.remove('right');
  // Removed:     arrowDashboard.classList.add('down');
  // Removed:   } else {
  // Removed:     arrowDashboard.classList.remove('down');
  // Removed:     arrowDashboard.classList.add('right');
  // Removed:   }
  // Removed: });

  const btnGestionUsuarios = document.getElementById('btnGestionUsuarios');
  const submenuGestionUsuarios = document.getElementById('submenuGestionUsuarios');
  const arrowGestionUsuarios = document.getElementById('arrowGestionUsuarios');

  btnGestionUsuarios.addEventListener('click', () => {
    submenuGestionUsuarios.classList.toggle('show');
    btnGestionUsuarios.classList.toggle('active');

    if (submenuGestionUsuarios.classList.contains('show')) {
      arrowGestionUsuarios.classList.remove('right');
      arrowGestionUsuarios.classList.add('down');
    } else {
      arrowGestionUsuarios.classList.remove('down');
      arrowGestionUsuarios.classList.add('right');
    }
  });

  const btnGestionDashboards = document.getElementById('btnGestionDashboards');
  const submenuGestionDashboards = document.getElementById('submenuGestionDashboards');
  const arrowGestionDashboards = document.getElementById('arrowGestionDashboards');

  btnGestionDashboards.addEventListener('click', () => {
    submenuGestionDashboards.classList.toggle('show');
    btnGestionDashboards.classList.toggle('active');

    if (submenuGestionDashboards.classList.contains('show')) {
      arrowGestionDashboards.classList.remove('right');
      arrowGestionDashboards.classList.add('down');
    } else {
      arrowGestionDashboards.classList.remove('down');
      arrowGestionDashboards.classList.add('right');
    }
  });

const btnGestionCoordinadores      = document.getElementById('btnGestionCoordinadores');
const submenuGestionCoordinadores  = document.getElementById('submenuGestionCoordinadores');
const arrowGestionCoordinadores    = document.getElementById('arrowGestionCoordinadores');
btnGestionCoordinadores.addEventListener('click', () => {
  submenuGestionCoordinadores.classList.toggle('show');
  btnGestionCoordinadores.classList.toggle('active');
  arrowGestionCoordinadores.classList.toggle('down');
  arrowGestionCoordinadores.classList.toggle('right');
});

  document.getElementById('logoutLink').addEventListener('click', function (e) {
  e.preventDefault();                                // Detiene la navegación inmediata
  if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
    window.location.href = this.href;                // Redirige solo si el usuario confirma
  }
});
const dashForm = document.getElementById('formDashboard');

  dashForm.addEventListener('submit', e => {
    e.preventDefault();                          // evita recarga

    // Aquí podrías enviar los datos vía fetch()
    // fetch('backend/tu-ruta.php', {method:'POST', body: new FormData(dashForm)})

    alert('✅ ¡Dashboard agregado correctamente!');

    dashForm.reset();                            // limpia los campos
  });
</script>

</body>
</html>