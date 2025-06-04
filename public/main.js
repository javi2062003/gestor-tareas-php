// main.js

document.getElementById('form-crear').addEventListener('submit', async function(e) {
  e.preventDefault();
  const titulo = document.getElementById('titulo').value;
  const descripcion = document.getElementById('descripcion').value;

  const res = await fetch('php/crear.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ titulo, descripcion })
  });
  const data = await res.json();
  alert(data.mensaje || data.error);
  cargarTareas();
});

async function completarTarea() {
  const titulo = document.getElementById('titulo-completar').value;

  const res = await fetch('php/completar.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ titulo })
  });
  const data = await res.json();
  alert(data.mensaje || data.error);
  cargarTareas();
}

async function eliminarTarea() {
  const titulo = document.getElementById('titulo-eliminar').value;

  const res = await fetch('php/eliminar.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ titulo })
  });
  const data = await res.json();
  alert(data.mensaje || data.error);
  cargarTareas();
}

async function cargarTareas() {
  const res = await fetch('php/listar.php');
  const tareas = await res.json();

  const lista = document.getElementById('lista-tareas');
  lista.innerHTML = '';

  tareas.forEach(t => {
    const li = document.createElement('li');
    li.textContent = `${t.titulo} - ${t.descripcion} [${t.estado}]`;
    lista.appendChild(li);
  });
}

document.addEventListener('DOMContentLoaded', cargarTareas);
