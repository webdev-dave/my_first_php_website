<?php

//set
//session.use_only_cookies enhances session security by instructing PHP to store session identifiers exclusively in cookies (and not in url).
ini_set("session.use_only_cookies", 1);
//session.use_strict_mode prevents Session Initialization with Unknown IDs: If a session ID is received (e.g., from a cookie or URL parameter) that doesn't match an existing session, a new session won't be started. It closes a potential security gap where attackers could manipulate session IDs.
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([
    'lifetime' => 1800,
    //lifetime: Sets the session cookie's lifetime to 1800 seconds (30 minutes). The session will expire after 30 minutes of inactivity.
    'domain' => 'localhost',
    //domain: Restricts the session cookie to the 'localhost' domain. The browser will only send the session cookie to requests made to the 'localhost' domain.
    'path'=> '/',
    //path: Sets the cookie's path to the root ('/'). The session cookie will be sent on any request within the specified domain ('localhost').
    'secure'=> true,
    // secure: This critical security setting mandates that the session cookie is only transmitted over HTTPS (secure) connections. This helps prevent cookie hijacking in unencrypted environments.
    'httponly'=> true
    // httponly: Another important security setting. It prevents client-side JavaScript from accessing the session cookie. This mitigates risks of XSS (Cross-Site Scripting) attacks that could potentially steal session data.
]);

session_start();


//The code below does the following:

/* This code snippet implements a mechanism to periodically regenerate the session ID for enhanced security. Here's how it works:

    session_start():  Initializes the PHP session if it hasn't been already.
    
    \!isset($_SESSION['last_regeneration']):  Checks if a session variable named last_regeneration exists. If it doesn't exist, it means this is the first time the session is being used.
    
    session_regenerate_id(true):  If last_regeneration doesn't exist, this line creates a new session ID and destroys the old one. The true parameter ensures the session data is carried over to the new session. Additionally, it sets the last_regeneration session variable with the current timestamp to track the last regeneration time.
    
    else Block:  Executes if last_regeneration is already set.
    
    $interval = 60 * 30:  Defines the interval (in seconds) for regenerating the session ID. In this case, it's set to 30 minutes (60 seconds/minute * 30 minutes).
    
    time() - $_SESSION['last_regeneration'] >= $interval:  Compares the current time with the last_regeneration timestamp. If the difference is greater than or equal to the defined interval (30 minutes), it means it's time to regenerate the session ID.
    
    session_regenerate_id(true) and $_SESSION['last_regeneration'] = time():  Similar to step 3, these lines regenerate the session ID, preserve session data, and update the last_regeneration timestamp. */

if (!isset($_SESSION['last_regeneration'])) {
    //if this is a new session...
    session_regenerate_id(true);
    // set session var "last_regeneration" = to current time
    $_SESSION['last_regeneration'] = time();
} else {
    //if session is an ongoing session 
    $interval = 60 * 30; // 30 minutes

    if (time() - $_SESSION['last_regeneration'] >= $interval) {
        //if more than 30 minutes passed...
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }
}



session_regenerate_id(true);