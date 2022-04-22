<?php

namespace Api\Controllers;

/**
 * PersonaController
 * 
 * Clase que usaremos para deifnir el comportamiento del enrutador hacia los servicios que proporcionará nuestro Controlador.
 * 
 * En esta version de Enrutador la vamos a optimizar para su uso con Velneo.
 * 
 */
class PersonaController
{

    private $url = "http://185.195.111.247/p";

    private $procesos;
    
    /**
     * __construct
     *
     *  En el constructor de la clase vamos a inicializar las rutas que pertenezcan a los procesos de velneo para facilitarnos el manejo.
     * 
     * @return void
     */
    function __construct(){
        $this->procesos = [
            "list-personas" => $this->url."/list-personas",
            "alta-persona" => $this->url."/alta-persona",
            "del-persona" => $this->url."/del-persona",
            "edit-persona" => $this->url."/edit-persona",
        ];
    }
    
           
    /**
     * getPersonas
     * Obtener un JSON con todas las Personas
     * @return void
     */
    public function getPersonas()
    {
        header("Content-type:application/json");
        $c = curl_init($this->procesos["list-personas"]);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        echo $page = curl_exec($c);

    }
    
    /**
     * altaPersona
     *
     * Función que nos permite dado unos parámetros el alta de una Persona
     * @param  mixed Va a contener el $_POST que le mandemos con los datos para el alta
     * @return void
     */
    public function altaPersona($params)
    {
        header("Content-type:application/json");
        $c = curl_init($this->procesos["alta-persona"]);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,http_build_query($params));
        echo $page = curl_exec($c);
        

    }

    public function delPersona($params)
    {
        header("Content-type:application/json");
        $c = curl_init($this->procesos["del-persona"]);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,http_build_query($params));
        echo $page = curl_exec($c);
    }

    public function editPersona($params)
     {
        header("Content-type:application/json");
        $c = curl_init($this->procesos["del-persona"]);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($c,CURLOPT_POSTFIELDS,http_build_query($params));
        echo $page = curl_exec($c);
     }



    
    
}