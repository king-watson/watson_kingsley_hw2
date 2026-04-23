<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        require 'connect.php';

        $recipient = 'watsonkingsley38@gmail.com';

        $subject = 'Inquiry from kingsleywatson.com';

        $first_raw = $_POST['first_name'] ?? '';
        $email_raw = $_POST['email'] ?? '';
        $msg_raw = $_POST['message'] ?? '';

        $first = trim(strip_tags($first_raw));

        $email_clean = str_replace(["\r", "\n", "%0a", "%0d"], '', trim($email_raw));

        $visitor_email = filter_var($email_clean, FILTER_VALIDATE_EMAIL);

        $message = trim(strip_tags($msg_raw));

        $fail = [];

        if ($first === '') {
            $fail[] = 'first_name';
        }

        if (!$visitor_email) {
            $fail[] = 'email';
        }

        if ($message === '') {
            $fail[] = 'message';
        }

        if (!empty($fail)) {
            echo '<p><strong>Validation failed.</strong></p>';
            echo '<p>Please fix: ' . htmlspecialchars(implode(', ', $fail), ENT_QUOTES, 'UTF-8') . '</p>';
            exit;
        }
        
        $stmt = $connect->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $first, $visitor_email, $message);
        $stmt->execute();
        $stmt->close();
        $connect->close();

        $emailBody = "You received a new inquiry:\r\n\r\n";
        $emailBody .= "Name: {$first}\r\n";
        $emailBody .= "Email: {$visitor_email}\r\n\r\n";
        $emailBody .= "Message:\r\n{$message}\r\n";

        $fromAddress = "no-reply@kingsleywatson.com";

        $headers = "From: Kingsley Watson Portfolio <{$fromAddress}>\r\n";
        $headers .= "Reply-To: {$visitor_email}\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

        $sent = mail($recipient, $subject, $emailBody, $headers);

        if ($sent) {
            $thankyou = urlencode("Thank you for contacting me, " . $first . ". You'll get a reply within 24 hours.");
            header("Location: ../contact.php?msg=$thankyou");
            exit();
        } else {
            $thankyou = urlencode("Sorry, your message was not sent. It may be a problem on my end. Try Again!");
            header("Location: ../contact.php?msg=$thankyou");
            exit();
        }

    } else {
        echo "<p>These are not the droids you are looking for...</p>";
    }
?>