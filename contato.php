
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Igreja Evangélica Ministério Voz de Um Clamor - Contato</title>
	
	<!-- Estilo CSS -->
    <link href="css/estilo.css" rel="stylesheet">

	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- Carregando o JS e o JQuery -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

	
	<script>
	
	$(document).ready(function(){
	
		var local = [];
		local = [
				<?php
					
					$db = new SQLite3('BancoDados.db');
					$result4 = $db->query("SELECT DISTINCT local AS `local` FROM emails;");

					$string2 = "";
					while ($row = $result4->fetchArray()) {
	
						$localidade = $row['local'];
						$string2 .= utf8_encode("{local: \"$localidade\"},");
						
						}
						
					echo trim($string2, ',');
				?>
		];
		
		$('#localidade').append("<option value=\"\">Selecione a Igreja que você deseja contato:</option>");
		
		local.forEach(function(item) {
			$('#localidade').append("<option value=\"" + item.local + "\">" + item.local + "</option>")
		});
	
		$("#localidade").change(function(me){
			var localidadeSelecionada = this.value;
			
			var email = [];
			email = [
				<?php

				$results3 = $db->query("SELECT * FROM emails;");
				$string = "";
				while ($row = $results3->fetchArray()) {
				$localidade = $row['local'];
				$email = $row['email'];
				$id = $row['id'];
				$string .= utf8_encode("{id:$id,local: \"$localidade\",email:\"$email\"},");
				}

				echo trim($string,',');

				?>
			];

			$('#emailTo').empty();
			$('#emailTo').append("<option value=\"\">Selecione o departamento que você deseja contato:</option>");
			
			email.forEach(function(item){
				if (item.local == localidadeSelecionada){
					$('#emailTo').append("<option value=\"" + item.id + "\">" + item.email + "</option>")
				}
			});
			
		});

		//checkBoxSelec();
	});	
	</script>
</head>
<body>
 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Igreja Evangélica Ministério Voz de um Clamor</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Início</a>
                    </li>
                    <li>
                        <a href="contato.php">Contato</a>
                    </li>
                    <li>
                        <a href="endereco.html">Endereço</a>
                    </li>
                    <li>
                        <a href="programacao.html">Programação</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- PARTE DO SLIDE: Se quiser add mais um item é só dar um ctrl+c, ctrl+v no <li> pra adicionar uma bolinha
        E copiar a div item -->
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <!--<li data-target="#myCarousel" data-slide-to="3"></li>-->
        </ol>

        <!-- Imagens do slide devem ser alterada dentro do background-image:url() -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
                <div class="carousel-caption">
                    <!-- Escrita no slide-->
                    <h2>Mensagem 1</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
                <div class="carousel-caption">
                    <h2>Mensagem 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                <div class="carousel-caption">
                    <h2>Mensagem 3</h2>
                </div>
            </div>
            <!--<div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                <div class="carousel-caption">
                    <h2>Mensagem 4</h2>
                </div>
            </div>-->
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
<div class="container">
	<div id="form-contato">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="well well-sm">
						<form class="form-horizontal" method="post" action="enviar_email.php">
							<legend class="text-center header">Entre em contato conosco!</legend>
							
							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
									<div class="col-md-8">
										<input id="fname" name="name" type="text" placeholder="Nome" class="form-control">
								   </div>
							</div>
								
							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
								<div class="col-md-8">
									<input id="lname" name="name" type="text" placeholder="Sobrenome" class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
								<div class="col-md-8">
									<input id="email" name="email" type="text" placeholder="Email" class="form-control">
								</div>
							</div>
								
							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
								<div class="col-md-8">
								   <select id="localidade" name="localidade"  class="form-control" placeholder="Matriz São João de Meriti"></select>
								</div>
							</div>
															
							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
								<div class="col-md-8">
									<select id="emailTo" name="emailTo"  class="form-control" placeholder="exemplo@iemvc.com.br"></select>
								</div>
							</div>
								
							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
								<div class="col-md-8">
									<input id="phone" name="phone" type="text" placeholder="Telefone de Contato" class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
								<div class="col-md-8">
									<textarea class="form-control" id="message" name="message" placeholder="Digite sua mensagem aqui." rows="7"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12 text-center">
									<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
								</div>
							</div>
								
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-3">

                    <p>Copyright &copy; Your Website 2014</p>
                    
                </div>
                <div class="col-lg-9 text-right">
                <small> “O SENHOR DERRAMARÁ SOBRE NÓS O SEU AMOR, PORQUE ELE SEMPRE OUVIRÁ A VOZ DE UM CLAMOR”
                    </small>
                </div>
            </div>
        </footer>
</div>
<!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>