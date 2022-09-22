<?php
$remitente = $_POST ['email'];
$destinatario = 'ignacioquezada@fasipchile.com';
$asunto = 'Asunto de ejemplo';
if (!$_POST){
?>
<?php
}else{

    $cuerpo = "Nombre: " . $_POST["nombre"] . "\r\n";
    $cuerpo .= "Asunto: " . $_POST["asunto"] . "\r\n";
    $cuerpo = "Correo: " . $_POST["correo"] . "\r\n";
    $cuerpo = "Mensaje: " . $_POST["mensaje"] . "\r\n";


    $header = "MIME-version: 1.0\n";
    $header . = "Content-type: text/plain; charset-utf-8\n";
    $header . = "X-Priority: 3\n";
    $header . = "X-Mailer: php\n";
    $header . = "From: \ "".$_POST['nombre']." ".$POST['apellido']."\" <".$remitente.">\n"

    mail($destinatario, $asunto, $cuerpo, $header);
}
?>

// <!-- if (isset($_POST['enviar'])) {
//     if (!empty($_POST['name']) && !empty($_POST['asunto']) && !empty ($_POST['message']) && !empty($_POST['email'])) {
//         $name = $_POST['name'];
//         $asunto = $_POST['asunto'];
//         $message = $_POST['message'];
//         $email = $_POST['email'];
//         $header = "From: noreply@example.com" . "\r\n";
//         $header. = "Reply-To: noreply@example.com" . "\r\n";
//         $header. =  "X-Mailer: PHP/". phpversion();
//         $mail = @mail($email,$asunto,$message,$header);
//         if (mail) {
//           echo "<h4>!Mail enviado exitosamente!</h4>";
//         }
//     }
// } -->