<?php
// -------------------------------------------------
// Admin Dashboard — Landing Page
// Entry point for all admin functions
// -------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/pages/admin/admin.css">
</head>
<body>

<!-- =====================================================
Login Overlay
===================================================== -->
<div class="admin-login" id="loginOverlay">
    <div class="admin-login__box">
        <h2 class="admin-login__title">Admin Login</h2>
        <p class="admin-login__sub">MR & Assosciates Dashboard</p>
        <input class="admin-login__input" type="password" id="pwInput" placeholder="Password" />
        <p class="admin-login__error" id="loginErr"></p>
        <button class="admin-login__btn" onclick="attemptLogin()">Sign In</button>
    </div>
</div>

<!-- =====================================================
App Shell
===================================================== -->
<div class="admin-app" id="adminApp" style="display:none;">

    <header class="admin-header">
        <h1 class="admin-header__title">Admin Dashboard</h1>
        <button class="admin-header__logout" onclick="logout()">Log Out</button>
    </header>

    <main class="admin-main">

        <p class="admin-dashboard__welcome">
            Welcome back! What would you like to manage today?
        </p>

        <div class="admin-dashboard__grid">

            <!-- My Listings -->
            <a class="admin-dashboard__card admin-dashboard__card--active" href="/admin/properties">
                <div class="admin-dashboard__card-icon">📂</div>
                <div class="admin-dashboard__card-body">
                    <h2 class="admin-dashboard__card-title">Properties Manager</h2>
                    <p class="admin-dashboard__card-desc">
                        Manage your listings you have on the market.<br> Add new ones, edit existing ones, or remove sold properties.
                    </p>
                </div>
                <span class="admin-dashboard__card-arrow">→</span>
            </a>

            <!-- Sell Leads -->
            <a class="admin-dashboard__card admin-dashboard__card--active" href="/admin/sell">
                <div class="admin-dashboard__card-icon">📋</div>
                <div class="admin-dashboard__card-body">
                    <h2 class="admin-dashboard__card-title">Sell Leads</h2>
                    <p class="admin-dashboard__card-desc">
                        View and manage seller enquiries submitted through the site.
                    </p>
                </div>
                <span class="admin-dashboard__card-arrow">→</span>
            </a>

            <!-- Blog -->
            <a class="admin-dashboard__card admin-dashboard__card--active" href="/admin/blog">
                <div class="admin-dashboard__card-icon">📝</div>
                <div class="admin-dashboard__card-body">
                    <h2 class="admin-dashboard__card-title">Blog Manager</h2>
                    <p class="admin-dashboard__card-desc">
                        Add and update blog posts shown on the Blog page.
                    </p>
                </div>
                <span class="admin-dashboard__card-arrow">→</span>
            </a>

        </div><!-- /.admin-dashboard__grid -->

    </main>
</div>

<script src="/pages/admin/config.js"></script>
<script>
    window.attemptLogin = function () {
        const val = document.getElementById('pwInput').value;
        if (val === ADMIN_PASSWORD) {
            sessionStorage.setItem('adminAuthed', '1');
            document.getElementById('loginOverlay').style.display = 'none';
            document.getElementById('adminApp').style.display     = 'block';
        } else {
            document.getElementById('loginErr').textContent = 'Incorrect password.';
        }
    };

    document.getElementById('pwInput').addEventListener('keydown', e => {
        if (e.key === 'Enter') window.attemptLogin();
    });

    window.logout = function () {
        sessionStorage.removeItem('adminAuthed');
        document.getElementById('loginOverlay').style.display = 'flex';
        document.getElementById('adminApp').style.display     = 'none';
        document.getElementById('pwInput').value              = '';
    };

    // Stay logged in if already authed this session
    if (sessionStorage.getItem('adminAuthed') === '1') {
        document.getElementById('loginOverlay').style.display = 'none';
        document.getElementById('adminApp').style.display     = 'block';
    }
</script>

</body>
</html>