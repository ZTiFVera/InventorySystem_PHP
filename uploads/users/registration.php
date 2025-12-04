<?php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    
    // Process your data here (database insert, etc.)
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #4E7388;
            border-radius: 10px;
            padding: 40px;
            width: 100%;
            max-width: 964px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .close-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        h1 {
            color: white;
            font-size: 28px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            color: white;
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"] {
            padding: 12px 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            background-color: white;
            color: black;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus {
            outline: none;
            box-shadow: 0 0 0 2px #5e94ff;
        }

        input::placeholder {
            color: #999;
        }

        .error-message {
            color: #ff4444;
            font-size: 12px;
            margin-top: 5px;
            min-height: 18px;
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

        input[type="radio"] {
            margin-right: 8px;
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #5e94ff;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .btn-register {
            background-color: #ABc0CE;
            color: black;
            border: none;
            padding: 12px 40px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-register:hover {
            background-color: #9ab0be;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .form-container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <button class="close-btn" onclick="window.close()">?</button>
        
        <h1>REGISTRATION FORM</h1>

        <form method="POST" action="register.php" id="registrationForm">
            <div class="form-row">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter your Name">
                    <span class="error-message" id="error-firstname"></span>
                </div>

                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Lastname">
                    <span class="error-message" id="error-lastname"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address">
                    <span class="error-message" id="error-address"></span>
                </div>

                <div class="form-group">
                    <label for="birthdate">Birth Date</label>
                    <input type="date" id="birthdate" name="birthdate">
                    <span class="error-message" id="error-birthdate"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email Address">
                    <span class="error-message" id="error-email"></span>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" placeholder="">
                    <span class="error-message" id="error-age"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your Phone Number" maxlength="11">
                    <span class="error-message" id="error-phone"></span>
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="gender-group">
                        <label class="radio-label">
                            <input type="radio" name="gender" value="Male">
                            Male
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="gender" value="Female">
                            Female
                        </label>
                    </div>
                    <span class="error-message" id="error-gender"></span>
                </div>
            </div>

            <div class="button-container">
                <button type="submit" class="btn-register">Register</button>
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

        // Form validation
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            
            // Validate firstname
            const firstname = document.getElementById('firstname').value.trim();
            if (firstname === '') {
                document.getElementById('error-firstname').textContent = 'First name is required';
                isValid = false;
            }
            
            // Validate lastname
            const lastname = document.getElementById('lastname').value.trim();
            if (lastname === '') {
                document.getElementById('error-lastname').textContent = 'Last name is required';
                isValid = false;
            }
            
            // Validate address
            const address = document.getElementById('address').value.trim();
            if (address === '') {
                document.getElementById('error-address').textContent = 'Address is required';
                isValid = false;
            }
            
            // Validate birthdate
            const birthdate = document.getElementById('birthdate').value;
            if (birthdate === '') {
                document.getElementById('error-birthdate').textContent = 'Birth date is required';
                isValid = false;
            }
            
            // Validate email
            const email = document.getElementById('email').value.trim();
            if (email === '') {
                document.getElementById('error-email').textContent = 'Email is required';
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                document.getElementById('error-email').textContent = 'Invalid email format';
                isValid = false;
            }
            
            // Validate age
            const age = document.getElementById('age').value;
            if (age === '' || age < 1) {
                document.getElementById('error-age').textContent = 'Valid age is required';
                isValid = false;
            }
            
            // Validate phone
            const phone = document.getElementById('phone').value.trim();
            if (phone === '') {
                document.getElementById('error-phone').textContent = 'Phone number is required';
                isValid = false;
            } else if (phone.length < 10) {
                document.getElementById('error-phone').textContent = 'Phone number must be at least 10 digits';
                isValid = false;
            }
            
            // Validate gender
            const gender = document.querySelector('input[name="gender"]:checked');
            if (!gender) {
                document.getElementById('error-gender').textContent = 'Please select a gender';
                isValid = false;
            }
            
            if (isValid) {
                // Submit the form
                this.submit();
            }
        });
    </script>
</body>
</html>