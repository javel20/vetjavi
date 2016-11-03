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

// modal eliminar

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
// teclado accion
document.onkeydown = function(evt) {
    if (evt.keyCode == 27){
        $modal_completo.style.display = "none";
    } 
}