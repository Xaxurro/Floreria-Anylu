function updatePrice(n) {
    let tabla, fila, precio, cantidad, subtotal;
    tabla = document.getElementById("table");
    fila = tabla.rows;

    precio = fila[n].getElementsByTagName("td")[1].innerHTML.slice(1);
    cantidad = document.getElementById(n.toString()).value;
    subtotal = fila[n].getElementsByTagName("td")[3];

    console.log(precio);
    console.log(cantidad);
    console.log(subtotal);

    subtotal.textContent = "$" + parseInt(precio) * cantidad;
    calculateTotal();
}

function calculateTotal(){
    let tabla, fila, total, label;
    tabla = document.getElementById("table");
    fila = tabla.rows;
    label = document.getElementById("total");
    total = 0;

    for(let x = 0; x < fila.lenght; x++){
        total += parseInt(fila[x].getElementsByTagName("td")[3]);
    }
    label.innerHTML = "$" + total;
}