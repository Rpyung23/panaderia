var inputReport1 = document.getElementById("inputReport1")

inputReport1.addEventListener("click",function (e)
{

    var w = window.open("../panel/report/producto.php", '_blank')
    w.focus()
})


var inputReport2 = document.getElementById("inputReport2")

inputReport2.addEventListener("click",function (e)
{

    var fechaI =  document.getElementById("fechaI").value
    var fechaF =  document.getElementById("fechaF").value

    if (Date.parse(fechaI)>Date.parse(fechaF))
    {
        Swal.fire({
            title:'Fechas no válidas',
            text:'Rango de fecha no permitidas',
            icon:'error'
        })


    }else{
        var w = window
            .open("../panel/report/ventas.php?fechaI="+fechaI+" 05:00:00&fechaF="+fechaF+" 23:59:59"
                , '_blank')
        w.focus()
    }

})