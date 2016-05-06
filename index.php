<!DOCTYPE html>
<html>

<?php session_start();

/*Lo que vamos a comprobar primero es si se esta solicitando un nuevo idioma
Si se esta solicitando, verificamos que el idioma existe tambien*/


if(!empty($_REQUEST['local']) && file_exists('lang/'.$_REQUEST['local'].'.php')){

  /*Entonces lo que vamos a hacer ahora, es decir que a partir de ahora,
  nuestro idioma por defecto es este, al menos que se solicite cambiarlo de vuelta*/

  $_SESSION['local'] = $_REQUEST['local'];

  //y esto lo vamos a usar despues
  $language = $_REQUEST['local'];
}

//Sino se solicito ningun idioma, verificamos si quedo guardado en nuestra session

elseif(isset($_SESSION['local']))

  //Lo mismo que antes, esto para despues

  $language = $_SESSION['local'];

//Y por ultimo, si nada de lo anterior cumple los requisitos, cargamos el idioma, que seria el idioma por defecto

else
  $language = 'es';
require_once('lang/'.strtolower($language).'.php');

?>

<!--ingles-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Yakatl</title>
    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="engine3/style.css" />
    <script type="text/javascript" src="engine3/jquery.js"></script>
    <link href="img/profile.png" rel="icon" type="image/jpeg" />

 </head>



<!--<section id="Ingles">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    
                    <hr> 
                    
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class = col-sm-4>
                <center>
            
            <div id = "idioma">
                <src="img/profile.png"  class="btn btn-success btn-lg"><?php echo $text['cambiar_idioma'];?>
            </div></center>
                
            </div>
            
        </div>
    </section>-->

<body id="page-top" class="index">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="img/header1.png"  height="47" width="447" href="#page-top" class="img-responsive" alt="">
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
            <div style="margin: 0 auto; width: 100%;">
                <!--<ul class="nav navbar-nav navbar-right">-->
                <ul class="nav navbar-nav ">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>

                    
                    <li class="page-scroll">
                        <a href="#objective"><?php echo $text['objetivo'];?></a>
                    </li>
                    
                    <li class="page-scroll">
                        <a href="#where"><?php echo $text['lugar'];?> </a>
                    </li>
                    <li class="page-scroll">
                        <a href="#participants"> <?php echo $text['Participantes'];?> </a>
                    </li>

                     <li class="page-scroll">
                     <a href="#products"><?php echo $text['Productos_del_Modulo'];?> </a>
                    </li>

                    <li class="page-scroll">
                     <a href="#results"><?php echo $text['Articulos'];?> </a>
                    </li>

                    <li class="page-scroll">
                        <a href="#Prototype"><?php echo $text['Prototipos'];?> </a>
                    </li>

                    <li class="page-scroll">
                        <a href="#map"><?php echo $text['Mapa'];?> </a>
                    </li>
                    <li class="page-scroll">
                        <a href="#index"><?php echo $text['Indice'];?> </a>
                    </li>

                    
                    <div id = "idioma" style="margin: 0 auto; width: 100%; text-align: left;">
                        <src="img/profile.png"  class="fondo2.jpg btn-lg"><?php echo $text['cambiar_idioma'];?>
                </div>
                </ul>
                
            </div>   
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>



   <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#meaning" ><img class="img-responsive imagen-redonda" src="img/profile.png" alt=""></a>
                        <div class="intro-text">
                            <span class="name"><?php echo $text['300'];?> </span>
                            <hr>
                            <span class="skills"><?php echo $text['301'];?>
                            </span>
                        </div>
                </div>
            </div>
        </div>
    </header> 

    <section id=<?php echo $text["productos"];?>
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo $text['Proyecto_Multidisciplinario'];?>
                    </h1>
                    <hr> 
                    <div class="intro-text">
                        <span class="skills">
                        <?php echo $text['Desarrollo_de_un_Prototipo'];?> 
                        </span>
                        <br><br><br><br>
                       <h1><?php echo $text['Modulo_Proyecto'];?>
                        <hr> 
                            <span class="skills"> 
                            <?php echo $text['prod_texto'];?>
                    </span>
                    </div>
                </div>
            </div>
            <br>
            <br>
    
        </div>
    </section>
    
    
    <section id=<?php echo $text['objetivo'];?>
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo $text['1'];?>
                    </h1>
                    <hr> 
                    <div class="intro-text">
                        <span class="skills">
                        <?php echo $text['2'];?>
                        </span>
                        <br><br><br><br>
                       <h1><?php echo $text['3'];?>
                        </h1>
                        <hr> 
                            <span class="skills">
                            <?php echo $text['4'];?>
                            </span>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class = col-sm-4>
                <center><button onclick="location.href='http://www.dof.gob.mx/normasOficiales.php'" target="_blank" class="btn btn-success btn-lg">NOM's
                </button></center>
            </div>
            <div class = col-sm-4>
                <center><button onclick="location.href='http://www.aire.df.gob.mx/default.php'" target="_blank" class="btn btn-success btn-lg">SIMAT
                </button></center>
            </div>
            <div class = col-sm-4>
                <center><button onclick="location.href='http://www.pnuma.org/'" target="_blank" class="btn btn-success btn-lg">PNUMA
                </button></center>
            </div>
            

        </div>
    </section>
    

    <section class="significadologo" id="meaning">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><?php echo $text['5'];?></h2>
                    <hr >
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 skills">
                    <p><?php echo $text['6'];?>
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-1">
                        <p><img class="img-responsive imagen-redonda" src="img/profile.png" alt="Yakatl"></p>
                </div>
            </div>
    </section>

<br>
    <!-- Quienes participan -->
   <section class="cic" id="where">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo $text['7'];?>
                    </h2>
                    <hr>
                    <div class="container">
                        <div class="col-lg-4 col-lg-offset-2">
                            <p><a href="http://www.cic.ipn.mx/" > <img class="img-responsive" src="img/logocic.png" alt=""></a>
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-2">
                                <p><?php echo $text['8'];?>
                                </p>
                            </div>
                        </div>
                    </div>
                <hr>
                </div>

                <div class="row">


                    <div class="col-lg-4 col-sm-12 portfolio-item">
                        <a href="#portfolio1" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="img/dispositivos/waspmote.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-4 col-sm-12 portfolio-item">
                        <a href="#portfolio4" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="img/dispositivos/xbee.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-4 col-sm-12 portfolio-item">
                        <a href="#portfolio2" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="img/dispositivos/entorno.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-4 col-sm-12 portfolio-item">
                        <a href="#portfolio3" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="img/dispositivos/gassensor.png" class="img-responsive" alt="">
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-12 portfolio-item">
                        <a href="#portfolio5" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="img/dispositivos/lipro.jpg" class="img-responsive" alt="">
                        </a>
                    </div>


                    
                    <!--<div class="col-lg-4 col-sm-12 portfolio-item">
                        <br/>
                        <br/>
                        <button type="submit" class="btn btn-success btn-lg">Banco de datos</button>
                    </div>-->  
                <</div>
            </div>
    </section>

   <section  id=<?php echo $text['9'];?>>
        <div class="container">
            <h2><?php echo $text['10'];?></h2>
            <div class="row">
                <div class="col-lg-12 text">
                    <h1><?php echo $text['11'];?></h1>
                    <hr >
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-1">
                     <p><a href="http://www.cic.ipn.mx/" > <img class="img-responsive" src="img/logocic.png" alt=""></a>
                        <br/><?php echo $text['12'];?>
                     </p>
                </div>
                <div class="col-lg-4 col-lg-offset-2">
                    <p><a href="http://www.esimez.ipn.mx/Paginas/Inicio.aspx" > <img class="img-responsive"   src="img/esime.png" alt=""></a>
                         <br/><?php echo $text['13'];?>                   
                    </p>
                </div>
           </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-1">
                     <h1><?php echo $text['371'];?></h1>
                    
                    <p><a href="http://www.cidetec.ipn.mx/Paginas/Inicio.aspx" ><img class="img-responsive"   src="img/cidetec1.jpg" alt=""></a>
                         <br/><?php echo $text['260'];?>                   
                    </p>
                </div>
                <div class="col-lg-4 col-lg-offset-2">
                <h1><?php echo $text['371'];?></h1>
                   <p><a href="http://utfv.edomex.gob.mx/" ><img class="img-responsive"   src="img/utfv1.jpg" alt=""></a>
                         <br/><?php echo $text['261'];?>                    
                    </p>

            </div>

            <div class="col-lg-4 col-lg-offset-1">
                <h1><?php echo $text['371'];?></h1>
                   <p><a href="http://www.upiicsa.ipn.mx/Paginas/inicio.aspx" ><img class="img-responsive"   src="img/upiicsa.jpg" alt=""></a>
                         <br/><?php echo $text['262'];?>                   
                    </p>

            </div>

            <div class="col-lg-4 col-lg-offset-2">
                <h1><?php echo $text['371'];?></h1>
                   <p><a href="http://www.esiaz.ipn.mx/Paginas/Inicio.aspx" ><img class="img-responsive"   src="img/Esia.png" alt=""></a>
                         <br/><?php echo $text['263'];?>                   
                    </p>

            </div>



                   
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--<h2><?php echo $text['14'];?></h2> -->
                    <hr >
                </div>
                <div class="row">
                    <div class="col-sm-4 portfolio-item">
                    <h1><?php echo $text['14'];?></h1>
                        <img class="img-responsive imagen-redonda" width="230" height="230"  src="img/amadeo.jpg" alt="">
                        <figcaption>
                                    <h5><?php echo $text['30'];?>
                                        <br/><?php echo $text['31'];?>
                                        <br/><?php echo $text['32'];?>
                                        <br/><?php echo $text['33'];?>
                                        <br/><?php echo $text['34'];?>
                                        <br/>
                                        <br/>
                                    </h5>
                        </figcaption>
                    </div>


                     <div class="col-sm-4 portfolio-item">
                     <h1><?php echo $text['14'];?></h1>
                        <img class="img-responsive imagen-redonda"  width="230" height="230"  src="img/miguel.jpg" alt="">
                        <figcaption>
                                    <h5><?php echo $text['40'];?>
                                        <br/><?php echo $text['41'];?>
                                        <br/><?php echo $text['42'];?> 
                                        <br/><?php echo $text['43'];?>
                                        <br/><?php echo $text['44'];?>             
                                        <br/>
                                        <br/>
                                    </h5>
                        </figcaption>

                    </div>
                

                 
                <div class="row">
                <div class="col-sm-4 portfolio-item">
                <h1><?php echo $text['376'];?></h1>
                        <img class="img-responsive imagen-redonda"  width="230" height="230"  src="img/Cornelio.png" alt="">
                        <figcaption>
                                    <h5><br/><?php echo $text['45'];?>
                                    <br/><br/><?php echo $text['46'];?>
                                    <br/><br/><?php echo $text['47'];?>
                                    <br/><br/><?php echo $text['48'];?>
                                    <br/><br/><?php echo $text['49'];?>                         
                                    <br/>
                                    <br/>
                                    </h5>
                        </figcaption>

                    </div>   

                    <div class="col-sm-4 portfolio-item">
                    <h1><?php echo $text['377'];?></h1>
                       <img class="img-responsive imagen-redonda"  width="230" height="230"  src="img/fernando.png" alt="">
                       <figcaption>
                                    <h5><?php echo $text['50'];?>
                                        <br/><?php echo $text['51'];?>
                                        <br/><?php echo $text['52'];?> 
                                        <br/><?php echo $text['53'];?>
                                        <br/><?php echo $text['54'];?>                               
                                        <br/>
                                        <br/>
                                    </h5></figcaption>

                    </div> 

                     <div class="col-sm-4 portfolio-item">
                     <h1><?php echo $text['377'];?></h1>
                       <img class="img-responsive imagen-redonda"  width="240" height="240"  src="img/Jhairo.jpg" alt="">
                       <figcaption>
                                <h5><?php echo $text['70'];?> 
                                    <br/><?php echo $text['71'];?> 
                                    <br/><?php echo $text['72'];?>  
                                    <br/><?php echo $text['380'];?> 
                                    <br/><?php echo $text['73'];?>                       
                                    <br/>
                                    <br/>
                                </h5>
                        </figcaption>
                    </div>

                
                
                

                <div class="col-lg-12">
                    <h2><?php echo $text['375'];?></h2>
                    <hr >
                </div>


                <div class="row">
                    <div class="col-sm-4 portfolio-item">
                        <img class="img-responsive imagen-redonda" width="230" height="230" src="img/ivan.jpg" alt="">
                        <figcaption>
                                    <h5><?php echo $text['15'];?>
                                        <br/><?php echo $text['16'];?>
                                        <br/><?php echo $text['17'];?> 
                                        <br/><?php echo $text['18'];?> 
                                        <br/><?php echo $text['19'];?>
                                        <br/>
                                        <br/>
                                    </h5>
                        </figcaption>
                    </div>

                    
                    
                    <div class="col-sm-4 portfolio-item">
                        <img class="img-responsive imagen-redonda"  width="230" height="230"  src="img/Isa.jpg" alt="">
                        <figcaption>
                                    <h5><?php echo $text['35'];?>
                                        <br/><?php echo $text['36'];?>
                                        <br/><?php echo $text['37'];?> 
                                        <br/><?php echo $text['38'];?>
                                        <br/><?php echo $text['39'];?>
                                        <br/>
                                        <br/>
                                    </h5>
                        </figcaption>
                    </div>
                
                    <div class="col-sm-4 portfolio-item">
                        <img class="img-responsive imagen-redonda" width="230" height="230"  src="img/monse.jpg" alt="">
                        <figcaption>
                                    <h5><?php echo $text['20'];?>
                                        <br/><?php echo $text['21'];?>
                                        <br/><?php echo $text['22'];?> 
                                        <br/><?php echo $text['23'];?>
                                        <br/><?php echo $text['24'];?>
                                        <br/>
                                        <br/>
                                    </h5>
                        </figcaption>
                    </div>
              
              <div class="row">
                <div class="col-sm-4 portfolio-item">
                        <img class="img-responsive imagen-redonda"  width="230" height="230" src="img/eduardo.jpg" alt="">
                        <figcaption>
                                    <h5><?php echo $text['25'];?>
                                        <br/><?php echo $text['26'];?>
                                        <br/><?php echo $text['27'];?> 
                                        <br/><?php echo $text['28'];?>
                                        <br/><?php echo $text['29'];?>
                                        <br/>
                                        <br/>
                                    </h5>
                        </figcaption>
                    </div>
                 
                    
                  

                    <div class="col-sm-4 portfolio-item">
                       <img class="img-responsive imagen-redonda"  width="230" height="230"  src="img/Johnathan.png" alt="">
                       <figcaption>
                                    <h5><?php echo $text['60'];?>
                                        <br/><?php echo $text['61'];?>
                                        <br/><?php echo $text['62'];?> 
                                        <br/><?php echo $text['63'];?> 
                                        <br/><?php echo $text['64'];?>                        
                                        <br/>
                                        <br/>
                                    </h5>
                        </figcaption>
                    </div>

                    <div class="col-sm-4 portfolio-item">
                       <img class="img-responsive imagen-redonda"  width="230" height="230"  src="img/Carolina.png" alt="">
                       <figcaption>
                                    <h5><?php echo $text['55'];?>
                                        <br/><?php echo $text['56'];?>
                                        <br/><?php echo $text['57'];?> 
                                        <br/><?php echo $text['58'];?> 
                                        <br/><?php echo $text['59'];?>                                 
                                        <br/>
                                        <br/>
                                    </h5>
                        </figcaption>
                    </div>
                    </div>

                
                <div class="row">
                    
               
                    <div class="col-sm-4 portfolio-item">
                       <img class="img-responsive imagen-redonda"  width="230" height="230"  src="img/Roberto.png" alt="">
                       <figcaption>
                                <h5><?php echo $text['65'];?> 
                                    <br/><?php echo $text['66'];?> 
                                    <br/><?php echo $text['67'];?>  
                                    <br/><?php echo $text['68'];?> 
                                    <br/><?php echo $text['69'];?>                         
                                    <br/>
                                    <br/>
                                </h5>
                        </figcaption>
                    </div>

                    
                
                
                    
                   
                </div> <!-- hay espacio para una imagen mas en este row-->
            </div>
        </div>

    </section>

    


    <!--<section id="Aire"> <!-- en esta seccion se declara la informacion de la calidad del aire -->
        <!--<header>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="intro-text">
                            <h2> La calidad del aire en interiores  <h2>
                            <hr> -->
     <!--<section class="success"  id="Aire">-->
    <section class="significadologo" id="significado">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><?php echo $text['385'];?></h2>
                    <hr>
                </div>
            </div>
     <!--<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>La calidad del aire en interiores</h2>
        
                    <hr >
                </div>
            </div>-->
            <div class="row">
                 <div id="Aire">
                
            <UL type=square>
            <h3><LI><div style="text-transform: none"><?php echo $text['386'];?>
            <p><?php echo $text['387'];?></p></div></LI>
            <br><br>
            </h3>

            <h3><LI><div style="text-transform: none"><?php echo $text['388'];?></div></LI>
            <br><br>
            </h3>

            <h3><LI><div style="text-transform: none"><?php echo $text['389'];?></div></LI>
            <br><br>
            </h3>
                        

            <div class="table-responsive row">
                   <table class="table">
                    
                    <tr>

                            <td width="15%" bgcolor="blue"><center><?php echo $text['372'];?></center></td>
                            
                            
                        </tr>
                        <tr>

                            <td width="15%" bgcolor=""><center><center><font color="black"><?php echo $text['378'];?></font></center></td> <!--En este apartado se declara la tabla de recomendaciones-->
                            </tr>
                            <tr>
                            <td width="15%" bgcolor="blue"><center><font color="White"> <?php echo $text['379'];?></font></center></td>
                            </tr>
                            <tr>
                            <td width="15%" bgcolor=""><center><font color="black"><?php echo $text['380'];?></font></center></td>
                            </tr>
                            <tr>
                            <td width="15%" bgcolor="blue"><center><?php echo $text['381'];?></center></td>
                            </tr>
                            <tr>
                            <td width="15%" bgcolor=""><center><font color="black"><?php echo $text['382'];?></font></center></td>
                            </tr>
                            <tr>
                            <td width="15%" bgcolor="blue"><?php echo $text['383'];?></center></td>
                            </tr>
                            <tr>
                            <td width="15%" bgcolor=""><center><font color="black"><?php echo $text['384'];?></font></center></td>
                            </tr>
                            

                            
                           </tr>

                        

                    </table>
                </div>

                <h3><LI><div style="text-transform: none"><?php echo $text['390'];?></div></LI>
            <br><br>
            </h3>

            <h3><LI><div style="text-transform: none"><?php echo $text['391'];?></div></LI>
            <br><br>
            </h3>
             
                   </div>
                </div>
            </div>
        </div>
    </header> 

             </section> <!-- en esta seccion se declara la informacion de la calidad del aire -->

  
  <!-- Mapa  -->

    <section class="success"  id="mapa">
    <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <h2><?php echo $text['75'];?></h2>
                   
                  <hr >
                </div>
            </div>
            <div class="row">
                 <div id="map">
                     

                        <script type="text/javascript">

                            var map;

var marker = new google.maps.Marker({
    position: map.getCenter(),
    icon: {
      path: google.maps.SymbolPath.CIRCLE,
      scale: 10
    },
    draggable: true,
    map: map
  });

var goldStar = {
    path: 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
    fillColor: 'yellow',
    fillOpacity: 0.8,
    scale: 1,
    strokeColor: 'gold',
    strokeWeight: 14
  };



                            function initMap() {

                             var styleArray =    [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":13}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#144b53"},{"lightness":14},{"weight":1.4}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#08304b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#0c4152"},{"lightness":5}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#0b434f"},{"lightness":25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#0b3d51"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"transit","elementType":"all","stylers":[{"color":"#146474"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#021019"}]}]

                            var myLatLng = {lat: 19.503298, lng: -99.147772};
                            var myLatLngSensor1 = {lat: 19.503298, lng: -99.147772};
                            var myLatLngSensor2 = {lat: 19.503039, lng: -99.147858};
                            var myLatLngSensor3 = {lat: 19.503311, lng: -99.147888};
                            var myLatLngSensor4 = {lat: 19.503009, lng: -99.147706};
                            var myLatLngSensor5 = {lat: 19.503014, lng: -99.147765};
  
                              map = new google.maps.Map(document.getElementById('map'), {
                                center: myLatLng,
                                styles: styleArray,
                                zoom: 18

                              });

                              infoString = "";
  // Create a marker and set its position.
  //                            marcador 1
                                  var marker1 = new google.maps.Marker({
                                    map: map,
                                    position: myLatLngSensor1,
                                    animation: google.maps.Animation.DROP,
                                    icon: {
                                      path: google.maps.SymbolPath.CIRCLE,
                                      fillColor: 'blue',
                                        fillOpacity: 0.8,
                                        scale: 10,
                                        strokeColor: 'black',
                                        strokeWeight: 5
                                    },
                                    clickable: true,
                                    title: "<?php echo $text['76'];?>"
                                  });

                                  var infowindow1 = new google.maps.InfoWindow({
                                        content: infoString
                                    });

                                  

                                   marker1.addListener('click', function() {

                                    infowindow1.open(map, marker1);
                                  });


                                // marcador 2
                                var marker2 = new google.maps.Marker({
                                    map: map,
                                    position: myLatLngSensor2,
                                    animation: google.maps.Animation.DROP,
                                    icon: {
                                      path: google.maps.SymbolPath.CIRCLE,
                                      fillColor: 'green',
                                        fillOpacity: 0.8,
                                        scale: 10,
                                        strokeColor: 'black',
                                        strokeWeight: 5
                                    },
                                    clickable: true,
                                    title: "<?php echo $text['77'];?>"
                                  });

                                  var infowindow2 = new google.maps.InfoWindow({
                                        content: infoString
                                    });

                                   marker2.addListener('click', function() {
                                    infowindow2.open(map, marker2);
                                  });
                                // marcador 3
                                var marker3 = new google.maps.Marker({
                                    map: map,
                                    position: myLatLngSensor3,
                                    animation: google.maps.Animation.DROP,
                                    icon: {
                                      path: google.maps.SymbolPath.CIRCLE,
                                      fillColor: 'yellow',
                                        fillOpacity: 0.8,
                                        scale: 10,
                                        strokeColor: 'black',
                                        strokeWeight: 5
                                    },
                                    clickable: true,
                                    title: "<?php echo $text['78'];?>"
                                  });

                                  var infowindow3 = new google.maps.InfoWindow({
                                        content: infoString
                                    });

                                   marker3.addListener('click', function() {
                                    infowindow3.open(map, marker3);
                                  });


                                     // marcador 4
                                var marker4 = new google.maps.Marker({
                                    map: map,
                                    position: myLatLngSensor4,
                                    animation: google.maps.Animation.DROP,
                                    icon: {
                                      path: google.maps.SymbolPath.CIRCLE,
                                      fillColor: 'white',
                                        fillOpacity: 0.8,
                                        scale: 10,
                                        strokeColor: 'black',
                                        strokeWeight: 5
                                    },
                                    clickable: true,
                                    title: "<?php echo $text['79'];?>"
                                  });

                                  var infowindow4 = new google.maps.InfoWindow({
                                        content: infoString
                                    });

                                   marker4.addListener('click', function() {
                                    infowindow4.open(map, marker4);
                                  });

                                   //5

                                   var marker5 = new google.maps.Marker({
                                    map: map,
                                    position: myLatLngSensor5,
                                    animation: google.maps.Animation.DROP,
                                    icon: {
                                      path: google.maps.SymbolPath.CIRCLE,
                                      fillColor: 'white',
                                        fillOpacity: 0.8,
                                        scale: 10,
                                        strokeColor: 'black',
                                        strokeWeight: 5
                                    },
                                    clickable: true,
                                    title: "<?php echo $text['80'];?>"
                                  });

                                  var infowindow5 = new google.maps.InfoWindow({
                                        content: infoString
                                    });

                                   marker5.addListener('click', function() {
                                    infowindow5.open(map, marker5);
                                  });


                                   



                                function addInfoSensor1(info)
                                {
                                    alert(info);
                                    infowindow1.setContent(info);
                                }

                                function addInfoSensor2(info)
                                {
                                    infowindow2.setContent(info);
                                }

                                function addInfoSensor3(info)
                                {
                                    infowindow3.setContent(info);
                                }

                                function addInfoSensor4(info)
                                {
                                    infowindow4.setContent(info);
                                }

                                function addInfoSensor5(info)
                                {
                                    infowindow5.setContent(info);
                                }

                        


                            <?php
                                $dbhost =  "localhost" ;
                                $dbuser = "airmxgen_meshliu";
                                $dbpass = "libelium2007";
                                $sensor1 = " <br/> ";
                                $sensor2 = " <br/> ";
                                $sensor3 = " <br/> ";
                                $sensor4 = " <br/> ";
                                $sensor5 = " <br/> ";
                                $sql2="";
                                $id="";

                                  

                                $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                                if(! $conn )
                                {
                                  $sensor1 = "No hay conexion"; 
                                  die("Could not connect:" . mysql_error());
                                }

                                
                                
                                
                                $numeroSensor = "1";
                                $numeroElementos = "3";
                                $ordenamiento = "mayor";
                                //query para sensor 1
                                $sql = "call imeca(".$numeroSensor.",".$numeroElementos.",'".$ordenamiento."', '');";
                            

                                $id="";
                                mysql_select_db("airmxgen_meshliu");
                                $retval = mysql_query( $sql, $conn );
                                if(! $retval )
                                {
                                  $sensor1 = "No hay información";
                                  die("Could not get data: ". mysql_error());
                                }
                                while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
                                {
                                     $calidad = $row['CALIDAD'];
                                     $calidadText = "Calidad";
                                     if (strtolower($language) == 'en'){

                                        $calidadText = "Quality";
                                        //$imagen = "img/Buena.jpg"; para agregar imagenes en los sensores
                                        switch (strtolower($calidad)) {
                                            case 'buena':
                                                $calidad = 'GOOD';
                                                $imagen = "img/Buena.jpg";
                                                break;
                                            case 'regular':
                                                $calidad = 'REGULAR';
                                                $imagen = "img/Mala.jpg";
                                                break;
                                            case 'mala':
                                                $calidad = 'BAD';
                                                break;
                                            case 'muy mala':
                                                $calidad = 'VERY BAD';
                                                break;

                                            case 'extremadamente mala':
                                                $calidad = 'EXTREMELY BAD';
                                                break;
                                            default:
                                            $imagen = "img/Buena.jpg";
                                                # code...
                                                break;
                                        }
                                     }

                                     
                                      $sensor1 = $sensor1.
                                    " {$row['Contaminante']}:{$row['PUNTOS_IMECA']} IMECA, ".$calidadText.": {$calidad} <br/> ";
                                } 

                                    $sensor1 = $sensor1."Sensor 1";
                                  echo ("addInfoSensor1('hola');\n");
                                  echo ("addInfoSensor1('<div  ><img src=".$imagen." height=\"70\" width=\"260\"/></div><div style = \'color: #000000\'>".json_encode($sensor1)."  </div>');\n");

                                mysql_close($conn);
                                //$sql1 ="SELECT * FROM sensorParser where id_wasp  = 1....";
/*                                $sql1=0.080;

                                if($sql1<0.035)
                                    $id="Bueno";
                                else if($sql1>0.035 && $sql1<0.070 )
                                    $id="Regular";
                                else
                                    $id="Malo";

                                

                                if($id=="Bueno"){
                                    
                                    echo ("addInfoSensor1('<h1 style = \'color: #00FF00\'>Bueno</h1>'+'<div style = \'color: #000000\'>".json_encode($sensor1)."</div>');\n");
                                }
                                else if($id=="Malo"){
                                    echo ("addInfoSensor1('<h1 style = \'color: #FF0000\'>Malo</h1>'+'<div style = \'color: #000000\'>".json_encode($sensor1)."</div>');\n");
                                }
                                else if($id=="Regular"){
                                    echo ("addInfoSensor1('<h1 style = \'color: #FFFF00\'>Regular</h1>'+'<div style = \'color: #000000\'>".json_encode($sensor1)."</div>');\n");
                                }
                                //echo ("addInfoSensor1('<div style = \'color: #000000\'>".json_encode($sensor1)."</div>');\n");

*///puedes replicar esto para los demas sensores? mira abre la conexion y cierrala si?
  
                                $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                                if(! $conn )
                                {
                                  $sensor2 = "No hay conexion"; 
                                  die("Could not connect:" . mysql_error());
                                }                 //abrir conexion             

                                $numeroSensor = "2";
                                $numeroElementos = "3";
                                $ordenamiento = "mayor";
                                //query para sensor 1
                                $sql = "call imeca(".$numeroSensor.",".$numeroElementos.",'".$ordenamiento."','');";
                            
                                $id="";                    
                                mysql_select_db("airmxgen_meshliu");
                                $retval = mysql_query( $sql, $conn );
                                if(! $retval )
                                {
                                  $sensor2 = "No hay información";
                                  die("Could not get data: ". mysql_error());
                                }
                                while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
                                {
                                     $calidad = $row['CALIDAD'];
                                     $calidadText = "Calidad";
                                     if (strtolower($language) == 'en'){

                                        $calidadText = "Quality";
                                        switch (strtolower($calidad)) {
                                            case 'buena':
                                                $calidad = 'GOOD';
                                                $imagen = "img/Buena.jpg";
                                                break;
                                            case 'regular':
                                                $calidad = 'REGULAR';
                                                 $imagen = "Mala.jpg";
                                                break;
                                            case 'mala':
                                                $calidad = 'BAD';
                                                break;
                                            case 'muy mala':
                                                $calidad = 'VERY BAD';
                                                break;

                                            case 'extremadamente mala':
                                                $calidad = 'EXTREMELY BAD';
                                                break;
                                            default:
                                                # code...
                                                break;
                                        }
                                     }

                                     
                                      $sensor2 = $sensor2.
                                    " {$row['Contaminante']}:{$row['PUNTOS_IMECA']} IMECA, ".$calidadText.": {$calidad} <br/> ";


                                     } 
                                    $sensor2 = $sensor2."Sensor 2";
                                     //echo ("addInfoSensor2('<div style = \'color: #000000\'>".json_encode($sensor2)."</div>');\n"); para ajustar el tamaño, color de imagenes
                                    echo ("addInfoSensor2('<div  ><img src=".$imagen." height=\"70\" width=\"260\"/></div><div style = \'color: #000000\'>".json_encode($sensor2)."  </div>');\n");
                                
                                mysql_close($conn); // cerrar conexion
/*                                    //$sql1 ="SELECT * FROM sensorParser where id_wasp  = 2....";
                                $sql2=0.030;

                                if($sql2<0.035)
                                    $id="Bueno";
                                else if($sql2>0.035 && $sql2<0.070 )
                                    $id="Regular";
                                else
                                    $id="Malo";

                                

                                if($id=="Bueno"){
                                    
                                    echo ("addInfoSensor2('<h1 style = \'color: #00FF00\'>Bueno</h1>'+'<div style = \'color: #000000\'>".json_encode($sensor2)."</div>');\n");
                                }
                                else if($id=="Malo"){
                                    echo ("addInfoSensor2('<h1 style = \'color: #FF0000\'>Malo</h1>'+'<div style = \'color: #000000\'>".json_encode($sensor2)."</div>');\n");
                                }
                                else if($id=="Regular"){
                                    echo ("addInfoSensor2('<h1 style = \'color: #FFFF00\'>Regular</h1>'+'<div style = \'color: #000000\'>".json_encode($sensor2)."</div>');\n");
                                }
                                //echo ("addInfoSensor2('<div style = \'color: #000000\'>".json_encode($sensor2)."</div>');\n");


*/
                               

                                
                                $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                                if(! $conn )
                                {
                                  $sensor3 = "No hay conexion"; 
                                  die("Could not connect:" . mysql_error());
                                }                 //abrir conexion             

                                $numeroSensor = "3";
                                $numeroElementos = "3";
                                $ordenamiento = "mayor";
                                //query para sensor 1
                                $sql = "call imeca(".$numeroSensor.",".$numeroElementos.",'".$ordenamiento."','');";
                            
  
                                $id="";
                                mysql_select_db("airmxgen_meshliu");
                                $retval = mysql_query( $sql, $conn );
                                if(! $retval )
                                {
                                  $sensor1 = "No hay información";
                                  die("Could not get data: ". mysql_error());
                                }
                                while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
                                {

                                    $calidad = $row['CALIDAD'];
                                     $calidadText = "Calidad";
                                     if (strtolower($language) == 'en'){

                                        $calidadText = "Quality";
                                        switch (strtolower($calidad)) {
                                            case 'buena':
                                                $calidad = 'GOOD';
                                                $imagen = "img/excelente.jpg";
                                                break;
                                            case 'regular':
                                                $calidad = 'REGULAR';
                                                $imagen = "Mala.jpg";
                                                break;
                                            case 'mala':
                                                $calidad = 'BAD';
                                                break;
                                            case 'muy mala':
                                                $calidad = 'VERY BAD';
                                                break;

                                            case 'extremadamente mala':
                                                $calidad = 'EXTREMELY BAD';
                                                break;
                                            default:
                                                # code...
                                                break;
                                        }
                                     }

                                     
                                      $sensor3 = $sensor3.
                                    " {$row['Contaminante']}:{$row['PUNTOS_IMECA']} IMECA, ".$calidadText.": {$calidad} <br/> ";

                                    
                                } 


                                $sensor3 = $sensor3."Sensor 3";
                                //echo ("addInfoSensor3('<div style = \'color: #000000\'>".json_encode($sensor3)."</div>');\n");
                                echo ("addInfoSensor3('<div  ><img src=".$imagen." height=\"70\" width=\"260\"/></div><div style = \'color: #000000\'>".json_encode($sensor3)."  </div>');\n");
                                mysql_close($conn); 
                                /*$sql2 ="SELECT * FROM sensorParser where id_wasp  = 3....";
                                $sql2=0.050;

                                if($sql2<0.035)
                                    $id="Bueno";
                                else if($sql2>0.035 && $sql2<0.070 )
                                    $id="Regular";
                                else
                                    $id="Malo";

                                

                                if($id=="Bueno"){
                                    
                                    echo ("addInfoSensor3('<h1 style = \'color: #00FF00\'>Bueno</h1>'+'<div style = \'color: #000000\'>".json_encode($sensor3)."</div>');\n");
                                }
                                else if($id=="Malo"){
                                    echo ("addInfoSensor3('<h1 style = \'color: #FF0000\'>Malo</h1>'+'<div style = \'color: #000000\'>".json_encode($sensor3)."</div>');\n");
                                }
                                else if($id=="Regular"){
                                    echo ("addInfoSensor3('<h1 style = \'color: #FFFF00\'>Regular</h1>'+'<div style = \'color: #000000\'>".json_encode($sensor3)."</div>');\n");
                                }
                                //echo ("addInfoSensor3('<div style = \'color: #000000\'>".json_encode($sensor3)."</div>');\n");
∫*/
                                //query para sensor 4

                                $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                                if(! $conn )
                                {
                                  $sensor4 = "No hay conexion"; 
                                  die("Could not connect:" . mysql_error());
                                }                 //abrir conexion             

                                $sql = "SELECT * FROM sensorParser where id_wasp = 4   ORDER BY sensorParser.timestamp DESC limit 6";

                                mysql_select_db("airmxgen_meshliu");
                                $retval = mysql_query( $sql, $conn );
                                if(! $retval )
                                {
                                  $sensor4 = "No hay información";
                                  die("Could not get data: ". mysql_error());
                                }
                                while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
                                {

                                    $sensor4 = $sensor4.
                                    " {$row['sensor']}:{$row['value']} <br/> " ;
                                } 
                                $sensor4 = $sensor4."Sensor 4 - General";


                                echo ("addInfoSensor4('<div style = \'color: #000000\'>".json_encode($sensor4)."</div>');\n");

                                

                                 //query para sensor 5
                                $sql = "SELECT * FROM sensorParser where id_wasp = 5   ORDER BY sensorParser.timestamp DESC limit 6";

                                mysql_select_db("airmxgen_meshliu");
                                $retval = mysql_query( $sql, $conn );
                                if(! $retval )
                                {
                                  $sensor5 = "No hay información";
                                  die("Could not get data: ". mysql_error());
                                }
                                while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
                                {

                                    $sensor5 = $sensor5.
                                    " {$row['sensor']}:{$row['value']} <br/> " ;
                                } 
                                $sensor5 = $sensor5."Sensor 5 - General";


                                echo ("addInfoSensor5('<div style = \'color: #000000\'>".json_encode($sensor5)."</div>');\n");
                                mysql_close($conn);
                            ?>

                            

                            


 

                                
                            }   



                                </script>
                                <script async defer
                                  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGww_ToFfJk4kLL-g4D0IL6FxYBY2zRxQ&callback=initMap">
                        </script>
                        
                 </div>


            </div>
        </div>
        <div class="row">

        </div>
        
     </section>

     <!-- About Section -->
    <br>

            
</div>
</section>
 
                    

    <section id=<?php echo $text['81'];?>>
        <div class="container">
            <div class="row">
                <h2><?php echo $text['82'];?></h2>
                <h3><?php echo $text['83'];?></h3>
                <hr> <br>
                <div class="table-responsive row">
                    <table class="table">
                    <tr>
                    
                            <td><center><?php echo $text['84'];?></h3></center></td>
                            <td><center><?php echo $text['85'];?></h3></center></td>
                            <td><center><?php echo $text['86'];?></h3></center></td>
                            <td><center><?php echo $text['87'];?></h3></center></td>
                            <td><center><?php echo $text['88'];?></h3></center></td>
                            
                        </tr>

                        <tr>

                            <td><center><?php echo $text['89'];?></center></td>
                            <td width="15%" bgcolor="green"><center><font color="White"> <?php echo $text['90'];?></font></center></td>
                            <td width="15%" bgcolor="white"><center><?php echo $text['91'];?></center></td>
                            <td width="15%" bgcolor="white"><center><?php echo $text['92'];?></center></td>
                            <td width="15%" bgcolor="white"><center><?php echo $text['93'];?></center></td>
                            
                        </tr>
                            <td><center><?php echo $text['94'];?></center></td>
                            <td width="15%" bgcolor="yellow"><center> <?php echo $text['95'];?></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['96'];?></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['97'];?></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['98'];?></center></td>
                            
                        </tr>
                            <td><center><?php echo $text['99'];?></center></td>
                            <td width="15%" bgcolor="brown"><center><font color="White"> <?php echo $text['100'];?></font></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['101'];?></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['102'];?></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['103'];?></center></td>
                            
                        </tr>

                        <td><center><?php echo $text['104'];?></center></td>
                            <td width="15%" bgcolor="red"><center><font color="White"> <?php echo $text['105'];?> </font></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['106'];?></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['107'];?></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['108'];?></center></td>
                            
                        </tr>

                        <td><center><?php echo $text['109'];?></center></td>
                            <td width="15%" bgcolor="purple"><center><font color="White"> <?php echo $text['110'];?></font></center></td>
                            <td width="15%" bgcolor=""><center> <?php echo $text['111'];?> </center></td>
                            <td width="15%" bgcolor=""><center> <?php echo $text['112'];?> </center></td>
                            <td width="15%" bgcolor=""><center> <?php echo $text['113'];?> </center></td>
                            
                        </tr>

                        <td><center><?php echo $text['114'];?></center></td>
                            <td width="15%" bgcolor="purple"><center><font color="White"><?php echo $text['115'];?></font></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['116'];?></center></td>
                            <td width="15%" bgcolor=""> <center> <?php echo $text['117'];?></center></td>
                            <td width="15%" bgcolor=""><center> <?php echo $text['118'];?> </center></td>
                            
                        </tr>

                        <td><center><?php echo $text['119'];?></center></td>
                            <td width="15%" bgcolor="purple"><center><font color="White"><?php echo $text['120'];?></font></center></td>
                            <td width="15%" bgcolor=""><center><?php echo $text['121'];?></center></td>
                            <td width="15%" bgcolor=""><center> <?php echo $text['122'];?> </center></td>
                            <td width="15%" bgcolor=""><center> <?php echo $text['123'];?> </center></td>
                            
                        </tr>



                    


                    </table>
                </div>
                    <div class="row">
                <table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $text['124'];?></th>
                            <th><?php echo $text['125'];?></th>
                            <th><?php echo $text['126'];?></th>
                            <th><?php echo $text['127'];?></th>
                            <th><?php echo $text['128'];?></th>
                        </tr>
                    </thead>
            </table>
            </div>
            </div>
        <br>

        <section id=<?php echo $text['129'];?>>
        <div class="container">
            <div class="row">
        


             <h2> <?php echo $text['130'];?><h2>
                <hr> 
                <h3><div style="text-transform: none"><?php echo $text['131'];?></div></h3>
            <hr>

            <UL type=square>
            <h3><LI><div style="text-transform: none"><?php echo $text['132'];?></div></LI>
            <br><br>
            
             </h3>

            <h3><div style="text-transform: none"><?php echo $text['133'];?></div></h3>
            <hr>
            <h3><LI><div style="text-transform: none"><?php echo $text['134'];?></div></LI>
            <br><br>
            
             </h3>
             </section>


        <div class="row">       
                <div id="CarExterior" class="col-lg-5 col-sm-12 carousel slide ">

                    <h3><?php echo $text['135'];?></h3>
                        <hr><br>


                    
                      <ol class="carousel-indicators">
                        <li data-target="#CarExterior" data-slide-to="0" class="active"></li>
                        <li data-target="#CarExterior" data-slide-to="1"></li>
                        <li data-target="#CarExterior" data-slide-to="2"></li>
                        <li data-target="#CarExterior" data-slide-to="3"></li>
                        <li data-target="#CarExterior" data-slide-to="4"></li>
                        <li data-target="#CarExterior" data-slide-to="5"></li>
                        <li data-target="#CarExterior" data-slide-to="6"></li>
                        <li data-target="#CarExterior" data-slide-to="7"></li>
                        <li data-target="#CarExterior" data-slide-to="8"></li>
                        <li data-target="#CarExterior" data-slide-to="9"></li>
                      </ol>
                      
                      <!-- Carousel items -->
                      <div class="carousel-inner">
                      <div class="active item"><img  src="img/montajee/1.jpg" alt="montajee1" /></div>
                        <div class="item"><img src="img/montajee/2.jpg" alt="montajee2" /></div>
                        <div class="item"><img src="img/montajee/3.jpg" alt="montajee3" /></div>
                        <div class="item"><img src="img/montajee/4.jpg" alt="montajee4" /></div>
                        <div class="item"><img src="img/montajee/5.jpg" alt="montajee5" /></div>
                        <div class="item"><img src="img/montajee/6.jpg" alt="montajee6" /></div>
                        <div class="item"><img src="img/montajee/7.jpg" alt="montajee7" /></div>
                        <div class="item"><img src="img/montajee/8.jpg" alt="montajee8" /></div>
                        <div class="item"><img src="img/montajee/9.jpg" alt="montajee9" /></div>
                      
                      </div>
                      <!-- Carousel nav -->
                      <a class="carousel-control left" href="#CarExterior" data-slide="prev">&lsaquo;</a>
                      <a class="carousel-control right" href="#CarExterior" data-slide="next">&rsaquo;</a>
                    </div>
                    <div class="col-lg-1"> </div>
                    <div id="CarInterior" class="col-lg-6 col-sm-12 carousel slide">
                      <h3><?php echo $text['136'];?></h3>
                        <hr><br>
                      <ol class="carousel-indicators">
                        <li data-target="#CarInterior" data-slide-to="0" class="active"></li>
                        <li data-target="#CarInterior" data-slide-to="1"></li>
                        <li data-target="#CarInterior" data-slide-to="2"></li>
                        <li data-target="#CarInterior" data-slide-to="3"></li>
                        <li data-target="#CarInterior" data-slide-to="4"></li>
                        <li data-target="#CarInterior" data-slide-to="5"></li>
                        <li data-target="#CarInterior" data-slide-to="6"></li>
                      </ol>
                      <!-- Carousel items -->
                      <div class="carousel-inner">
                        <div class="active item"><img  src="img/montajei/1.jpg" alt="montajei1" /></div>
                        <div class="item"><img  src="img/montajei/2.jpg" alt="montajei2" /></div>
                        <div class="item"><img  src="img/montajei/3.jpg" alt="montajei3" /></div>
                        <div class="item"><img  src="img/montajei/4.jpg" alt="montajei4" /></div>
                        <div class="item"><img  src="img/montajei/5.jpg" alt="montajei5" /></div>
                        <div class="item"><img  src="img/montajei/6.jpg" alt="montajei6" /></div>
                      </div>
                      <!-- Carousel nav -->
                      <a class="carousel-control left" href="#CarInterior" data-slide="prev">&lsaquo;</a>
                      <a class="carousel-control right" href="#CarInterior" data-slide="next">&rsaquo;</a>
                    </div>
                </div>
            </div>

    </section>

    <br><br>
<span class="mono">
<div class="container"><h1><?php echo $text['170'];?></h1><hr></div>
<div id="wowslider-container3">
    <div class="ws_images"><ul>
        <li><img src="img/montajee/1.jpg" alt="1" title="1" id="wows3_0"/></li>
        <li><img src="img/montajee/2.jpg" alt="2" title="2" id="wows3_1"/></li>
        <li><img src="img/montajee/3.jpg" alt="3" title="3" id="wows3_2"/></li>
        <li><img src="img/montajee/4.jpg" alt="4" title="4" id="wows3_3"/></li>
        <li><img src="img/montajee/5.jpg" alt="5" title="5" id="wows3_4"/></li>
        <li><img src="img/montajee/6.jpg" alt="6" title="6" id="wows3_5"/></li>
        <li><img src="img/montajee/7.jpg" alt="7" title="7" id="wows3_6"/></li>
        <li><img src="img/montajee/8.jpg" alt="8" title="8" id="wows3_7"/></li>
        <li><img src="img/montajee/9.jpg" alt="9" title="9" id="wows3_8"/></li>
        <li><img src="img/pruebase/1.jpg" alt="1" title="1" id="wows3_9"/></li>
        <li><img src="img/pruebase/2.jpg" alt="2" title="2" id="wows3_10"/></li>
        <li><img src="img/pruebase/3.jpg" alt="3" title="3" id="wows3_11"/></li>
        <li><img src="img/exterior/1.jpg" alt="1" title="1" id="wows3_12"/></li>
        <li><img src="img/exterior/2.jpg" alt="2" title="2" id="wows3_13"/></li>
        <li><img src="img/exterior/3.jpg" alt="3" title="3" id="wows3_14"/></li>
        <li><img src="img/montajei/1.jpg" alt="1" title="1" id="wows3_15"/></li>
        <li><img src="img/montajei/2.jpg" alt="2" title="2" id="wows3_16"/></li>
        <li><img src="img/montajei/3.jpg" alt="3" title="3" id="wows3_17"/></li>
        <li><img src="img/montajei/4.jpg" alt="4" title="4" id="wows3_18"/></li>
        <li><img src="img/montajei/5.jpg" alt="jquery carousel" title="5" id="wows3_19"/></li>
        <li><img src="img/montajei/6.jpg" alt="6" title="6" id="wows3_20"/></li>
    </ul></div>
    <div class="ws_bullets">
        <div>
            <a href="#" title="1"><span><img src="img/montajee/1.jpg" alt="1"/>1</span></a>
            <a href="#" title="2"><span><img src="img/montajee/2.jpg" alt="2"/>2</span></a>
            <a href="#" title="3"><span><img src="img/montajee/3.jpg" alt="3"/>3</span></a>
            <a href="#" title="4"><span><img src="img/montajee/4.jpg" alt="4"/>4</span></a>
            <a href="#" title="5"><span><img src="img/montajee/5.jpg" alt="5"/>5</span></a>
            <a href="#" title="6"><span><img src="img/montajee/6.jpg" alt="6"/>6</span></a>
            <a href="#" title="7"><span><img src="img/montajee/7.jpg" alt="7"/>7</span></a>
            <a href="#" title="8"><span><img src="img/montajee/8.jpg" alt="8"/>8</span></a>
            <a href="#" title="9"><span><img src="img/montajee/9.jpg" alt="9"/>9</span></a>
            <a href="#" title="1"><span><img src="img/pruebase/1.jpg" alt="1"/>10</span></a>
            <a href="#" title="2"><span><img src="img/pruebase/2.jpg" alt="2"/>11</span></a>
            <a href="#" title="3"><span><img src="img/pruebase/3.jpg" alt="3"/>12</span></a>
            <a href="#" title="1"><span><img src="img/exterior/1.jpg" alt="1"/>13</span></a>
            <a href="#" title="2"><span><img src="img/exterior/2.jpg" alt="2"/>14</span></a>
            <a href="#" title="3"><span><img src="img/exterior/3.jpg" alt="3"/>15</span></a>
            <a href="#" title="1"><span><img src="img/montajei/1.jpg" alt="1"/>16</span></a>
            <a href="#" title="2"><span><img src="img/montajei/2.jpg" alt="2"/>17</span></a>
            <a href="#" title="3"><span><img src="img/montajei/3.jpg" alt="3"/>18</span></a>
            <a href="#" title="4"><span><img src="img/montajei/4.jpg" alt="4"/>19</span></a>
            <a href="#" title="5"><span><img src="img/montajei/5.jpg" alt="5"/>20</span></a>
            <a href="#" title="6"><span><img src="img/montajei/6.jpg" alt="6"/>21</span></a>
        </div>
    </div>
    <div class="ws_shadow"></div>
</div>  
</span> 



<section id=<?php echo $text['137'];?>> <!--</div En esta seccion se agregaron el div class="row"> <div class="col-sm-4 portfolio-item, <p align="left">, </p>, <span class="skills">-->
    <header>
    <div class="container" ><!--<para centrar el texto al margen igual que los otros se agrego: <div class="container" >, <div class="row">, <div class="col-lg-12"> >-->
            <div class="row">
            <div class="col-lg-12"> <!-- codigo para imagen de fondo-->
            <div class="intro-text">
            <h2> <?php echo $text['138'];?> <h2>
                 
            <hr>
            <h3><div style="text-transform: none"><?php echo $text['139'];?></div></h3> <!-- texto largo-->
            <hr>

            <div class="row">
                    <div class="col-sm-4 portfolio-item"> 

            <UL type=square>
            <h3><LI><div style="text-transform: none"><font color="black"><p align="left"><?php echo $text['140'];?></p></font></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><font color="black"><p align="left"><?php echo $text['141'];?></p></font></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><font color="black"><p align="left"><?php echo $text['142'];?></p></font></div></LI>
            <br/><br/>
            <LI><div style="text-transform: none"><font color="black"><p align="left"><?php echo $text['143'];?></p></font></div></LI>
            </div> 
            </h3> <!-- texto largo-->
            
          
            
            <div class="row">
                    <div class="col-sm-4 portfolio-item"> 
            <h3><div style="text-transform: none"><?php echo $text['144'];?></div></h3> <!-- texto largo-->
            <hr>
           
            <UL type=square>
            <h3><LI><div style="text-transform: none"><p align="left"><?php echo $text['145'];?></p></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['146'];?></p></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><font color="black"><p align="left"><?php echo $text['147'];?></p></font></div></LI>
            </div> 
                <br/><br/>
            


            </h3> <!-- texto largo-->
           
           
            <div class="row">
                    <div class="col-sm-4 portfolio-item"> <!-- texto largo-->
                    
            <h3><div style="text-transform: none"><?php echo $text['151'];?></div></h3>
            <hr>
            <UL type=square>
            <h3><LI><div style="text-transform: none"><p align="left"><?php echo $text['152'];?></p></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><p align="left"> <?php echo $text['153'];?></p></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['154'];?></p></div></LI>
            <br/><br/>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['155'];?></p></div></LI>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['156'];?></p></div></LI>
            </div>
            <br/><br/>

            </h3> <!-- texto largo-->
            <div class="row">
                    <div class="col-sm-4 portfolio-item"> <!-- texto largo-->

            <h3><div style="text-transform: none"><p align="center"><?php echo $text['157'];?></p></div></h3>
            <hr>
            <UL type=square>
            </h3>
            <h3><LI><div style="text-transform: none"><p align="left"> <?php echo $text['158'];?></p></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['159'];?></p></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['160'];?></p></div></LI>
            <br/><br/>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['161'];?></p></div></LI>
            </div>
            </h3> <!-- texto largo-->

            <div class="row">
                    <div class="col-sm-4 portfolio-item"> 
                    

            <h3><div style="text-transform: none"><?php echo $text['148'];?></div></h3>
            <hr>
            <UL type=square>
            <h3><LI><div style="text-transform: none"><p align="left"><?php echo $text['149'];?></p></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['150'];?></p></div></LI>
            </div>
            <br><br>
            </h3>

            
            <h3><div style="text-transform: none"><?php echo $text['162'];?></div></h3>
            <hr>
            <div class="row">
                    <div class="col-sm-4 portfolio-item"> 

            <UL type=square>
            <h3><LI><div style="text-transform: none"><p align="left"> <?php echo $text['163'];?></p></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['164'];?></p></div></LI>
            <br><br>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['165'];?></p></div></LI>
            <br/><br/>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['166'];?></p></div></LI>
            <LI><div style="text-transform: none"><p align="left"><?php echo $text['167'];?></p></div></LI>
            <br><br>
            </div>
            </h3>
            
            <h3><div style="text-transform: none"><p align="center"><?php echo $text['168'];?></p></div></h3>
            <hr>
            
            <UL type=square>
            <h3><LI><div style="text-transform: none"><p align="left"><?php echo $text['169'];?></p></div></LI>
            <br><br>
            
            
            
            </h3>
            </UL>
            </div> 
            </div> 
            </div> 
        </div> 
        </div>
                </div>
            </div>
        </div>
    </header>  
</section>



<!--<br><br> ---- Se cambio de lugar para que aparesca despues de los prototipos
<span class="mono">
<div class="container"><h1><?php echo $text['170'];?></h1><hr></div>
<div id="wowslider-container3">
    <div class="ws_images"><ul>
        <li><img src="img/montajee/1.jpg" alt="1" title="1" id="wows3_0"/></li>
        <li><img src="img/montajee/2.jpg" alt="2" title="2" id="wows3_1"/></li>
        <li><img src="img/montajee/3.jpg" alt="3" title="3" id="wows3_2"/></li>
        <li><img src="img/montajee/4.jpg" alt="4" title="4" id="wows3_3"/></li>
        <li><img src="img/montajee/5.jpg" alt="5" title="5" id="wows3_4"/></li>
        <li><img src="img/montajee/6.jpg" alt="6" title="6" id="wows3_5"/></li>
        <li><img src="img/montajee/7.jpg" alt="7" title="7" id="wows3_6"/></li>
        <li><img src="img/montajee/8.jpg" alt="8" title="8" id="wows3_7"/></li>
        <li><img src="img/montajee/9.jpg" alt="9" title="9" id="wows3_8"/></li>
        <li><img src="img/pruebase/1.jpg" alt="1" title="1" id="wows3_9"/></li>
        <li><img src="img/pruebase/2.jpg" alt="2" title="2" id="wows3_10"/></li>
        <li><img src="img/pruebase/3.jpg" alt="3" title="3" id="wows3_11"/></li>
        <li><img src="img/exterior/1.jpg" alt="1" title="1" id="wows3_12"/></li>
        <li><img src="img/exterior/2.jpg" alt="2" title="2" id="wows3_13"/></li>
        <li><img src="img/exterior/3.jpg" alt="3" title="3" id="wows3_14"/></li>
        <li><img src="img/montajei/1.jpg" alt="1" title="1" id="wows3_15"/></li>
        <li><img src="img/montajei/2.jpg" alt="2" title="2" id="wows3_16"/></li>
        <li><img src="img/montajei/3.jpg" alt="3" title="3" id="wows3_17"/></li>
        <li><img src="img/montajei/4.jpg" alt="4" title="4" id="wows3_18"/></li>
        <li><img src="img/montajei/5.jpg" alt="jquery carousel" title="5" id="wows3_19"/></li>
        <li><img src="img/montajei/6.jpg" alt="6" title="6" id="wows3_20"/></li>
    </ul></div>
    <div class="ws_bullets">
        <div>
            <a href="#" title="1"><span><img src="img/montajee/1.jpg" alt="1"/>1</span></a>
            <a href="#" title="2"><span><img src="img/montajee/2.jpg" alt="2"/>2</span></a>
            <a href="#" title="3"><span><img src="img/montajee/3.jpg" alt="3"/>3</span></a>
            <a href="#" title="4"><span><img src="img/montajee/4.jpg" alt="4"/>4</span></a>
            <a href="#" title="5"><span><img src="img/montajee/5.jpg" alt="5"/>5</span></a>
            <a href="#" title="6"><span><img src="img/montajee/6.jpg" alt="6"/>6</span></a>
            <a href="#" title="7"><span><img src="img/montajee/7.jpg" alt="7"/>7</span></a>
            <a href="#" title="8"><span><img src="img/montajee/8.jpg" alt="8"/>8</span></a>
            <a href="#" title="9"><span><img src="img/montajee/9.jpg" alt="9"/>9</span></a>
            <a href="#" title="1"><span><img src="img/pruebase/1.jpg" alt="1"/>10</span></a>
            <a href="#" title="2"><span><img src="img/pruebase/2.jpg" alt="2"/>11</span></a>
            <a href="#" title="3"><span><img src="img/pruebase/3.jpg" alt="3"/>12</span></a>
            <a href="#" title="1"><span><img src="img/exterior/1.jpg" alt="1"/>13</span></a>
            <a href="#" title="2"><span><img src="img/exterior/2.jpg" alt="2"/>14</span></a>
            <a href="#" title="3"><span><img src="img/exterior/3.jpg" alt="3"/>15</span></a>
            <a href="#" title="1"><span><img src="img/montajei/1.jpg" alt="1"/>16</span></a>
            <a href="#" title="2"><span><img src="img/montajei/2.jpg" alt="2"/>17</span></a>
            <a href="#" title="3"><span><img src="img/montajei/3.jpg" alt="3"/>18</span></a>
            <a href="#" title="4"><span><img src="img/montajei/4.jpg" alt="4"/>19</span></a>
            <a href="#" title="5"><span><img src="img/montajei/5.jpg" alt="5"/>20</span></a>
            <a href="#" title="6"><span><img src="img/montajei/6.jpg" alt="6"/>21</span></a>
        </div>
    </div>
    <div class="ws_shadow"></div>
</div>  
</span> -->


    
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h3><?php echo $text['171'];?></h3>
                        <p><?php echo $text['172'];?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolio1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?php echo $text['173'];?></h2>
                            <img src="img/dispositivos/waspmote.png " class="img-responsive img-centered" alt="">
                            <p><class="skills"><?php echo $text['174'];?>
                            </p>
                            <p>
                            <?php echo $text['175'];?>
                        </p>
                            <div class="table-responsive">
                    <table class="table skills">                
                        <tr>
                            <th><center><?php echo $text['176'];?></center></th>
                            <th><center><?php echo $text['177'];?></center></th>
                        </tr>
                        <tr>
                            <td><center><?php echo $text['178'];?></center></td>
                            <td><center><?php echo $text['179'];?></center></td>
                        </tr>
                            <td><center><?php echo $text['180'];?></center></td>
                            <td><center><?php echo $text['181'];?></center></td>                            
                        </tr>
                            <td><center><?php echo $text['182'];?><sub><?php echo $text['183'];?></center></sub></td>
                            <td><center><?php echo $text['184'];?></center></td>                            
                        </tr>
                            <td><center><?php echo $text['185'];?><sub><?php echo $text['186'];?></center></sub></td>
                            <td><center><?php echo $text['187'];?></center></td>                            
                        </tr>
                            <td><center><?php echo $text['188'];?></center></sub></td>
                            <td><center><?php echo $text['189'];?></center></td>                            
                        </tr>
                            <td rowspan="3" style="vertical-align:middle;"><center><?php echo $text['190'];?></center></sub></td>
                            <td><center><?php echo $text['191'];?></center></td>                            
                        </tr>
                            <td><center><?php echo $text['192'];?></center></td>                            
                        </tr>
                            <td><center><?php echo $text['193'];?></center></td>                            

                    </table>
                </div>
            </div>
        <br>

                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i><?php echo $text['194'];?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolio3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?php echo $text['195'];?></h2>
                            <img src="img/dispositivos/gassensor.png" class="img-responsive img-centered" alt="">
                            <p><class="skills"><?php echo $text['196'];?>
                            </p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i><?php echo $text['197'];?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolio4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?php echo $text['198'];?></h2>
                            <img src="img/dispositivos/xbee.png" class="img-responsive img-centered" alt="">
                            <p><?php echo $text['199'];?>
                                </p>
                                <br>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i><?php echo $text['200'];?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolio2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?php echo $text['201'];?></h2>
                            <img src="img/dispositivos/entorno.png" class="img-responsive img-centered" alt="">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> <?php echo $text['202'];?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolio5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?php echo $text['203'];?></h2>
                            <img src="img/dispositivos/lipro.jpg" class="img-responsive img-centered" alt="">
                            <p><?php echo $text['204'];?>
                            </p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i><?php echo $text['205'];?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

    <script type='text/javascript'>
    $(document).ready(function() {
         $('#CarExterior').carousel({
             interval: 2000,


         });

         var dataTable = $('#employee-grid').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        url :"employee-grid-data.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".employee-grid-error").html("");
                            $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="5">No se encontraron datos</th></tr></tbody>');
                            $("#employee-grid_processing").css("display","none");
                            
                        }
                    }
                } );

    });  </script>  
    
    <script type='text/javascript'>
    $(document).ready(function() {
         $('#CarInterior').carousel({
             interval: 2000
         })
    }); 
    </script>


    <script type='text/javascript'>
       $('#idioma').click(function(){
            
           var sesdion = "<?php  echo $_SESSION['local'] ; ?>";
           <?php

                if(!empty($_SESSION['local']) && $_SESSION['local'] == 'es'){
                    $_SESSION['local'] = 'en';
                }
                else{
                    $_SESSION['local'] = 'es';
                }
            ?>
            location.reload();
        });
    </script>



    <script type="text/javascript" src="engine3/wowslider.js"></script>
    <script type="text/javascript" src="engine3/script.js"></script>

    
    </body>
</html>
