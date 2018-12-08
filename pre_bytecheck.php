//came up with this method to analyse uploaded files without relying on the local server and by using PHP's native functions.
//works quite well with obfuscated files. Obfuscated scripts are not tested.

$tmp_name = $_FILES["file"]["tmp_name"];
$hex = unpack("H*", file_get_contents($tmp_name);
$hex = current($hex);
//hex that is blacklisted. For some reason my PHP failed to properly parse using an array to compare so had to do it manually.
//prevents files with PHP scripts hidden within from saving.
               if (strpos(strtolower($hex), '3c3f706870' or strpos(strtolower($hex), '6576616c28') or strpos(strtolower($hex), '3c3f3d') or strpos(strtolower($hex), '3c736372697074')) == false){	
									move_uploaded_file($tmp_name, "$uploads_dir/$name");
									header('HTTP/1.1 454 Uploaded file successfully', true);
							 }
							 else{
									header('HTTP/1.1 454 Exploitation detected, upload unsuccessful' , true);
							 }
