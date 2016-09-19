<?php


//membuat fungsi grabbing dengan curl
function grabCURL($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$grab=curl_exec($ch);
	curl_close($ch);
	return $grab;
}

//membuat fungsi explode dengan multiple delimiter (pembatas)
function explodeX( $delimiters, $string ){
    return explode( chr( 1 ), str_replace( $delimiters, chr( 1 ), $string ) );
}

//grab halaman kaskus.co.id;
$hasil =grabCURL('http://www.akakom.ac.id/index.php/site/kategori/4/berita');

//pecah string hasil grabbing ke array
$pecah = explodeX(array('kontenLink" title="', '" href="'), $hasil);

for ($i=36; $i < 64 ; $i++) {

	if ($i%2==0) {
	 	print_r ($pecah[$i]."</br>");
	 }

	
}

?>