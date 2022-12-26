<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= TITULO_SITE; ?> 500</title>
	<link rel="stylesheet" href="<?= URL_BASE; ?>assets/css/all.min.css">
	<link rel="stylesheet" href="<?= URL_BASE; ?>assets/css/fontawesome.min.css">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,700');
		body{background:#b45766;color:#fff}
		.erro{display:block;font-family: 'Cutive';width:auto;margin:0 auto;text-align:center;margin-top:40px;font-family: 'Roboto'}
		h1{margin-bottom:0;text-align:center;margin-top:0}
		.icone{padding-top:30px;display:block;color:#fff}
		.terro{padding:10px;}
		p{font-family: 'Roboto', sans-serif;text-align:center;}
		.btn{display:block;border:solid 1px #fff;padding:10px;color:#fff;border-radius:4px;text-decoration:none;margin:5px 0}
		.btn.voltar{background: #f7c720; color: #202020; border: solid 1px #fe8916;}
		.icone{width: 209px; height: 192px; margin: 0 auto; display: grid; background: url("<?= URL_BASE; ?>/assets/img/ico-placa.png") no-repeat;  background-size: cover; font-weight: 700; color: black; text-align: center; align-content: center; font-size: 3rem;}
		
		@media (min-width:992px){
			.erro{width:900px;margin-top:20px; text-align:center;}
			.erro i{ opacity: 0.8;}
			.icone{     width: 186px;    height: 217px;}			
			.terro{text-align:center;width: 100%;}
			h1{font-size:2rem;line-height:2.1rem;text-align:center}
			h1 b{font-size:3rem;}
			p{font-size:1.3rem;text-align:center;}
			.btn{display:inline-block;margin:15px 10px;padding:12px 15px}
		}
	</style>
</head>
<body>
	<div class="erro">
		<div class="icone"></div>
		<div class="terro">
			<h1 class="error"><b> OOOPSSSS!</b> <br> Algo deu errado </h1>
			<p> <?= $msg_erro ?></p>
			<a href="<?= URL_BASE; ?>" class="btn voltar"><i class="fas fa-arrow-left"></i> Voltar para a página inicial</a>
		</div>
	</div>
</body>
</html>
