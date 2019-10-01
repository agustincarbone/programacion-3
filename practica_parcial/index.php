<?php

class Vehiculo
{
	public $marca;
	public $modelo;
	public $patente;
	public $precio;
	
	function __construct($marca, $modelo, $patente, $precio)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;    
        $this->patente = $patente;
        $this->precio = $precio;
    }

	public function cargarVehiculo($vehiculoJson)
	{  //POST
        $lineaObjeto = [];
		if (file_exists("vehiculo.txt")) 
		{
            $fileRead = fopen("vehiculo.txt", "r");
			while (!feof($fileRead)) 
			{
                $linea = fgets($fileRead);
                $lineaObjeto = json_decode($linea);
            }
            fclose($fileRead);

            //ESCRIBO
            $fileWrite = fopen("vehiculo.txt", "a");
            var_dump($vehiculoJson);
            array_push($lineaObjeto, $vehiculoJson);
            
            fwrite($fileWrite, $vehiculoJson);
            echo "Se agregaron los datos";
            fclose($fileWrite);
        }
		else
		{
            //Abro escritura : escribo solo el array vacio
            $file = fopen("vehiculo.txt", "w");
            $emptyArray = [];
            array_push($emptyArray, $vehiculoJson);

            $encodedArray = json_encode($emptyArray);
            fwrite($file, $encodedArray);

            echo "Se genero el archivo";
            fclose($file);
        }

    }

    public static function consultarVehiculo($dato,$tipoDato)
    {
        $lineaObjeto = [];

        if(file_exists("vehiculo.txt"))
        {
            $fileRead = fopen("vehiculo.txt", "r");
            while(!feof($fileRead))
            {
                $linea = fgets($fileRead);
                $lineaObjeto = json_decode($linea);
            }
            fclose($fileRead);

            foreach($lineaObjeto as $arrayObj)
            {
                if($arrayObj->$tipoDato == $dato)
                {
					if($tipoDato=="marca" || $tipoDato=="patente")
					{
						var_dump("Se encontro la ".$tipoDato." ".$dato);
					}
					else
					{
						var_dump("Se encontro el modelo".$dato);
					}
                }
            }
            
            /*if ($lineaObjeto->dato == $dato) {
                var_dump("se encontro el dato ".$lineaObjeto->dato);
            }*/
            
        }
		else
		{
            if($tipoDato=="marca" || $tipoDato=="patente")
			{
				echo "No se encontro la ".$tipoDato;
			}
			else
			{
				echo "No se encontro el modelo";
			}
        }
    }
}

$app = new \Slim\App(['settings' => $config]);

$app->post('/datos[/]', function (Request $request, Response $response)
{
    $arrayDeParametros = $request->getParsedBody();
	$vehiculo = new Vehiculo($arrayDeParametros['marca'],$arrayDeParametros['modelo'],
	$arrayDeParametros['patente'],$arrayDeParametros['precio']);
    // $objeto->marca=;
    // $objeto->modelo=;
	// $objeto->patente=;
	// $objeto->precio=;

	echo $arrayDeParametros['marca'];
	
    $newResponse = $response->withJson($vehiculo, 200);
    return $newResponse;
});

$app->run();

$vehiculo = (object)($_POST);
$respuesta = (object)[];

if (isset($_FILES) && isset($vehiculo)) 
{	
	if (empty($documentContent))
	{
		$vehiculos = array();
	}else
	{
		$vehiculos = json_decode($documentContent);
	}
	
	$cantidadVehiculos = count($vehiculos);
	
	if ($cantidadVehiculos == 0)
	{
		array_push($vehiculos, $vehiculo);
	}else 
	{
		for ($i = 0; $i < $cantidadVehiculos; ++$i ) 
		{
			if ($vehiculo->patente == $vehiculos[$i]->patente) 
			{
				$respuesta->mensaje = "este vehiculo ya existe";
				//$respuesta->mensaje = "vehiculo ".$vehiculo->patente." actualizado.";
				//$vehiculos[$i] = $vehiculo;
				break;
			} else 
			{
				$respuesta->mensaje = "vehiculo ".$vehiculo->patente." creado";
				array_push($vehiculos, $vehiculo);
			}
		}
	}	
			
	//var_dump ($vehiculos);
	$info = json_encode($vehiculos);

	$respuesta->status = 200;
	$respuesta->vehiculo = $vehiculo;

	echo json_encode($respuesta);
	
}

?>