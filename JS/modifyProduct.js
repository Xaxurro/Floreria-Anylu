function updatePrice(n) {
    let tabla, fila, precio, cantidad, subtotal;
    tabla = document.getElementById("table");
    fila = tabla.rows;

    precio = fila[n].getElementsByTagName("td")[2].innerHTML.slice(1);
    cantidad = document.getElementById(n.toString()).value;
    subtotal = fila[n].getElementsByTagName("td")[4];

    subtotal.textContent = "$" + parseInt(precio) * cantidad;
    calculateTotal();
}

function calculateTotal(){
    let tabla, fila, total, label;
    tabla = document.getElementById("table");
    fila = tabla.rows;
    label = document.getElementById("total");
    total = 0;

    for(let x = 1; x < fila.length; x++){
        total += parseInt(fila[x].getElementsByTagName("td")[4].innerHTML.slice(1));
    }
    label.innerHTML = "<center><strong>Total: $" + total + "</strong></center>";
}