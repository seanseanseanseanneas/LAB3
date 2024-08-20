<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script>
        function validateForm() {
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            document.getElementById("next").disabled = !(name && emailPattern.test(email));
        }
    </script>
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">User Registration</h1>
            <form action="instructions.php" method="post">
                <div class="field">
                    <label class="label">Complete Name</label>
                    <div class="control">
                        <input id="name" name="name" class="input" type="text" placeholder="Enter your complete name" oninput="validateForm()">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email Address</label>
                    <div class="control">
                        <input id="email" name="email" class="input" type="email" placeholder="Enter your email address" oninput="validateForm()">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Birthdate</label>
                    <div class="control">
                        <input name="birthdate" class="input" type="date">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Contact Number</label>
                    <div class="control">
                        <input name="contact" class="input" type="text" placeholder="Enter your contact number">
                    </div>
                </div>
                <div class="control">
                    <button id="next" class="button is-link" type="submit" disabled>Next</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
