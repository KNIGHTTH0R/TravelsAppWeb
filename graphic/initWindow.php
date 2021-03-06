<?php
    session_start();
    session_destroy();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Nos vamos de viaje</title>
        <link rel="stylesheet" type="text/css" href="../resources/theme/css/initWindowStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script type='text/javascript' src='../logic/initWindowLogic.js'></script>
        <script type='text/javascript' src='../logic/searchLogic.js'></script>

        <script src='../resources/bootstrap/js/bootstrap.js'></script>
        <script src='../resources/bootstrap/js/bootstrap-datepicker.js'></script>
        <script src='../resources/bootstrap/locales/bootstrap-datepicker.es.min.js'></script>

        <link rel="stylesheet"  href="../resources/bootstrap/css/bootstrap.css">
        <link rel="stylesheet"  href="../resources/bootstrap/css/bootstrap-datepicker.css">
        <link rel="stylesheet"  href="../resources/bootstrap/css/custom.css">
        <!--https://bootsnipp.com/-->
    </head>
    <body>
        <header class = "Header">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <!-- Boton para cuando se hace la pantalla estrecha-->
                        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#" id = "iconButton">
                            <img src="../resources/car.png">
                        </a>
                    </div>
                    <!-- nav links-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="login-button"><a>Iniciar Sesión</a></li>
                            <li class = "register-button"><a>Registrarse</a></li>
                        </ul>
                    </div>
              </div>
            </nav>
        </header>

        <main>
           <?php if(isset($_GET['register']) && $_GET['register'] === "no"){?>
                <script>alert("USUARIO REPETIDO");</script>
            <?php }?>
          
            <?php if(isset($_GET['register']) && $_GET['register'] === "admin"){?>
                <script>
                    alert("NO PUEDES REGISTRARTE COMO ADMINISTRADOR");
                </script>
            <?php } ?>
          
            <?php if(isset($_GET['login']) && $_GET['login'] === "error"){?>
                <script>alert("USUARIO Y/O CONTRASEÑA ERRONEOS");</script>
            <?php } ?>

            <?php if(isset($_GET['session']) && $_GET['session'] === "no"){?>
                <script>alert("NO TIENES PERMISOS PARA ACCEDER A ESTA VENTANA");</script>
            <?php } ?>

                <!--LOGIN-->
                <div class="login-container">
                    <form class="login" action="../operations/sessionControl.php" method="post">
                        <h1 class="text-center">INICIAR SESIÓN</h1>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="username" type= "text" id = "username" required/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" id="password" required/>
                        </div>

                        <input class="btn btnEfect" type="submit" value="Login" id = "loginBtn">
                    </form>       
                </div>
                <!--REGISTRO-->
                <div class="register-container">
                    
                    <div class = "register">
                        <h1>REGISTRO</h1>
                        <p class = "lead">
                            Introduzca los datos solicitados a continuación.
                        </p>
                        <form action="../operations/registerControl.php" method="post" enctype= "multipart/form-data">  
                                <div id = "selectRol">
                                    <!--DRIVER AND PASSENGER RADIO BUTTONS--> 
                                    <label class="radio-inline">
                                        <input type="radio" id = "driver-radio-button" value = "driver" name="optradio">Conductor
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" id = "passenger-radio-button" name="optradio" checked="checked">Pasajero
                                    </label>
                                    <br>
                                </div>
                                <div class="form-group">
                                     <input class="form-control" type="text" placeholder="Nombre" name="nameRegister" id="nameRegister" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Username" name="usernameRegister" id="usernameRegister" required/>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="passwordRegister" id="passwordRegister" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="DNI" name="dniRegister" id="dniRegister" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="email" name="emailRegister" id="emailRegister" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Telefono" name="phoneRegister" id="phoneRegister" required/>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="userImage" accept="image/*" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Código de verificación" name="verifyText" id="verifyText" required/>
                                </div>
                                <input class="btn" type="button" value="Verificar móvil" id = "verifyBtn">
                                <input class="btn" type="submit" value="Aceptar" id = "registerBtn">
                        </form>
                    </div>
                </div>
				<input type="hidden" id="hdnSession" value= "-"/>
            <!--BUSQUEDA-->
            <div class = "search">
                <h1 class = "search-title">Encuentra el viaje que necesitas</h1>
                <div class = "search-content">
                    <div class="well-searchbox">
                        <form class="form-horizontal" role="form">

                                <label>Origen</label>
                                <select class="form-control" id="origin">
                                    <option value="">- - -</option>
                                </select>
                         
                                <label>Destino</label>
                                <select class="form-control" id="destination">
                                    <option value="">- - -</option>
                                </select>

                            <div class="input-group date"  data-provide = "datepicker" id = "datepicker">
                                <input type="text" class="form-control">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                            <label>Precio</label>
                            <select class="form-control" id="price">
                                <option value="">- - -</option>
                                <option value="10">10€</option>
                                <option value="20">20€</option>
                                <option value="30">30€</option>
                                <option value="40">40€</option>
                                <option value="50">50€</option>
                                <option value="60">60€</option>
                                <option value="70">70€</option>
                                <option value="80">80€</option>
                                <option value="90">90€</option>
                                <option value="100">100€</option>
                                <option value="150">150€</option>
                                <option value="200">200€</option>
                            </select>
                            <label>Puntuación</label>
                            <select class="form-control" id="score">
                                <option value="">- - -</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <br>
                            <input class="btn" type="button" value="Buscar" id = "searchBtn">
                        </form>
                        <div id = "searchResult">
                        </div>
                    </div>
                </div>
            </div>

        </main>
    
    </body>
	
	<!-- Modal content-->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header" id="modalHeader">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body">

            <table class="table table-bordered table-hover" id="tab_infoDriver">
            <thead>
              <tr id="">
              <th class="text-center" id="photoDriver">Foto</th>
              <th class="text-center" id="nameDriver">Nombre</th>
              <th class="text-center" id="emailDriver">Email</th>
              <th class="text-center" id="phoneDriver">Telefono</th>
              <th class="text-center" id="averageScore">Puntuacion media</th>
              
            </tr>
            </thead>
            <tbody></tbody>
            </table>

			<table class="table table-bordered table-hover" id="tab_comentarios">
			<thead>
			<tr id="">
			  <th class="text-center">Comentario</th>
			  <th class="text-center">Puntuacion</th>
			</tr>
			</thead>
			<tbody></tbody>
			</table>

		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>
	
		<!-- Modal content-->
	<div id="myModal2" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header" id="modalHeader2">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body">

            <table class="table table-bordered table-hover" id="tab_infoPassenger">
            <thead>
				<tr id="">
				  <th class="text-center" id="namePass">Foto</th>
				  <th class="text-center" id="namePass">Nombre</th>
				</tr>
            </thead>
            <tbody></tbody>
            </table>

		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>
