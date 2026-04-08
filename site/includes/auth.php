<?php
// -------------------------------------------------
//This file contains authentication-related functions for the admin panel.
//It is included in all admin pages to ensure that only authenticated users can access them.
// -------------------------------------------------

session_start();

function requireAdmin() {
  if (empty($_SESSION["admin"])) {
    header("Location: /admin");
    exit;
  }
}