<?php
require_once "DBAccess.php"; //require_once è come include ma se il file è già stato incluso non lo include nuovamente
use DB\DBAccess;

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

setlocale(LC_ALL, 'it_IT');

    $paginaHTML = file_get_contents("discografiaTemplate.html"); //legge il file discografiaTemplate.html e lo mette in una stringa

    $stringaAlbum = "";
    $listaAlbum = "";   

    $connection = new DBAccess(); //crea un oggetto di tipo DBAccess come handle per la connessione
    $connectionOk = $connection->openDBConnection(); //apre la connessione e la salva in connOk

    //Normalmente, come informatici siamo portati ad avere il caso positivo;
    //anche da un punto di vista architetturale, si deve fare in modo il ramo true sia il più probabile
    if($connectionOk){
        $listaAlbum = $connection->getListaAlbum(); //salva la lista degli album in album
        if($listaAlbum != null){
            foreach( $listaAlbum as $album){
                $stringaAlbum .= "<li><a id=\""
                    .$album["idCss"] . "\" href=\"album.php?id="
                    .$album["ID"]
                    ."\">" . $album["Titolo"] . "</a> </li>";
            }
        }else{
            $stringaAlbum .= "<li>Non sono presenti album</li>"
        }
        $connection->closeDBConnection(); //chiude la connessione
    }else{
        $stringaAlbum ="<li>I sistemi sono momentaneamente fuori servizio, ci scusiamo per il disagio</li>"
    }
   

    $paginaHTML= str_replace("{album}", $stringaAlbum, $paginaHTML); 
    echo $paginaHTML;
    
?>