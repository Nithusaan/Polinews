<?php
// Include the file that contains the IobcPDO class.
require_once 'class/IobcPDO.class.php';

// Create an instance of IobcPDO and get the connection.
$iobcPDO = new IobcPDO();
$conn = $iobcPDO->getConnection();

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier si l'email existe déjà
    $checkEmailStmt = $conn->prepare("SELECT email FROM users WHERE email = :email");
    $checkEmailStmt->bindValue(':email', $email, PDO::PARAM_STR);
    $checkEmailStmt->execute();

    if ($checkEmailStmt->fetch()) {  // Si un enregistrement est trouvé, l'email existe déjà
        $message = "Email already existing";
        $toastClass = "#007bff"; // Couleur primaire
    } else {
        // Préparation et binding
        $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password)");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

        if ($stmt->execute()) {
            $message = "Account successfully created";
            $toastClass = "#28a745"; // Couleur de succès
        } else {
            $message = "Error: " . $stmt->errorInfo()[2];
            $toastClass = "#dc3545"; // Couleur d'erreur
        }
    }

    // Nettoyer
    $checkEmailStmt = null;
    $stmt = null;
    $conn = null;
}

class register extends Base
{
     public $monPDO;

    public function faire_body()
    {
        $message = '<div class="popup-container">
  <div class="popup">
    <!-- Partie gauche : Créer un compte -->
    <div class="popup-left">
      <h2>Create account</h2>
      <?php if ($message): ?>
          <div class="message" style="background-color: <?php echo $toastClass; ?>;">
              <?php echo $message; ?>
          </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <input type="text" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
          <input type="email" id="email" name="email" placeholder="E-mail" required>
        </div>
        <div class="form-group">
          <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn-create-account">Create account</button>
      </form>
      
      <div class="social-buttons">
        <button class="social-button">Sign in with Google</button>
        <button class="social-button">Sign in with Apple</button>
      </div>
    </div>
    
    <!-- Partie droite : Se connecter -->
    <div class="popup-right">
      <h2>Log In</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do 
        eiusmod tempor incididunt ut labore et dolore magna aliqua.
      </p>
      <button class="btn-login" onclick="window.location.href=\'index.php?action=login\'">Log In</button>
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
