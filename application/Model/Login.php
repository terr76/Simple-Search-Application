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
        // check negative first, for simplicity empty username and empty password in one line
        if (empty($email) OR empty($password)) {

            Session::add('feedback_negative', 'FEEDBACK_USERNAME_OR_PASSWORD_FIELD_EMPTY');
            return false;
        }

        // checks if user exists, if login is not blocked (due to failed logins) and if password fits the hash
        // get all data of that user (to later check if password and password_hash fit)
        $result = User::getUserDataByEmail($email);

        // if hash of provided password does NOT match the hash in the database: +1 failed-login counter
        if (!password_verify($password, $result->password)) {
            Session::add('feedback_negative', 'FEEDBACK_USERNAME_OR_PASSWORD_WRONG');
            return false;
        }


        // check if that user exists. We don't give back a cause in the feedback to avoid giving an attacker details.
        if (!$result) {
            //No Need to give feedback here since whole validateAndGetUser controls gives a feedback
            return false;
        }

        // successfully logged in, so we write all necessary data into the session and set "user_logged_in" to true
        self::setSuccessfulLoginIntoSession($result->name, $result->email);

        // return true to make clear the login was successful
        // maybe do this in dependence of setSuccessfulLoginIntoSession ?
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
     * The real login process: The user's data is written into the session.
     * Cheesy name, maybe rename. Also maybe refactoring this, using an array.
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
     *
     * @return bool user's login status
     */
    public static function isUserLoggedIn()
    {
        return Session::userIsLoggedIn();
    }
}
