import $ from "jquery";

const index = ()=>{

    fetch('./data_producto_mayor_stock', {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
    })
    .then((response)=>response.json())
    .then((response)=>{
        console.log(response.data);
        document.getElementById('LabelProductoMayorStock').innerText = 'ID: '+response.data[0].id + ' / ' +response.data[0].nombre;
    })

    fetch('./data_producto_mayor_venta', {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
    })
    .then((response)=>response.json())

}

window.onload = function (){
    index();
}
