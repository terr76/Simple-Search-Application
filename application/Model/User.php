<?php

/**
 * Class Users
 * 
 * Controls everything that is user-related
 */

namespace Mini\Model;

use Mini\Core\Session;
use Mini\Core\Model;

class User extends Model
{
    /**
     * Get all users from users table
     */
    public static function getAllUsers()
    {
        $db = Model::getFactory()->getConnection();
        $sql = "SELECT id, name, email FROM users";
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get all users search by keywords
     */
    public static function searchKeywords($keyword)
    {
        $db = Model::getFactory()->getConnection();
        $sql = "SELECT id, name, email FROM users
                    WHERE name LIKE :name OR email LIKE :email";
        $query = $db->prepare($sql);
        $parameters = array(':name' => $keyword, ':email' => $keyword);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public static function addUser()
    {

        // clean the input
        $name               = trim(strip_tags($_POST['name']));
        $email              = trim(strip_tags($_POST['email']));
        $password           = trim(strip_tags($_POST['password']));
        $password_repeat    = trim(strip_tags($_POST['password_repeat']));

        // crypt the password with the PHP 5.5's password_hash() function, results in a 60 character hash string.
        // @see php.net/manual/en/function.password-hash.php 
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // make return a bool variable, so it will return false if there is an error
        $return = true;

        // check if name or email is empty
        if (empty($name) OR empty($email) OR empty($password) OR empty($password_repeat)) {
            Session::add('feedback_negative', 'FEEDBACK_FIELDS_EMPTY');
            $return = false;
        }

        // check if email already exists
        if (self::doesEmailAlreadyExist($email)) {
            Session::add('feedback_negative', 'FEEDBACK_USER_EMAIL_ALREADY_TAKEN');
            $return = false;
        } 

        // check if repeat password is not match
        if ($password !== $password_repeat) {
            Session::add('feedback_negative', 'FEEDBACK_PASSWORD_REPEAT_WRONG');
            $return = false;
        }

        // if there were false, return false
        if (!$return) return false;

        $db = Model::getFactory()->getConnection();
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $query = $db->prepare($sql);
        $parameters = array(':name' => $name, ':email' => $email, ':password' => $password_hash);

        $query->execute($parameters);

        return true;

    } 

    /**
     * Gets the user's data
     *
     * @param $email string User's name
     *
     * @return mixed Returns false if user does not exist, returns object with user's data when user exists
     */
    public static function getUserDataByEmail($email)
    {
        $db = Model::getFactory()->getConnection();

        $sql = "SELECT id, name, email, password
                  FROM users
                 WHERE email = :email
                 LIMIT 1";
        $query = $db->prepare($sql);

        // DEFAULT is the marker for "normal" accounts (that have a password etc.)
        // There are other types of accounts that don't have passwords etc. (FACEBOOK)
        $query->execute(array(':email' => $email));

        // return one row (we only have one result or nothing)
        return $query->fetch();
    }

    /**
     * Checks if a email is already used
     *
     * @param $email string email
     *
     * @return bool
     */
    public static function doesEmailAlreadyExist($email)
    {
        $db = Model::getFactory()->getConnection();
        $query = $db->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
        $query->execute(array(':email' => $email));
        if ($query->rowCount() == 0) {
            return false;
        }
        return true;
    }

}
