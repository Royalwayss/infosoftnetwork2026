<?php
require_once 'config.php';
requireLogin();

$pageTitle = 'Contacts';

// ── Fetch all contacts ──────────────────────────────────────────────────────
$db       = getDB();
$contacts = $db->query(
    'SELECT * FROM contacts ORDER BY created_at DESC'
)->fetchAll();

$total  = count($contacts);
$unread = count(array_filter($contacts, fn($r) => $r['view_status'] === '0'));
$read   = $total - $unread;

// ── Include header (opens <html> … <body> … <header>) ──────────────────────
require_once 'header.php';
?>

<div class="page-wrap">

    <!-- Page Title Bar -->
    <div class="page-title-bar">
        <div>
            <p class="page-breadcrumb">Admin Panel / Contacts</p>
            <h1>Contact <span>Submissions</span></h1>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="stats-row">
        <div class="stat-box">
            <div class="stat-box-num orange"><?= $total ?></div>
            <div class="stat-box-label">Total Contacts</div>
        </div>
        <div class="stat-box">
            <div class="stat-box-num red"><?= $unread ?></div>
            <div class="stat-box-label">Unread</div>
        </div>
        <div class="stat-box">
            <div class="stat-box-num green"><?= $read ?></div>
            <div class="stat-box-label">Read</div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="table-card">
        <div class="table-toolbar">
            <div class="table-toolbar-title">
                All Entries &nbsp;<strong><?= $total ?></strong>
            </div>
            <input class="tbl-search" type="text" id="tableSearch"
                   placeholder="Search name, email, phone…">
        </div>

        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Submitted At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (empty($contacts)): ?>
                    <tr><td colspan="7">
                        <div class="table-empty">
                            <span class="table-empty-icon">📭</span>
                            No contact submissions yet.
                        </div>
                    </td></tr>
                <?php else: ?>
                    <?php foreach ($contacts as $i => $row):
                        $isUnread  = $row['view_status'] === '0';
                        $btnClass  = $isUnread ? 'unread' : 'read';
                        $fmtDate   = formatDate($row['created_at']);
                        // Build JSON payload for JS (safely)
                        $jsData = json_encode([
                            'id'             => $row['id'],
                            'first_name'     => $row['first_name'],
                            'last_name'      => $row['last_name'],
                            'phone'          => $row['phone'],
                            'email'          => $row['email'],
                            'message'        => $row['message'],
                            'view_status'    => $row['view_status'],
                            'created_at_fmt' => $fmtDate,
                        ], JSON_HEX_QUOT | JSON_HEX_TAG);
                    ?>
                    <tr data-row="<?= $row['id'] ?>">
                        <td><span class="row-num"><?= $i + 1 ?></span></td>
                        <td>
                            <div class="td-name"><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></div>
                        </td>
                        <td><span class="td-phone"><?= htmlspecialchars($row['phone'] ?? '—') ?></span></td>
                        <td><span class="td-email"><?= htmlspecialchars($row['email'] ?? '—') ?></span></td>
                        <td>
                            <?php if ($isUnread): ?>
                                <span class="badge badge-new"><span class="badge-dot"></span>New</span>
                            <?php else: ?>
                                <span class="badge badge-read"><span class="badge-dot"></span>Read</span>
                            <?php endif; ?>
                        </td>
                        <td><span class="td-mono"><?= $fmtDate ?></span></td>
                        <td>
                            <button
                                class="btn-view <?= $btnClass ?>"
                                data-id="<?= $row['id'] ?>"
                                data-view-status="<?= $row['view_status'] ?>"
                                onclick='openModal(<?= $jsData ?>)'>
                                👁 View
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div><!-- /table-card -->

</div><!-- /page-wrap -->

<?php require_once 'footer.php'; ?>
