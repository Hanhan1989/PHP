<?php
/**
 * Response headers
 */

//Consigue la última fecha de modificación de este archivo
$lastmodifiedFile=filemtime(__FILE__);
//Consigue el hash unico de este archivo (Etag) 
$etagfile = md5_file(__FILE__);

//Pone la cabecera Last-Modified (Ultima Modificacion)
header("Last-Modified: ".date("d-m-y h:m:s", $lastmodifiedFile));
//Pone la cabecera Etag-Header
header("Etag: $etagfile");

/**
 * Request Headers
 */

 $lastModifiedHeader = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) : false;
//Consigue La Cabecera Http_If_None_Match Si La Tiene (Etag: Hash Unico Del Archivo)
$etagheader = isset($_SERVER['HTTP_IF_NONE_MATCH']) ? $_SERVER['HTTP_IF_NONE_MATCH'] : false;
echo "lastmodifiedFile = $lastmodifiedFile \n";
echo "etagfile = $etagfile \n";
echo "lastModifiedHeader=$lastModifiedHeader \n";
echo "etagheader = $etagheader \n";

//Verifica si la Pagina ha cambiado. Si No,  envia 304 Y Sale
// Después del encabezado 304, la petición no volverá a hacer ejecutar el archivo php hasta que haya alguna modificación en el archivo php. La comprobación la hará el apache. 
// la primera vez la hace el php file. 
If ($lastmodifiedFile == $lastModifiedHeader || $etagfile == $etagheader)
{
       header("Http/1.1 304 Not Modified");
       exit;
}

//Nuestro código
echo "Esta Pagina Fue Modificada: ".date('h:i:s'); 

