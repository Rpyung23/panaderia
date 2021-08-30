function alertdatosvacios(list_elements) {

    var bandera = false

    for (var i = 0; i < list_elements.length; i++) {
        if (list_elements[i] == "" || list_elements[i] == undefined) {
            bandera = true;
            i = list_elements.length++
        }
    }

    if (bandera == true) {

        Swal.fire(
            "Datos vacios",
            "Lo sentimos no se admiten datos vacios.",
            "warning"
        )
    }

    return bandera;
}
