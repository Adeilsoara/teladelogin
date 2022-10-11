<?php
require_once "conexao.php";

$username = $password = $password_confirm = "";
$username_err = $password_err = $password_confirm_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor prencha o campo";
    }elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "O usuário pode conter apenas letras, números e underline";
    }else {
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Usuário já existente";
                }else {
                    $username = trim($_POST["username"]);
                }
            }else {
                echo "Opa!! Algo de errado não está certo";
            }
            mysqli_stmt_close($stmt);
        }
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor digite uma senha!";
    }elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "A senha deve ter pelo menos 6 caracteres";
    }else {
        $password = trim($_POST["password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $password_confirm_err = "Por favor confirme a senha";
    }else {
        $password_confirm = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $password_confirm)) {
            $password_confirm_err = "Senha é divergente";
        }
    }
    
    if (empty($username_err) && empty($password_err) && empty($password_confirm_err)) {
        $sql = "INSERT INTO users (username, password) VALUES (?,?)";

        if ($stmt = mysqli_prepare($connection, $sql)) {
            mysqli_stmt_bind_param($stmt,"ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if (mysqli_stmt_execute($stmt)) {
                header("location: telalogin.php");
            }else {
                echo "Oops! Algo de errado.. tente novamente." ;
            }

            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($connection);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="justify-content-center align-items-center row">
        <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Preencha esse formulário para criar um login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username;?>">
                <span class="invalid-feedback"><?php echo $username_err;?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : '';?>" value="<?php echo $password;?>">
                <span class="invalid-feedback"><?php echo $password_err?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($password_confirm_err)) ? 'is-invalid' : '';?>" value="<?php echo $password_confirm;?>">
                <span class="invalid-feedback"><?php echo $password_confirm_err?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="telalogin.php">Login here</a>.</p>
        </form>
         </div> 
        </div>
    </div>   
</body>
</html>
