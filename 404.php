<?php include 'include/header.php'; ?>
<style>
  :root {
    --orange: #ff5900;
    --orange-dark: #cc4700;
    --ink: #0d0d0d;
    --bg: #0d0d0d;
    --surface: #161616;
    --surface2: #1e1e1e;
    --text: #e8e4dc;
    --muted: #6b6560;
    --rule: #2a2a2a;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

 

  /* ── ANIMATED GRID BG ── */
  .bg-grid {
    position: fixed;
    inset: 0;
    background-image:
      linear-gradient(rgba(255,89,0,0.04) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,89,0,0.04) 1px, transparent 1px);
    background-size: 48px 48px;
    pointer-events: none;
    z-index: 0;
  }

  /* Radial glow */
  .bg-glow {
    position: fixed;
    top: -20%;
    left: 50%;
    transform: translateX(-50%);
    width: 800px;
    height: 600px;
    background: radial-gradient(ellipse at center, rgba(255,89,0,0.12) 0%, transparent 65%);
    pointer-events: none;
    z-index: 0;
    animation: glow-pulse 5s ease-in-out infinite;
  }
  @keyframes glow-pulse {
    0%, 100% { opacity: 0.6; transform: translateX(-50%) scale(1); }
    50% { opacity: 1; transform: translateX(-50%) scale(1.08); }
  }

  
  

  
  #page-not-found {
    position: relative;
    z-index: 1;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 100px 40px 60px;
    text-align: center;
  }

  /* ── 404 GIANT TEXT ── */
  .error-num {
    
    font-weight: 800;
    font-size: clamp(120px, 22vw, 280px);
    line-height: 0.9;
    letter-spacing: -0.04em;
    color: transparent;
    -webkit-text-stroke: 2px var(--surface2);
    position: relative;
    user-select: none;
    animation: num-in 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
  }
  .error-num::before {
    content: '404';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--orange) 0%, #ff8c00 40%, transparent 70%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    -webkit-text-stroke: 0;
    clip-path: polygon(0 0, 45% 0, 45% 100%, 0 100%);
    animation: clip-slide 2s ease-out 0.3s both;
  }
  @keyframes clip-slide {
    from { clip-path: polygon(0 0, 0% 0, 0% 100%, 0 100%); }
    to   { clip-path: polygon(0 0, 45% 0, 45% 100%, 0 100%); }
  }
  @keyframes num-in {
    from { opacity: 0; transform: translateY(40px) scale(0.95); }
    to   { opacity: 1; transform: none; }
  }

  /* ── STATUS TAG ── */
  .status-tag {
    display: inline-flex;
    align-items: center;
    gap: 8px;
   
    font-size: 11px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--orange);
    border: 1px solid rgba(255,89,0,0.3);
    padding: 5px 14px;
    margin-bottom: 28px;
    animation: fade-up 0.6s ease 0.5s both;
  }
  .status-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--orange);
    animation: blink 1.4s ease-in-out infinite;
  }
  @keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.2; }
  }

  /* ── HEADLINE ── */
  .error-title {
    
    
    font-size: clamp(22px, 4vw, 40px);
    
    line-height: 1.2;
    margin-bottom: 16px;
    animation: fade-up 0.6s ease 0.6s both;
	color: #000000;
  }
  .error-title span { color: var(--orange); }

  .error-sub {
    font-size: 15px;
    font-weight: 300;
    color: var(--muted);
    max-width: 440px;
    line-height: 1.7;
    margin: 0 auto 40px;
    animation: fade-up 0.6s ease 0.7s both;
  }

  /* ── ACTIONS ── */
  .error-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 64px;
    animation: fade-up 0.6s ease 0.8s both;
  }
  .btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--orange);
    color: #fff;
   
    font-size: 11px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    text-decoration: none;
    padding: 14px 28px;
    border: 2px solid var(--orange);
    transition: background 0.2s, color 0.2s, transform 0.2s;
    font-weight: 500;
  }
  .btn-primary:hover {
    background: var(--orange-dark);
    border-color: var(--orange-dark);
    transform: translateY(-2px);
  }
  .btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: transparent;
    color: #00000;
    
    font-size: 11px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    text-decoration: none;
    padding: 14px 28px;
    border: 2px solid var(--rule);
    transition: border-color 0.2s, color 0.2s, transform 0.2s;
    font-weight: 500;
  }
  .btn-ghost:hover {
    border-color: var(--text);
    transform: translateY(-2px);
  }

  /* ── QUICK LINKS ── */
  .quick-links {
    border-top: 1px solid var(--rule);
    padding-top: 40px;
    width: 100%;
    max-width: 680px;
    animation: fade-up 0.6s ease 0.9s both;
  }
  .ql-label {
   
    font-size: 10px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 20px;
  }
  .ql-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 2px;
  }
  .ql-item {
    background: var(--surface);
    border: 1px solid var(--rule);
    padding: 16px 18px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: border-color 0.2s, background 0.2s;
  }
  .ql-item:hover {
    border-color: var(--orange);
    background: var(--surface2);
  }
  .ql-icon {
    font-size: 16px;
    flex-shrink: 0;
  }
  .ql-text {
    font-size: 13px;
    color: var(--text);
    font-weight: 400;
  }
  .ql-text span {
    display: block;
    font-size: 11px;
    color: var(--muted);
    font-weight: 300;
    margin-top: 2px;
  }

  /* ── SEARCH BAR ── */
  .search-wrap {
    position: relative;
    max-width: 420px;
    width: 100%;
    margin: 0 auto 40px;
    animation: fade-up 0.6s ease 0.75s both;
  }
  .search-input {
    width: 100%;
    background: var(--surface);
    border: 1px solid var(--rule);
    color: var(--text);
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    padding: 14px 48px 14px 18px;
    outline: none;
    transition: border-color 0.2s;
  }
  .search-input::placeholder { color: var(--muted); }
  .search-input:focus { border-color: var(--orange); }
  .search-btn {
    position: absolute;
    right: 0; top: 0; bottom: 0;
    width: 48px;
    background: var(--orange);
    border: none;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
  }
  .search-btn:hover { background: var(--orange-dark); }

 
</style>

<!-- MAIN -->
<section id="page-not-found">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
  <span class="status-tag"><span class="status-dot"></span>Error 404 — Page Not Found</span>

  <div class="error-num">404</div>

  <h1 class="error-title">Looks Like This Page<br>Went <span>Off the Grid</span></h1>
  <p class="error-sub">The page you're looking for has either moved, been removed, or never existed. Let's get you back on track.</p>

 

  <!-- CTA Buttons -->
  <div class="error-actions">
    <a href="<?php echo SITE_URL; ?>" class="btn-primary">← Back to Home</a>
    <a href="contact-us.php" class="btn-ghost">Contact Us</a>
  </div>
  </div>
  </div>
  </div>

 

</section>

<?php include 'include/footer.php'; ?>