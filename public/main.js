
// if(typeof document.getElementById("menu_a_buscar") == null){
    

if(document.getElementById("menu_a_buscar") !=null){
    var $nodo_combo_buscar = document.getElementById("dato_a_buscar");
    var $nodo_menu_buscar = document.getElementById("menu_a_buscar");
    var $nodo_input_hidden = document.getElementById("tipo_dato");
    var $nodo_input_nombre = document.getElementById("nombre_dato");


    $nodo_menu_buscar.onclick = function(e){
        $nodo_combo_buscar.innerHTML = e.target.textContent +  "<span class='caret'></span>";
        //console.log(e.target.getAttribute("dato"));
        $nodo_input_hidden.value = e.target.getAttribute("dato");
        $nodo_input_nombre.value = e.target.textContent;
    }
 }

// modal eliminar

if(document.getElementById("modal_completo") !=null){
    var $nodo_table = document.getElementById("eventos_table");
    var $modal_completo = document.getElementById("modal_completo");
    var $put_nombre = document.getElementById("put_nombre");
    var $put_href = document.getElementById("put_href");
    var $put_aviso = document.getElementById("put_aviso");
    var globale = "";

    $nodo_table.onclick = function(e){
        if(e.target.getAttribute("dato_modal") == "dato_eliminar"){
            $put_href.href = e.target.getAttribute("url_data");
            $put_aviso.textContent = e.target.getAttribute("aviso");
            $put_nombre.textContent = e.target.getAttribute("nombre_data");
            $modal_completo.style.display = "block";
        }
    }

    $modal_completo.onclick = function(e){
        if(e.target.className == "modal_fondo"){
            $modal_completo.style.display = "none";
        
        }

        if(e.target.getAttribute("tipo")== "salir"){
            $modal_completo.style.display = "none";
        }
    }
}
// teclado accion
document.onkeydown = function(evt) {
    if (evt.keyCode == 27){
        $modal_completo.style.display = "none";
    } 
}


// **********************************

function validar(e){
    var el =e.elements;
    var cont = 0;
    for(let d=0; d < el.length - 1; d++){
        if(el[d].getAttribute("validate") == "texto"){
             if(!(/^[A-Za-z]+$/g.test(el[d].value))){
                el[d].style.border ="1px solid red";
                if(el[d].previousElementSibling.childElementCount == 0)
                el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese solo letras</span>`

                cont++;
            }else{
                el[d].style.border = "1px solid #ccc";
                  if(el[d].previousElementSibling.childElementCount == 1)
                el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
            }
        }

         if(el[d].getAttribute("validate") == "number"){
             if(!(/^[0-9]+$/g.test(el[d].value))){
                el[d].style.border ="1px solid red";
                if(el[d].previousElementSibling.childElementCount == 0)
                el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese solo numeros</span>`

                cont++;
            }else{
                el[d].style.border = "1px solid #ccc";
                if(el[d].previousElementSibling.childElementCount == 1)
                el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
            }
        }

         if(el[d].getAttribute("validate") == "seleccionar"){
              if(el[d].value=="--seleccionar--"){
                    el[d].style.border ="1px solid red";
                    // console.log(seleccionar.previousElementSibling);
                    if(el[d].previousElementSibling.childElementCount == 0)
                        el[d].previousElementSibling.innerHTML += `<span class="error"> Seleccione una opcion</span>`
                    cont++;
                }else{
                el[d].style.border = "1px solid #ccc";
                if(el[d].previousElementSibling.childElementCount == 1)
                el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
                }

            }

         if(el[d].getAttribute("validate") == "date"){
             if(!(/^[0-1][0-9]\/[0-3][0-9]\/[0-9]{4}$/.test(el[d].value))){
                el[d].style.border ="1px solid red";
                if(el[d].previousElementSibling.childElementCount == 0)
                el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese bien la fecha</span>`

                cont++;
            }else{
                el[d].style.border = "1px solid #ccc";
                if(el[d].previousElementSibling.childElementCount == 1)
                el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
            }
        }

    }
    // return false;


//   console.log(e);
// var cont=0;

//    if(document.getElementById("email") != null) {
//         var email=document.getElementById("email");
//             if(!(/^\w+@\w+\.\w+$/.test(email.value))){
//             // email.style.border="1px solid red";
//                 email.style.border = "1px solid red";
//                 cont++;
//             }else{
//                 email.style.border = "1px solid #ccc";
//             }
     
//     }

//     if(document.getElementById("js-example-basic-single2")!=null){
//         var seleccionar=document.getElementById("js-example-basic-single2")
//         // console.log(seleccionar.value)
//         if(seleccionar.value=="--seleccionar--"){
//             seleccionar.nextSibling.style.border = "1px solid red"
//             console.log(seleccionar.previousElementSibling);
//              if(seleccionar.previousElementSibling.childElementCount == 0)
//                 seleccionar.previousElementSibling.innerHTML += `<span class="error"> Seleccione una opcion</span>`
//             cont++;
//         }

//     }

//     if(document.getElementById("edad") != null){
//         var edad= document.getElementById("edad");
        
//             if(!(/^[0-9]+$/g.test(edad.value.trim()))){
//                 edad.style.border ="1px solid red";
//                 // console.log(edad.previousElementSibling.childElementCount)
//                 if(edad.previousElementSibling.childElementCount == 0)
//                 edad.previousElementSibling.innerHTML += `<span class="error"> Ingrese solo numeros</span>`

//                 cont++;
//             }else{
//                 edad.style.border = "1px solid #ccc";
//                 edad.previousElementSibling.getElementsByTagName("span")[0].remove();
//             }

        
//     }

//     if(document.getElementById("nombre") != null){
//         var nombre= document.getElementById("nombre");
        
//             if(!(/^[A-Za-z]+$/g.test(nombre.value))){
//                 nombre.style.border ="1px solid red";

//                 nombre.previousElementSibling.innerHTML += `<span class="error"> Ingrese solo letras</span>`

//                 cont++;
//             }else{
//                 nombre.style.border = "1px solid #ccc";
//                 nombre.previousElementSibling.getElementsByTagName("span")[0].remove();
//             }

        
//     }


if(cont>0)
return false;

// return false;
}