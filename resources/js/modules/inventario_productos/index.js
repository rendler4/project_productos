import $ from "jquery";
import Swal from 'sweetalert2'
import 'datatables.net-dt';
import 'datatables.net-responsive-dt';
import 'datatables.net-searchbuilder-dt';
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

        //alert('hola');
    });

    /*lformElem.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('/article/formdata/post/user', {
          method: 'POST',
          body: new FormData(formElem)
        });

        let result = await response.json();

        alert(result.message);
      };*/

 }


 window.onload = function (){
    index();
}
