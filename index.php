 <?php
//Definimos la codificación de la cabecera.
header('Content-Type: text/html; charset=utf-8');
//Importamos el archivo con las validaciones.
require_once 'funciones/validaciones.php';
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, sino se guardará null.
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
//Este array guardará los errores de validación que surjan.
$errores = array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Valida que el campo nombre no esté vacío.
    if (!validaRequerido($nombre) || (is_numeric($nombre))) {
        $errores[] = 'El campo nombre es incorrecto.';
    }
    if (!validaRequerido($apellidos) || (is_numeric($apellidos))) {
        $errores[] = 'El campo apellidos es incorrecto.';
    }
    //Valida la edad con un rango de 3 a 130 años.
    $opciones_telefono = array(
        'options' => array(
            //Definimos el rango de edad entre 3 a 130.
            'min_range' => 5,
            'max_range' => 9999999999
        )
    );
    if (!validarEntero($telefono, $opciones_telefono)) {
        $errores[] = 'El campo Telefono es incorrecto.';
    }
    //Valida que el campo email sea correcto.
    if (!validaEmail($email)) {
        $errores[] = 'El campo email es incorrecto.';
    }
    //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
    if(!$errores){
        session_start();
        $_SESSION['UserNames']=$_REQUEST['nombre'];
        $_SESSION['UserLastNames']=$_REQUEST['apellidos'];

        header('Location: formulario.php');
        exit();
        
    }
}
?>
<!DOCTYPE HTML>
<!--
	Synchronous by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>my personal profile</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" type="image/x-icon" href="images/icono.png" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body class="homepage">
		  <?php if ($errores): ?>
            <ul style="color: #f00;">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                <strong>Datos Incorrectos!</strong>
                        
                    <?php foreach ($errores as $error): ?>
                        <li> <?php echo $error ?> </li>
                    <?php endforeach; ?>
                </div>
            </ul>
            
        <?php endif; ?>
      
		<div id="wrapper">
			
			<!-- Header -->
			<div id="header">
				<div class="container"> 
					
					<!-- Logo -->
					<div id="logo">
						<h1><a href="#">welcome to my page</a></h1>
						<span>Jose daniel Alvarez Rua</span>
					</div>
					
					<!-- Nav -->
					<nav id="nav">
						<ul>
							
							<li><a href="index.php">Inicio</a></li>
							<li><a href="perfilprofecional.html">perfil Profecional</a></li>
							<li><a href="perfilpersonal.html">Perfil Personal</a></li>
							
						</ul>
					</nav>
				</div>
			</div>
			<!-- /Header -->
			
			<div id="page">
				<div class="container">
					<div class="row">
						<div class="3u">
							<section id="sidebar1">
								<header>
									<h2>Los Dias mas importantes en mi vida</h2>
								</header>
								<ul class="style3">
									<li class="first">
										<p class="date"><a href="#"> ene <b>17</b></a></p>
										<p><a href="#">Es un dia maravilloso por que son mis cumpleaños yo naci en 1997 un dia viernes jejejeje. </a></p>
									</li>
									<li>
										<p class="date"><a href="#">Abr <b>7</b></a></p>
										<p><a href="#">Es el grandioso dia de los cumpleaños de mi mama, de la persona que mas quiero en este mundola que mellena de felicidad todos los dias .</a></p>
									</li>
									<li>
										<p class="date"><a href="#">Abr <b>19</b></a> </p>
										<p><a href="#">Es el grandioso dia de los cumpleaños de mi Padre, de la persona que mas quiero en este mundo la que mellena de felicidad igual qu mi mama los amo demaciado .</a></p>
									</li>
								</ul>
							</section>
						</div>
						<div class="6u skel-cell-important">
							<section id="content" >
								<header>
									<h2>esta pagina fue creada</h2>
								</header>
								<p>Aunque no es cierto, como muchos blogs y medios de comunicación están diciendo, que la Web esté cumpliendo 20 años –algo que ocurrió en marzo de 2009–, sí es verdad que la primera página en la Web se publicó oficialmente el 6 de agosto de 1991, y ambos hechos tuvieron un mismo protagonista: Tim Berners-Lee, conocido como el ‘padre’ de la Web.

Ese día, en las instalaciones de la Organización Europea para la Investigación Nuclear (CERN) , el investigador Berners-Lee, a sus 36 años, publicó una página simple en la dirección http://info.cern.ch/hypertext/WWW/TheProject.html, para lo cual usó un servidor NeXT –fabricado por la empresa del mismo nombre, creada por Steve Jobs–. Antes de esto, solo había publicado páginas en prueba que él o su equipo podían ver.

Por obvias razones, el contenido de la página era el propio proyecto WWW, con detalles técnicos sobre el hipertexto, cómo crear nuevas páginas, cómo en el futuro se podría buscar información en la Web, preguntas frecuentes, un listado de las personas involucradas en el proyecto y la forma como los interesados podrían colaborar. A partir de allí, esa misma página se actualizaría a diario con noticias del proyecto, y su creador tal vez no sospechó las dimensiones del proyecto, por lo que ni siquiera hizo capturas de pantalla de esta primera página. La siguiente captura corresponde a la misma página, pero tomada el 3 de noviembre de 1992, aunque la esencia es la misma.</p>
								<a href="#" class="button">Full Article</a>
							</section>
						</div>
						<div class="3u">
							<section id="content" >
								<header>
									<h2>Formulario</h2>
								</header>
       <form method="post" action="index.php" class="form-horizontal" role="form">
                <form method="post" action="formulario.php">
                    <div class="container" id="principal">
                        <div class="form-group">
                            <label>Nombres</label>
                                <input type="text" name="nombre" value="<?php echo $nombre ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Apellidos</label>
                                <input type="text" name="apellidos" value="<?php echo $apellidos ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Telefono</label>
                                <input type="text" name="telefono" size="10" value="<?php echo $telefono ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                                <input type="email" name="email" value="<?php echo $email ?>" id="email" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Asunto</label>
                                <input type="text" name="Asunto" value="" required="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Mensaje</label>
                        </div>
                        <div class="form-group">
                            <textarea rows="6" cols="50" placeholder="Escriba un mensaje..." class="form-control"></textarea>
                        </div>
                            <div class="trans" id="boton">
                                <input type="submit" value="Enviar" class="btn btn-outline-dark">
                            </div>
                    </div>
                </form>
            </form>

							</section>
						</div>
					</div>

				</div>	
			</div>

			<!-- Footer -->
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="3u">
							<section id="box1">
								<header>
									<h2>Vehiculos</h2>
								</header>
								<ul class="style3">
									<li class="first">
										<p class="date"><a href="#">carros</a></p>
										<p><a href="#">La marca italiana Ferrari, fundada en 1929, es probablemente la marca automovilística más famosa del mundo. Ferrari está especializado en la producción de coches muy rápidos y exclusivos. Ferrari vende un total aproximado de 7.500 coches nuevos al año.</a></p>
									</li>
									<li>
										<p class="date"><a href="#">motos</a></p>
										<p><a href="#">Una motocicleta, comúnmente conocida en español con la abreviatura moto, es un vehículo de dos ruedas,1​ impulsado por un motor que acciona la rueda trasera, en raras excepciones en las que el impulso se daría en la rueda delantera o en ambas, superior a 50 cm³ si es de combustión interna y con una velocidad máxima por construcción superior a 45 km/h. </a> </p>
									</li>
								</ul>
							</section>
						</div>
						<div class="6u">
							<section id="box2">
								<header>
									<h2>Deportes</h2>
								</header>
								<div> <a href="#" class="image full"><img src="images/nike.jpg" alt=""></a> </div>
								<p>El deporte es una actividad o ejercicio físico y mental reglamentado, normalmente de carácter competitivo, que puede mejorar la condición física1​ de quien lo practica, y además tiene propiedades que lo diferencian del juego.

La Real Academia Española, en su Diccionario de la lengua española, define deporte como una «actividad física, ejercida como juego o competición, cuya práctica supone entrenamiento y sujeción a normas»; también, en una segunda acepción, más amplia, como «recreación, pasatiempo, placer, diversión o ejercicio físico, por lo común al aire libre».2​ Por otra parte, la Carta Europea del deporte lo define como: «Todas las formas de actividades físicas que mediante una participación organizada o no, tienen como objetivo la expresión o la mejora de la condición física y psíquica, el desarrollo de las relaciones sociales o la obtención de resultados en competición de todos los niveles.</p>
							</section>
						</div>
						<div class="3u">
							<section id="box3">
								<header>
									<h2>Musica</h2>
								</header>
								<ul class="style1">
									<li class="first"><a href="#"><img src="images/salsa.jpg" alt=""><p>La salsa es un conjunto de ritmos afrocaribeños fusionados con jazz y otros estilos. Su nacimiento ha sido muy debatido, pero se sabe que procede de una fusión que llevaron a cabo los negros en el Caribe cuando escucharon la música europea para luego mezclarla con sus tambores. La salsa se ha difundido debido a la inmigración de población latinoamericana, especialmente afrocaribeños, hacia destinos al norte, como Nueva York, pero también hacia Sudamérica, En Puerto Rico se utiliza mucho la salsa , bueno es el baile tradicional de todos los boricuas.</p></a></li>
									<li><a href="#"><img src="images/regge.jpg" alt=""><p>El reguetón1​ o reggaetón es un género musical bailable2​ que tiene sus raíces en la música de América Latina y el Caribe.3​ Su sonido deriva del reggae jamaicano, influido por el hip hop. Se desarrolló por primera vez en Panamá en los años setenta (como reggae en español) y radicalizandose como reggaetón a principios de los noventa en Puerto Rico; nace y surge a raíz de la comunidad jamaicana cuyos ancestros llegaron a Panamá, junto a inmigrantes de ascendencia afro-antillana durante el siglo XXLorem ipsum dolort, consectetuer adipiscing dictum metus sapien.</p></a></li>
									<li><a href="#"><img src="images/balad.jpg" alt=""><p>La balada romántica es un género musical aparecido en la década de 1960 que alcanzó gran popularidad en los países de habla hispana y portuguesa de América Latina y España. Se caracteriza por ser una canción interpretada en tiempo lento, siempre sobre temas de amor</p></a></li>
								
								</ul>
							</section>
						</div>
					</div>
				</div>
			</div>

			<!-- Copyright -->
			<div id="copyright">
				<div class="container">
					Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
				</div>
			</div>
			
		</div>
	</body>
</html>