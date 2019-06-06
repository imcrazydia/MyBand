<?php 

function url_nav()
{
    return "/periode1.4/proj/myband/public";
}

function open_connection()
{
    // Connection to the database: localhost
    $config = require 'db_config.php';
    $connection = new PDO("mysql:host=" . $config['db_host'] . ";dbname=" . $config['db_name'], $config['db_user'], $config['db_pass']);
    
    return $connection;
}

function close_connection(&$connection)
{
    $connection = null;
}

function url_to($path)
{
    return url_nav() . $path;
}

function login($username, $password)
{
    $pdo = open_connection();

  //Check if username is empty
  if(empty(trim($username))) {
    $username_err = "Please enter username.";
  } else {
    $username = trim($username);
  }

  // Check if password is empty
    if(empty(trim($password))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($password);
    }

    //Validate credentials
    if(empty($username_err) && empty($password_err)){
      //Prepare a select statement
      $sql = "SELECT id, username, password FROM users WHERE username =
      :username AND verificatie_code = ''";

      if($stmt = $pdo->prepare($sql)){
        //Bind var to the prepared statement as parameters
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

        //Set parameters
        $param_username = trim($username);

        //Attempt to execute the prepared statement
        if($stmt->execute()){
          //Check if username exists, if yes then verify password
          if($stmt->rowCount() == 1){
            if($row = $stmt->fetch()){
              $id = $row["id"];
              $username = $row["username"];
              $hashed_password = $row["password"];
              if(password_verify($password, $hashed_password)){
                //Password is correct, so start a new session
                session_start();

                //Store data in session var
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;

                return true;

              } else {
                //Display an error message if password is not valid
                return "The password you entered was not valid.";
              }
            }
          } else {
            //Display an error message if username doesn't exist
            return "No account found with that username.";
          }
        } else {
          return false;
        }
      }

      //Close statment
      unset($stmt);
    }

  
}

function alreadyLogged()
{
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("Location: " . url_to('/'));
        exit;
      }
}

function register($username, $password, $email, $confirm_password)
{

    // Validate username
    if(empty(trim($username))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($username);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($username);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Validate password
    if(empty(trim($password))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($password)) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($password);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    //Validate Email
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if(!$email){
    // Ongeldige email
    $email_err = 'Please enter a email address.';
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, verificatie_code, email, user_pic) VALUES (:username, :password, :verificatie_code, :email, :user_pic)";

        if($stmt = $pdo->prepare($sql)){
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            $param_profPic = $default_pic;
            $random_bytes = bin2hex(random_bytes(32));
            $param_verificatie = hash('md5', $random_bytes);

            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":user_pic", $param_profPic, PDO::PARAM_STR);
            $stmt->bindParam(":verificatie_code", $param_verificatie, PDO::PARAM_STR);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                //header("location: login.php");

            $verify_link = 'http://25682.hosts2.ma-cloud.nl/bewijzenmap/periode1.4/proj/myband/private/verify.php?code=' . $param_verificatie . '&e=' . $_POST['email'];

            $email_to = $_POST['email'];
            $email_from = '25682@ma-web.nl';
            $subject = 'Verificatie The Wall';

            // Hier maken we een heel kort email bericht
            $message = 'Beste ' . $_POST['username'] . ', ' . "\n" . 'Iemand gebruikt dit email address om in te loggen op onze site,'
            . "\n" . 'als u dit bent klik op deze link om je account te bevestigen: ' . "\n" .  $verify_link ;

            // Het afzender en reply-to adres moeten we in een speciale $headers string zetten
            $headers = 'From:' .  $email_from . "\r\n";
            $headers .= 'Reply-To:' .  $email_from . "\r\n";

            $result = mail (
             $email_to,
             $subject,
             $message,
             $headers
            );

            if(!$result){
             echo 'Er ging iets fout bij het versturen van de verificatie e-mail';
             exit;
            } else{
             echo '<h2>Klik de link in de verificatie email om je account te bevestigen</h2>';
             exit;
            }

            } else{
                echo "Something went wrong. Please try again later.";
                echo '<a href="register">Back</a>';
            }
        }

        // Close statement
        unset($stmt);
    }
}

function verify()
{
    // In de superglobal $_GET zitten alle parameters in de url
$verificatie_code = filter_var($_GET['code'], FILTER_SANITIZE_STRING);
$email = filter_var($_GET['e'], FILTER_VALIDATE_EMAIL);

//Als er gegevens missen dan stoppen we met een foutmelding
if(empty($verificatie_code) || empty($email)){
    echo 'Ongeldige gegevens!';
    exit();
}

// Dit doen we met een prepared statement
$sql = 'SELECT * FROM users WHERE verificatie_code = ? AND email = ?';
$statement = $pdo->prepare($sql);

// Een array met voor elk vraagteken in de query een waarde
$data = [
    $verificatie_code,
    $email
];
$result = $statement->execute($data);

if(!$result){
    echo "Fout bij ophalen van gegevens";
    exit();
}

// Haal het eerste resultaat op (de gevonden gebruiker)
$username = $statement->fetch();

// Als $gebruiker leeg is, dan is de link ongeldig OF al gebruikt
if(empty($username)){
    echo 'Ongeldige verificatie link of al gebruikte';
    exit();
}

// Als we tot hier komen is er dus een rij gevonden in de database!
// Nu kunnen we de verificatie code leegmaken en een melding tonen
$users_id = $username['id'];
$sql = 'UPDATE users SET verificatie_code = "" WHERE id = ?';
$statement = $pdo->prepare($sql);

// Op de plek van het vraagteken in de query komt de id van de gebruiker
$data = [
    $users_id
];
$result = $statement->execute($data);

if(!$result){
    echo 'Er ging iets fout bij het opslaan van de gegevens';
    exit();
} else {
  echo '<h2>Verificatie gelukt, je kunt nu <a href="login">inloggen</a>.</h2>';
 }
}

?>