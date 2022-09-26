<?php
        echo "Mailer Instnaciado";
        require '../../PHPMailer-5.2-stable/PHPMailerAutoload.php';

        $nombre = $_POST['nombre'];
        $email = $_POST['correo'];
        $mensaje = $_POST['mensaje'];
            
        $mail = new PHPMailer;
        echo "Mailer Instnaciado";
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        
        $mail->isSMTP();                                      // Set mailer to use SMTP
        echo "Mailer configurador para SMTP";
        $mail->Host = 'mail.fasipchile.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'contacto@fasipchile.com';                 // SMTP username
        $mail->Password = 'Broly_12';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        echo "Mailer Sesiòn configurador";
        
        $mail->setFrom('contacto@fasipchile.com', 'Contacto');
        $mail->addAddress('matydavis0125@gmail.com', 'Matìas Romero');     // Add a recipient
        echo "Mailer Contacto añadidos";
        // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject = 'Contacto Fasip';
        $mail->Body    = "<html>
        
        <body>

        <h1> Informaciòn enviada por el usuario: </h1>
        
        <p>nombre: {$nombre}</p>

        <p>email: {$email}</p>

        <p>mensaje: {$mensaje}</p>

        </body>

        </html>

        <br />";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        echo "Mailer Cuerpo del correo";
        
        echo "Enviando correo...";
        if(!$mail->send()) {
            echo "Mailer Cuerpo del correo";
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
?>