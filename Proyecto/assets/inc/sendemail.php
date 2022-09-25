<?php
require '../../PHPMailer-6.6.4/src/PHPMailer.php';
require '../../PHPMailer-6.6.4/src/SMTP.php';
require '../../PHPMailer-6.6.4/src/Exception.php';

    if($_POST){

        $destino = "ignacioquezada@fasipchile.com"
        $nombre = $_POST['nombre'];
        $email = $_POST['correo'];
        $mensaje = $_POST['mensaje'];


        $smtHost = "mail.fasipchile.com";
        $smtUsuario = "contacto@fasipchile.com";
        $smtClave = "0W7Sg?oF.tSy";


        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->CharSet = "utf-8";

        //VALORES A MODIFICAR // 

        $mail->Host = $smtHost;
        $mail->Username = $smtUsuario;
        $mail->Password = $smtClave;

        $mail->From = $email;
        $mail->FromName = $nombre;
        $mail->AddAddress($destino);

        $mail->Subject = "Contacto Fasip";
        $mensajeHtml = n12br($mensaje);
        $mail->body = "
        <html>
        
        <body>
        
        <h1>Correo Desde Contacto FASIP</h1>
        
        <p> Informaciòn enviada por el usuario: </p>
        
        <p>nombre: {$nombre}</p>

        <p>email: {$email}</p>

        <p>mensaje: {$mensaje}</p>

        </body>

        </html>

        <br />";
        $mail->AltBody = "{$mensaje} \n\n ";

        //FIN VALORES A MODIFICAR // 

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'verify_self_signed' => true
            )
        );

        $estadoEnvio = $mail->Send();
       if($estadoEnvio){
        header("Location:http://fasipchile.com/contact.html");
       } else{
        echo "Hubo problemas con el envio";
        exit();
       }
    }else{
        echo "No hay Datos que procesar"
        exit();
    }
?>