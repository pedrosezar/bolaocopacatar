<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica sans-serif;
        }
        .cupom {
            width: 300px;
            background-color: #eee;
        }
        .cupom .header .title {
            width: 100%;
            font-size: 1rem;
            font-weight: bold;
            border-bottom: 2px dashed #666;
            padding: 10px 0;
            text-align: center;
        }
        .cupom .header .title span {
            display: block;
            font-size: 0.9rem;
        }
        .cupom .header .description {
            position: relative;
            width: 100%;
            font-size: 0.9rem;
            font-weight: bold;
            border-bottom: 2px dashed #666;
            padding: 10px 0 26px 0;
        }
        .cupom .header .description .description-data {
            position: absolute;
            left: 10px;
        }
        .cupom .header .description .description-control {
            position: absolute;
            right: 10px;
        }
        .cupom .main .description {
            position: relative;
            width: 100%;
            font-size: 0.9rem;
            font-weight: bold;
            border-bottom: 2px dashed #666;
            padding: 10px 0 26px 0;
        }
        .cupom .main .description .description-total {
            position: absolute;
            left: 10px;
        }
        .cupom .main .description .description-valor {
            position: absolute;
            right: 10px;
        }
        .cupom .main .description .description-code {
            position: absolute;
            left: 10px;
            font-size: 0.7rem;
            font-weight: normal;
        }
        .cupom .main .description .description-player {
            position: absolute;
            left: 60px;
            font-size: 0.7rem;
            font-weight: normal;
        }
        .cupom .main .description .description-quantity {
            position: absolute;
            left: 210px;
            font-size: 0.7rem;
            font-weight: normal;
        }
        .cupom .main .description .description-value {
            position: absolute;
            left: 240px;
            font-size: 0.7rem;
            font-weight: normal;
        }
        .cupom .main .descricao {
            position: relative;
            width: 100%;
            font-size: 0.8rem;
            font-weight: bold;
            padding: 10px 0;
        }
        .cupom .main .descricao .descricao-codigo {
            position: absolute;
            left: 10px;
        }
        .cupom .main .descricao .descricao-partida {
            position: absolute;
            left: 60px;
        }
        .cupom .main .descricao .descricao-quantidade {
            position: absolute;
            left: 200px;
        }
        .cupom .main .descricao .descricao-total {
            position: absolute;
            left: 240px;
        }
        .cupom .main .payment {
            position: relative;
            width: 100%;
            font-size: 0.9rem;
            border-bottom: 2px dashed #666;
            padding: 10px 0;
        }
        .cupom .main .payment .payment-key {
            margin: 0 0 10px 5px;
        }
        .cupom .main .payment .payment-key span {
            font-weight: bold;
        }
        .cupom .main .payment .payment-qrcode {
            position: relative;
            width: 100%;
            font-size: 0.9rem;
            padding: 0 0 102px 0;
        }
        .cupom .main .payment .payment-qrcode .payment-qrcode-description {
            position: absolute;
            width: 150px;
            top: 27px;
            left: 10px;
        }
        .cupom .main .payment .payment-qrcode .payment-qrcode-image {
            position: absolute;
            right: 10px;
        }
        .cupom .main .payment .payment-qrcode .payment-qrcode-image img {
            width: 102px;
        }
        .footer {
            font-size: 1rem;
            margin: 5px;
            padding: 0 0 30px 0;
        }
        .footer span {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="cupom">
        <div class="header">
            <div class="title">
                Sistema Bolão da Copa Catar 2022
                <span>Desenvolvido por Pedro Sézar</span>
            </div>
            <div class="description">
                <div class="description-data">
                    <?= dataHoraFormatadaCupom($cupom->data); ?>
                </div>
                <div class="description-control">
                    CONTROLE: <?= $cupom->controle; ?>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="descricao">
                <div class="descricao-codigo">Código</div>
                <div class="descricao-partida">Descrição</div>
                <div class="descricao-quantidade">Qtde</div>
                <div class="descricao-total">Total</div>
            </div>
            <div class="description">
                <div class="description-code"><?= ($cupom->id < 10) ? "000{$cupom->id}" : "00{$cupom->id}"; ?></div>
                <div class="description-player"><?= $cupom->mandante . " x " . $cupom->visitante; ?></div>
                <div class="description-quantity">1</div>
                <div class="description-value">R$ 5,00</div>
            </div>
            <div class="description">
                <div class="description-total">
                    TOTAL R$
                </div>
                <div class="description-valor">
                    5,00
                </div>
            </div>
            <div class="payment">
                <div class="payment-key">
                    Faça uma transferência PIX usando a chave <span>pedrosezar@gmail.com</span>
                </div>
                <div class="payment-qrcode">
                    <div class="payment-qrcode-description">
                        Caso prefira faça a transferência usando o QR Code
                    </div>
                    <div class="payment-qrcode-image">
                        <img src="<?= URL_BASE; ?>/assets/img/qrcode.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            Para facilitar a aprovação da sua aposta informe na descrição do PIX o código de controle <span><?= $cupom->controle; ?></span>.
        </div>
    </div>
</body>
</html>
