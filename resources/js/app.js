import './bootstrap';

safelist: [
  'text-yellow-400',
  'bg-yellow-400/10',

  'text-blue-500',
  'bg-blue-500/10',

  'text-indigo-500',
  'bg-indigo-500/10',

  'text-amber-500',
  'bg-amber-500/10',

  'text-sky-500',
  'bg-sky-500/10',

  'text-orange-500',
  'bg-orange-500/10',
]

document.addEventListener('DOMContentLoaded', () => {
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('nav a[href^="#"]');

  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const id = entry.target.getAttribute('id');

          navLinks.forEach(link => {
            link.classList.remove('text-primary');

            if (link.getAttribute('href') === `#${id}`) {
              link.classList.add('text-primary');
            }
          });
        }
      });
    },
    {
      rootMargin: '-50% 0px -50% 0px',
      threshold: 0
    }
  );

  sections.forEach(section => observer.observe(section));
});

const THEME_KEY = 'theme';
const html = document.documentElement;

function getSystemTheme() {
    return window.matchMedia('(prefers-color-scheme: dark)').matches
        ? 'dark'
        : 'light';
}

function applyTheme(theme) {
    html.classList.remove('theme-light', 'theme-dark');
    html.classList.add(`theme-${theme}`);

    updateIcon(theme);
}

function updateIcon(theme) {
    const icon = document.getElementById('themeIcon');
    if (!icon) return;

    if (!localStorage.getItem(THEME_KEY)) {
        icon.className = 'fa-solid fa-moon text-text'; 
    } else if (theme === 'dark') {
        icon.className = 'fa-solid fa-sun text-text'; 
    } else {
        icon.className = 'fa-solid fa-desktop text-text';
    }
}

function initTheme() {
    const savedTheme = localStorage.getItem(THEME_KEY);

    if (savedTheme === 'light' || savedTheme === 'dark') {
        applyTheme(savedTheme);
    } else {
        applyTheme(getSystemTheme());
    }
}

initTheme();

window.toggleTheme = function () {
    const savedTheme = localStorage.getItem(THEME_KEY);

    if (!savedTheme) {
        localStorage.setItem(THEME_KEY, 'dark');
        applyTheme('dark');
        return;
    }

    if (savedTheme === 'dark') {
        localStorage.setItem(THEME_KEY, 'light');
        applyTheme('light');
        return;
    }

    localStorage.removeItem(THEME_KEY);
    applyTheme(getSystemTheme());
};

window.matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', e => {
        if (!localStorage.getItem(THEME_KEY)) {
            applyTheme(e.matches ? 'dark' : 'light');
        }
    });