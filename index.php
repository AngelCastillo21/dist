<!--<script src="path/to/chartjs/dist/Chart.js"></script>
//<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css"></script>
//<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
//<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
//<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
//<script src="'.completeDirectory.'src/chart.js"></script>

//echo '<meta http-equiv="refresh" content="0;URL='.completeDirectory.'/index.php">';
//echo '<a href="https://www.facebook.com/Roylaser31">Download HERE!</a>';
?>-->
<p>
mediana = suma de todos los numero y dividirlos entre los numeros que son
moda = frecuencia con la que

problema eje x altura
eje y n de estudiados
</p>

<?php

require("inc/constants.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <style media="screen">
            input.textNormal{
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
                border-radius: 25px;
                width:100px;
            }
            textarea.textDatos{
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
                border-radius: 25px;
                width:50%;
            }
        </style>
        <meta charset='utf-8'>
        <title>Distribucion</title>
    </head>
    <body>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js'></script>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

        <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'>

        <p id="p1"></p><p id="p2"></p>

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
        var mean = 0;
        var mode = 0;
        var median = 0;
        var labels = [];
        var leng = datos.length;
        //let labels = datos.sort();
        mean = findMean(datos);
        mode = findMode(datos);
        median = findMedian(datos);
        dataYaX = getData(datos);

        var myChart = new Chart(ctx, {
                    type: 'line',
            data: {
                labels: dataYaX[1],
                datasets: [{
                    label: '# of Votes',
                    data: dataYaX[0],
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.5)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var pa1 = "El Siguiente estudio de <input type='text' id='dataY' class='textNormal' placeholder='data Y'></input> ";
        pa1 += "personas que fueron estudiadas para revisar <input type='text' id='dataX' class='textNormal' placeholder='data X'></input> ";
        pa1 += "<br>la distribucion normal de la misma los datos que salieron fueron los siguientes<br>";
        pa1 += "<textarea id='datos' class='textDatos' placeholder='values'>"+datos.toString()+"</textarea><br>";
        pa1 += "y tener que el valor de la media="+mean+",moda="+mode+",mediana="+median+"";
        document.getElementById("p1").innerHTML = pa1;
        //document.getElementById("p2").innerHTML = pa2;

        function getData(datos){
            var cont = 0;
    		var repetidos = [];
            var valores = [];
            var ant = 0;
    		var total_numeros = datos.length;

    		for (var i = 0; i < total_numeros; i++) {
    			for (var j = 0; j < total_numeros; j++) {
                    if (parseInt(datos[i]) == parseInt(datos[j])) {
                        cont++;
                    }
    			}
                if (ant == 0) {
                    ant = datos[i];
                    repetidos.push(cont);
                    valores.push(datos[i]);
                } else if (ant != datos[i]){
                    ant = datos[i];
                    repetidos.push(cont);
                    valores.push(datos[i]);
                }
                cont = 0;
            }
            return [
                repetidos,
                valores
            ];
        }
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
