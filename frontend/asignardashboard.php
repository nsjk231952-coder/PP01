<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Voz y Datos – Lista de Dashboards</title>

<style>
/* —— Reset & layout —— */
*{box-sizing:border-box}
body,html{
  margin:0;
  height:100%;
  font-family:'Segoe UI',Tahoma,Verdana,sans-serif;
  background:#f0f6fb; /* fondo general un poco celeste */
}

/* ====== PALETA ====== */
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

/* —— Sidebar (blanco + celeste) —— */
nav{
  position:fixed;top:0;left:0;bottom:0;
  width:220px;
  background:#fff;
  color:var(--c-700);
  padding:30px 20px;
  display:flex;flex-direction:column;
  border-right:1px solid rgba(21,137,204,.12);
  box-shadow:0 6px 20px rgba(0,0,0,.03);
}
nav h2 {
  margin: 0 auto 30px;          /* centrado horizontal */
  display: flex;
  flex-direction: column;       /* apila el logo y el texto si lo tuviera */
  align-items: center;          /* centra dentro del contenedor */
  justify-content: center;
  height: 120px;                /* un poco más alto para centrado visual */
}

nav h2 .logo {
  width: 100px;
  height: 100px;
  object-fit: contain;
  display: block;
  margin: 0 auto;
}


nav ul{list-style:none;padding:0;margin:0 0 30px;width:100%}
nav ul li{margin-bottom:15px;width:100%}

nav ul li button,
nav ul li a.button-link{
  width:100%;
  padding:10px 15px;
  background:#fff;
  border:2px solid rgba(43,178,255,.25);
  border-radius:8px;
  color:var(--c-700);
  font-weight:600;font-size:1rem;
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
  padding:4px;margin-left:10px;
  transition:.2s;
}
.arrow.down{transform:rotate(45deg)}
.arrow.right{transform:rotate(-45deg)}
/* cuando el padre está activo, la flecha queda blanca */
nav ul li button.active .arrow,
nav ul li a.button-link.active .arrow{color:#fff}

.submenu{
  margin:8px 0 0 10px;
  background:#fff;
  border-radius:8px;
  padding:8px 0;
  display:none;
  flex-direction:column;
  border:1px solid rgba(43,178,255,.15);
}
.submenu.show{display:flex}
.submenu a{
  color:var(--c-700);
  padding:6px 15px;
  text-decoration:none;
  font-size:.9rem;
  font-weight:500;
  transition:.16s;
}
.submenu a:hover{background:var(--c-50)}

.logout{
  cursor:pointer;
  font-weight:600;
  color:var(--c-700);
  padding:10px 15px;
  border-radius:8px;
  background:#fff;
  border:2px solid rgba(43,178,255,.25);
  transition:.2s;
  margin-top:auto;
  text-align:center;
}
.logout:hover{
  background:var(--c-600);
  border-color:var(--c-600);
  color:#fff;
}

/* —— Main —— */
.content{
  margin-left:220px;
  padding:30px 40px;
  min-height:100vh;
  background:radial-gradient(circle at top, #ffffff 0%, #e2f2ff 56%, #d5ecff 100%);
}
h1{
  margin:0 0 20px;
  font-weight:700;
  font-size:2.2rem;
  color:var(--c-700);
}

/* search + add */
.top-bar{
  display:flex;gap:15px;align-items:center;margin-bottom:18px
}
.top-bar input{
  flex:0 0 300px;
  padding:8px 12px;font-size:1rem;
  border:1px solid rgba(21,137,204,.35);
  border-radius:999px;
  background:#fff;
  transition:.2s;
}
.top-bar input:focus{
  outline:none;
  border-color:var(--c-400);
  box-shadow:0 0 0 3px rgba(54,195,255,.12);
}
.top-bar button.add-btn{
  background:var(--c-500);
  color:#fff;
  font-weight:600;
  border:none;
  border-radius:999px;
  padding:9px 22px;
  cursor:pointer;
  transition:.2s;
  box-shadow:0 4px 12px rgba(43,178,255,.3);
}
.top-bar button.add-btn:hover{background:var(--c-600)}

/* —— Tabla —— */
table{
  width:100%;
  border-collapse:collapse;
  background:#fff;
  border-radius:14px;
  overflow:hidden;
  box-shadow:0 10px 28px rgba(0,0,0,.04);
  border:1px solid rgba(191,231,255,.6);
}
thead{
  background:linear-gradient(120deg, var(--c-500) 0%, var(--c-700) 88%);
  color:#fff;
}
th,td{
  padding:12px 14px;
  border-bottom:1px solid rgba(0,0,0,.03);
  font-size:.95rem;
  text-align:left;
}
tbody tr:hover{background:rgba(234,246,255,.5)}
.edit-link{
  color:var(--c-700);
  cursor:pointer;
  text-decoration:underline;
  font-weight:600;
}
.delete-link{
  color:#d9534f;
  cursor:pointer;
  text-decoration:underline;
  font-weight:600;
}

/* subform edición */
.subform{
  background:rgba(234,246,255,.4);
}
.subform td{padding:14px 14px 18px}
.subform input, .subform select{
  width:100%;
  padding:6px 8px;
  border:1px solid rgba(21,137,204,.25);
  border-radius:6px;
  font-size:.9rem;
  background:#fff;
}
.subform input:focus{
  outline:none;
  border-color:var(--c-400);
  box-shadow:0 0 0 3px rgba(54,195,255,.13);
}
.subform .actions{display:flex;gap:10px}
.subform .btn-save{
  background:var(--c-500);
  color:#fff;
  border:none;
  border-radius:6px;
  padding:6px 14px;
  font-size:.85rem;
  cursor:pointer;
  transition:.16s;
}
.subform .btn-save:hover{background:var(--c-600)}
.subform .btn-cancel{
  background:#d32f2f;
  color:#fff;
  border:none;
  border-radius:6px;
  padding:6px 14px;
  font-size:.85rem;
  cursor:pointer;
  transition:.16s;
}
.subform .btn-cancel:hover{background:#b82222}

/* responsive tabla básica */
@media (max-width:950px){
  .top-bar{flex-wrap:wrap}
  .content{padding:25px 20px}
  table{font-size:.85rem}
}
</style>

</head>
<body>

<nav>
  <h2><img src="logo.png" class="logo" alt="Logo"></h2>

  <ul>
    <li>
      <button id="btnGestionUsuarios">Gestionar Usuarios<i class="arrow right" id="arrowGestionUsuarios"></i></button>
      <div id="submenuGestionUsuarios" class="submenu">
        <a href="agregarusuario.php">Agregar usuario</a>
        <a href="listarusuario.php">Listar usuario</a>
      </div>
    </li>

    <li>
      <button id="btnGestionDashboards" class="active">Gestionar Dashboards<i class="arrow down" id="arrowGestionDashboards"></i></button>
      <div id="submenuGestionDashboards" class="submenu show">
        <a href="agregardashboard.php">Agregar Dashboard</a>
        <a href="listardashboards.php" class="active">Lista de Dashboards</a>
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
  <h1>Lista de Dashboards</h1>

  <div class="top-bar">
    <input type="text" id="searchDashboard" placeholder="Buscar dashboard…">
    <button class="add-btn" onclick="location.href='agregardashboard.php'">Agregar Dashboard</button>
  </div>

  <table id="dashboardTable">
   <thead>
  <tr>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Asignado a</th>
    <th>Editar</th>
    <th>Eliminar</th>      <!-- ← NUEVO -->
  </tr>
</thead>
    <tbody>
      <tr>
        <td>Dashboard Mujeres</td>
        <td>Indicadores de violencia contra la mujer</td>
        <td>Lucía Pérez</td>
        <td><span class="edit-link">Editar</span></td>
            <td><span class="delete-link">Eliminar</span></td>   <!-- ← NUEVO -->

      </tr>
      <tr>
        <td>Dashboard Adultos Mayores</td>
        <td>Seguimiento de riesgo en tercera edad</td>
        <td>Carlos Gutiérrez</td>
        <td><span class="edit-link">Editar</span></td>
            <td><span class="delete-link">Eliminar</span></td>   <!-- ← NUEVO -->

      </tr>
      <tr>
        <td>Dashboard Niñez</td>
        <td>Alertas de maltrato infantil a nivel nacional</td>
        <td>— Sin asignar —</td>
        <td><span class="edit-link">Editar</span></td>
            <td><span class="delete-link">Eliminar</span></td>   <!-- ← NUEVO -->

      </tr>
    </tbody>
  </table>
</div>

<script>
/* —— util toggle —— */
function toggle(btn, sub, arrow){
  sub.classList.toggle('show'); btn.classList.toggle('active');
  arrow.classList.toggle('down'); arrow.classList.toggle('right');
}

/* —— menús laterales —— */
// Removed: btnDashboard.onclick         = () => toggle(btnDashboard,submenuDashboard,arrowDashboard);
btnGestionUsuarios.onclick   = () => toggle(btnGestionUsuarios,submenuGestionUsuarios,arrowGestionUsuarios);
btnGestionDashboards.onclick = () => toggle(btnGestionDashboards,submenuGestionDashboards,arrowGestionDashboards);

/* —— confirmar logout —— */
logoutLink.addEventListener('click',e=>{
  if(!confirm('¿Estás seguro de que deseas cerrar sesión?')) e.preventDefault();
});

/* —— buscador —— */
const dashTBody = document.querySelector('#dashboardTable tbody');
searchDashboard.addEventListener('keyup',()=>{
  const f = searchDashboard.value.toLowerCase();
  [...dashTBody.rows].forEach(r=>{
    r.style.display = r.textContent.toLowerCase().includes(f)?'':'none';
  });
});
/* —— clics en Editar / Eliminar —— */
dashTBody.addEventListener('click', e => {
  const row = e.target.closest('tr');

  /* —— Eliminar sin confirmación —— */
  if (e.target.classList.contains('delete-link')){
    // si debajo hay un subformulario abierto, elimínalo también
    if (row.nextElementSibling && row.nextElementSibling.classList.contains('subform')){
      row.nextElementSibling.remove();
    }
    row.remove();              // solo UI; aquí llamarías al backend
    // opcional: feedback al usuario
    // alert('Dashboard eliminado ✅');
    return;
  }

  /* —— Editar —— */
  if (!e.target.classList.contains('edit-link')) return;
  // … (código de edición que ya tienes) …
});

/* —— sub-formulario de edición —— */
dashTBody.addEventListener('click',e=>{
  if(!e.target.classList.contains('edit-link')) return;
  const row  = e.target.closest('tr');

  /* si ya existe subform, evitar duplicar */
  if(row.nextElementSibling && row.nextElementSibling.classList.contains('subform')) return;

  /* datos actuales */
  const nombre         = row.cells[0].textContent.trim();
  const descripcion  = row.cells[1].textContent.trim();
  const asignado     = row.cells[2].textContent.trim();

  /* plantilla subform */
  const sub = document.createElement('tr');
  sub.className='subform';
  sub.innerHTML = `
    <td colspan="4">
      <div style="display:grid;grid-template-columns:120px 1fr 120px 1fr;gap:10px">
        <label>Nombre:</label>
        <input type="text" value="${nombre}">
        <label>Descripción:</label>
        <input type="text" value="${descripcion}">
        <label>Asignado a:</label>
        <input type="text" value="${asignado==='— Sin asignar —'?'':asignado}">
        <div></div>
        <div class="actions">
          <button class="btn-save">Guardar</button>
          <button class="btn-cancel">Cancelar</button>
        </div>
      </div>
    </td>`;

  /* insertar subform debajo */
  row.after(sub);

  /* manejar botones */
  sub.querySelector('.btn-cancel').onclick = ()=>sub.remove();
  sub.querySelector('.btn-save').onclick = ()=>{
    // actualizar fila (solo UI)
    const inputs = sub.querySelectorAll('input');
    row.cells[0].textContent = inputs[0].value || nombre;
    row.cells[1].textContent = inputs[1].value || descripcion;
    row.cells[2].textContent = inputs[2].value || '— Sin asignar —';
    alert('Datos actualizados .');
    sub.remove();
    // aquí llamarías a tu backend con fetch(...)
  };
});
const btnGestionCoordinadores    = document.getElementById('btnGestionCoordinadores');
const submenuGestionCoordinadores  = document.getElementById('submenuGestionCoordinadores');
const arrowGestionCoordinadores    = document.getElementById('arrowGestionCoordinadores');
btnGestionCoordinadores.addEventListener('click', () => {
  submenuGestionCoordinadores.classList.toggle('show');
  btnGestionCoordinadores.classList.toggle('active');
  arrowGestionCoordinadores.classList.toggle('down');
  arrowGestionCoordinadores.classList.toggle('right');
});
</script>
</body>
</html>