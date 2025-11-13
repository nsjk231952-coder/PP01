<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Voz y Datos – Crear Usuario</title>

<style>
/* ——— Reset & layout ——— */
*{box-sizing:border-box}
body,html{margin:0;height:100%;font-family:'Segoe UI',Tahoma,Verdana,sans-serif;background:#f0f2f5}

/* ——— Sidebar ——— */
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


/* ——— Main ——— */
.content{margin-left:220px;padding:30px 40px;min-height:100vh;max-width:calc(100% - 240px)}
h1{margin-top:0;font-weight:700;font-size:2.2rem;color:#333}
.section{background:#fff;padding:20px 25px;border-radius:8px;box-shadow:0 3px 12px rgb(0 0 0 / .1)}
label{font-weight:600;margin-bottom:6px;display:block;color:#333}

/* ——— Formulario (celeste suave) ——— */
form{
  display:grid;
  grid-template-columns:180px 1fr 180px 1fr;
  gap:15px 30px;
  align-items:center;
  margin-top:20px;width:100%;
}

input[type=text],
input[type=password],
select{
  width:100%;
  padding:8px 12px;
  border-radius:6px;
  background:#fff;
  border:1px solid var(--celeste-200);      /* suave */
  font-size:1rem;
  transition:border-color .2s, box-shadow .2s, background-color .2s;
  outline:none;
}

input[type=text]::placeholder,
input[type=password]::placeholder{
  color:#7a7a7a;
  opacity:.9;
}

/* Enfoque suave pero claro */
input[type=text]:focus,
input[type=password]:focus,
select:focus{
  border-color:var(--celeste-400);           /* más notorio pero suave */
  box-shadow:0 0 0 3px rgba(54,195,255,.18); /* anillo suave */
}

/* Hover sutil */
input[type=text]:hover,
input[type=password]:hover,
select:hover{
  border-color:var(--celeste-400);
  background:var(--celeste-50);
}

input[type=radio]{margin-right:8px; accent-color:var(--celeste-400);} /* soporte moderno */
.radio-group{display:flex;gap:20px;grid-column:2 / 3}

/* Botón principal: base celeste suave */
.submit-button{
  grid-column:4 / 5;
  justify-self:start;
  padding:10px 22px;
  background:var(--celeste-400);   /* suave */
  color:#fff;
  font-weight:700;
  border:none;
  border-radius:8px;
  cursor:pointer;
  transition:transform .06s ease, background-color .2s, box-shadow .2s;
  box-shadow:0 4px 12px rgba(54,195,255,.25);
}
.submit-button:hover{
  background:var(--celeste-500);   /* un paso más intenso */
  box-shadow:0 6px 16px rgba(43,178,255,.32);
}
.submit-button:active{
  background:var(--celeste-600);
  transform:translateY(1px);
}

/* Estados deshabilitados (opcionales) */
input[disabled], select[disabled]{
  background:#f6f9fc;
  color:#9aa4af;
  border-color:#e3eef7;
  cursor:not-allowed;
}
.submit-button:disabled{
  opacity:.6; cursor:not-allowed; box-shadow:none;
}

</style>
</head>
<body>

<nav>
  <h2><img src="logo.png" class="logo" alt="Logo"></h2>

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
        <a href="asignardashboard.php">Asignar Dashboard</a>
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
  

  <div class="section">
    <h1>Crear Usuario</h1>
    <form id="formCrearUsuario">
      <label for="nombres">Nombres:</label>
      <input type="text" id="nombres" name="nombres">

      <label for="primerApellido">Primer Apellido:</label>
      <input type="text" id="primerApellido" name="primerApellido">

      <label for="segundoApellido">Segundo Apellido:</label>
      <input type="text" id="segundoApellido" name="segundoApellido">

      <label for="dni">DNI:</label>
      <input type="text" id="dni" name="dni">

      <label for="departamento">Departamento:</label>
      <input type="text" id="departamento" name="departamento">

      <label for="distrito">Distrito:</label>
      <input type="text" id="distrito" name="distrito">

      <label for="telefono">Teléfono:</label>
      <input type="text" id="telefono" name="telefono">

      <label>Sexo:</label>
      <div class="radio-group">
        <label class="inline"><input type="radio" name="sexo" value="Masculino">Masculino</label>
        <label class="inline"><input type="radio" name="sexo" value="Femenino">Femenino</label>
      </div>

      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password">

      <label for="repeatPassword">Repetir Contraseña:</label>
      <input type="password" id="repeatPassword" name="repeatPassword">

      <label for="rol">Rol:</label>
      <select id="rol" name="rol">
        <option value="">Seleccionar</option>
        <option value="Administrador">Administrador</option>
        <option value="Coordinador">Coordinador</option>
        <option value="Usuario">Usuario</option>
      </select>

      <label for="estado">Estado:</label>
      <select id="estado" name="estado">
        <option value="">Seleccionar</option>
        <option value="Activo">Activo</option>
        <option value="Desactivado">Desactivado</option>
      </select>

      <button type="submit" class="submit-button">Registrar Usuario</button>
    </form>
  </div>
</div>

<script>
/* —— mostrar/ocultar submenús —— */
function toggle(btn, sub, arr) {
  sub.classList.toggle('show');
  btn.classList.toggle('active');
  arr.classList.toggle('down');
  arr.classList.toggle('right');
}
btnGestionUsuarios.onclick      = () => toggle(btnGestionUsuarios, submenuGestionUsuarios, arrowGestionUsuarios);
btnGestionDashboards.onclick    = () => toggle(btnGestionDashboards, submenuGestionDashboards, arrowGestionDashboards);
btnGestionCoordinadores.onclick = () => toggle(btnGestionCoordinadores, submenuGestionCoordinadores, arrowGestionCoordinadores);

/* —— confirmación de logout —— */
logoutLink.addEventListener('click', e => {
  if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) e.preventDefault();
});

/* —— confirmación al registrar —— */
document.getElementById('formCrearUsuario').addEventListener('submit', function(e){
  e.preventDefault();
  if (confirm('¿Registrar este usuario?')) {
    alert('Usuario registrado correctamente 🎉');
    this.reset();
  }
});
function toggle(btn, sub, arr) {
  sub.classList.toggle('show');
  btn.classList.toggle('active');
  arr.classList.toggle('down');
  arr.classList.toggle('right');
}
btnGestionUsuarios.onclick      = () => toggle(btnGestionUsuarios, submenuGestionUsuarios, arrowGestionUsuarios);
btnGestionDashboards.onclick    = () => toggle(btnGestionDashboards, submenuGestionDashboards, arrowGestionDashboards);
btnGestionCoordinadores.onclick = () => toggle(btnGestionCoordinadores, submenuGestionCoordinadores, arrowGestionCoordinadores);

/* —— confirmación de logout —— */
logoutLink.addEventListener('click', e => {
  if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) e.preventDefault();
});

/* —— validación + confirmación al registrar —— */
document.getElementById('formCrearUsuario').addEventListener('submit', function (e) {
  e.preventDefault();

  const nombres = this.nombres.value.trim();   // ← campo Nombres
  if (nombres === '') {
    alert('⚠️ El campo "Nombres" es obligatorio.');
    this.nombres.focus();
    return;                                    // corta el envío
  }

  if (confirm('¿Registrar este usuario?')) {
    alert('Usuario registrado correctamente 🎉');
    this.reset();
  }
});
</script>

</body>
</html>
