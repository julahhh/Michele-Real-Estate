<?php
// -------------------------------------------------
// Save Lead Endpoint
// Called in the background by navigator.sendBeacon()
// on every contact form submission.
//
// Saves the lead to data/leads.json so it appears
// in the admin dashboard at /admin/sell.
//
// Formspree handles the actual email delivery —
// this file only handles the admin dashboard save.
// -------------------------------------------------

require ROOT_PATH . '/includes/data.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

// Honeypot — ignore bot submissions silently
if (!empty($_POST['_gotcha'])) {
    http_response_code(200);
    exit;
}

$name        = trim($_POST['name']         ?? '');
$email       = trim($_POST['email']        ?? '');
$phone       = trim($_POST['phone']        ?? '');
$message     = trim($_POST['message']      ?? '');
$inquiryType = trim($_POST['inquiry_type'] ?? ($_POST['rental_type'] ?? ''));

// Only save if the minimum required fields are present
if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
    $leadsFile = ROOT_PATH . '/data/leads.json';
    $leads     = readJson($leadsFile);

    $lead = [
        'id'      => time() . rand(10, 99),
        'name'    => $name,
        'email'   => $email,
        'phone'   => $phone,
        'message' => $message,
        'date'    => date('Y-m-d H:i:s'),
        'read'    => false,
    ];
    if ($inquiryType) $lead['inquiry_type'] = $inquiryType;

    $leads[] = $lead;
    writeJson($leadsFile, $leads);
}

http_response_code(200);
exit;
