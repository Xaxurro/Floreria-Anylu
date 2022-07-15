let eliminarModal = document.getElementById('eliminaModal')
eliminarModal.addEventListener('show.bs.modal', function(event){
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')
    let buttonElimina = eliminarModal.querySelector('modal-footer #btn-elimina')
    buttonElimina.value = id 
})

function actualizarCantidad(cantidad,id){
    let url= '../View/updateCart.php'
    let formData = new FormData()
    formData.append('action', agregar)
    formData.append('id', id)
    formData.append('cantidad', cantidad)

    fetch(url,{
        method: 'POST',
        body: formData,
        mode: 'cors'
    }).then(response => response.json())
    .then(data =>{
        if(data.ok){
            let divsubtotal = document.getElementById('subtotal_' + id)
            divsubtotal.innerHTML = data.sub

            let total = 0
            let list = document.getElementsByName('subtotal[]')

            for(let i =0; i < list.length; i++){
                total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
            }
            total = new Intl.NumberFormat('en-US',{
                minimumFractionDigits: 2
            }).format(total)
            document.getElementById('total').innerHTML = '<?php echo "$";?>' + total 

        }
    })

}

function eliminar(){
    let botonElimina = document.getElementById('btn-elimina')
    let id = botonElimina.value

    let url= '../View/updateCart.php'
    let formData = new FormData()
    formData.append('action', eliminar)
    formData.append('id', id)

    fetch(url,{
        method: 'POST',
        body: formData,
        mode: 'cors'
    }).then(response => response.json())
    .then(data =>{
        if(data.ok){
            location.reload()
        }
    })

}
