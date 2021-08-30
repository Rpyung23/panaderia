var base64 = null
var $json = null
let codigo_update = null
function readProductos()
{
    $.ajax({
        url:"../vista/producto.php"
    }).done(function(datos)
    {
        console.log(datos)

        var jsonSt = JSON.stringify(datos)
        var jsonP = JSON.parse(jsonSt)

        var template = ""
        for (var i=0;i<jsonP.datos.length;i++)
        {
            template+=`<tr><th scope="row">${i}</th>
                <td>${jsonP.datos[i].nombre}</td>
                <td>${jsonP.datos[i].descrip}</td>
                <td><img style="height: 50px;width: 60px;border-color: #2c2c34;
                border-style: solid;border-radius: 10px" src="${jsonP.datos[i].foto}"></td>
                <td>${jsonP.datos[i].precio}</td>
                <td><span className="badge badge-danger">En Stock</span></td>
                <td><button codigo="${jsonP.datos[i].codigo}" type="button" class="btn_delete_pro btn btn-danger"><i class='bx bx-trash'></i></button>
                <button codigo="${jsonP.datos[i].codigo}" nombre="${jsonP.datos[i].nombre}" descrip="${jsonP.datos[i].descrip}" 
                 foto="${jsonP.datos[i].foto}"
                 precio="${jsonP.datos[i].precio}" type="button" class="btn_edit_pro btn btn-primary"><i class='bx bx-edit'></i></button>
                </tr>`
        }

        document.getElementById("table_productos").innerHTML = template

    }).fail(function (error)
    {
        console.log((error))
    })
}

readProductos()

function encodeImageFileAsURL(element)
{
    var file = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function()
    {
        base64 = reader.result
    }
    reader.readAsDataURL(file);
}


$(document).on("click",".btn_delete_pro",function ()
{
    let element = $(this)[0];
    var code = element.getAttribute("codigo")
    var json = {
        code : code
    }
    $.ajax({
        url: '../vista/producto.php',
        method:'DELETE',
        data:JSON.stringify(json)
    }).done(function (datos)
    {
        var jsonS = JSON.stringify(datos)
        var jsonP = JSON.parse(jsonS)

        if (jsonP.datos)
        {
            Swal.fire({
                title:'Producto ha sido Eliminado',
                text:'El producto ha sido eliminado con exito!',
                icon:'success'
            })
            readProductos()
        }else{
            Swal.fire({
                title:'Producto no eliminado',
                text:'No se ha podido eliminar el producto ',
                icon:'error'
            })
        }
    }).fail(function (error)
    {
        console.log(error)
        alert(error)
    })

});


$(document).on("click",".btn_edit_pro",function ()
{
    let element = $(this)[0];
    var nombre = element.getAttribute("nombre")
    var precio = element.getAttribute("precio")
    var desc = element.getAttribute("descrip")
    base64 = element.getAttribute("foto")
    codigo_update = element.getAttribute("codigo")

    document.getElementById("id_nombre_producto").value = nombre
    document.getElementById("id_prec_producto").value = precio
    document.getElementById("id_desc_producto").value = desc

});


var btn_update_producto = document.getElementById("btn_update_producto")

btn_update_producto.addEventListener("click",function (e)
{
    updatePro(codigo_update)
})

function updatePro(code)
{

    var  list =[]
    list.push(document.getElementById("id_nombre_producto").value)
    list.push(document.getElementById("id_prec_producto").value)
    list.push(document.getElementById("id_desc_producto").value)

    if(!alertdatosvacios(list))
    {
        var nombre = document.getElementById("id_nombre_producto").value
        var precio = document.getElementById("id_prec_producto").value
        var desci = document.getElementById("id_desc_producto").value
        var foto = base64

        var  json={
            code:code,
            name:nombre,
            precio:precio,
            desc:desci,
            precio:precio,
            foto:foto

        }

        $.ajax({
            url: '../vista/producto.php',
            method:'UPDATE',
            data:JSON.stringify(json)
        }).done(function (datos)
        {
            var jsonS = JSON.stringify(datos)
            var jsonP = JSON.parse(jsonS)

            if (jsonP.datos)
            {
                Swal.fire({
                    title:'Producto ha sido Actualizado',
                    text:'El producto ha sido Actualizado con exito!',
                    icon:'success'
                })
                readProductos()
            }else{
                Swal.fire({
                    title:'Producto no Actualizado',
                    text:'No se ha podido Actualizado el producto ',
                    icon:'error'
                })
            }
        }).fail(function (error)
        {
            console.log(error)
            alert(error)
        })
    }
}

var btn_register = document.getElementById("btn_register_producto")

btn_register.addEventListener("click",function (e)
{
    registerProducto()
})

function registerProducto()
{
    var  list =[]
    list.push(document.getElementById("id_nombre_producto").value)
    list.push(document.getElementById("id_prec_producto").value)
    list.push(document.getElementById("id_desc_producto").value)
    if(!alertdatosvacios(list))
    {
        var nombre = document.getElementById("id_nombre_producto").value
        var precio = document.getElementById("id_prec_producto").value
        var desci = document.getElementById("id_desc_producto").value
        var foto = base64

        var  json={
            name:nombre,
            precio:precio,
            desc:desci,
            precio:precio,
            foto:foto
        }

        console.log(json)

        $.ajax({
            url: '../vista/producto.php',
            method:'POST',
            data:JSON.stringify(json)
        }).done(function (datos)
        {
            var jsonS = JSON.stringify(datos)
            var jsonP = JSON.parse(jsonS)

            if (jsonP.datos)
            {
                Swal.fire({
                    title:'Producto registrado',
                    text:'El producto '+json.name+' ha sido registrado con exito!',
                    icon:'success'
                })
                readProductos()
            }else{
                Swal.fire({
                    title:'Producto no registrado',
                    text:'No se ha podidio registrar el producto '+json.name,
                    icon:'error'
                })
            }
        }).fail(function (error)
        {
            console.log(error)
            alert(error)
        })
    }
}

var id_prec_producto_ = document.getElementById("id_prec_producto")
id_prec_producto_.addEventListener("keypress", function(e) {
    comprueba(e.key, id_prec_producto_)
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