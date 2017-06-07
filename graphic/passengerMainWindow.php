<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Pasajero</title>
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="../resources/theme/css/passengerMainWindowStyle.css">
        <link rel="stylesheet" type="text/css" href="../resources/theme/css/chat.css">
        <!--JS-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script type='text/javascript' src='../logic/passengerMainWindowLogic.js'></script>
        <script type='text/javascript' src='../logic/searchLogic.js'></script>
        <script type='text/javascript' src="../logic/chatLogic.js"></script>
		
        <!--EXTERNAL-->
		<script src='../resources/bootstrap/js/bootstrap.js'></script>
        <script src='../resources/bootstrap/js/bootstrap-datepicker.js'></script>
        <script src='../resources/bootstrap/locales/bootstrap-datepicker.es.min.js'></script>

        <link rel="stylesheet"  href="../resources/bootstrap/css/bootstrap.css">
        <link rel="stylesheet"  href="../resources/bootstrap/css/bootstrap-datepicker.css">
        <link rel="stylesheet"  href="../resources/bootstrap/css/custom.css">

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
                    </button><a class="navbar-brand" href="#" id = "iconButton">
                        <img src="../resources/car.png">
                    </a>
                </div>
                <!-- nav links-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active journeys-button"><a href="#">
                            Ver mis trayectos 
                        </a></li>
                        <li><a href="#"  class = "search-button">
                            Buscar viaje
                        </a></li>
                    </ul>
                    <!-- Chat. Si no hay mensajes no sale nada-->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" id="n_chats">
                        <ul class="dropdown-menu dropdown-cart" role="menu" id="chats"></ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
        </header>
        <main>			
			 <!--TRAYECTOS-->
			<div class="journeys-container">
				<div class = "journeys">
						<h1>Mis trayectos</h1>
						
				</div>
			</div>
            <!--BUSQUEDA-->
            <div class = "search-container">
                <h1 class = "search-title">Encuentra el viaje que necesitas</h1>
                <div class = "search-content">
                    <div class="well-searchbox">
                    <form class="form-horizontal" role="form">

                            <label>Origen</label>
                            <select class="form-control" id="Origin">
                                <option value="">Todos</option>
                            </select>
                     
                            <label>Destino</label>
                            <select class="form-control" id="Destiny">
                                <option value="">Todos</option>
                            </select>

                        <div class="input-group date"  data-provide = "datepicker" id = "datepicker">
                            <input type="text" class="form-control">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                        <!-- TODO AQUI VA LA FECHA -->
                        <br>
                        <input class="btn" type="submit" value="Buscar" id = "searchBtn">
                    </form>
                </div>
                </div>
            </div>
        </main>

<!--chat estructura-->
<aside class="tabbed_sidebar ng-scope chat_sidebar popup-box-on" id="sidebar_secondary">
  <div class="popup-head">
    <div class="popup-head-left pull-left"><a design="" and="" developmenta="" target="_blank" id="Foto"></a></div>
    <div class="popup-head-right pull-right">
      <div class="btn-group gurdeepoushan">
        <button class="chat-header-button" id="actualizarChat" type="button" alt="Actualizar" title="Actualizar"><i class="glyphicon glyphicon-refresh"></i></button>
        <button class="chat-header-button pull-right" id="removeClass" data-widget="remove" type="button" alt="Cerrar" title="Cerrar chat"><i class="glyphicon glyphicon-remove"></i></button>
      </div>
    </div>
  </div>
  <div class="chat_box_wrapper chat_box_small chat_box_active" id="chat" style="opacity: 1; display: block; transform: translateX(0px);">
    <div class="chat_box touchscroll chat_box_colors_a" id="mensajes"></div>
  </div>
  <div class="chat_submit_box">
    <div class="uk-input-group">
      <div class="gurdeep-chat-box">
        <input class="md-input" id="submit_message" type="text" placeholder="Escriba un mensaje..." name="submit_message">
      </div><a class="btn btn-success btn-sm" id="enviarMensaje"><span class="glyphicon gglyphicon-comment"></span> Enviar</a>
    </div>
  </div>
</aside>

    </body>