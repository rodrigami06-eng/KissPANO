// --- PERSISTENCIA DE DATOS ---
    function saveData() {
        localStorage.setItem('repData', document.getElementById('rep-body').innerHTML);
        localStorage.setItem('userData', document.getElementById('users-body').innerHTML);
        localStorage.setItem('invData', document.getElementById('inventory-body').innerHTML);
        localStorage.setItem('provData', document.getElementById('prov-body').innerHTML);
        localStorage.setItem('dailyTotal', dailyTotal);
        localStorage.setItem('ticketCount', ticketCount);
    }

    function loadData() {
        if(localStorage.getItem('repData')) document.getElementById('rep-body').innerHTML = localStorage.getItem('repData');
        if(localStorage.getItem('userData')) document.getElementById('users-body').innerHTML = localStorage.getItem('userData');
        if(localStorage.getItem('invData')) document.getElementById('inventory-body').innerHTML = localStorage.getItem('invData');
        if(localStorage.getItem('provData')) document.getElementById('prov-body').innerHTML = localStorage.getItem('provData');
        dailyTotal = parseFloat(localStorage.getItem('dailyTotal')) || 0;
        ticketCount = parseInt(localStorage.getItem('ticketCount')) || 0;
        document.getElementById('dash-v').innerText = `$${dailyTotal.toFixed(2)}`;
        document.getElementById('dash-t').innerText = ticketCount;
    }

    window.onload = loadData;

    function soloLetras(input) { input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, ''); }
    function soloNumeros(input) { input.value = input.value.replace(/[^0-9]/g, ''); }

    function nav(id, el) {
        document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
        document.querySelectorAll('.menu-item').forEach(m => m.classList.remove('active'));
        document.getElementById(id).classList.add('active');
        el.classList.add('active');
        if(id === 'ventas') document.getElementById('cur-date').innerText = new Date().toLocaleString();
    }

    let cart = []; let dailyTotal = 0; let ticketCount = 0;

    function add(name, price) {
        const exist = cart.find(i => i.name === name);
        if(exist) { exist.qty++; exist.sub = exist.qty * exist.price; }
        else { cart.push({ name, price, qty: 1, sub: price }); }
        renderCart();
    }

    function renderCart() {
        const body = document.getElementById('pos-body');
        const emptyMsg = document.getElementById('empty-cart-msg');
        body.innerHTML = ""; let total = 0;
        if(cart.length === 0) { emptyMsg.style.display = "block"; } 
        else {
            emptyMsg.style.display = "none";
            cart.forEach((item, index) => {
                total += item.sub;
                body.innerHTML += `<tr><td><b>${item.name}</b><br><small>$${item.price.toFixed(2)}</small></td>
                    <td style="text-align:center"><button onclick="changeQty(${index},-1)" style="border:none; cursor:pointer;">-</button> ${item.qty} <button onclick="changeQty(${index},1)" style="border:none; cursor:pointer;">+</button></td>
                    <td>$${item.sub.toFixed(2)}</td></tr>`;
            });
        }
        document.getElementById('pos-total').innerText = `$${total.toFixed(2)}`;
    }

    function changeQty(index, d) {
        cart[index].qty += d;
        if(cart[index].qty <= 0) cart.splice(index, 1);
        else cart[index].sub = cart[index].qty * cart[index].price;
        renderCart();
    }

    function clearCart() { cart = []; renderCart(); }

    function pay() {
        if(cart.length === 0) { alert("El carrito está vacío"); return; }
        const totalVenta = cart.reduce((s, i) => s + i.sub, 0);
        const folio = 1000 + (++ticketCount);
        const hoy = new Date();
        const fechaFull = hoy.toLocaleString();
        const fechaData = hoy.toISOString().split('T')[0];

        const row = `<tr data-fecha="${fechaData}"><td>#${folio}</td><td>${fechaFull}</td><td>Kevin M. (Admin)</td><td style="color:var(--exito); font-weight:bold;">$${totalVenta.toFixed(2)}</td></tr>`;
        document.getElementById('rep-body').insertAdjacentHTML('afterbegin', row);
        
        dailyTotal += totalVenta;
        document.getElementById('dash-v').innerText = `$${dailyTotal.toFixed(2)}`;
        document.getElementById('dash-t').innerText = ticketCount;

        generateTicketPDF(folio, fechaFull, totalVenta);
        alert("¡Venta completada!");
        clearCart();
        saveData();
    }

    function generateTicketPDF(folio, fecha, total) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF({ unit: 'mm', format: [80, 150] });
        doc.setFontSize(14); doc.text("PANADERÍA KISS", 40, 10, { align: "center" });
        doc.setFontSize(8); doc.text(`Folio: #${folio}`, 10, 20);
        doc.text(`Fecha: ${fecha}`, 10, 25);
        let y = 35;
        cart.forEach(i => { doc.text(`${i.name} x${i.qty}`, 10, y); doc.text(`$${i.sub.toFixed(2)}`, 60, y); y+=5; });
        doc.setFontSize(10); doc.text(`TOTAL: $${total.toFixed(2)}`, 40, y+10, { align: "center" });
        doc.save(`Ticket_Kiss_${folio}.pdf`);
    }

    function deleteRow(btn) { if(confirm("¿Eliminar este registro?")) { btn.closest('tr').remove(); saveData(); } }

    function addUser() {
        const id = document.getElementById('u-id').value;
        const nom = document.getElementById('u-nom').value;
        const email = document.getElementById('u-email').value;
        const rol = document.getElementById('u-rol').value;
        if(!id || !nom) return alert("Completa los datos");
        const row = `<tr><td>${id}</td><td>${nom}</td><td>${email}</td><td>${rol}</td><td><button class="btn-action" onclick="editUser(this)">✏️</button> <button class="btn-action" onclick="deleteRow(this)">🗑️</button></td></tr>`;
        document.getElementById('users-body').innerHTML += row;
        ['u-id','u-nom','u-email','u-pass','u-rol'].forEach(i => document.getElementById(i).value="");
        saveData();
    }

    function addInv() {
        const nom = document.getElementById('i-nom').value;
        const p = parseFloat(document.getElementById('i-price').value);
        const q = parseInt(document.getElementById('i-qty').value);
        if(!nom || isNaN(p)) return alert("Datos inválidos");
        const row = `<tr><td><b>${nom}</b></td><td>$${p.toFixed(2)}</td><td>${q} pzs</td><td><span class="badge badge-ok">Surtido</span></td><td><button class="btn-action" onclick="editInv(this)">✏️</button> <button class="btn-action" onclick="deleteRow(this)">🗑️</button></td></tr>`;
        document.getElementById('inventory-body').innerHTML += row;
        ['i-nom','i-price','i-qty'].forEach(i => document.getElementById(i).value="");
        saveData();
    }

    function saveProv() {
        const emp = document.getElementById('p-empresa').value;
        const cont = document.getElementById('p-contacto').value;
        const tel = document.getElementById('p-tel').value;
        const ins = document.getElementById('p-insumo').value;
        if(!emp || !cont) return alert("Completa los datos");
        const row = `<tr><td>${emp}</td><td>${cont}</td><td>${tel}</td><td>${ins}</td><td><button class="btn-action" onclick="editProv(this)">✏️</button> <button class="btn-action" onclick="deleteRow(this)">🗑️</button></td></tr>`;
        document.getElementById('prov-body').innerHTML += row;
        ['p-empresa','p-contacto','p-tel','p-insumo'].forEach(i => document.getElementById(i).value="");
        saveData();
    }

    function editUser(btn) {
        const cells = btn.closest('tr').cells;
        document.getElementById('u-id').value = cells[0].innerText;
        document.getElementById('u-nom').value = cells[1].innerText;
        document.getElementById('u-email').value = cells[2].innerText;
        document.getElementById('u-rol').value = cells[3].innerText;
        btn.closest('tr').remove();
        saveData();
    }

    function editInv(btn) {
        const cells = btn.closest('tr').cells;
        document.getElementById('i-nom').value = cells[0].innerText;
        document.getElementById('i-price').value = cells[1].innerText.replace('$','');
        document.getElementById('i-qty').value = cells[2].innerText.replace(' pzs','');
        btn.closest('tr').remove();
        saveData();
    }

    function editProv(btn) {
        const cells = btn.closest('tr').cells;
        document.getElementById('p-empresa').value = cells[0].innerText;
        document.getElementById('p-contacto').value = cells[1].innerText;
        document.getElementById('p-tel').value = cells[2].innerText;
        document.getElementById('p-insumo').value = cells[3].innerText;
        btn.closest('tr').remove();
        saveData();
    }

    function filterRep() {
        const text = document.getElementById('f-cajero').value.toLowerCase();
        const date = document.getElementById('f-fecha').value;
        const rows = document.querySelectorAll('#rep-body tr');
        rows.forEach(row => {
            const rowText = row.innerText.toLowerCase();
            const rowDate = row.getAttribute('data-fecha');
            const matchText = rowText.includes(text);
            const matchDate = date ? rowDate === date : true;
            row.style.display = (matchText && matchDate) ? "" : "none";
        });
    }

    function clearFilters() {
        document.getElementById('f-cajero').value = "";
        document.getElementById('f-fecha').value = "";
        filterRep();
    }

    function exportRepPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.setFontSize(18); doc.text("REPORTE DE VENTAS - KISS", 105, 15, { align: "center" });
        doc.autoTable({ html: '#t-rep', startY: 25, theme: 'striped', headStyles: { fillColor: [93, 46, 10] } });
        doc.save('Reporte_Kiss.pdf');
    }

    // CORRECCIÓN CERRAR SESIÓN
    function logout() {
        if(confirm("¿Deseas cerrar sesión?")) {
            window.location.href = "login.html"; 
        }
    }

    document.getElementById('cur-date').innerText = new Date().toLocaleString();