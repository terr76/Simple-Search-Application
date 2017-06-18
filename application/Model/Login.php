<?php

/**
 * Login
 *
 * The login part of the model: Handles the login / logout stuff
 */

namespace Mini\Model;

use Mini\Core\Session;
use Mini\Core\Model;
use Mini\Model\User;

class Login extends Model
{
    /**
     * Login process (for DEFAULT user accounts).
     */
    public static function index($email, $password)
    {
        // check negative first, for simplicity empty email and empty password in one line
        if (empty($email) OR empty($password)) {

            Session::add('feedback_negative', 'FEEDBACK_USERNAME_OR_PASSWORD_FIELD_EMPTY');
            return false;
        }

        // checks if user exists
        $result = User::getUserDataByEmail($email);

        // if hash of provided password does NOT match the hash in the database
        if (!password_verify($password, $result->password)) {
            Session::add('feedback_negative', 'FEEDBACK_USERNAME_OR_PASSWORD_WRONG');
            return false;
        }


        // check if that user exists. 
        if (!$result) {
            return false;
        }

        // successfully logged in, so we write all necessary data into the session and set "user_logged_in" to true
        self::setSuccessfulLoginIntoSession($result->name, $result->email);

        // return true to make clear the login was successful
        return true;
    }

    /**
     * Log out process: delete session
     */
    public static function logout()
    {
        Session::destroy();
    }

    /**
     * The user's data is written into the session.
     */
    public static function setSuccessfulLoginIntoSession($name, $email)
    {

        Session::init();

        // remove old and regenerate session ID.
        session_regenerate_id(true);
        $_SESSION = array();

        Session::set('name', $name);
        Session::set('email', $email);

        // finally, set user as logged-in
        Session::set('user_logged_in', true);

    }


    /**
     * Returns the current state of the user's login
     */
    public static function isUserLoggedIn()
    {
        return Session::userIsLoggedIn();
    }
}
