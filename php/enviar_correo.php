<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['email'];

    $mail = new PHPMailer(true);
    try {
        // Habilitar debugging
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';

        // Configuración del servidor de correo
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Usar el servidor SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'p4ym4ster@gmail.com'; // Tu correo de Gmail
        $mail->Password = 'p4ymaster4.'; // Tu contraseña de aplicación
        $mail->SMTPSecure = 'tls';
        $mail->Port = 25;

        // Configuración del correo
        $mail->setFrom('p4ym4ster@gmail.com', 'PayMaster');
        $mail->addAddress($to);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Correo de Prueba';
        $mail->Body    = 'Este es un correo de prueba enviado desde nuestro formulario web.';

        $mail->send();
        echo 'Correo enviado exitosamente.';
    } catch (Exception $e) {
        echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
    }
}