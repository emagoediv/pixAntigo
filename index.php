<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Pix\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

/* Seta valores de pagamento */

$obPayload = (new Payload())
    ->setPixKey("5515996082076")
    ->setDescription("Pagamento pix teste")
    ->setMerchantName("Matheus Amorim")
    ->setMerchantCity("TATUI")
    ->setAmount(100)
    ->setTxid('123');


/* Pega o codigo completo para o pagamento pix */
$payLoadQrCode = $obPayload->getPayLoad();

echo '<pre>' . print_r($payLoadQrCode, true) . '</pre>';


/* Gerando qr code */
$obQrCode = new QrCode($payLoadQrCode);

$image = (new Output\Html)->output($obQrCode, 400);

echo $image;
