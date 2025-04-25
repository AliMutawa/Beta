<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // التحقق من وجود البريد الإلكتروني في قاعدة البيانات
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // إنشاء رمز استرجاع
        $token = bin2hex(random_bytes(16));

        // تخزين الرمز في قاعدة البيانات
        $stmt = $conn->prepare("UPDATE users SET reset_token = ? WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // إرسال البريد الإلكتروني
        $reset_link = "http://yourwebsite.com/reset-password.php?token=$token";
        mail($email, "استرجاع كلمة المرور", "اضغط على الرابط لاسترجاع كلمة المرور: $reset_link");

        echo "تم إرسال رابط استرجاع كلمة المرور إلى بريدك الإلكتروني.";
    } else {
        echo "البريد الإلكتروني غير موجود!";
    }

    $stmt->close();
    $conn->close();
}
?>
