<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="cache.js"></script>
</head>
<body>
   <?php
    $url = $_SERVER["SCRIPT_NAME"];
    $break = explode('/', $url);
    $file = $break[count($break) - 1];  
    $cachefile = 'cached-'.substr_replace($file ,"",-4).'.html';
    $cachetime = 18000;

    // Serve from the cache if it is younger than $cachetime
    if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
        echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
        readfile($cachefile);
        exit;
    }
 
    ob_start(); // Start the output buffer
?>

<h1>Hola mundo</h1>

<?php
    // Cache the contents to a cache file
    $cached = fopen($cachefile, 'w');
    fwrite($cached, ob_get_contents());  // Devolver el contenido del búfer de salida
    fclose($cached);
    ob_end_flush(); // Volcar (enviar) el búfer de salida y deshabilitar el almacenamiento en el mismo
?>
    
</body>
</html>