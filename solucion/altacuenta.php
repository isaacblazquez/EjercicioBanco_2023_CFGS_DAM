
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link href="css\bootstrap.min.css" rel="stylesheet">
        <title>PHP BANK</title>
    </head>
    <body>
        <main>
            <?php  include 'includes/navBars/mainNavBar.php';  ?>

            <?php  include 'includes/forms/formAltaCuenta.php';  ?>
        </main>
        <script>
        function mostrarCampo(){
            var campo = document.getElementById('divSaldoMinimo');
            if (document.getElementsByName("tipo_cuenta")[1].checked){
                campo.style.display ="block";
            }else{
                campo.style.display ="none";
            }
        }
    </script>
        <script src="assets\js\bootstrap.bundle.min.js"></script> 
    </body>
    
</html>