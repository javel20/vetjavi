
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


         if(el[d].getAttribute("validate") == "email"){
            if(!(/^\w+@\w+\.\w+$/.test(el[d].value))){
                 el[d].style.border ="1px solid red";
                 if(el[d].previousElementSibling.childElementCount == 0)
                el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese email correcto</span>`
                // alert("email");
                cont++;
            }else{
                el[d].style.border = "1px solid #ccc";
                  if(el[d].previousElementSibling.childElementCount == 1)
                el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
            }
     
    }


        if(el[d].getAttribute("validate") == "texto"){
             if(!(/^([óáéíúña-z]|\s)+$/i.test(el[d].value))){
                el[d].style.border ="1px solid red";
                if(el[d].previousElementSibling.childElementCount == 0)
                el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese solo letras</span>`
                //  alert("texto");
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
                //  alert("number");
                cont++;
            }else{
                el[d].style.border = "1px solid #ccc";
                if(el[d].previousElementSibling.childElementCount == 1)
                el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
            }
        }

        if(el[d].getAttribute("validate") == "decimal"){
             if(!(/^[0-9]|\.+$/g.test(el[d].value))){
                el[d].style.border ="1px solid red";
                if(el[d].previousElementSibling.childElementCount == 0)
                el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese solo numeros</span>`
                //  alert("number");
                cont++;
            }else{
                el[d].style.border = "1px solid #ccc";
                if(el[d].previousElementSibling.childElementCount == 1)
                el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
            }
        }

         if(el[d].getAttribute("validate") == "selecbus"){
              if(el[d].value=="--seleccionar--"){
                    // el[d].style.border ="1px solid red";
                    el[d].nextSibling.style.border = "1px solid red";
                    if(el[d].previousElementSibling.childElementCount == 0)
                        el[d].previousElementSibling.innerHTML += `<span class="error"> Seleccione una opcion </span>`
                        //  alert("selecbus");
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
                    if(el[d].previousElementSibling.childElementCount == 0)
                        el[d].previousElementSibling.innerHTML += `<span class="error"> Seleccione una opcion</span>`
                        //  alert("seleccionar");
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
                //  alert("date");
                cont++;
            }else{
                el[d].style.border = "1px solid #ccc";
                if(el[d].previousElementSibling.childElementCount == 1)
                el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
            }
        }

        if(el[d].getAttribute("validate") == "direccion"){
            if(el[d].value == ""){
                 el[d].style.border ="1px solid red";
                 if(el[d].previousElementSibling.childElementCount == 0)
                el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese algún dato</span>`
                //  alert("direccion");
                cont++;
            }else{
                el[d].style.border = "1px solid #ccc";
                  if(el[d].previousElementSibling.childElementCount == 1)
                el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
            }
     
    }

        if(el[d].getAttribute("validate") == "pass"){
                if(!(/^[A-Z]{1}([a-z]||[0-9]){7,12}/.test(el[d].value))){
                    el[d].style.border ="1px solid red";
                    if(el[d].previousElementSibling.childElementCount == 0)
                    el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese algún dato</span>`
                    //  alert("pass");
                    cont++;
                }else{
                    el[d].style.border = "1px solid #ccc";
                    if(el[d].previousElementSibling.childElementCount == 1)
                    el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
                }
        
        }

        if(el[d].getAttribute("validate") == "unicoanalisis"){
            
            // console.log("2423r43f");
            var a = window.location.href.split('/');
            a.pop();
            var b = a.pop();
            $.ajax({
                type: "GET",

                url:"http://localhost/vetjavi/index.php/analisis/getAnalisis/" + el[d].value,
                async: false,
                dataType: "json",
                success: function(result){
                    // console.log(result);
                  if((result[0]!==undefined) || (!(/^[0-9]+$/g.test(el[d].value)))){
                    //cont suma
                    el[d].style.border ="1px solid red";
                    if(el[d].previousElementSibling.childElementCount == 0)
                        el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese solo numeros o el codigo es repetido</span>`
                        cont++;
                        console.log("asd");

                        }else{
                        el[d].style.border = "1px solid #ccc";
                        if(el[d].previousElementSibling.childElementCount == 1)
                        el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
                        }
                },
                error:function(){
                  console.log("error");
                }


              })
        }


        if(el[d].getAttribute("validate") == "unicocita"){
            
            // console.log("2423r43f");
            var a = window.location.href.split('/');
            a.pop();
            var b = a.pop();
            $.ajax({
                type: "GET",

                url:"http://localhost/vetjavi/index.php/cita/getCita/" + el[d].value,
                async: false,
                dataType: "json",
                success: function(result){
                    // console.log(result);
                  if((result[0]!==undefined) || (!(/^[0-9]+$/g.test(el[d].value)))){
                    //cont suma
                    el[d].style.border ="1px solid red";
                    if(el[d].previousElementSibling.childElementCount == 0)
                        el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese solo numeros o el codigo es repetido</span>`
                        cont++;
                        console.log("asd");

                        }else{
                        el[d].style.border = "1px solid #ccc";
                        if(el[d].previousElementSibling.childElementCount == 1)
                        el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
                        }
                },
                error:function(){
                  console.log("error");
                }


              })
        }

        if(el[d].getAttribute("validate") == "unicocompra"){
            
            // console.log("2423r43f");
            var a = window.location.href.split('/');
            a.pop();
            var b = a.pop();
            $.ajax({
                type: "GET",

                url:"http://localhost/vetjavi/index.php/compra/getCompra/" + el[d].value,
                async: false,
                dataType: "json",
                success: function(result){
                    // console.log(result);
                  if((result[0]!==undefined) || (!(/^[0-9]+$/g.test(el[d].value)))){
                    //cont suma
                    el[d].style.border ="1px solid red";
                    if(el[d].previousElementSibling.childElementCount == 0)
                        el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese solo numeros o el codigo es repetido</span>`
                        cont++;
                        console.log("asd");

                        }else{
                        el[d].style.border = "1px solid #ccc";
                        if(el[d].previousElementSibling.childElementCount == 1)
                        el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
                        }
                },
                error:function(){
                  console.log("error");
                }


              })
        }

        if(el[d].getAttribute("validate") == "unicodiagnostico"){
            
            // console.log("2423r43f");
            var a = window.location.href.split('/');
            a.pop();
            var b = a.pop();
            $.ajax({
                type: "GET",

                url:"http://localhost/vetjavi/index.php/diagnostico/getDiagnostico/" + el[d].value,
                async: false,
                dataType: "json",
                success: function(result){
                    // console.log(result);
                  if((result[0]!==undefined) || (!(/^[0-9]+$/g.test(el[d].value)))){
                    //cont suma
                    el[d].style.border ="1px solid red";
                    if(el[d].previousElementSibling.childElementCount == 0)
                        el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese solo numeros o el codigo es repetido</span>`
                        cont++;
                        console.log("asd");

                        }else{
                        el[d].style.border = "1px solid #ccc";
                        if(el[d].previousElementSibling.childElementCount == 1)
                        el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
                        }
                },
                error:function(){
                  console.log("error");
                }


              })
        }

        if(el[d].getAttribute("validate") == "unicoventa"){
            
            // console.log("2423r43f");
            var a = window.location.href.split('/');
            a.pop();
            var b = a.pop();
            $.ajax({
                type: "GET",

                url:"http://localhost/vetjavi/index.php/venta/getVenta/" + el[d].value,
                async: false,
                dataType: "json",
                success: function(result){
                    // console.log(result);
                  if((result[0]!==undefined) || (!(/^[0-9]+$/g.test(el[d].value)))){
                    //cont suma
                    el[d].style.border ="1px solid red";
                    if(el[d].previousElementSibling.childElementCount == 0)
                        el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese solo numeros o el codigo es repetido</span>`
                        cont++;
                        console.log("asd");

                        }else{
                        el[d].style.border = "1px solid #ccc";
                        if(el[d].previousElementSibling.childElementCount == 1)
                        el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
                        }
                },
                error:function(){
                  console.log("error");
                }


              })
        }

        if(el[d].getAttribute("validate") == "unicoprod"){
            
            // console.log("2423r43f");
            var a = window.location.href.split('/');
            a.pop();
            var b = a.pop();
            $.ajax({
                type: "GET",

                url:"http://localhost/vetjavi/index.php/producto/getProducto/" + el[d].value,
                async: false,
                dataType: "json",
                success: function(result){
                    // console.log(result);
                  if((result[0]!==undefined) || (!(/^([óáéíúña-z]|\s)+$/i.test(el[d].value)))){
                    //cont suma
                    el[d].style.border ="1px solid red";
                    if(el[d].previousElementSibling.childElementCount == 0)
                        el[d].previousElementSibling.innerHTML += `<span class="error"> Ingrese solo letras o el nombre es repetido</span>`
                        cont++;
                        console.log("asd");

                        }else{
                        el[d].style.border = "1px solid #ccc";
                        if(el[d].previousElementSibling.childElementCount == 1)
                        el[d].previousElementSibling.getElementsByTagName("span")[0].remove();
                        }
                },
                error:function(){
                  console.log("error");
                }


              })
        }

    }


console.log("holi "+ cont)

if(cont>0)
return false;

// return false;
}

