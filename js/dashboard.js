

function readDashBoard()
{
    $.ajax({
        url:"../vista/dashboard.php"
    }).done(function(datos)
    {
        console.log(datos)

        var jsonSt = JSON.stringify(datos)
        var jsonP = JSON.parse(jsonSt)

        var money = jsonP.venta
        document.getElementById("ventas").innerHTML = `<p><h3>Ventas</h3></p> <p><strong>${Number(money).toFixed(2)}</strong></p>`
        document.getElementById("producto").innerHTML =  `<p><h3>Productos</h3></p><strong><p>${jsonP.producto}</p></strong>`
        document.getElementById("proveedor").innerHTML = `<p><h3>Proveedores</h3></p><strong><p>${jsonP.proveedor}</p></strong>`

    }).fail(function (error)
    {
        console.log((error))
    })
}


readDashBoard()

