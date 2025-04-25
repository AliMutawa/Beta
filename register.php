<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "البريد الإلكتروني غير صالح";
        exit();
    }

    // تأكد من وجود بيانات
    if (empty($username) || empty($password)) {
        echo "يجب ملء جميع الحقول!";
        exit();
    }

    // تشفير كلمة المرور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // إدخال البيانات في قاعدة البيانات
    $stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $username, $hashed_password);

    if ($stmt->execute()) {
        echo "تم إنشاء الحساب بنجاح!";
    } else {
        echo "خطأ في إنشاء الحساب.";
    }

    $stmt->close();
    $conn->close();
}
?>
