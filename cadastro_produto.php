<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php 

	include_once "classe/conexao.php";
	$operacao = "";
	if(isset($_GET["operacao"])){
		$operacao = $_GET["operacao"];
	}
	
	$sub = "salva_dados.php?operacao=cad_produto";
	$imagem = "";
	$nome = "";
	$categoria = "";
	$descricao = "";
	$preco = "";
	$quantidade = "";
		
	if($operacao == "edt"){
		$id = $_GET["id"];
		$sub = "salva_dados.php?operacao=alt_produto&id=" . $id;
		 $sql = "SELECT imagem, id, nome, categoria, descricao, preco, quantidade FROM produto WHERE id=" . $id;
		 $result = $mysqli->query($sql);
		 if($result->num_rows > 0){
			 $linha = $result->fetch_assoc();
			 $imagem = $linha["imagem"];
			 $nome = $linha["nome"];
			 $categoria = $linha["categoria"];
			 $descricao = $linha["descricao"];
			 $preco = $linha["preco"];
			 $quantidade = $linha["quantidade"];
		 }
	}  
?>



<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Dimar Esportes</title>
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="dimarlogo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">Página inicial</a></li>
							<li class="nav-item submenu dropdown active">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Produtos</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.html.htm">Masculino</a></li>
									<li class="nav-item"><a class="nav-link" href="category.html.htm">Feminino</a></li>
									<li class="nav-item"><a class="nav-link" href="category.html.htm">Infantil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="category.html.htm">Esporte</a></li>
                                    <li class="nav-item"><a class="nav-link" href="gerenciar_produto.php">Gerenciar produtos</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Orçamento</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="cart.html.htm">Meus orçamentos</a></li>
									<li class="nav-item"><a class="nav-link" href="tracking.html.htm">Pedidos</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Minha conta</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="login.php">Entrar</a></li>
									<li class="nav-item"><a class="nav-link" href="cadastro_usuario.php">Criar conta</a></li>
									<li class="nav-item"><a class="nav-link" href="elements.html.htm">Sair</a></li>
								</ul>
							</li>
							
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-3">
					
				</div>

			<div class="col-lg-5 offset-lg-1">
				<form class="row login_form" action="<?php echo $sub; ?>" method="POST">

					
					<div class="s_product_text">
						<h3>Detalhes do produto</h3>
						<hr>
							
								<div class="col-md-12 form-group">
								<label for="imagem">Imagem:</label>
									<input type="file" value="<?php echo $imagem; ?>" class="form-control" id="imagem" name="imagem" placeholder="Imagem " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Imagem'">
                           		</div>

								<div class="col-md-12 form-group">
									<input type="text" value="<?php echo $nome; ?>" class="form-control" id="nome" name="nome" placeholder="Nome " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome'">
                           		</div>
                            	<div class="col-md-12 form-group">
									<input type="text" value="<?php echo $categoria; ?>" class="form-control" id="categoria" name="categoria" placeholder="Categoria" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Categoria'">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" value="<?php echo $preco; ?>" class="form-control" id="preco" name="preco" placeholder="Preço" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Preço'">
                            	</div>
                            	<div class="col-md-12 form-group">
									<input type="text" value="<?php echo $descricao; ?>" class="form-control" id="descricao" name="descricao" placeholder="Descrição" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Descrição'">
                            	</div>
                            	<div class="col-md-12 form-group">
									<input type="number"  value="<?php echo $quantidade; ?>" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Quantidade'">
								</div>
							
								<div class="col-md-12 form-group">
									<button type="submit" value="submit" class="primary-btn">Cadastrar produto</button>
									
								</div>
							
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	<!--================End Single Product Area =================-->



	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Sobre nós</h6>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
							magna aliqua.
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Sugestões</h6>
						<p>Deixe aqui sua sugestão de melhoria</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
									 required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

									<!-- <div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  -->
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Feed Instagram</h6>
						<ul class="instafeed d-flex flex-wrap">
							<li><img src="img/i1.jpg" alt=""></li>
							<li><img src="img/i2.jpg" alt=""></li>
							<li><img src="img/i3.jpg" alt=""></li>
							<li><img src="img/i4.jpg" alt=""></li>
							<li><img src="img/i5.jpg" alt=""></li>
							<li><img src="img/i6.jpg" alt=""></li>
							<li><img src="img/i7.jpg" alt=""></li>
							<li><img src="img/i8.jpg" alt=""></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Siga-nos nas redes sociais</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Dimar Esportes Todos os direitos reservados by <a href="https://colorlib.com" target="_blank">Dimar</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>

