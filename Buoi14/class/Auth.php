<?php
class Auth
{
    public $username;
    public $password;
    public $email;
    public $dateresetpass;
    public $token;

    public static function login($pdo, $name, $pass)
    {
        $sql = "SELECT * from user where username= :username";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":username", $name, PDO::PARAM_STR);

        if ($stmt->execute()) {
            if (!$data = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                return "UserName hoặc Password không đúng";
            }
            $passDB = $data[0]['password'];

            if (password_verify($pass, $passDB)) {
                $_SESSION['log_detail'] = $name;
                header("Location:index.php");
                exit();
            } else {
                return "UserName hoặc Password không đúng";
            }
        } else {
            return "UserName hoặc Password không đúng";
        }
    }

    public static function logout()
    {
        unset($_SESSION['log_detail']);
        header("Location:index.php");
        exit();
    }

    public static function getOneUserByEmail($pdo, $email)
    {
        $sql = "SELECT * FROM user WHERE email=:email";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Auth');
            return $stmt->fetch();
        } else {
            return null;
        }
    }

    public static function updateDateResetPasswordAndToken($pdo, $email, $token)
    {
        $sql = "UPDATE user SET dateresetpass=:date, token=:token where email=:email";
        $stmt = $pdo->prepare($sql);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s", time());

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':token', $token, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function updatePasswordByEmail($pdo, $password, $email)
    {
        $sql = "UPDATE user SET password=:password where email=:email";
        $stmt = $pdo->prepare($sql);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add($pdo)
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user(username, password, email) VALUES (:username, :password, :email)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
