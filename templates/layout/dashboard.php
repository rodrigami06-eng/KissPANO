
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->get('titulo')?></title>
    <?= $this->html->css('kiss.css')?>
</head>
<body>

    <?= $this->element('sidebar')?>

    <div class="main-content">
        
        <?= $this->fetch('content')?>

    </div>

    <!--Seccion de agregar Pan (supongo)-->
    <div id="modalPan" class="modal">
        <div class="modal-content">
            <h2>Añadir Nuevo Producto</h2>
            <div class="form-group">
                <label>Nombre del Pan:</label>
                <input type="text" id="nombrePan" placeholder="Ej. Cuernito">
            </div>
            <div class="form-group">
                <label>Precio Unitario:</label>
                <input type="number" id="precioPan" placeholder="0.00">
            </div>
            <div class="form-group">
                <label>Cantidad Inicial:</label>
                <input type="number" id="stockPan" placeholder="100">
            </div>
            <button class="btn-add" onclick="savePan()" style="width: 100%;">Guardar en Inventario</button>
            <button onclick="closeModal()" style="width: 100%; background: none; border: none; cursor: pointer; color: gray;">Cancelar</button>
        </div>
    </div>

    <script>
        function showSection(id) {
            document.querySelectorAll('.content-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.menu-item').forEach(m => m.classList.remove('active'));
            document.getElementById(id).classList.add('active');
            event.currentTarget.classList.add('active');
        }

        // Lógica del Modal
        function openModal() { document.getElementById('modalPan').style.display = 'block'; }
        function closeModal() { document.getElementById('modalPan').style.display = 'none'; }

        function savePan() {
            const nombre = document.getElementById('nombrePan').value;
            const precio = document.getElementById('precioPan').value;
            const stock = document.getElementById('stockPan').value;

            if(nombre && precio && stock) {
                const tabla = document.getElementById('tabla-inventario').getElementsByTagName('tbody')[0];
                const nuevaFila = tabla.insertRow();
                nuevaFila.innerHTML = `<td>${nombre}</td><td>General</td><td>${stock} pzs</td><td>$${precio}</td>`;
                alert("Producto añadido con éxito");
                closeModal();
            } else {
                alert("Por favor llena todos los campos");
            }
        }
    </script>
</body>
</html>