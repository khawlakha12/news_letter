<!DOCTYPE html>
<html>
<head>
    <title>Reset Your Password</title>
</head>
<body>
    <div style="background-color: #f4f4f4; padding: 20px; text-align: center;">
        <div style="max-width: 600px; margin: auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,.1);">
            <h2 style="color: #333; margin-bottom: 30px;">Password Reset Request</h2>
            <p style="margin-bottom: 40px; font-size: 16px; color: #555;">You're receiving this email because we received a password reset request for your account. If you did not request a password reset, no further action is required.</p>
            <a href="{{ $url }}" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">Reset Password</a>
            <p style="margin-top: 40px; font-size: 14px; color: #666;">If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>
            <a href="{{ $url }}" style="font-size: 14px; color: #007bff;">Reset Password</a>
        </div>
    </div>
</body>
</html>
