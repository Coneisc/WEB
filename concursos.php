<!DOCTYPE HTML>
<html>
	<head>
		<title>CONEISC - CONCURSOS</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript">

			var $jq = jQuery.noConflict();
		</script>	
		   <script type="text/javascript" src="js/jquery.bgpos.js"></script>

		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.onvisible.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/styles.css" />
		<link rel="stylesheet" href="css/style-concurso.css" />
		<link rel="stylesheet" href="css/style-desktop.css" />
		<link rel="stylesheet" href="css/style-noscript.css" />
		<link rel="stylesheet" href="css/nstyles.css" />
		<link rel="stylesheet" href="css/estilos.css" />
		<style type="text/css">
	    	.ahora{
                margin:0;
                padding:0;
             
            }
            .encabe{
                font-family:Arial;
                padding-top:30px;
                background:#FFF9DF url(images/title.png) no-repeat top center;
            }
            a.back{
               background:transparent url(back.png) no-repeat 0px 0px;
                position:absolute;
                width:150px;
                height:27px;
                outline:none;
                top:2px;
                right:0px;
            }
           .reference{
                margin:20px auto;
                width:600px;
                padding:20px;
            }
            .reference p a{
                text-transform:uppercase;
                text-shadow:1px 1px 1px #fff;
                color:#666;
                text-decoration:none;
                font-size:10px;

            }
            .reference p a:hover{
                color:#333;
            } 
            .contenido > * {
  				vertical-align: baseline;
			    font-family: inherit;
			    font-weight: inherit;
			    font-style: inherit;
			    font-size: 100%;
			    outline: 0;
			    padding: 0;
			    margin: 0;
			    border: 0;
			    background-color:  #FFF;
			}
			</style>
	</head>

		

	<body class="homepage">

		<!-- Header -->
			<div id="header">
						
				<!-- Inner -->
					<div class="inner">
						<header>
							<img width="400px" height="200px" src="img/logo2.png">
							<hr />
							<p class="txt-top">Concursos <br> CONEISC 2015</p>
						</header>
						
					</div>
				

				<!-- Nav -->
				<?php include 'include/menutop.php';?>

			</div>
			
		<!-- Banner -->
			<section id="banner">
				<header>
					<p class="frases">
						"El concurso de proyectos es una de las actividades del CONEISC 2015, donde se presentaran varios proyectos en distintas ramas, participa este año, Arequipa te espera....."
						</p>
				</header>




			</section>

			<div class="clear">
				
	<div class="contenido" >
			<div class="ahora">
			<div class="encabe"></div>
            <a class="back" href="http://tympanus.net/codrops/2010/05/05/beautiful-background-image-navigation-with-jquery"></a>
            <div id="menucitoWrapper" class="menucitoWrapper bg1">
                <ul class="menucito" id="menucito">
                    <li class="bg1" style="background-position:0 0;">
                        <a id="bg1" href="#">Concurso Paper</a>
                        <ul class="sub1" style="background-position:0 0;">
                            <li><a href="#">Bases</a></li>
                            <li><a href="#">Premios</a></li>
                            <li><a href="#">Jurado</a></li>
                        </ul>
                    </li>
                    <li class="bg1" style="background-position:-266px 0px;">
                        <a id="bg2" href="#">Concurso de Robotica </a>
                        <ul class="sub2" style="background-position:-266px 0;">
                            <li><a href="#">Bases</a></li>
                            <li><a href="#">Premios</a></li>
                            <li><a href="#">Jurado</a></li>
                        </ul>
                    </li>
                    <li class="last bg1" style="background-position:-532px 0px;">
                        <a id="bg3" href="#">Concurso E-Recycle</a>
                        <ul class="sub3" style="background-position:-266px 0;">
                            <li><a href="#">Bases</a></li>
                            <li><a href="#">Premios</a></li>
                            <li><a href="#">Jurado</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
           

            
        </div>
	</div>

			</div>
		<!-- Footer -->
			<?php include 'include/footer.php';?>

			 <!-- The JavaScript -->
        <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>-->
        <script type="text/javascript">
				$(function() {
                /* position of the <li> that is currently shown */
                var current = 0;
				
				var loaded  = 0;
				for(var i = 1; i <4; ++i)
					$jq('<img />').load(function(){
						++loaded;
						if(loaded == 3){
							$('#bg1,#bg2,#bg3').mouseover(function(e){
								
								var $this = $(this);
								/* if we hover the current one, then don't do anything */
								if($this.parent().index() == current)
									return;

								/* item is bg1 or bg2 or bg3, depending where we are hovering */
								var item = e.target.id;

								/*
								this is the sub menu overlay. Let's hide the current one
								if we hover the first <li> or if we come from the last one,
								then the overlay should move left -> right,
								otherwise right->left
								 */
								if(item == 'bg1' || current == 2)
									$jq('#menucito .sub'+parseInt(current+1)).stop().animate({backgroundPosition:"(-266px 0)"},300,function(){
										$(this).find('li').hide();
									});
								else
									$jq('#menucito .sub'+parseInt(current+1)).stop().animate({backgroundPosition:"(266px 0)"},300,function(){
										$(this).find('li').hide();
									});

								if(item == 'bg1' || current == 2){
									/* if we hover the first <li> or if we come from the last one, then the images should move left -> right */
									$jq('#menucito > li').animate({backgroundPosition:"(-800px 0)"},0).removeClass('bg1 bg2 bg3').addClass(item);
									move(1,item);
								}
								else{
									/* if we hover the first <li> or if we come from the last one, then the images should move right -> left */
									$jq('#menucito > li').animate({backgroundPosition:"(800px 0)"},0).removeClass('bg1 bg2 bg3').addClass(item);
									move(0,item);
								}

								/*
								We want that if we go from the first one to the last one (without hovering the middle one),
								or from the last one to the first one, the middle menu's overlay should also slide, either
								from left to right or right to left.
								 */
								if(current == 2 && item == 'bg1'){
									$('#menucito .sub'+parseInt(current)).stop().animate({backgroundPosition:"(-266px 0)"},300);
								}
								if(current == 0 && item == 'bg3'){
									$('#menucito .sub'+parseInt(current+2)).stop().animate({backgroundPosition:"(266px 0)"},300);
								}

								
								/* change the current element */
								current = $this.parent().index();
								
								/* let's make the overlay of the current one appear */
							   
								$jq('#menucito .sub'+parseInt(current+1)).stop().animate({backgroundPosition:"(0 0)"},300,function(){
									$(this).find('li').fadeIn();
								});
							});
						}	
					}).attr('src', 'images/'+i+'.jpg');
				
							
                /*
                dir:1 - move left->right
                dir:0 - move right->left
                 */
                function move(dir,item){
                    if(dir){
                        $jq('#bg1').parent().stop().animate({backgroundPosition:"(0 0)"},200);
                        $jq('#bg2').parent().stop().animate({backgroundPosition:"(-266px 0)"},300);
                        $jq('#bg3').parent().stop().animate({backgroundPosition:"(-532px 0)"},400,function(){
                            $('#menucitoWrapper').removeClass('bg1 bg2 bg3').addClass(item);
                        });
                    }
                    else{
                        $jq('#bg1').parent().stop().animate({backgroundPosition:"(0 0)"},400,function(){
                            $jq('#menucitoWrapper').removeClass('bg1 bg2 bg3').addClass(item);
                        });
                        $jq('#bg2').parent().stop().animate({backgroundPosition:"(-266px 0)"},300);
                        $jq('#bg3').parent().stop().animate({backgroundPosition:"(-532px 0)"},200);
                    }
                }
            });
        </script>

	</body>
</html>