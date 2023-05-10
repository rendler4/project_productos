import $ from "jquery";
import Swal from 'sweetalert2'

const index = ( ) => {

    document.querySelector('#form-venta-producto').addEventListener('submit', (e) => {
        e.preventDefault();
        //alert('venta');
        fetch('./ventas', {
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
                    timer: 2500
                })

                document.getElementById("form-venta-producto").reset();

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
