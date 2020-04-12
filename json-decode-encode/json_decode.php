<?php

/*
Json es un string. 
la función json_decode() convierte este string en formato objecto de php . 
*/

$json = '{"menu": {
  "id": "file",
  "value": "File",
  "popup": {
    "menuitem": [
      {"value": "New", "onclick": "CreateNewDoc()"},
      {"value": "Open", "onclick": "OpenDoc()"},
      {"value": "Close", "onclick": "CloseDoc()"}
    ]
  }
}}';

// convertir el string a objeto de php
$decodedJson = json_decode($json);

print_r($decodedJson);

// Output
// stdClass es como el Object de Java o javascript
/* 
stdClass Object
(
    [menu] => stdClass Object
        (
            [id] => file
            [value] => File
            [popup] => stdClass Object
                (
                    [menuitem] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [value] => New
                                    [onclick] => CreateNewDoc()
                                )

                            [1] => stdClass Object
                                (
                                    [value] => Open
                                    [onclick] => OpenDoc()
                                )

                            [2] => stdClass Object
                                (
                                    [value] => Close
                                    [onclick] => CloseDoc()
                                )

                        )

                )

        )

)


*/


// Acceso a los datos

echo $decodedJson->menu->id;
echo "\n";
echo $decodedJson->menu->value;

$items =  $decodedJson->menu->popup->menuitem;
foreach($items as $item){
  echo $item->value;
  echo "\n";
  echo $item->onclick;
  echo "\n";
}

?>
