<?php

class FeedbackForm {
    public $firstname;
    public $lastname;
    public $email;
    public $message;
    
    public function __construct() {
        $this->firstname = $_POST['firstname'] ?? '';
        $this->lastname = $_POST['lastname'] ?? '';
        $this->email = $_POST['email'] ?? '';
        $this->message = $_POST['message'] ?? '';
    }
    
    public function displayForm() {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Contact us form using PHP MySQL</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        </head>
        <body>
            <div class="container">
                <h3>Submit Feedback</h3>
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="Firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" required value="<?php echo $this->firstname; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Lastname">Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" required value="<?php echo $this->lastname; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required value="<?php echo $this->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Message">Message</label>
                        <input type="text" name="message" id="message" class="form-control" required value="<?php echo $this->message; ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
                
                <h3>Admin Access</h3>
                <form action="admin.php" method="POST">
                    <div class="form-group">
                        <label for="adminUsername">Username</label>
                        <input type="text" name="adminUsername" id="adminUsername" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="adminPassword">Password</label>
                        <input type="password" name="adminPassword" id="adminPassword" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </body>
        </html>
        <?php
    }
}

// Create an instance of the FeedbackForm class
$form = new FeedbackForm();

// Display the form
$form->displayForm();
?>
