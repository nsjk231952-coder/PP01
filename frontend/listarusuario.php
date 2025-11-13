<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Voz y Datos – Listar Usuarios</title>
  <style>
    /* ===== Paleta ===== */
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

    /* —— Reset & Layout —— */
    *{box-sizing:border-box}
    body, html{
      margin:0;
      height:100%;
      font-family:'Segoe UI', Tahoma, Verdana, sans-serif;
      background:#f0f6fb;
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
    nav h2{
      margin:0 0 30px;
      font-weight:700;
      font-size:1.55rem;
      display:flex;align-items:center;gap:12px;
      height:90px;line-height:1.2;
      color:var(--c-700);
    }
    nav h2 .logo{width:90px;height:90px;object-fit:contain}

    nav ul{list-style:none;padding:0;margin:0 0 30px;width:100%}
    nav ul li{margin-bottom:15px}

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
      transition:.1s;
    }
    .submenu a:hover{background:var(--c-50)}

    .logout{
      margin-top:auto;
      padding:10px 15px;
      border-radius:8px;
      background:#fff;
      border:2px solid rgba(43,178,255,.25);
      color:var(--c-700);
      font-weight:600;
      text-decoration:none;
      text-align:center;
      transition:.2s;
      cursor:pointer;
    }
    .logout:hover{
      background:var(--c-600);
      border-color:var(--c-600);
      color:#fff;
    }

    /* —— Main Content —— */
    .content{
      margin-left:220px;
      padding:30px 40px;
      min-height:100vh;
      background:radial-gradient(circle at top, #ffffff 0%, #e2f2ff 56%, #d5ecff 100%);
    }
    h1{
      margin-top:0;
      font-weight:700;
      font-size:2.2rem;
      color:var(--c-700);
      margin-bottom:20px;
    }

    /* —— Search + Add Button —— */
    .search-box{
      display:flex;
      gap:12px;
      align-items:center;
      margin-bottom:15px;
    }
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
    .add-btn{
      padding:9px 20px;
      background:var(--c-500);
      color:#fff;
      font-weight:600;
      border:none;
      border-radius:999px;
      cursor:pointer;
      transition:.2s;
      box-shadow:0 4px 12px rgba(43,178,255,.3);
    }
    .add-btn:hover{background:var(--c-600)}

    /* —— Table —— */
    table{
      width:100%;
      border-collapse:collapse;
      background:#fff;
      border-radius:16px;
      overflow:hidden;
      box-shadow:0 10px 28px rgba(0,0,0,.04);
      border:1px solid rgba(191,231,255,.6);
    }
    thead{
      background:linear-gradient(120deg, var(--c-500) 0%, var(--c-700) 100%);
      color:#fff;
    }
    th, td{
      padding:10px 12px;
      border-bottom:1px solid rgba(0,0,0,.025);
      font-size:.95rem;
      text-align:left;
    }
    tbody tr:hover{background:rgba(234,246,255,.5)}
    .action-link{
      color:var(--c-700);
      cursor:pointer;
      text-decoration:underline;
      font-weight:600;
    }
    .disable-icon{
      cursor:pointer;
      font-size:1.2rem;
      color:#d32f2f;
      user-select:none;
      transition:.15s;
    }
    .disable-icon:hover{color:#b71c1c}

    /* —— Inline Edit Row —— */
    .edit-row td{
      background:rgba(234,246,255,.5);
    }
    .inline-edit-form input,
    .inline-edit-form select{
      padding:4px 6px;
      border:1px solid rgba(21,137,204,.25);
      border-radius:6px;
      font-size:.9rem;
      margin-right:6px;
      background:#fff;
    }
    .inline-edit-form input:focus,
    .inline-edit-form select:focus{
      outline:none;
      border-color:var(--c-400);
      box-shadow:0 0 0 3px rgba(54,195,255,.13);
    }
    .inline-edit-form button{
      padding:4px 10px;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-size:.85rem;
      margin-left:4px;
    }
    .save-btn{
      background:var(--c-500);
      color:#fff;
    }
    .save-btn:hover{background:var(--c-600)}
    .cancel-btn{
      background:#d32f2f;
      color:#fff;
    }
    .cancel-btn:hover{background:#b71c1c}

    /* —— Responsive —— */
    @media (max-width:950px){
      .content{padding:25px 20px}
      .search-box{flex-wrap:wrap}
      table{font-size:.85rem}
    }
  </style>
</head>
<body>

  <nav>
    <h2><img src="logo.png" class="logo" alt="Logo">Voz y Datos</h2>
    <ul>
      <li>
        <button id="btnGestionUsuarios" class="active">
          Gestionar Usuarios <i class="arrow down" id="arrowGestionUsuarios"></i>
        </button>
        <div id="submenuGestionUsuarios" class="submenu show">
          <a href="agregarusuario.php">Agregar usuario</a>
          <a href="listarusuario.php" class="active">Listar usuario</a>
        </div>
      </li>
      <li>
        <button id="btnGestionCoordinadores">
          Gestionar Coordinadores <i class="arrow right" id="arrowGestionCoordinadores"></i>
        </button>
        <div id="submenuGestionCoordinadores" class="submenu">
          <a href="listarcoordinador.php">Listar Coordinadores</a>
        </div>
      </li>
      <li>
        <button id="btnGestionDashboards">
          Gestionar Dashboards <i class="arrow right" id="arrowGestionDashboards"></i>
        </button>
        <div id="submenuGestionDashboards" class="submenu">
          <a href="agregardashboard.php">Agregar Dashboard</a>
        </div>
      </li>
    </ul>
    <a id="logoutLink" class="logout">Cerrar sesión</a>
  </nav>

  <div class="content">
    <h1>Listar usuarios</h1>

    <div class="search-box">
      <input id="searchInput" type="text" placeholder="Buscar usuario">
      <button id="addUserBtn" class="add-btn">Agregar usuario</button>
    </div>

    <table id="userTable">
      <thead>
        <tr>
          <th>Nombre</th><th>Apellido P.</th><th>Apellido M.</th>
          <th>DNI</th><th>Dep.</th><th>Dist.</th>
          <th>Tel.</th><th>Sexo</th><th>Rol</th><th>Estado</th>
          <th>Editar</th><th>Inhabilitar</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Lucía</td><td>Pérez</td><td>Morales</td><td>70881234</td>
          <td>Lima</td><td>Miraflores</td><td>987654321</td><td>F</td>
          <td>Coordinadora</td><td class="estado">Activo</td>
          <td><a href="#" class="action-link">Editar</a></td>
          <td><span class="disable-icon" title="Inhabilitar">🔒</span></td>
        </tr>
        <!-- …más filas -->
      </tbody>
    </table>
  </div>

  <script>
    /* —— Toggle submenus —— */
    function toggle(btn, sub, arr) {
      sub.classList.toggle('show');
      btn.classList.toggle('active');
      arr.classList.toggle('down');
      arr.classList.toggle('right');
    }
    btnGestionUsuarios.onclick      = () => toggle(btnGestionUsuarios, submenuGestionUsuarios, arrowGestionUsuarios);
    btnGestionCoordinadores.onclick = () => toggle(btnGestionCoordinadores, submenuGestionCoordinadores, arrowGestionCoordinadores);
    btnGestionDashboards.onclick    = () => toggle(btnGestionDashboards, submenuGestionDashboards, arrowGestionDashboards);

    /* —— Logout confirmation —— */
    logoutLink.onclick = e => {
      if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) e.preventDefault();
    };

    /* —— Search filter —— */
    searchInput.onkeyup = () => {
      const filter = searchInput.value.toLowerCase();
      document.querySelectorAll('#userTable tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
      });
    };

    /* —— “Agregar usuario” button —— */
    addUserBtn.onclick = () => location.href = 'agregarusuario.php';

    /* —— Disable user (UI only) —— */
    document.querySelector('#userTable tbody').addEventListener('click', e => {
      if (!e.target.classList.contains('disable-icon')) return;
      const row = e.target.closest('tr');
      const name = row.cells[0].textContent;
      const estadoCell = row.querySelector('.estado');
      if (confirm(`¿Inhabilitar al usuario «${name}»?`)) {
        estadoCell.textContent = 'Desactivado';
        alert(`Usuario «${name}» inhabilitado.`);
      }
    });

    /* —— Inline edit sub-row —— */
    document.querySelector('#userTable tbody').addEventListener('click', e => {
      if (!e.target.classList.contains('action-link')) return;
      e.preventDefault();
      const row = e.target.closest('tr');
      const next = row.nextElementSibling;
      if (next && next.classList.contains('edit-row')) {
        next.remove();
        return;
      }
      document.querySelectorAll('.edit-row').forEach(r => r.remove());
      const vals = [...row.children].map(td => td.textContent.trim());
      const editRow = document.createElement('tr');
      editRow.classList.add('edit-row');
      const colspan = row.children.length;
      editRow.innerHTML = `
        <td colspan="${colspan}">
          <div style="padding:10px;">
            <form class="inline-edit-form">
              <input name="nombre"      value="${vals[0]}" placeholder="Nombre">
              <input name="apellido1"   value="${vals[1]}" placeholder="Apellido P.">
              <input name="apellido2"   value="${vals[2]}" placeholder="Apellido M.">
              <input name="dni"         value="${vals[3]}" placeholder="DNI">
              <input name="departamento" value="${vals[4]}" placeholder="Dep.">
              <input name="distrito"    value="${vals[5]}" placeholder="Dist.">
              <input name="telefono"    value="${vals[6]}" placeholder="Tel.">
              <select name="sexo">
                <option value="M"${vals[7]==='M'?' selected':''}>M</option>
                <option value="F"${vals[7]==='F'?' selected':''}>F</option>
              </select>
              <select name="rol">
                <option${vals[8]==='Usuario'?' selected':''}>Usuario</option>
                <option${vals[8]==='Coordinadora'?' selected':''}>Coordinadora</option>
                <option${vals[8]==='Administrador'?' selected':''}>Administrador</option>
              </select>
              <button type="button" class="save-btn">Guardar</button>
              <button type="button" class="cancel-btn">Cancelar</button>
            </form>
          </div>
        </td>`;
      row.insertAdjacentElement('afterend', editRow);
    });

    // Cancel edit
    document.body.addEventListener('click', e => {
      if (e.target.classList.contains('cancel-btn'))
        e.target.closest('tr').remove();
    });

    // Save edit
    document.body.addEventListener('click', e => {
      if (!e.target.classList.contains('save-btn')) return;
      const form = e.target.closest('form');
      const data = Object.fromEntries(new FormData(form).entries());
      const editRow = e.target.closest('tr');
      const original = editRow.previousElementSibling;
      original.cells[0].textContent = data.nombre;
      original.cells[1].textContent = data.apellido1;
      original.cells[2].textContent = data.apellido2;
      original.cells[3].textContent = data.dni;
      original.cells[4].textContent = data.departamento;
      original.cells[5].textContent = data.distrito;
      original.cells[6].textContent = data.telefono;
      original.cells[7].textContent = data.sexo;
      original.cells[8].textContent = data.rol;
      editRow.remove();
      alert('Usuario actualizado correctamente.');
      // Aquí iría tu fetch() al backend
    });
  </script>
</body>
</html>
