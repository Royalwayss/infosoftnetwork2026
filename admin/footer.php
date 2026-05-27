<!-- ── FOOTER ─────────────────────────────────────────────── -->
<footer style="
    position:relative;z-index:1;
    border-top:1px solid var(--border);
    padding:18px 32px;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:10px;
    background:rgba(13,13,13,0.85);
    font-family:'DM Mono',monospace;font-size:11px;color:var(--muted);
">
    <span>© <?= date('Y') ?> Infosoft Network &mdash; Admin Panel</span>
    <span>Ludhiana, Punjab &nbsp;|&nbsp; Logged in as <strong style="color:var(--orange)"><?= htmlspecialchars($_SESSION['admin_name'] ?? 'Admin') ?></strong></span>
</footer>

<!-- ── MODAL OVERLAY (shared) ────────────────────────────── -->
<div class="modal-overlay" id="contactModal" onclick="closeModal(event)">
    <div class="modal" id="modalBox">
        <div class="modal-header">
            <div class="modal-title" id="modalTitle">Contact Details</div>
            <button class="modal-close" onclick="closeModalDirect()" title="Close">✕</button>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Populated by JS -->
        </div>
    </div>
</div>

<script>
// ── Modal helpers ───────────────────────────────────────────
function openModal(data) {
    const statusBadge = data.view_status === '0'
        ? '<span class="badge badge-new"><span class="badge-dot"></span>New</span>'
        : '<span class="badge badge-read"><span class="badge-dot"></span>Read</span>';

    document.getElementById('modalTitle').innerHTML = 'Contact Details &nbsp;' + statusBadge;
    document.getElementById('modalBody').innerHTML = `
        <div class="detail-grid">
            <div class="detail-field">
                <span class="detail-label">First Name</span>
                <div class="detail-value">${escHtml(data.first_name)}</div>
            </div>
            <div class="detail-field">
                <span class="detail-label">Last Name</span>
                <div class="detail-value">${escHtml(data.last_name)}</div>
            </div>
            <div class="detail-field">
                <span class="detail-label">Phone</span>
                <div class="detail-value">${escHtml(data.phone)}</div>
            </div>
            <div class="detail-field">
                <span class="detail-label">Email</span>
                <div class="detail-value">${escHtml(data.email)}</div>
            </div>
            <div class="detail-field full">
                <span class="detail-label">Message</span>
                <div class="detail-value message-val">${escHtml(data.message)}</div>
            </div>
            <div class="detail-field">
                <span class="detail-label">Submitted At</span>
                <div class="detail-value td-mono">${escHtml(data.created_at_fmt)}</div>
            </div>
            <div class="detail-field">
                <span class="detail-label">Status</span>
                <div class="detail-value">${statusBadge}</div>
            </div>
        </div>
    `;
    document.getElementById('contactModal').classList.add('active');
    document.body.style.overflow = 'hidden';

    // Mark as read via AJAX if unread
    if (data.view_status === '0') {
        fetch('mark_read.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'id=' + encodeURIComponent(data.id)
        }).then(r => r.json()).then(res => {
            if (res.success) {
                // Update button colour in table
                const btn = document.querySelector('[data-id="' + data.id + '"]');
                if (btn) {
                    btn.classList.remove('unread');
                    btn.classList.add('read');
                    btn.dataset.viewStatus = '1';
                }
                // Update badge in modal
                const statusEl = document.querySelectorAll('.badge-new');
                statusEl.forEach(el => {
                    el.className = 'badge badge-read';
                    el.innerHTML = '<span class="badge-dot"></span>Read';
                });
                const modalTitle = document.getElementById('modalTitle');
                const nb = modalTitle.querySelector('.badge');
                if (nb) {
                    nb.className = 'badge badge-read';
                    nb.innerHTML = '<span class="badge-dot"></span>Read';
                }
            }
        }).catch(() => {});
    }
}

function closeModal(e) {
    if (e.target === document.getElementById('contactModal')) closeModalDirect();
}
function closeModalDirect() {
    document.getElementById('contactModal').classList.remove('active');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModalDirect(); });

function escHtml(str) {
    if (!str) return '—';
    return String(str)
        .replace(/&/g,'&amp;')
        .replace(/</g,'&lt;')
        .replace(/>/g,'&gt;')
        .replace(/"/g,'&quot;')
        .replace(/'/g,'&#039;');
}

// ── Live search filter ──────────────────────────────────────
const searchInput = document.getElementById('tableSearch');
if (searchInput) {
    searchInput.addEventListener('input', function() {
        const q = this.value.toLowerCase();
        document.querySelectorAll('tbody tr[data-row]').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    });
}
</script>
</body>
</html>
