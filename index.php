<!--<script src="path/to/chartjs/dist/Chart.js"></script>
//<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css"></script>
//<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
//<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
//<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
//<script src="'.completeDirectory.'src/chart.js"></script>

//echo '<meta http-equiv="refresh" content="0;URL='.completeDirectory.'/index.php">';
//echo '<a href="https://www.facebook.com/Roylaser31">Download HERE!</a>';
?>-->
mediana = suma de todos los numero y dividirlos entre los numeros que son
moda = frecuencia con la que

problema eje x altura
eje y n de estudiados
<?php

require("inc/constants.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Distribucion</title>
    </head>
    <body>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js'></script>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

        <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'>
        <canvas style='height:40vh; width:80vw' id='myChart'></canvas>
        <div id="result"></div>

        <script type='text/javascript'>
        var ctx = document.getElementById('myChart').getContext('2d');
        /**var datos = [
            198, 171, 195, 167, 161, 190, 163, 188, 163, 170, 196, 190, 190,
            190, 195, 181, 183, 195, 172, 199, 195, 169, 191, 186, 178, 200,
            164, 185, 195, 177, 182, 187, 195, 197, 163, 186, 163, 195, 196, 189
        ];**/

        var valorMaximo = Math.max.apply(null, datos);
        var valorMinimo = Math.min.apply(null, datos);

        var datos = [1, 2, 3, 4, 5, 6, 6, 7, 8, 9, 10, 10, 10, 10];
        let labels = datos.sort();
        var mean = 0;
        var mode = 0;
        var median = 0;
        var leng = datos.length;
        mean = findMean(datos);
        mode = findMode(datos);
        median = findMedian(datos);

        console.log(labels);

        var data = [1,2,3,4,5,6,7,8,9,10];
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                hover: {
                    // Overrides the global setting
                    mode: 'index'
                }
            }
        });

        function findMean(datos){
            var sum = 0;
            for (let i = 0;i < datos.length;i++){
                sum = sum+datos[i];
            }
            return sum/datos.length;
        }
        function findMode(datos){
            var result = document.getElementById("result");
    		result.innerHTML = "";
    		var contador = 0;
            var modeval = 0;
            var mode = 0;
    		var repetidos = [];
    		var total_numeros = datos.length;

    		for (var i = 0; i < total_numeros; i++) {
    			for (var j = 0; j < total_numeros; j++) {
    				if (parseInt(datos[i]) == parseInt(datos[j])) {
    					contador++;
                        if (modeval < contador){
                            modeval = contador;
                            mode = datos[i];
                        }
    				}
    			}

    			if (contador > 1 && repetidos.indexOf(parseInt(datos[i])) === -1) {
    				repetidos.push(parseInt(datos[i]));
                    if (modeval == contador) {
                        result.innerHTML += ("<p>El numero " + datos[i] + " se repite " + contador + " veces por lo tanto la moda es de </p>");
                    }
    			}
    			contador = 0;
    		}
            return mode;
        }
        function findMedian(datos){
            arr = datos.sort(function(a, b){ return a - b; });
            var i = arr.length / 2;
            var result = parseInt(i % 1 == 0 ? (arr[i - 1] + arr[i]) / 2 : arr[Math.floor(i)]);
            return result;
        }
        </script>

    </body>
</html>
