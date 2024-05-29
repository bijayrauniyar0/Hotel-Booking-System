<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Generate a random OTP
        $otp = rand(100000, 999999);

        // Send the OTP via email
        $mail = new PHPMailer(true);
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'andreysandrey.10@gmail.com'; // Your Gmail email address
            $mail->Password = 'mmnm yqes yozb zewe'; // Your Gmail password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587; // TCP port to connect to
        
            // Sender and recipient settings
            $mail->setFrom('verse@resort.com', 'Verse Resort'); // Sender's email address and name
            $mail->addAddress($email); // Recipient's email address
        
            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'OTP Email Verification';
            $mail->Body = 'OTP for email verification is: ' . $otp;
        
            // Send the email
            $mail->send();
            echo $otp;
        } catch (Exception $e) {
            echo "Email sending failed: {$mail->ErrorInfo}";
        }
    } else {
        echo "No email address provided.";
    }
} else {
    echo "Invalid request method.";
}
?>
