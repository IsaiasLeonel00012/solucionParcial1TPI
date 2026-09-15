<?php

//arreglo muldimencional 

$videojuegos = [

    [
        "nombre" => "FIFA25",
        "categoria" => "Deportes",
        "costo" => 20,
        "cantidad_maxima" => 10
    ],

    [
        "nombre" => "Tekken8",
        "categoria" => "Pelea",
        "costo" => 25,
        "cantidad_maxima" => 8
    ],

    [
        "nombre" => "Valorant",
        "categoria" => "Acción",
        "costo" => 30,
        "cantidad_maxima" => 10
    ],

    [
        "nombre" => "Mario Kart 8",
        "categoria" => "Carreras",
        "costo" => 15,
        "cantidad_maxima" => 12
    ]

];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $correo = $_POST["correo"];
    $videojuego = $_POST["videojuego"];
    $modalidad = $_POST["modalidad"];
    $experiencia = $_POST["experencia"];


    echo "nombre" . $nombre . "<br>";
    echo "edad" . $edad . "<br>";
    echo "correo" . $correo . "<br>";
    echo "videojuego" . $videojuego . "<br>";
    echo "modalidad" . $modalidad . "<br>";
    echo "experencia" . $experiencia . "<br>";


    if (

        empty($nombre) ||
        empty($edad) ||
        empty($correo) ||
        empty($videojuego) ||
        empty($modalidad) ||
        empty($experiencia)
    ) {

        echo "Todos los cambos deben ser obligatorios";
    } elseif (!is_numeric($edad)) {

        echo "la edad debe ser un numero";
    } elseif ($edad <= 0) {

        echo "la edad no debe ser menor a cero";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

        echo "El correo no es válido.";
    } else {

        echo "Datos recibidos correctamente.<br>";

        $encontrado = false;

        foreach ($videojuegos as $juego) {

            if ($juego["nombre"] == $videojuego) {

                $encontrado = true;

                echo "Videojuego: " . $juego["nombre"] . "<br>";
                echo "Categoría: " . $juego["categoria"] . "<br>";
                echo "Costo: $" . $juego["costo"] . "<br>";
                echo "Cantidad máxima: " . $juego["cantidad_maxima"] . "<br>";

                break;
            }
        }

        if (!$encontrado) {

            echo "El videojuego seleccionado no existe.";
        }
    }
}


if($edad < 18)
{
   
  if($experiencia == "principiante")
    {

      $categoriaParticipante = "Juvenil Principiante";

    }elseif($experiencia == "intermedio"){
        $categoriaParticipante = "Juvenil Intermedio";
    }else{
        $categoriaParticipante = "Juvenil Avanzado";
    }

}else{

    if($experiencia == "principiante")
    {

      $categoriaParticipante = "Juvenil Principiante";

    }elseif($experiencia == "intermedio"){
        $categoriaParticipante = "Juvenil Intermedio";
    }else{
        $categoriaParticipante = "Juvenil Avanzado";
    }

   
}

    echo "Categoría del participante: "
     . $categoriaParticipante . "<br>";





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Incripciones al Torneo</h1>

    <form method="POST">
        <label for="text">Nombre del participante</label>
        <input type="text" name="nombre">

        <br><br>

        <label for="text">Edad</label>
        <input type="number" id="edad" name="edad">


        <br><br>

        <label for="text">Correo electronico</label>
        <input type="email" id="correo" name="correo">


        <br><br>

        <label for="videojuego">VideoJuegos</label>
        <select name="videojuego" id="videojuego">
            <option value="">Selecione un Video Juego</option>
            <option value="FIFA25">FIFA25</option>
            <option value="Tekken8">Tekken8</option>
            <option value="Valorant">Valorant</option>
            <option value="Mario Kart 8">Mario Kart 8</option>

        </select>

        <br><br>

        <label for="modalidad">Modalidad de participación:</label>
        <select id="modalidad" name="modalidad">

            <option value="">Seleccione una modalidad</option>
            <option value="Individual">Individual</option>
            <option value="Equipos">Equipos</option>

        </select>

        <br><br>

        <label for="experiencia">Nivel de experiencia:</label>
        <select id="experiencia" name="experiencia">

            <option value="">Seleccione su experiencia</option>
            <option value="Principiante">Principiante</option>
            <option value="Intermedio">Intermedio</option>
            <option value="Avanzado">Avanzado</option>

        </select>

        <br><br>

        <button type="submit">enviar</button>



    </form>
</body>

</html>