<?php

namespace Api;
use Api\Controllers\PersonaController;
/**
 * Rest
 *  @Class Clase que nos permite hacer todo el controlador del enrutador e ir redirigiendo las distintas peticiones
 */
class Rest{

    

    public $rutas = [
        [
            "controller" => PersonaController::class,
            "method" => "GET",
            "action" => "getPersonas",
            "ruta" => "/personas"
        ],
        [
            "controller" => PersonaController::class,
            "method" => "POST",
            "action" => "altaPersona",
            "ruta" => "/personas"
        ]
        
    ];

        
    /**
     * init
     *  Comprobamos que exista la ruta, si no existe devolvemos un 404 con ruta no encontrada, si existe, mandamos el correspondiente método a la clase con sus parámetros.
     * @return void
     */
    public function init() {

       $ruta = $this->existeRuta();



        if ($ruta)
        {
            $controller = $ruta["controller"];
            $accion = $ruta["action"];

            call_user_func_array([new $controller,$accion],array($_POST));


        }else
        {
            header("HTTP/1.1 404 ROUTE NOT FOUND");
            echo "Ruta no encontrada";
            die();
        }

    }

     
     /**
      * existeRuta
      * Método en el que hacemos un match para comprobar que la ruta pasada en la URL y el método existen en el array
      * Si este es correcto, devolvemos la posicion del objeto en el array
      * @return @index
      */
     public function existeRuta()
    {
        $uri = str_replace("/api","",$_SERVER["REQUEST_URI"]);
        $method = $_SERVER["REQUEST_METHOD"];

        foreach ($this->rutas as $index => $value) {

            if ($uri === $value["ruta"] && $method == $value["method"]) 
            {
                return $this->rutas[$index];
            }

        }

        return false;
    }





    


     


}