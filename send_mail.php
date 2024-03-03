<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Alıcı, konu ve e-posta içeriğini belirle
    $to = "devx.burak@gmail.com"; // Alıcı e-posta adresi
    $subject = "Yeni İletişim Formu Mesajı: $name";
    $email_content = "Ad: $name\n";
    $email_content .= "E-posta: $email\n\n";
    $email_content .= "Mesaj:\n$message\n";

    // E-posta başlıklarını belirle
    $email_headers = "From: $name <$email>";

    // mail() fonksiyonu ile e-postayı gönder
    if (mail($to, $subject, $email_content, $email_headers)) {
        // E-posta başarıyla gönderildiyse, kullanıcıyı bir teşekkür sayfasına yönlendir
        header("Location: thank_you.html");
    } else {
        // E-posta gönderilemezse, hata mesajı göster
        echo "Oops! Bir şeyler yanlış gitti ve mesajınız gönderilemedi.";
    }
} else {
    // Form doğrudan erişilirse, ana sayfaya yönlendir
    header("Location: index.html");
    exit;
}
?>
