import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
import htmx from 'htmx.org';
import { gsap } from "gsap";
window.htmx = htmx;

import { heroAnimation } from './animations/hero';
import { heroRibbonAnimation } from './animations/hero';
import { heroFloatingCards } from './animations/hero';
import { heroIconParallax } from './animations/hero';
import { navbarFloatAnimation } from "./animations/navbar";
import { navbarScrollEffect } from "./animations/navbar";
import { aboutAnimation } from "./animations/about";
import { projectAnimation } from "./animations/project";
import { projectModalAnimation } from "./animations/project-modal";
import { initmodal } from "./animations/modal";

const THEME_KEY = 'theme';
const html = document.documentElement;

window.showConfirm = function(message, callback) {

    const modal = document.getElementById('confirm-modal')
    const backdrop = document.getElementById('confirm-backdrop')
    const box = document.getElementById('confirm-box')
    const msg = document.getElementById('confirm-message')
    const yesBtn = document.getElementById('confirm-yes')
    const cancelBtn = document.getElementById('confirm-cancel')

    msg.innerText = message

    modal.classList.remove('pointer-events-none')

    // Initial state
    gsap.set(modal, { opacity: 0 })
    gsap.set(backdrop, { opacity: 0 })
    gsap.set(box, { scale: 0.7, opacity: 0, y: 40 })

    const tl = gsap.timeline()

    tl.to(modal, { opacity: 1, duration: 0.2 })
      .to(backdrop, { opacity: 1, duration: 0.3 }, "<")
      .to(box, {
          scale: 1,
          opacity: 1,
          y: 0,
          duration: 0.5,
          ease: "back.out(1.7)"
      }, "-=0.1")

    function closeModal() {

        gsap.timeline({
            onComplete: () => {
                modal.classList.add('pointer-events-none')
            }
        })
        .to(box, {
            scale: 0.8,
            opacity: 0,
            y: 20,
            duration: 0.3,
            ease: "power2.in"
        })
        .to(backdrop, {
            opacity: 0,
            duration: 0.2
        }, "<")
        .to(modal, {
            opacity: 0,
            duration: 0.2
        }, "<")

        yesBtn.removeEventListener('click', confirmAction)
        cancelBtn.removeEventListener('click', closeModal)
        backdrop.removeEventListener('click', closeModal)
        document.removeEventListener('keydown', escHandler)
    }

    function confirmAction() {
        callback()
        closeModal()
    }

    function escHandler(e) {
        if (e.key === "Escape") closeModal()
    }

    yesBtn.addEventListener('click', confirmAction)
    cancelBtn.addEventListener('click', closeModal)
    backdrop.addEventListener('click', closeModal)
    document.addEventListener('keydown', escHandler)
}

window.confirmDelete = function (form, message = null) {

    const text = message ?? 'This action is permanent. Continue?'

    showConfirm(text, function () {
        form.submit()
    })
}

document.addEventListener('click', function (e) {

    const btn = e.target.closest('[data-confirm-delete]')
    if (!btn) return

    e.preventDefault()

    const form = btn.closest('form')
    if (!form) return

    const message = btn.dataset.confirmMessage

    window.confirmDelete(form, message)
})

document.addEventListener('click', function (e) {

    const btn = e.target.closest('[data-bulk]')
    if (!btn) return

    const type = btn.dataset.bulk
    const form = document.getElementById('bulkForm')

    if (!form) return

    const selected = document.querySelectorAll('.bulk-checkbox:checked')

    if (selected.length === 0) {
        showNotify('warning', 'Please select at least one project.')
        return
    }

    if (type === 'restore') {

        showConfirm('Restore selected projects?', function () {
            form.action = "/dashboard/bulk-restore"
            form.submit()
        })

        return
    }

    if (type === 'delete') {

        showConfirm('This action is permanent. Continue?', function () {
            form.action = "/dashboard/bulk-force-delete"
            form.submit()
        })

        return
    }
})

document.addEventListener('click', function (e) {

    const btn = e.target.closest('[data-bulk-action]')
    if (!btn) return

    const type = btn.dataset.bulkAction
    handleBulkAction(type)
})

window.handleBulkAction = function (type) {

    const form = document.getElementById('bulkForm')
    const selected = document.querySelectorAll('.bulk-checkbox:checked')

    if (selected.length === 0) {
        showConfirm('Please select at least one project.')
        return
    }

    if (type === 'publish') {

        showConfirm('Publish selected projects?', function () {
            form.action = window.routes.bulkPublish
            form.submit()
        })

        return
    }

    if (type === 'delete') {

        showConfirm('Delete selected projects?', function () {
            form.action = window.routes.bulkDelete
            form.submit()
        })

        return
    }
}

function confirmAction() {
    yesBtn.disabled = true
    callback()
    closeModal()
}

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

    icon.classList.remove(
        'fa-moon',
        'fa-sun',
        'fa-desktop'
    );

    if (!localStorage.getItem(THEME_KEY)) {
        icon.classList.add('fa-desktop');
    } else if (theme === 'dark') {
        icon.classList.add('fa-moon');
    } else {
        icon.classList.add('fa-sun');
    }

    icon.classList.add('fa-solid', 'text-text');
}

function initTheme() {
    const savedTheme = localStorage .getItem(THEME_KEY);

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

async function loadLanguage(locale) {
    const res = await fetch(`/api/lang/${locale}`);
    const dict = await res.json();

    function getNestedValue(obj, path) {
        return path.split('.').reduce((o, k) => (o || {})[k], obj);
    }

    const elements = document.querySelectorAll('[data-i18n]');
    elements.forEach(el => {
        const key = el.dataset.i18n;
        const text = getNestedValue(dict, key);
        if (text) el.innerHTML = text;
    });

    elements.forEach(el => {
        el.style.visibility = 'visible';
    });

    document.documentElement.lang = locale;
}


const langToggle = document.getElementById('langToggle');

let currentLocale = document.documentElement.lang || 'id';

langToggle?.addEventListener('click', async () => {
    const next = currentLocale === 'id' ? 'en' : 'id';

    await loadLanguage(next);

    localStorage.setItem('locale', next);
    document.cookie = `locale=${next};path=/;max-age=31536000`;

    currentLocale = next;
    updateLangIcon(next);
});

function updateLangIcon(currentLocale) {
    const flag = document.getElementById('langFlag');
    if (!flag) return;

    flag.classList.remove('fi-id', 'fi-us');

    if (currentLocale === 'id') {
        flag.classList.add('fi-id');
    } else {
        flag.classList.add('fi-us');
    }
}

window.tagInput = function (suggestions) {
    return {
        input: '',
        tags: [],
        filtered: [],

        search() {
            const query = this.input.replace('#','').toLowerCase()

            this.filtered = suggestions.filter(item =>
                item.toLowerCase().includes(query)
            ).slice(0,5)
        },

        addTag(tag) {
            tag = tag.replace('#','').toLowerCase()

            if (!this.tags.includes(tag) && tag.trim() !== '') {
                this.tags.push(tag)
            }

            this.input = ''
            this.filtered = []
        },

        removeTag(index) {
            this.tags.splice(index,1)
        }
    }
}

window.imageUpload = function () {
    return {
        images: [],

    handleFiles(event) {
        const input = event.target;
        const newFiles = Array.from(input.files);

        const dt = new DataTransfer();

        if (input.files.length && this.images.length) {
            this.images.forEach(img => {
                dt.items.add(img.file);
            });
        }

        newFiles.forEach(file => {
            if (dt.files.length < 8) {
                dt.items.add(file);
            }
        });

        input.files = dt.files;

        this.images = Array.from(dt.files).map(file => ({
            file: file,
            url: URL.createObjectURL(file)
        }));
    },

        removeImage(index) {
            this.images.splice(index, 1);
        }
    }
}

Alpine.start()

document.addEventListener('DOMContentLoaded', async () => {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('nav a[href^="#"]');
    const observer = new IntersectionObserver(entries => {
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
    }, { rootMargin: '-50% 0px -50% 0px', threshold: 0 });
    sections.forEach(section => observer.observe(section));

    const saved = localStorage.getItem('locale')
        ?? document.cookie.split('; ').find(row => row.startsWith('locale='))?.split('=')[1]
        ?? 'id';

    if (!localStorage.getItem('locale') && saved) {
        localStorage.setItem('locale', saved);
    }

    currentLocale = saved;
    await loadLanguage(saved);
    updateLangIcon(saved);
    try { heroAnimation(); } catch(e){ console.warn(e) }
    try { heroRibbonAnimation(); } catch(e){ console.warn(e) }
    try { heroFloatingCards(); } catch(e){ console.warn(e) }
    try { heroIconParallax(); } catch(e){ console.warn(e) }
    try { navbarFloatAnimation(); } catch(e){ console.warn(e) }
    try { navbarScrollEffect(); } catch(e){ console.warn(e) }
    try { aboutAnimation(); } catch(e){ console.warn(e) }
    try { projectAnimation(); } catch(e){ console.warn(e) }
    try { projectModalAnimation(); } catch(e){ console.warn(e) }
    try { initmodal(); } catch(e){ console.warn(e) }
});
