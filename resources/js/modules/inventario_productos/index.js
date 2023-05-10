import $ from "jquery";

const index = ( ) => {

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

            }else{

            }
        })

        alert('hola');
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
