<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index1.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>

<body>





    <div class="background">

        <div class="login">
            <div class="image"></div>
            <div class="text-form">
                <h1> Taalum Learning Platform</h1>
                <p> Create A new Taalum Account </p>
                <div class="error" style="color:red;">
                <?php
                
            if( isset($_GET['error']) && $_GET['error']== 'existEmailuser'){
                echo 'Existed email user !';
            }
              
              ?>
            </div>
                <form action="incsignup.php" method="post" name="signupForm">
                    <div class="icon-input">
                        <i class="fa-solid fa-user"></i><input type="text" name="email" placeholder="Enter An Email"
                            required>
                    </div>
                    <div class="icon-input">
                        <i class="fa-solid fa-user"></i><input type="text" name="username"
                            placeholder="Enter A User-Name" required>
                    </div>
                    <div class="icon-input">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" required name="pass" placeholder="Enter a Password">
                    </div>
                    <div class="icon-input">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" required placeholder="Repeat Password">
                    </div>
                    <input type="submit" class="submitbtn" name="submitbtn" value="submit">
                </form>


            </div>
        </div>

    </div>

    <script>

        function ValidUsername(username) {
            const usernameRegex = /^[a-z0-9_.]+$/
            return usernameRegex.test(username)
        }


        function CheckPassword(pass) {
            var passw=  /^[A-Za-z]\w{7,14}$/;
            if(pass.match(passw)) 
            { 
            return true;
        }
        return false;
        }


        function ValidateEmail(email) {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                return true;
            }
            return false;
        }

        const errorSect = document.querySelector('.error');
        const signupForm = document.querySelector('form');
        signupForm.addEventListener('submit', e => {
            e.preventDefault();
            errorSect.textContent = "";
            let [email, userName, pass, passrep, submit] = [...signupForm.querySelectorAll('input')];
            email = email.value;
            userName = userName.value;
            pass = pass.value;
            passrep = passrep.value;
            submit = submit.value;
            console.log(email, userName, pass, passrep, submit);
            if (!ValidateEmail(email)) {
                errorSect.textContent = 'Invalid Email Adresse !';
                return;
            }
            if (!ValidUsername(userName)) {
                errorSect.textContent = 'Invalid User Name !';
                return;
            }
            if (pass !== passrep || !CheckPassword(pass)) {
                errorSect.textContent = 'Invalid Password !';
                return;
            }
            signupForm.submit();
        })

    </script>

</body>

</html>