<?php
require_once './clases/alumno.php';
// class xApi extend x implements IApiUsable
// {
//     public function traerUno($request, $response, $args)
//     {
        
//     }
// }

class AlumnoApi extends Alumno implements IApiUsable
{
    public function traerUno($request, $response, $args)
    {
        $legajo = $args['legajo'];
        
    }
}


?>