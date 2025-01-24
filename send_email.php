<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $subject = htmlspecialchars($_POST['subject']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Alamat email tidak valid.");
    }

    // Email tujuan
    $to = "Official.adhome@gmail.com";

    // Subjek email
    $email_subject = "Pesan Baru: " . $subject;

    // Isi email
    $email_body = "Anda menerima pesan baru dari form.\n\n" .
        "Nama: $name\n" .
        "Email: $email\n\n" .
        "Pesan:\n$message";

    // Header email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Kirim email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Pesan berhasil dikirim!";
    } else {
        echo "Terjadi kesalahan saat mengirim pesan. Coba lagi.";
    }
} else {
    echo "Metode pengiriman tidak valid.";
}
?>