 <?php
 ob_start();
 require_once('includes/load.php');
 if ($session->isUserLoggedIn(true)) {
     redirect('home.php', false);
 }
 ?>
<?php include_once('layouts/header.php'); ?>

<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .login-page {
        max-width: 400px;
        width: 100%;
        margin: 0 auto;
        padding: 40px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    
    .text-center {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .text-center h1 {
        color: #333;
        margin-bottom: 10px;
        font-size: 32px;
    }
    
    .text-center h4 {
        color: #666;
        font-weight: normal;
        font-size: 16px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .control-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
        font-size: 14px;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #d9534f;
        box-shadow: 0 0 0 3px rgba(217, 83, 79, 0.1);
    }
    
    .btn {
        width: 100%;
        padding: 12px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.3s;
        border-radius: 5px;
    }
    
    .btn-danger {
        background-color: #d9534f;
        color: white;
    }
    
    .btn-danger:hover {
        background-color: #c9302c;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(217, 83, 79, 0.3);
    }
    
    .btn-danger:active {
        transform: translateY(0);
    }
    
    .forgot-password {
        text-align: right;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    
    .forgot-password a {
        color: #d9534f;
        font-size: 13px;
        text-decoration: none;
    }
    
    .forgot-password a:hover {
        text-decoration: underline;
    }
    
    .register-link {
        text-align: center;
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid #eee;
    }
    
    .register-link p {
        color: #666;
        margin-bottom: 15px;
        font-size: 14px;
    }
    
    .btn-register {
        display: inline-block;
        padding: 12px 40px;
        background-color: #5bc0de;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s;
        font-weight: 600;
        font-size: 14px;
    }
    
    .btn-register:hover {
        background-color: #46b8da;
        text-decoration: none;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(91, 192, 222, 0.3);
    }
    
    .btn-register:active {
        transform: translateY(0);
    }
    
    .alert {
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 5px;
        font-size: 14px;
    }
    
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .close {
        float: right;
        font-size: 20px;
        font-weight: bold;
        line-height: 1;
        color: #000;
        opacity: 0.5;
        cursor: pointer;
        background: transparent;
        border: none;
    }
    
    .close:hover {
        opacity: 0.8;
    }
</style>

<div class="login-page">
    <div class="text-center">
       <h1>Login Panel</h1>
       <h4>Inventory Management System</h4>
    </div>
     
    <?php echo display_msg($msg); ?>
     
    <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
            <label for="username" class="control-label">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Enter username" required autofocus>
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>
        <div class="forgot-password">
            <a href="change_password.php">Forgot Password?</a>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger">Login</button>
        </div>
    </form>
    
    <div class="register-link">
        <p>Don't have an account?</p>
        <a href="registration.php" class="btn-register">Create New Account</a>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>

