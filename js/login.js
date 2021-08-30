var login = document.getElementById("btn_login")

login.addEventListener("click",function (event)
{
    var user = document.getElementById("exampleInputEmail1").value
    var pass = document.getElementById("exampleInputPassword1").value

    var json = {
        user:user,
        pass:pass
    }
    console.log(json)
    $.ajax({
        url:"vista/login.php",
        method:'POST',
        data:JSON.stringify(json)
    }).done(function (datos)
    {
        var datos_str = JSON.stringify(datos)
        var datos_p = JSON.parse(datos_str)
        if (datos_p.datos == true)
        {
            Swal.fire({
                title:'Bienvenido!',
                text:'Credenciales validas',
                icon:'success',
                heightAuto:false,
                confirmButtonText: 'Ingresar'
            }).then((result)=>{
                if (result.isConfirmed){
                    location.href = "panel"
                }
            })
        }else{
            Swal.fire(
                'Inicio de Sesión',
                'Lo sentimos sus credenciales no son validas',
                'warning'
            )

        }
    }).fail(function (error){
        console.log(error)
    })

})

