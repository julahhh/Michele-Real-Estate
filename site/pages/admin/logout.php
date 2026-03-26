<?php
// Start the session to manage admin login state
session_start();
// Log out the admin by destroying the session
session_destroy();
// Redirect to the home page
header("Location: /");
exit;