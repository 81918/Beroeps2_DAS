<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

header('Content-Type: application/json');
if ($name === ''){
    print json_encode(array('message' => 'Naam Mag Niet Leeg zijn!', 'code' => 0));
    exit();
}
if ($email === ''){
    print json_encode(array('message' => 'Email mag niet leeg zijn!', 'code' => 0));
    exit();
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
        exit();
    }
}
if ($subject === ''){
    print json_encode(array('message' => 'Onderwerp Mag Niet Leeg Zijn!', 'code' => 0));
    exit();
}
if ($message === ''){
    print json_encode(array('message' => 'Bericht veld is leeg!', 'code' => 0));
    exit();
}

$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "yknoopn3d@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Email successfully sent!', 'code' => 1));
exit();
