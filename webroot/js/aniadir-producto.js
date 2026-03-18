/**
 * 
 * @param {precio, producto, id} p array made of the atributes of the card product
 */
function agregarProd(p){
    const contenedor = document.getElementById('pos-body');
    cart = document.querySelectorAll('.prod-row');
    const template = document.getElementById('ticket-row').innerHTML;

    let exist = null;
    console.log('Clic en elemento de: ', p.producto, ' de precio: ', p.precio, ' y id: ', p.id);
    //e.target.classList.toggle('activo');
    cart.forEach(prod => {
        if(prod.id == p.id){
            exist = prod;
        }
    });
    

    if(exist != null) {
        cantidad = exist.querySelector('.cant-prod').value;
        cantidad ++;
        exist.querySelector('.cant-prod').value = cantidad;

        exist.querySelector('.sub-prod').innerHTML = '$'+ (cantidad * p.precio);

    } else { 
        let nuevoHTML = template.replaceAll(/{index}/g, p.id)
        .replaceAll(/{prod}/g, p.producto)
        .replaceAll(/{cost}/g, p.precio);

        let trow = document.createElement('tr');
        trow.id=p.id;
        trow.classList.add('prod-row');
        trow.innerHTML = nuevoHTML;

        contenedor.appendChild(trow);
    }
    //renderCart();
}

const cards = document.querySelectorAll('.prod-card');
const row = document.getElementById('ticket-row');
let cart = [];

cards.forEach(card => {
    card.addEventListener('click', function(e){
        data =  {
            precio : card.getAttribute('precio'), 
            producto : card.getAttribute('producto'),
            id : card.id
        }
        console.log(card.producto, card.precio);
        agregarProd(data)
    });
});
/*Esto es codigo ajeno v
---------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------
*/

/**
 * 
 */
function renderCart(){//prepara el carro
    const body = document.getElementById('pos-body');
    const emptyMsg = document.getElementById('empty-cart-msg');
    body.innerHTML = ""; 
    let total = 0;

    if(cart.length === 0) { 
        emptyMsg.style.display = "block"; 
    }
    
    else {
        emptyMsg.style.display = "none";
        cart.forEach((item, index) => {
            total += item.sub;
            body.innerHTML += '';
        });
    }
    document.getElementById('pos-total').innerText = `$${total.toFixed(2)}`;
}

function add(name, price) {
    const exist = cart.find(i => i.name === name);
    if(exist) { exist.qty++; exist.sub = exist.qty * exist.price; }
    else { cart.push({ name, price, qty: 1, sub: price }); }
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

const catalogo = document.getElementById('catalog');


