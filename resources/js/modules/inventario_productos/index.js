import $ from "jquery";
import Swal from 'sweetalert2'
import 'datatables.net-dt';
import 'datatables.net-responsive-dt';


const index = ( ) => {

    $('#table-listado-productos-inventario').dataTable({
        language: {
            "processing": "Procesando...",
            "lengthMenu": "_MENU_",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "pageLength": {
                "_": "Mostrar %d filas",
                "-1": "Mostrar Todo"
            }
        },
    });

    document.querySelector('#form-create-producto-inventario').addEventListener('submit', (e) => {
        e.preventDefault();
        fetch('./productos', {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            body: new FormData(e.target),
        })
        .then((response)=>response.json())
        .then((response)=>{
            console.log(response);
            if(response.success){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                })

                setTimeout(()=>{
                    window.location.href = './productos';
                }, 1000);

            }else{

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                })

            }
        })
    });


    $( ".btn-edit-product" ).on( "click", function(e) {
            let input = $(this);
            //document.getElementById('id_update_field').value = input.attr( 'data-target-id-product' );
            document.getElementById('labelModalEditarProducto').innerText =  `Editar Datos de Producto ID: ${input.attr( 'data-target-id-product' )}`;
            document.getElementById('nombre_update_field').value = input.attr( 'data-target-nombre-product' );
            document.getElementById('referencia_update_field').value = input.attr( 'data-target-referencia-product' );
            document.getElementById('precio_update_field').value = input.attr( 'data-target-precio-product' );
            document.getElementById('peso_update_field').value = input.attr( 'data-target-peso-product' );
            document.getElementById('categoria_update_field').value =  input.attr( 'data-target-categoria-product' );
            document.getElementById('stock_update_field').value = input.attr( 'data-target-stock-product' );
    } );

    $( ".btn-delete-product" ).on( "click", function(e) {
        //alert( "Handler for `click` called. delete" );
        //alert($(this).attr( 'data-target-id-product' ));
        document.getElementById('id_delete_field').value =  $(this).attr( 'data-target-id-product' );
        document.querySelector('#btn-confirm-delete-producto').setAttribute('data-target-id-product', $(this).attr( 'data-target-id-product' ));
    });



    document.querySelector('#btn-confirm-delete-producto').addEventListener('click', (e) => {
        e.preventDefault();
        fetch('./productos/'+e.target.dataset.targetIdProduct   , {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'DELETE',
        })
        .then((response)=>response.json())
        .then((response)=>{
            console.log(response);
            if(response.success){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                })

                setTimeout(()=>{
                    window.location.href = './productos';
                }, 1000);

            }else{

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                })

            }
        })
    });


 }


 window.onload = function (){
    index();
}
