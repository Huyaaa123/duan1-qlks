<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/admin.css">
    <!-- loading bar -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="../css/flash.css">
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/admin.css">
    <title>BlueBird - Admin</title>

    <style>
        .containerr {
            max-width: 1200px;
            position: relative;
            left: 4%;
            padding: 40px;
            height: 800px;


        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            text-align: center;
            font-size: 16px;
            color: #339900;
        }

        form {
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            left: 45%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error{
            color:red;
        }
        .yeah{
            color:#00CC33;
        }
    </style>
</head>

<body>

    <div class="containerr">
        <h1>Gửi hỗ trợ</h1>
        <p>Đội ngũ Support của chúng tôi sẽ phản hồi ý kiến của bạn sớm nhất có thể. Cảm ơn bạn đã kiên nhẫn chờ đợi.</p>
        <form onsubmit="return validateForm()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <span class="error" id="nameError"></span><br>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
            <span class="error" id="emailError"></span><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4"></textarea>
            <span class="error" id="messageError"></span><br><br>

            <input type="submit" value="Submit"> <br>
            <span class="yeah" id="yeah"></span>
        </form>
    </div>

    <script>
    function validateForm() {
    
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var message = document.getElementById('message').value;
        var nameError = document.getElementById('nameError');
        var emailError = document.getElementById('emailError');
        var messageError = document.getElementById('messageError');
        var yeah = document.getElementById('yeah').value;
        var isValid = true;

        if (name === '') {
            nameError.textContent = 'Vui lòng điền thông tin này';
            isValid = false;
        } else {
            nameError.textContent = '';
        }

        if (email === '') {
            emailError.textContent = 'Vui lòng điền thông tin này';
            isValid = false;
        } else if (!validateEmail(email)) {
            emailError.textContent = 'Email không hợp lệ';
            isValid = false;
        } else {
            emailError.textContent = '';
        }

        if (message === '') {
            messageError.textContent = 'Vui lòng điền thông tin này';
            isValid = false;
        } else {
            messageError.textContent = '';
        }

        return isValid;
    }
    document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        if (validateForm()) {
            // Form is valid, show success message
            yeah.textContent = 'Gửi thành công! Cảm ơn bạn đã liên hệ với chúng tôi.';

            // Reset the form
            document.querySelector("form").reset();
        }
    });
});


    function validateEmail(email) {
        // Regular expression for basic email format validation
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
</script>

</body>

</html>