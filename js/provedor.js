let codigo_update =null
let codigo_update_aux =null
function readProvedor()
{
    $.ajax({
        url:"../vista/provedor.php"
    }).done(function(datos)
    {
        console.log(datos)

        var jsonSt = JSON.stringify(datos)
        var jsonP = JSON.parse(jsonSt)

        var template = ""
        for (var i=0;i<jsonP.datos.length;i++)
        {
            template+=`<tr>
                <td>${jsonP.datos[i].code}</td>
                <td>${jsonP.datos[i].nombre}</td>
                <td>${jsonP.datos[i].dir}</td>
                <td>${jsonP.datos[i].tel}</td>
                <td>${jsonP.datos[i].email}</td>
                <td>${jsonP.datos[i].encarg}</td>
                <td>
                <button codigo="${jsonP.datos[i].code}" type="button" class="btn_delete_pro btn btn-danger"><i class='bx bx-trash'></i></button>
                <button codigo="${jsonP.datos[i].code}" nombre="${jsonP.datos[i].nombre}" 
                dir="${jsonP.datos[i].dir}" tel="${jsonP.datos[i].tel}"
                email="${jsonP.datos[i].email}" encarg="${jsonP.datos[i].encarg}"
                type="button" class="btn_edit_pro btn btn-primary"><i class='bx bx-edit'></i></button>
                </td></tr>`
        }

        document.getElementById("table_prove").innerHTML = template

    }).fail(function (error)
    {
        console.log((error))
    })
}

readProvedor()



$(document).on("click",".btn_edit_pro",function ()
{
    let element = $(this)[0];
    var nombre = element.getAttribute("nombre")
    var dir = element.getAttribute("dir")
    var tel = element.getAttribute("tel")
    var email = element.getAttribute("email")
    var encarg = element.getAttribute("encarg")

    codigo_update_aux = element.getAttribute("codigo")

    document.getElementById("id_ruc_provedor").value = codigo_update_aux
    document.getElementById("id_nombre_provedor").value = nombre
    document.getElementById("id_dir_provedor").value = dir
    document.getElementById("id_tel_provedor").value = tel

    document.getElementById("id_email_provedor").value = email
    document.getElementById("id_encarg_provedor").value = encarg


});

$(document).on("click",".btn_delete_pro",function ()
{
    let element = $(this)[0];
    var code = element.getAttribute("codigo")
    var json = {
        code : code
    }
    $.ajax({
        url:"../vista/provedor.php",
        method:'DELETE',
        data:JSON.stringify(json)
    }).done(function (datos)
    {
        var jsonS = JSON.stringify(datos)
        var jsonP = JSON.parse(jsonS)

        if (jsonP.datos)
        {
            Swal.fire({
                title:'El Provedor ha sido Eliminado',
                text:'El Provedor ha sido eliminado con exito!',
                icon:'success'
            })
            readProvedor()
        }else{
            Swal.fire({
                title:'Provedor no eliminado',
                text:'No se ha podido eliminar el provedor ',
                icon:'error'
            })
        }
    }).fail(function (error)
    {
        console.log(error)
        alert(error)
    })

});

var btn_register = document.getElementById("btn_register_proveedor")

btn_register.addEventListener("click",function (e)
{
    registerProvedor()
})

function registerProvedor()
{
    var nombre = document.getElementById("id_nombre_provedor").value
    var tele = document.getElementById("id_tel_provedor").value
    var dir = document.getElementById("id_dir_provedor").value
    var email = document.getElementById("id_email_provedor").value
    var encargado = document.getElementById("id_encarg_provedor").value
    var code = document.getElementById("id_ruc_provedor").value

    var  json={
        code:code,
        name:nombre,
        tele:tele,
        dir:dir,
        email:email,
        encargado:encargado
    }
    var  list =[]
    list.push(nombre)
    list.push(tele)
    list.push(dir)
    list.push(email)
    list.push(encargado)
    list.push(code)

    if(!alertdatosvacios(list))
    {
        console.log(json)

        $.ajax({
            url:"../vista/provedor.php",
            method:'POST',
            data:JSON.stringify(json)
        }).done(function (datos)
        {
            var jsonS = JSON.stringify(datos)
            var jsonP = JSON.parse(jsonS)

            if (jsonP.datos)
            {
                Swal.fire({
                    title:'Provedor registrado',
                    text:'El provedor '+json.name+' ha sido registrado con exito!',
                    icon:'success'
                })
                readProvedor()
            }else{
                Swal.fire({
                    title:'Provedor no registrado',
                    text:'No se ha podidio registrar el provedor '+json.name,
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



var btn_update_proveedor = document.getElementById("btn_update_proveedor")

btn_update_proveedor.addEventListener("click",function (e)
{
    updateProvedor()
})

function updateProvedor()
{
    var nombre = document.getElementById("id_nombre_provedor").value
    var tele = document.getElementById("id_tel_provedor").value
    var dir = document.getElementById("id_dir_provedor").value
    var email = document.getElementById("id_email_provedor").value
    var encargado = document.getElementById("id_encarg_provedor").value
    var code = document.getElementById("id_ruc_provedor").value

    var  json={
        code_aux:codigo_update_aux,
        code:code,
        name:nombre,
        tele:tele,
        dir:dir,
        email:email,
        encargado:encargado
    }
    var  list =[]
    list.push(nombre)
    list.push(tele)
    list.push(dir)
    list.push(email)
    list.push(encargado)
    list.push(code)

    if(!alertdatosvacios(list))
    {
        console.log(json)

        $.ajax({
            url:"../vista/provedor.php",
            method:'PUT',
            data:JSON.stringify(json)
        }).done(function (datos)
        {
            var jsonS = JSON.stringify(datos)
            var jsonP = JSON.parse(jsonS)

            if (jsonP.datos)
            {
                Swal.fire({
                    title:'Provedor actualizado',
                    text:'El provedor '+json.name+' ha sido actualizado con exito!',
                    icon:'success'
                })
                readProvedor()
            }else{
                Swal.fire({
                    title:'Provedor no actualizado',
                    text:'No se ha podidio actualizar el provedor '+json.name,
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