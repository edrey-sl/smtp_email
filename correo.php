<?php
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$folio = $_POST['folio'];
$pdf = $_FILES['adjunto'];


$mail = new PHPMailer(true);

// meter en la base de datos puerco del mal


try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ventas@edututos.com';                     //SMTP username
    $mail->Password   = '951Sdfjsdhfkj5351';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ventas@edututos.com', 'Ventas');
    $mail->addAddress($correo, $nombre); 
        // $mail->addBCC('martinsalinasluna@gmail.com'); 
     

    // $mail->addAttachment('hola.png', 'hola.png');    //Optional name
     $mail->AddEmbeddedImage('logo.png', 'logo');
  
    //Content

    $mail->isHTML(true);   
    $mail->CharSet = 'UTF-8';                               //Set email format to HTML
    $mail->Subject = 'Recibo de Pago SSAE';
    $mail->Body    = '<div style="width: 400px; height: auto; background-color:   #E3DAC9; color:black; padding-bottom: 50px;">
    
    <div style="text-align: center; padding-top: 25px ;">
    <img src="cid:logo" style="width: 300px; height: 100px" alt="">

</div>
    <h2 style="text-align: center;  ">Recibo de Pago SSAE</h2>
    <p style="text-align: left; margin-top: 5%; padding-left:5%; color:#000;  font-size: 18px;">¡Hola!</p>
    <h3 style="text-align: left;  padding-left:5%; color:#000"> '.$nombre.'</h3>

    <p style="text-justify: auto; margin-top:35px; margin-left: 5%; margin-right: 5%; font-size: 18px;">
    <strong>Folio: '.$folio.'</strong></p>
    <p style="text-justify: auto; margin-top:35px; margin-left: 5%; margin-right: 5%; font-size: 18px;">
    Gracias por su preferencia dudas y aclaraciones favor de contactarnos.
</p>
  

    <div style="text-align: center; padding-top: 50px">
    <a href="https://ssae.mx/" style="
    text-decoration:none;
    font-weight:600;
    font-size:20px;
    color:#ffffff;
    padding-top:15px;
    padding-bottom:15px;
    padding-left:30px;
    padding-right:30px;
    background-color:#005BBB; "><strong style="letter-spacing: 0.10em;"> Visítanos </strong></a>
    </div>

    <p style="text-align: center; padding-top: 15px; font-size: 18px;">Soluciones de Software Aplicado a Empresas</p>
    <p style="text-align: center; padding-top: 15px; font-size: 18px;">Tel: 74 42 29 19 81</p>


</div>';
$mail->addAttachment($pdf['tmp_name'], $pdf['name']);
   $mail->send();   
  
             echo json_encode('exito');
         
} catch (Exception $e) {
  echo json_encode('error');
}

?>