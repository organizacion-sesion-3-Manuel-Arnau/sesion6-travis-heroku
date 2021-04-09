<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Serie extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
}

/* Obtención de la lista de películas */

$app->get('/series', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de series

    // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $pelis = json_decode(\Serie::all());

    // Mostramos la vista
    return $this->view->render($res, 'serielist_template.php', [
        'items' => $pelis
    ]);
})->setName('series');


/*  Obtención de una película en concreto  */
$app->get('/series/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la película pasada como parámetro

    // Obtenemos la película de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \Serie::find($args['name']);  
    $peli = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'serie_template.php', [
        'item' => $peli
    ]);

});

//Borrar pelicula
$app->delete('/series/{name}', function ($req, $res, $args) {
    //Le pasamos la variable para que la encuentre
    $peli = Serie::find($args['name']);
    //Borramos la pelicula encontrada
    $peli->delete();
});

//Guardar nueva pelicula
$app->post('/series', function ($req, $res, $args)  {
    $template = $req->getParsedBody();

    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $description = $datos[$i]['value'];
            break;
        case "director":
            $director = $datos[$i]['value'];
            break;
        case "embedUrl":
            $embedUrl = $datos[$i]['value'];
            break;
        case "datePublished":
            $datePublished = $datos[$i]['value'];
            break;
        }
    }
    $nueva_movie = new Serie;
    $nueva_movie['name'] = $name;
    $nueva_movie['description'] = $description;
    $nueva_movie['director'] = $director;
    $nueva_movie['datePublished'] = $datePublished;
    $nueva_movie['embedUrl'] = $embedUrl;

    $nueva_movie->save();
});
//Actualizar pelicula
$app->put('/series/{id}', function ($req, $res, $args) {
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $description = $datos[$i]['value'];
            break;
        case "director":
            $director = $datos[$i]['value'];
            break;
        case "embedUrl":
            $embedUrl = $datos[$i]['value'];
            break;
        case "datePublished":
            $datePublished = $datos[$i]['value'];
            break;
        }
    }
  
    $nueva_movie = Serie::find($args['id']);
    $nueva_movie['name'] = $name;
    $nueva_movie['description'] = $description;
    $nueva_movie['director'] = $director;
    $nueva_movie['embedUrl'] = $embedUrl;
    $nueva_movie['datePublished'] = $datePublished;
  
    $nueva_movie->save();

});

?>
