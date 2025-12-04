 <?php
 ob_start();
 require_once('includes/load.php');
 if ($session->isUserLoggedIn(true)) {
     redirect('home.php', false);
 }
 ?>
<?php
// Process registration
if (isset($_POST['register'])) {
    $req_fields = array('firstname', 'lastname', 'username', 'email', 'password', 'phone', 'address', 'birthdate', 'age', 'gender');
    validate_fields($req_fields);

    if (empty($errors)) {
        $firstname = remove_junk($db->escape($_POST['firstname']));
        $lastname = remove_junk($db->escape($_POST['lastname']));
        $username = remove_junk($db->escape($_POST['username']));
        $email = remove_junk($db->escape($_POST['email']));
        $password = remove_junk($db->escape($_POST['password']));
        $phone = remove_junk($db->escape($_POST['phone']));
        $address = remove_junk($db->escape($_POST['address']));
        $birthdate = remove_junk($db->escape($_POST['birthdate']));
        $age = (int) $db->escape($_POST['age']);
        $gender = remove_junk($db->escape($_POST['gender']));
        $password = sha1($password);

        // Check if username already exists
        $sql = "SELECT * FROM users WHERE username = '{$username}' LIMIT 1";
        $result = $db->query($sql);
        if ($db->num_rows($result) > 0) {
            $session->msg('d', 'Sorry! Username already exists.');
            redirect('registration.php', false);
        }

        // Check if email already exists
        $sql = "SELECT * FROM users WHERE name = '{$email}' LIMIT 1";
        $result = $db->query($sql);
        if ($db->num_rows($result) > 0) {
            $session->msg('d', 'Sorry! Email already exists.');
            redirect('registration.php', false);
        }

        // Create full name
        $fullname = $firstname . ' ' . $lastname;

        // Insert new user (user_level 3 = regular user)
        $query = "INSERT INTO users (";
        $query .= "name, username, password, user_level, status";
        $query .= ") VALUES (";
        $query .= "'{$fullname}', '{$username}', '{$password}', '3', '1'";
        $query .= ")";

        if ($db->query($query)) {
            $session->msg('s', "Registration successful! Please login with your credentials.");
            redirect('index.php', false);
        } else {
            $session->msg('d', 'Sorry! Registration failed.');
            redirect('registration.php', false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('registration.php', false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>

<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 20px;
    }
    
    .page {
        padding: 20px 15px !important;
    }
    
    .registration-page {
        max-width: 980px;
        margin: 20px auto;
        padding: 40px;
        background-color: #4E7388;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        position: relative;
    }
    
    .close-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background: transparent;
        border: none;
        color: white;
        font-size: 28px;
        cursor: pointer;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        transition: background 0.3s;
        text-decoration: none;
        line-height: 1;
    }
    
    .close-btn:hover {
        background: rgba(255, 255, 255, 0.2);
    }
    
    .registration-page h1 {
        color: white;
        font-size: 28px;
        margin-bottom: 30px;
        font-weight: bold;
        text-align: center;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-bottom: 25px;
    }
    
    .form-group {
        display: flex;
        flex-direction: column;
    }
    
    .form-group label {
        color: white;
        font-size: 14px;
        margin-bottom: 8px;
        font-weight: 500;
    }
    
    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="password"],
    .form-group input[type="date"],
    .form-group input[type="number"] {
        width: 100%;
        padding: 12px 15px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        background-color: white;
        color: black;
        box-sizing: border-box;
    }
    
    .form-group input:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(94, 148, 255, 0.3);
    }
    
    .form-group input::placeholder {
        color: #999;
    }
    
    .error-message {
        color: #ff6b6b;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }
    
    .gender-group {
        display: flex;
        gap: 20px;
        margin-top: 10px;
    }
    
    .radio-label {
        display: flex;
        align-items: center;
        color: white;
        cursor: pointer;
        font-size: 14px;
    }
    
    .radio-label input[type="radio"] {
        margin-right: 8px;
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    
    .button-container {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
    }
    
    .btn-register, .btn-back {
        padding: 12px 40px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-register {
        background-color: #ABc0CE;
        color: black;
    }
    
    .btn-register:hover {
        background-color: #9ab0be;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    .btn-back {
        background-color: #6c757d;
        color: white;
    }
    
    .btn-back:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
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
    }
    
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .registration-page {
            padding: 30px 20px;
        }
        
        .button-container {
            flex-direction: column;
        }
        
        .btn-register, .btn-back {
            width: 100%;
        }
    }
</style>

<div class="registration-page">
    <a href="index.php" class="close-btn" title="Back to Login">✕</a>
    
    <h1>REGISTRATION FORM</h1>
    
    <?php echo display_msg($msg); ?>

    <form method="POST" action="registration.php">
        <div class="form-row">
            <div class="form-group">
                <label for="firstname">First Name *</label>
                <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>
            </div>

            <div class="form-group">
                <label for="lastname">Last Name *</label>
                <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="username">Username *</label>
                <input type="text" id="username" name="username" placeholder="Choose a username" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone number" maxlength="11" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="address">Address *</label>
                <input type="text" id="address" name="address" placeholder="Enter your address" required>
            </div>

            <div class="form-group">
                <label for="birthdate">Birth Date *</label>
                <input type="date" id="birthdate" name="birthdate" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" placeholder="Auto-calculated" readonly required>
            </div>

            <div class="form-group">
                <label>Gender *</label>
                <div class="gender-group">
                    <label class="radio-label">
                        <input type="radio" name="gender" value="Male" required>
                        Male
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="gender" value="Female" required>
                        Female
                    </label>
                </div>
            </div>
        </div>

        <div class="button-container">
            <a href="index.php" class="btn-back">Back to Login</a>
            <button type="submit" name="register" class="btn-register">Register</button>
        </div>
    </form>
</div>

<script>
    // Phone number validation - only allow numbers
    document.getElementById('phone').addEventListener('keypress', function(e) {
        if (!/[0-9]/.test(e.key)) {
            e.preventDefault();
        }
    });

    // Auto-calculate age from birthdate
    document.getElementById('birthdate').addEventListener('change', function() {
        const birthdate = new Date(this.value);
        const today = new Date();
        let age = today.getFullYear() - birthdate.getFullYear();
        const monthDiff = today.getMonth() - birthdate.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
            age--;
        }
        
        document.getElementById('age').value = age > 0 ? age : '';
    });
</script>

<?php include_once('layouts/footer.php'); ?>