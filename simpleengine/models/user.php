<?php


namespace simpleengine\models;

use simpleengine\core\Application;


class User implements DbModelInterface
{
    private $id;
    private $firstname;
    private $lastname;
    private $middlename;
    private $email;
    private $isAdmin;

    public function __construct($id = null)
    {
        if ((int)$id > 0) {
            $this->find($id);
        }
    }

    public static function auth()
    {
        if (isset($_SESSION["userId"])) {
            return new User($_SESSION["userId"]);
        }
        else {

            $email = strip_tags($_GET["email"]);
            $hashPass = md5(strip_tags($_GET["pass"]));

            $app = Application::instance();


            $users = $app->db()->getArrayBySqlQuery("SELECT * FROM users WHERE email='"
                . $email . "' AND hash_pass='" . $hashPass . "'");


            if (count($users) > 0) {
                $_SESSION["email"] = $email;
                $_SESSION["pass"] = $hashPass;
                $_SESSION["userId"] = $users[0]["id"];
                $_SESSION["isAdmin"] = $users[0]["is_admin"];
//                if (isset($_GET[rememberCheckBox])) {
//                    setcookie($_GET[email], $_GET[pass], 3600);
//                }
                return new User($users[0][id]);
            }
        }

        return null;
    }

    public function find($id)
    {
        $app = Application::instance();
        $sql = "SELECT * FROM users WHERE id =" . (int)$id;
        $result = $app->db()->getArrayBySqlQuery($sql);

        if (isset($result[0])) {
            $this->id = $result[0]["id"];
            $this->firstname = $result[0]["firstname"];
            $this->lastname = $result[0]["lastname"];
            $this->middlename = $result[0]["middlename"];
            $this->email = $result[0]["email"];
            $this->isAdmin = $result[0]["is_admin"];
        }
    }

    public function registration(){
        $email = strip_tags($_GET["email"]);
        $hashPass = strip_tags($_GET["hashPass"]);

        $app = Application::instance();

        $users = $app->db()->getArrayBySqlQuery("SELECT * FROM users WHERE email='". $email. "'");


        if (count($users) == 0) {
            $_SESSION["email"] = $email;
            $_SESSION["pass"] = $hashPass;
            $_SESSION["userId"] = $users[0]["id"];
            $_SESSION["isAdmin"] = $users[0]["is_admin"];
        }
        else {

        }
    }

    public function getUsersBasket()
    {
        $basket = new Basket($this->id);
        return $basket->getProductsArray();
    }

    public function save()
    {

    }

    /**
     * @return string firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return string middlename
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * @return string email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->isAdmin;
    }

    public function __toString()
    {
        return $this->firstname . " " . $this->lastname . " " . $this->middlename . " " .
        $this->email . " " . $this->isAdmin;
    }
}