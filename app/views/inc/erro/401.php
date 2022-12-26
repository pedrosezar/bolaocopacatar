<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= TITULO_SITE; ?> 401</title>
	<link rel="stylesheet" href="<?= URL_BASE; ?>assets/css/all.min.css">
	<link rel="stylesheet" href="<?= URL_BASE; ?>assets/css/fontawesome.min.css">

	<style>
		@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,700');
		body{font-family: 'Roboto', sans-serif;background:linear-gradient(#e4e4e4, #b3b3b3) fixed;background:-moz-linear-gradient(#e4e4e4, #b3b3b3) fixed;background:-ms-linear-gradient(#e4e4e4, #b3b3b3) fixed}
		.erro{margin:0 auto;text-align:center;margin-top:80px;}
		.far{font-size:5rem;margin-bottom:10px;}
		h1{margin-bottom:0;    line-height: 2rem;}
		.btn{display:block;border:solid 1px black;padding:10px;color:#fff;border-radius:4px;text-decoration:none;margin:5px 0}
		.btn.voltar{background:orange;color:black}
		.fas{display:none}
		@media (min-width:400px){
			.erro{width:300px}
		}
		@media (min-width:992px){
			.erro{width:600px;margin-top:160px;position:relative}
			.btn{display:table;margin:0 auto; padding:10px 15px}
			.fas,.far{font-size: 14rem; margin-bottom: 10px; float: left;  opacity: .4;}
			.error span{font-size:3.7rem;opacity: .7;}
			.blur{
				width: 100%;
				background: hsla(0, 0%, 0%, 0.71);
				border-radius: 50px;
				filter: blur(1.2rem);
				display: inline-block;
				height: 10px;
				margin-top: 50px;
			}
		}
	</style>
</head>
<body>
	<div class="erro">
		<i class="far fa-hand-paper"></i>
		<h1 class="error"> <span>Erro 401 </span><br> Não autorizado</h1>
		<p>Você não tem permissão para acessar está página</p>
		<a href="<?= URL_BASE; ?>" class="btn voltar">Voltar para a página inicial</a>
		<i class="blur"></i>
	</div>
</body>
</html>
