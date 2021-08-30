let nombre = ""
let cantidad_ = 0;
let template_table =""

let factura_venta = []

let factura = {
    precioT: null,
    user:null,
    dni_cliente:null,
    names:null,
    datos:null
}
function readProductos()
{
    $.ajax({
        url:"../vista/producto.php"
    }).done(function(datos)
    {
        console.log(datos)

        var jsonSt = JSON.stringify(datos)
        var jsonP = JSON.parse(jsonSt)

        var template = " <option>-- Selecciones el Producto --</option>"
        for (var i=0;i<jsonP.datos.length;i++)
        {
            template+=`<option id_producto="${jsonP.datos[i].codigo}" 
                precio_producto="${jsonP.datos[i].precio}">${jsonP.datos[i].nombre}</option>`
        }

        document.getElementById("select_producto").innerHTML = template

    }).fail(function (error)
    {
        console.log((error))
    })
}
function getFecha()
{
    var f = new Date()
    var fecha_now = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear()
    document.getElementById("fecha_venta").value = fecha_now
}
readProductos()
getFecha()


var check_factura_con_datos = document.getElementById("defaultCheck1")

check_factura_con_datos.addEventListener("change",function (e)
{
    var names = document.getElementById("id_names_client")
    var dni = document.getElementById("id_dni_client")
    if(check_factura_con_datos.checked){
        names.disabled  = false
        dni.disabled  = false
        names.value = ""
        dni.value = ""
    }else{
        names.disabled  = true
        dni.disabled  = true
        names.value = "Consumidor Final"
        dni.value = "9999999999999"
    }
})

var btn_add_table = document.getElementById("btn_add_table")
var select_productos = document.getElementById("select_producto")

btn_add_table.addEventListener("click",function (e)
{

    var precioT = document.getElementById("id_precio_tot").value
    var precioU = document.getElementById("id_precio_uni").value
    var cant = document.getElementById("id_cantidad_a_vender").value
    if (parseFloat(precioT)>0){
        cantidad_ += 1
        template_table += `<tr>
                <td>${cantidad_}</td>
                <td>${nombre}</td>
                <td>${cant}</td>
                <td>${precioU}</td>
                <td>${precioT}</td>
                </tr>`

        document.getElementById("table_factura").innerHTML = template_table

        factura.precioT = factura.precioT + parseFloat(document.getElementById("id_valor_pagar").value)
        console.log(factura.precioT)
        factura.user = 'nelson'
        factura.dni_cliente = document.getElementById("id_dni_client").value
        factura.names = document.getElementById("id_names_client").value


        var objfacturaventa = {
            id_producto:select_productos.options[select_productos.selectedIndex].getAttribute("id_producto"),
            cantidad:document.getElementById("id_cantidad_a_vender").value,
            precio:document.getElementById("id_precio_tot").value
        }

        factura_venta.push(objfacturaventa)

        factura.datos = factura_venta
    }
})

$(document).on("click","#btn_cancelar_table",function ()
{
    /*let element = $(this)[0].parentElement.parentElement;
    let elementh = $(this)[0]
    var precio = elementh.getAttribute("precioT")
    document.getElementById("table_factura").removeChild(element)
    factura.precioT = factura.precioT - parseFloat(precio)
    //console.log(precio)
    document.getElementById("id_valor_pagar").value = parseFloat(factura.precioT)*/

    location.reload();

});


select_productos.addEventListener("change",function (e)
{
    var id_pro = select_productos.options[select_productos.selectedIndex].getAttribute("id_producto")
    var precio = select_productos.options[select_productos.selectedIndex].getAttribute("precio_producto")
    nombre = select_productos.options[select_productos.selectedIndex].value
    document.getElementById("id_precio_uni").value = precio
})

var cantidad = document.getElementById("id_cantidad_a_vender")
var precioT = document.getElementById("id_precio_tot")

cantidad.addEventListener("input",function (e)
{
    var aux =precioT.value
    precioT.value = parseFloat(document.getElementById("id_precio_uni").value) * parseInt(cantidad.value)
    document.getElementById("id_valor_pagar").value = parseFloat(precioT.value + aux).toFixed(2)
})






var printf = document.getElementById("btn_print_table")

printf.addEventListener("click",function (e)
{
    window.print()
})

var btn_factura = document.getElementById("btn_factura")
btn_factura.addEventListener("click",function (e)
{
    if (factura.datos != null && factura.datos.length>0)
    {
        $.ajax({
            url: '../vista/venta.php',
            method:'POST',
            data:JSON.stringify(factura)
        }).done(function (datos)
        {
            var jsonS = JSON.stringify(datos)
            var jsonP = JSON.parse(jsonS)

            if (jsonP.datos)
            {
                Swal.fire({
                    title:'Venta registrada',
                    text:'Su venta ha sido registrada con exito!',
                    icon:'success'
                })
                factura_venta.datos = null
            }else{
                Swal.fire({
                    title:'Venta no registrada',
                    text:'No se ha podidio registrar la venta',
                    icon:'error'
                })
            }
        }).fail(function (error)
        {
            console.log(error)
            alert(error)
        })
    }else{
        Swal.fire({
            title:'Sin datos',
            text:'No se ha registrado ningun producto para su venta',
            icon:'warning'
        })
    }
})


var id_cantidad_a_vender = document.getElementById("id_cantidad_a_vender")
id_cantidad_a_vender.addEventListener("keypress", function(e) {
    comprueba(e.key, id_cantidad_a_vender)
})

function comprueba(valor, elemento) {
    if (valor == "-") {
        elemento.value = ""
        Swal.fire(
            "Numero no válido",
            "Lo sentimos solo se adminiten numeros negativos",
            "warning"
        )
    }
}
