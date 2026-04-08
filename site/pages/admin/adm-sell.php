<?php
// -------------------------------------------------
// Admin — Contact Leads Inbox
// Displays all messages submitted via the contact form.
// Stored in data/leads.json
// -------------------------------------------------

require __DIR__ . "/../../includes/data.php";

$file  = __DIR__ . "/../../data/leads.json";
$leads = readJson($file);

// --------------------
// HANDLE MARK AS READ
// --------------------
if (isset($_GET["read"])) {
    $id = (string)$_GET["read"];
    foreach ($leads as &$lead) {
        if ((string)$lead["id"] === $id) {
            $lead["read"] = true;
            break;
        }
    }
    unset($lead);
    writeJson($file, $leads);
    header("Location: /admin/sell");
    exit;
}

// --------------------
// HANDLE MARK AS UNREAD
// --------------------
if (isset($_GET["unread"])) {
    $id = (string)$_GET["unread"];
    foreach ($leads as &$lead) {
        if ((string)$lead["id"] === $id) {
            $lead["read"] = false;
            break;
        }
    }
    unset($lead);
    writeJson($file, $leads);
    header("Location: /admin/sell");
    exit;
}

// --------------------
// HANDLE DELETE
// --------------------
if (isset($_GET["delete"])) {
    $id    = (string)$_GET["delete"];
    $leads = array_values(array_filter($leads, fn($l) => (string)$l["id"] !== $id));
    writeJson($file, $leads);
    header("Location: /admin/sell");
    exit;
}

// --------------------
// HANDLE MARK ALL READ
// --------------------
if (isset($_GET["readall"])) {
    foreach ($leads as &$lead) {
        $lead["read"] = true;
    }
    unset($lead);
    writeJson($file, $leads);
    header("Location: /admin/sell");
    exit;
}

// Sort newest first
usort($leads, fn($a, $b) => strcmp($b["date"], $a["date"]));

// Stats
$total  = count($leads);
$unread = count(array_filter($leads, fn($l) => empty($l["read"])));
$read   = $total - $unread;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Contact Leads</title>
    <link rel="stylesheet" href="/pages/admin/admin.css">
    <style>
        /* ── Inbox-specific styles ── */
        .leads-inbox {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .lead-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            border-left: 4px solid transparent;
            transition: box-shadow 0.18s;
        }

        .lead-card--unread {
            border-left-color: #1a2744;
        }

        .lead-card--read {
            border-left-color: #e8e8e8;
        }

        .lead-card__header {
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: start;
            gap: 16px;
            padding: 20px 24px 16px;
            cursor: pointer;
            user-select: none;
        }

        .lead-card__sender {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .lead-card__avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #1a2744;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            font-weight: 800;
            flex-shrink: 0;
        }

        .lead-card--read .lead-card__avatar {
            background: #e0e0e0;
            color: #999;
        }

        .lead-card__name {
            font-size: 0.97rem;
            font-weight: 800;
            color: #1a2744;
            margin-bottom: 3px;
        }

        .lead-card--read .lead-card__name {
            font-weight: 600;
            color: #555;
        }

        .lead-card__contact {
            font-size: 0.82rem;
            color: #8a96b0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .lead-card__contact a {
            color: #8a96b0;
            text-decoration: none;
        }

        .lead-card__contact a:hover {
            color: #1a2744;
            text-decoration: underline;
        }

        .lead-card__meta {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
            flex-shrink: 0;
        }

        .lead-card__date {
            font-size: 0.8rem;
            color: #aaa;
            white-space: nowrap;
        }

        .lead-card__badge {
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .lead-card__badge--unread {
            background: #e8eef8;
            color: #1a2744;
        }

        .lead-card__badge--read {
            background: #f0f0f0;
            color: #aaa;
        }

        .lead-card__body {
            padding: 0 24px 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.2s ease;
        }

        .lead-card__body.is-open {
            max-height: 600px;
            padding-bottom: 20px;
        }

        .lead-card__message {
            font-size: 0.93rem;
            line-height: 1.75;
            color: #333;
            background: #f9f9f9;
            border-radius: 8px;
            padding: 16px 18px;
            white-space: pre-wrap;
            word-break: break-word;
            margin-bottom: 16px;
        }

        .lead-card__actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .lead-card__divider {
            height: 1px;
            background: #f0f0f0;
            margin: 0 24px;
        }

        .leads-empty {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
            padding: 80px 40px;
            text-align: center;
        }

        .leads-empty__icon { font-size: 2.5rem; margin-bottom: 16px; }

        .leads-empty__title {
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: 8px;
            color: #1a2744;
        }

        .leads-empty__sub {
            font-size: 0.9rem;
            color: #8a96b0;
        }

        .inbox-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 4px;
        }

        .inbox-toolbar__title {
            font-size: 1rem;
            font-weight: 800;
            color: #1a2744;
        }

        .inbox-toolbar__sub {
            font-size: 0.85rem;
            color: #8a96b0;
            margin-top: 2px;
        }

        @media (max-width: 600px) {
            .lead-card__header { grid-template-columns: 1fr; }
            .lead-card__meta { flex-direction: row; align-items: center; }
        }
    </style>
</head>
<body>
<div class="admin-app">

    <!-- ── Header ── -->
    <header class="admin-header">
        <div class="admin-header__left">
            <a class="admin-header__back" href="/admin">← Dashboard</a>
            <h1 class="admin-header__title">Contact Leads</h1>
        </div>
    </header>

    <main class="admin-main">

        <!-- ── Stats ── -->
        <div class="admin-stats">
            <div class="admin-stat">
                <span class="admin-stat__num"><?= $total ?></span>
                <span class="admin-stat__label">Total</span>
            </div>
            <div class="admin-stat">
                <span class="admin-stat__num" style="color:#1a2744;"><?= $unread ?></span>
                <span class="admin-stat__label">Unread</span>
            </div>
            <div class="admin-stat">
                <span class="admin-stat__num"><?= $read ?></span>
                <span class="admin-stat__label">Read</span>
            </div>
        </div>

        <!-- ── Inbox toolbar ── -->
        <?php if ($total > 0): ?>
        <div class="inbox-toolbar">
            <div>
                <div class="inbox-toolbar__title">Inbox</div>
                <div class="inbox-toolbar__sub">
                    <?= $unread > 0
                        ? "$unread unread message" . ($unread !== 1 ? "s" : "")
                        : "All messages read" ?>
                </div>
            </div>
            <?php if ($unread > 0): ?>
                <a class="admin-btn admin-btn--cancel"
                   href="/admin/sell?readall=1"
                   onclick="return confirm('Mark all messages as read?')">
                   Mark All as Read
                </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- ── Lead Cards ── -->
        <?php if (empty($leads)): ?>

            <div class="leads-empty">
                <div class="leads-empty__icon">📭</div>
                <div class="leads-empty__title">No messages yet</div>
                <p class="leads-empty__sub">
                    When visitors submit the contact form, their messages will appear here.
                </p>
            </div>

        <?php else: ?>

            <div class="leads-inbox">
                <?php foreach ($leads as $lead):
                    $id       = htmlspecialchars((string)($lead["id"] ?? ""));
                    $name     = htmlspecialchars($lead["name"]    ?? "Unknown");
                    $email    = htmlspecialchars($lead["email"]   ?? "");
                    $phone    = htmlspecialchars($lead["phone"]   ?? "");
                    $message  = htmlspecialchars($lead["message"] ?? "");
                    $isRead   = !empty($lead["read"]);
                    $cardMod  = $isRead ? "lead-card--read" : "lead-card--unread";

                    // Avatar initials from name
                    $words    = preg_split('/\s+/', trim($lead["name"] ?? "?"));
                    $initials = strtoupper(
                        substr($words[0] ?? "?", 0, 1) .
                        (isset($words[1]) ? substr($words[1], 0, 1) : "")
                    );

                    // Format date
                    $rawDate  = $lead["date"] ?? "";
                    $dateDisp = $rawDate ? date("M j, Y · g:i a", strtotime($rawDate)) : "—";
                ?>

                    <div class="lead-card <?= $cardMod ?>" id="lead-<?= $id ?>">

                        <!-- Clickable header to expand message -->
                        <div class="lead-card__header" onclick="toggleLead('<?= $id ?>')">

                            <div class="lead-card__sender">
                                <div class="lead-card__avatar"><?= $initials ?></div>
                                <div>
                                    <div class="lead-card__name"><?= $name ?></div>
                                    <div class="lead-card__contact">
                                        <?php if ($email): ?>
                                            <a href="mailto:<?= $email ?>"><?= $email ?></a>
                                        <?php endif; ?>
                                        <?php if ($phone): ?>
                                            <span>·</span>
                                            <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="lead-card__meta">
                                <span class="lead-card__date"><?= $dateDisp ?></span>
                                <span class="lead-card__badge <?= $isRead ? 'lead-card__badge--read' : 'lead-card__badge--unread' ?>">
                                    <?= $isRead ? "Read" : "New" ?>
                                </span>
                            </div>

                        </div><!-- /.lead-card__header -->

                        <div class="lead-card__divider"></div>

                        <!-- Expandable body -->
                        <div class="lead-card__body" id="body-<?= $id ?>">

                            <div style="height:16px;"></div>

                            <div class="lead-card__message"><?= $message ?></div>

                            <div class="lead-card__actions">
                                <a href="mailto:<?= $email ?>?subject=Re: Your enquiry"
                                   class="admin-btn admin-btn--save">Reply by Email</a>

                                <?php if ($isRead): ?>
                                    <a class="admin-btn admin-btn--cancel"
                                       href="/admin/sell?unread=<?= $id ?>">Mark as Unread</a>
                                <?php else: ?>
                                    <a class="admin-btn admin-btn--cancel"
                                       href="/admin/sell?read=<?= $id ?>">Mark as Read</a>
                                <?php endif; ?>

                                <a class="admin-btn admin-btn--delete"
                                   href="/admin/sell?delete=<?= $id ?>"
                                   onclick="return confirm('Delete this message from <?= $name ?>?')"
                                   style="margin-left:auto;">Delete</a>
                            </div>

                        </div><!-- /.lead-card__body -->

                    </div><!-- /.lead-card -->

                <?php endforeach; ?>
            </div><!-- /.leads-inbox -->

        <?php endif; ?>

    </main>
</div><!-- /.admin-app -->

<script>
    // Expand/collapse message body and auto-mark as read on open
    function toggleLead(id) {
        const body  = document.getElementById('body-' + id);
        const card  = document.getElementById('lead-' + id);
        const isOpen = body.classList.contains('is-open');

        // Close all others
        document.querySelectorAll('.lead-card__body').forEach(b => b.classList.remove('is-open'));

        if (!isOpen) {
            body.classList.add('is-open');

            // Auto mark as read via fetch if currently unread
            if (card.classList.contains('lead-card--unread')) {
                fetch('/admin/sell?read=' + id, { method: 'GET' })
                    .then(() => {
                        card.classList.remove('lead-card--unread');
                        card.classList.add('lead-card--read');
                        const badge = card.querySelector('.lead-card__badge');
                        if (badge) {
                            badge.textContent = 'Read';
                            badge.classList.remove('lead-card__badge--unread');
                            badge.classList.add('lead-card__badge--read');
                        }
                        const avatar = card.querySelector('.lead-card__avatar');
                        if (avatar) avatar.style.cssText = 'background:#e0e0e0; color:#999';
                    });
            }
        }
    }

    // Auto-open if only one message
    <?php if ($total === 1): ?>
    toggleLead('<?= htmlspecialchars((string)($leads[0]["id"] ?? "")) ?>');
    <?php endif; ?>
</script>

</body>
</html>
