<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once APPPATH . 'third_party/PHPMailer/Exception.php';
require_once APPPATH . 'third_party/PHPMailer/PHPMailer.php';
require_once APPPATH . 'third_party/PHPMailer/SMTP.php';

class Correo 
{
    public static function enviar($to, $nombre, $subject, $body) 
    {
        $mail = new PHPMailer(true);

        try 
        {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ivaninfonet@gmail.com'; // tu correo
            $mail->Password = 'vjaa ndtf pjou fypa';   // tu contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('ivaninfonet@gmail.com', 'Sistema de Reservas');
            $mail->addAddress($to, $nombre);

            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->isHTML(true);

            return $mail->send();

        } 
        catch (Exception $e) 
        {
            log_message('error', 'Error al enviar correo: ' . $e->getMessage());
            return false;
        }
    }
}
