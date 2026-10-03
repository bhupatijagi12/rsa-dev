// GlobalAid Assurance — Dealer RSA Portal — shared behaviour
document.addEventListener('DOMContentLoaded', () => {

  // Collapsible sidebar sub-menus
  document.querySelectorAll('.nav-item.parent').forEach(item => {
    item.addEventListener('click', () => {
      const sub = item.nextElementSibling;
      const caret = item.querySelector('.caret');
      if (!sub || !sub.classList.contains('nav-sub')) return;
      sub.classList.toggle('open');
      caret && caret.classList.toggle('open');
    });
  });

  // Mobile hamburger
  const hamb = document.querySelector('.hamb');
  const sidebar = document.querySelector('.sidebar');
  if (hamb && sidebar) {
    hamb.addEventListener('click', () => sidebar.classList.toggle('open'));
  }

  // Live clock in topbar (IST demo)
  const timeEl = document.querySelector('[data-clock]');
  if (timeEl) {
    const render = () => {
      const now = new Date();
      const date = now.toLocaleDateString('en-IN', { weekday:'short', day:'2-digit', month:'short', year:'numeric' }).toUpperCase();
      const time = now.toLocaleTimeString('en-IN', { hour:'2-digit', minute:'2-digit', second:'2-digit', hour12:true });
      timeEl.innerHTML = `${date}<br>${time} IN`;
    };
    render();
    setInterval(render, 1000);
  }

  // OTP input auto-advance
  document.querySelectorAll('.otp-inputs').forEach(group => {
    const inputs = [...group.querySelectorAll('input')];
    inputs.forEach((inp, i) => {
      inp.addEventListener('input', () => {
        inp.value = inp.value.replace(/[^0-9]/g, '').slice(0, 1);
        if (inp.value && inputs[i + 1]) inputs[i + 1].focus();
      });
      inp.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !inp.value && inputs[i - 1]) inputs[i - 1].focus();
      });
    });
  });

  // Password show/hide toggle
  document.querySelectorAll('.pw-wrap .toggle').forEach(t => {
    t.addEventListener('click', () => {
      const input = t.previousElementSibling;
      const isPw = input.type === 'password';
      input.type = isPw ? 'text' : 'password';
      t.textContent = isPw ? '🙈' : '👁';
    });
  });

  // Demo login -> OTP -> dashboard flow
  const loginForm = document.querySelector('[data-login-form]');
  if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      window.location.href = 'otp.html';
    });
  }
  const otpForm = document.querySelector('[data-otp-form]');
  if (otpForm) {
    otpForm.addEventListener('submit', (e) => {
      e.preventDefault();
      window.location.href = 'products.html';
    });
  }

  // Resend OTP countdown (demo)
  const countdownEl = document.querySelector('[data-countdown]');
  if (countdownEl) {
    let secs = 120;
    const tick = () => {
      countdownEl.textContent = secs;
      if (secs > 0) secs--;
    };
    tick();
    setInterval(tick, 1000);
  }

  // Simple tab switcher (e.g. Deposit / Withdrawal, Days / Trend)
  document.querySelectorAll('[data-tabgroup]').forEach(group => {
    const tabs = [...group.querySelectorAll('.tab, .btn-ghost[data-tab]')];
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        const target = tab.getAttribute('data-tab');
        const panels = group.parentElement.querySelectorAll('[data-panel]');
        panels.forEach(p => {
          p.style.display = (p.getAttribute('data-panel') === target) ? '' : 'none';
        });
      });
    });
  });

  // File chooser label update
  document.querySelectorAll('input[type="file"]').forEach(inp => {
    inp.addEventListener('change', () => {
      const box = inp.closest('.upload-box');
      if (!box) return;
      const hint = box.querySelector('.file-name');
      if (hint) hint.textContent = inp.files[0] ? inp.files[0].name : 'No file chosen';
    });
  });
});
