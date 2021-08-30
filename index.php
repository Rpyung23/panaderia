<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panaderia</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/sweet.js"></script>
</head>
<body>
    <?php
       if (file_exists('controler/ControlerProducto.php'))
       {
           require('controler/ControlerProducto.php');
       }else{
           require('../controler/ControlerProducto.php');
       }
    ?>
    <div class="contenedor">
        <header class="cabeza-menu-p">
            <div class="contenedor_int">
                <div class="logo">
                    <img src="http://hcx3.com/00_2018/prueba/img/logo.png" alt="logo">
                </div>
                <i class="fas fa-bars" id="btn-menu"></i>
                <nav class="menu" id="nav">
                    <ul class="grupo-btn">
                        <li class="item_btn"><a class="link__btn" href="#">Inicio</a></li>
                        <li class="item_btn"><a class="link__btn" href="#">Panadería</a></li>
                        <li class="item_btn"><a class="link__btn" href="#">Contacto</a></li>
                        <li class="item_btn"><a class="link__btn" data-toggle="modal" data-target="#exampleModal" href="#">Login</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="banner">
            <div class="contenedor_int">
                <h2 class="banner__titulo">Bogotá</h2>
                <br>
                <p class="banner__txt">El pan más fresco de la ciudad</p>
            </div>
        </div>
    </div>

    <div class="entrada-logo">
        <div class="contenedor_int flexxbox">
            <div class="logo-grande">
                <img src="http://hcx3.com/00_2018/prueba/img/logo-fondooscuro.png" alt="">
            </div>
            <div class="texto-claro">
                <p>Combinamos una gran variedad de productos de panadería, trabajamos con las mejores harinas de trigo e ingredientes naturales, haciendo de nuestros productos alimentos saludables, preparados también con semillas naturales como la avena,
                    la linaza, el trigo y el centeno.</p>
            </div>
        </div>
    </div>

    <div class="color-contra">
        <div class="contenedor_int flexxbox">
            <div class="img-producto">
                <img src="http://hcx3.com/00_2018/prueba/img/logo.png" alt="">
            </div>
            <div class="texto-oscuro">
                <p>La técnica de preparación, horneando poco a poco, junto con la fermentación y la temperatura adecuadas, da como resultado un alimento suave y de excelente calidad, siempre como recién hecho. Nuestras levaduras naturales y margarinas seleccionadas
                    permiten que nuestros clientes noten la diferencia en su sabor, suavidad y presentación, de nuestros productos en los que también combinamos arte y tradición.</p>
            </div>
        </div>
    </div>

    <div class="productos">
        <div class="contenedor_int">
            <h2 class="titulo">Tradición artesanal</h2>

            <?php
                $datos = readProductosController();
                for ($i=0;$i<sizeof($datos);$i++)
                {
                    echo '<div class="produc-0">
                <h2 class="titulo-p">'.$datos[$i]->getNombre().'</h2>
                <div class="cont-imag">
                    <img src="'.$datos[$i]->getFoto().'" alt="">
                </div>
                <div class="cont-btn">
                    <a href="#" class="boton-modal"> $'.$datos[$i]->getPrecio().'</a>
                </div>
            </div>';
                }
                //var_dump($datos);
            ?>

            <!--<div class="produc-0">
                <h2 class="titulo-p">Pan Blandito</h2>
                <div class="cont-imag">
                    <img src="http://hcx3.com/00_2018/prueba/img/pan03.png" alt="">
                </div>
                <div class="cont-btn">
                    <a href="#" class="boton-modal">DETALLES</a>
                </div>
            </div>

            <div class="produc-0">
                <h2 class="titulo-p">Pan Arabe</h2>
                <div class="cont-imag">
                    <img src="http://hcx3.com/00_2018/prueba/img/pan04.png" alt="">
                </div>
                <div class="cont-btn">
                    <a href="#" class="boton-modal">DETALLES</a>
                </div>
            </div>

            <div class="produc-0">
                <h2 class="titulo-p">Pan Integral</h2>
                <div class="cont-imag">
                    <img src="http://hcx3.com/00_2018/prueba/img/pan05.png" alt="">
                </div>
                <div class="cont-btn">
                    <a href="#" class="boton-modal">DETALLES</a>
                </div>
            </div>

            <div class="produc-0">
                <h2 class="titulo-p">Pan Bagette</h2>
                <div class="cont-imag">
                    <img src="http://hcx3.com/00_2018/prueba/img/pan02.png" alt="">
                </div>
                <div class="cont-btn">
                    <a href="#miModal" class="boton-modal">DETALLES</a>

                    <div id="miModal" class="modal">
                        <div class="modal-contenido">
                            <a href="#" class="cerrar">X</a>
                            <h2 class="titulo-p">Pan Bagette</h2>
                            <div class="texto-oscuro">
                                <p>Este es uno de los panes más conocidos y apreciados, no sólo en Francia. Esta receta de baguette o pan francés nos trae a la memoria los panes tradicionales que se encuentran en muchas zonas rurales de Italia y Francia,
                                    la mayoría de las veces elaborados en forma de largas barras de pan crujiente, con una corteza dorada y apetecible. Para que la masa quede crujiente y elástica, como veremos, elaboramos una masa de pan básico que luego
                                    extenderemos y enrollaremos antes de la última fermentación. Para potenciar el dorado de la corteza pintaremos la superficie con clara batida dos veces, una antes del horneado y otra vez casi al final.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="produc-0">
                <h2 class="titulo-p">Pan Blandito</h2>
                <div class="cont-imag">
                    <img src="http://hcx3.com/00_2018/prueba/img/pan03.png" alt="">
                </div>
                <div class="cont-btn">
                    <a href="#" class="boton-modal">DETALLES</a>
                </div>
            </div>

            <div class="produc-0">
                <h2 class="titulo-p">Pan Arabe</h2>
                <div class="cont-imag">
                    <img src="http://hcx3.com/00_2018/prueba/img/pan04.png" alt="">
                </div>
                <div class="cont-btn">
                    <a href="#" class="boton-modal">DETALLES</a>
                </div>
            </div>

            <div class="produc-0">
                <h2 class="titulo-p">Pan Integral</h2>
                <div class="cont-imag">
                    <img src="http://hcx3.com/00_2018/prueba/img/pan05.png" alt="">
                </div>
                <div class="cont-btn">
                    <a href="#" class="boton-modal">DETALLES</a>
                </div>
            </div>-->

        </div>
    </div>

    <div class="formulario-c">
        <div class="contenedor_int">
            <h2 class="titulo">Contáctenos</h2>
            <p class="texto-amarillo">Si tiene dudas, inquietudes, preguntas o simplemente quiere dejarnos sus comentarios o aportes, diligencie este formato y le responderemos a la brevedad del caso; recuerde que sus observaciones son sumamente importantes para nosotros.</p>

            <form action="enviar.php" class="datos-usuario">
                <input type="text" placeholder="Nombre">
                <br>
                <input type="email" placeholder="Correo">
                <br>
                <input type="tel" placeholder="Teléfono">
                <br>
                <textarea name="mensaje" id="mensaje" placeholder="mensaje" cols="30" rows="10"></textarea>
                <br>
                <input class="boton-enviar" type="submit">
            </form>
        </div>
    </div>

    <footer class="pie">
        <p class="texto-oscuro"> Creador por <a class="vin" href="#">Andrea Sandoval</a> </p>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingreso de Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                </div>
                <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuario</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button id="btn_login" class="btn btn-primary">Login</button>

                </div>
            </div>
        </div>
    </div>

    <script src="js/inicio.js">
    </script>
    <script src="js/login.js"></script>
</body>

</html>