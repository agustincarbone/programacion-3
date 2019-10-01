<?php
//$data = json_decode(file_get_contents('php://input'), true);
//var_dump($data);
$request = $_SERVER['REQUEST_METHOD'];
switch  ($request) {
	case "POST":
	$alumno = new Alumno;
	$alumno = (object)($_POST);
	$respuesta = (object)[];
	if (isset($_FILES) && isset($alumno)) {
		savePicture($alumno->email);
		$documentContent = file_get_contents("./test.json");
		
		
		if (empty($documentContent)){
			$alumnos = array();
		} else {
			$alumnos = json_decode($documentContent);
		}
		 $cantidadAlumnos = count($alumnos);
		 if ($cantidadAlumnos == 0) {
			array_push($alumnos, $alumno);
		 } else {
			for ($i = 0; $i < $cantidadAlumnos; ++$i ) {
				if ($alumno->email == $alumnos[$i]->email) {
					$respuesta->mensaje = "Alumno ".$alumno->email." actualizado.";
					$alumnos[$i] = $alumno;
					break;
				} else {
					$respuesta->mensaje = "Alumno ".$alumno->email." creado";
					array_push($alumnos, $alumno);
				}
			}
		}
		
			
		//var_dump ($alumnos);
		$info = json_encode($alumnos);    
		$file = fopen('./test.json','w+');
		
		
		fwrite($file, $info);
		fclose($file);
		$respuesta->status = 200;
		$respuesta->alumno = $alumno;
		
		echo json_encode($respuesta);
	}
	
	
	
	break;
	
	case "GET":
	echo "ggasgasgasgsa";
	break;
}
function savePicture($fileName) {
		$target_dir = "./";
		$target_file = $target_dir.basename($_FILES["foto"]["name"]);
		$splitByDot = explode(".",$_FILES["foto"]["name"]);
		move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir.$fileName.".".$splitByDot[(count($splitByDot)-1)]);
}

class Alumno {
	public $nombre;
	public $apellido;
	public $email;
}


?>