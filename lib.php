<?php

date_default_timezone_set('Europe/Berlin');

function ran( $length ) {
	$zeichen=array ( 'a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z','2','3','4','5','6','7','8','9', '$', '&', '%', '#' ); 
	$max = count( $zeichen ) - 1;
	$pw = "";
	for( $i = 0; $i < $length; $i++ ) { 
		srand( (double) microtime() * 1000000 ); 
		$wg  = rand( 0, $max ); 
		$pw .= $zeichen[$wg]; 
	} 
	return $pw;
}

function login() {
	header( 'Location: login.php' );
	exit;
}
function login_ajax() {
	echo '{"error": "You are not logged in anymore!"}';
	exit;
}
function size($path) {
	return( get_size( filesize( $path ) ) );
}

function get_size( $size ) {
	switch($size) {
		case $size > 1099511627776:
			return round($size/1099511627776, 1).'TB';
		case $size > 1073741824:
			return round($size/1073741824, 1).'GB';
		case $size > 1048576:
			return round($size/1048576, 1).'MB';
		case $size > 1024:
			return round($size/1024, 1).'KB';
		default:
			return $size.'B';
	}
}
function del_d($dirname) {
   if (is_dir($dirname))
      $dir_handle = opendir($dirname);
   if (!$dir_handle)
      return false;
   while($file = readdir($dir_handle)) {
      if ($file != "." && $file != "..") {
         if (!is_dir($dirname."/".$file))
            unlink($dirname."/".$file);
         else
            delete_directory($dirname.'/'.$file);    
      }
   }
   closedir($dir_handle);
   rmdir($dirname);
   return true;
}
function input( $value ) {
	echo 'value="'.$value.'" onblur="if(this.value==\'\'){this.value=\''.$value.'\'}" onfocus="if(this.value==\''.$value.'\'){this.value=\'\'}"';
}

?>