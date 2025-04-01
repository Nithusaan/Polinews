<?php
require_once 'class/IobcPDO.class.php';

// Create an instance of IobcPDO and get the connection.
$iobcPDO = new IobcPDO();
$conn = $iobcPDO->getConnection();

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the query with a named placeholder
    $stmt = $conn->prepare("SELECT password_hash FROM users WHERE email = :email");

    // Bind the email parameter
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);

    // Execute the query
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $db_password = $result['password_hash'];

        // Verify the password
        if (password_verify($password, $db_password)) {
            $message = "Login successful";
            $toastClass = "bg-success";

            // Start session and redirect to dashboard
            session_start();
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            $message = "Incorrect password";
            $toastClass = "bg-danger";
        }
    } else {
        $message = "Email not found";
        $toastClass = "bg-warning";
    }

    // Close the statement and connection
    $stmt = null;
    $conn = null;
}

class login extends Base
{
     public $monPDO;

    public function faire_body()
    {
        $message = '
<div class="popup-container">
  <div class="popup">
    <!-- Partie gauche : Log In -->
    <div class="popup-left">
      <h2>Log In</h2>
      <!-- Affichage du message si défini -->
      <?php if ($message): ?>
        <div class="alert <?php echo $toastClass; ?>">
          <?php echo $message; ?>
        </div>
      <?php endif; ?>
      <form action="" method="post">
        <div class="form-group">
          <input type="email" name="email" id="email" placeholder="E-mail" required>
        </div>
        <div class="form-group">
          <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn-create-account">Log In</button>
      </form>
      
      <div class="social-buttons">
        <button type="button" class="social-button">Sign in with Google</button>
        <button type="button" class="social-button">Sign in with Apple</button>
      </div>
    </div>
    
    <!-- Partie droite : Create Account -->
    <div class="popup-right">
      <h2>Create account</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      </p>
      <button class="btn-login" onclick="window.location.href=\'index.php?action=register\'">Create account</button>
    </div>
  </div>
</div>';
        return $message;
    }
    
public function __toString()
    {
        return $this->laPage();
    }
}
?>
