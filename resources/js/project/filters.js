document.addEventListener('DOMContentLoaded', () => {

    const searchInput = document.getElementById('project-search');
    const filterButtons = document.querySelectorAll('.filter-btn');

    if (!searchInput && filterButtons.length === 0) return;

    const params = new URLSearchParams(window.location.search);

    // =========================
    // SET INITIAL SEARCH VALUE
    // =========================
    if (searchInput) {
        searchInput.value = params.get('search') ?? '';

        searchInput.addEventListener('keydown', e => {
            if (e.key === 'Enter') {
                params.set('search', searchInput.value);
                params.delete('page');
                window.location.search = params.toString();
            }
        });
    }

    // =========================
    // FILTER BUTTONS
    // =========================
    filterButtons.forEach(btn => {

        if (btn.dataset.filter === (params.get('type') ?? 'all')) {
            btn.classList.add('border-primary');
        }

        btn.addEventListener('click', () => {

            const filter = btn.dataset.filter;

            if (filter === 'all') {
                params.delete('type');
            } else {
                params.set('type', filter);
            }

            params.delete('page');
            window.location.search = params.toString();
        });

    });

    // =========================
    // HIGHLIGHT SEARCH RESULT
    // =========================
    const keyword = params.get('search');

    if (keyword) {
        highlightText(keyword);
    }

});


// ========================================
// HIGHLIGHT FUNCTION
// ========================================
function highlightText(keyword) {

    const safeKeyword = escapeRegex(keyword);
    const regex = new RegExp(`(${safeKeyword})`, 'gi');

    // Highlight normal visible text
    const elements = document.querySelectorAll(
        '.project-folder h3, .project-folder p, .tech-row span'
    );

    elements.forEach(el => {

        if (el.children.length > 0) return;

        const originalText = el.textContent;

        if (regex.test(originalText)) {
            el.innerHTML = originalText.replace(
                regex,
                '<span class="search-highlight">$1</span>'
            );
        }
    });


    // ===============================
    // HANDLE HIDDEN TECH TOOLTIP
    // ===============================
    const tooltips = document.querySelectorAll('.tech-tooltip');

    tooltips.forEach(tooltip => {

        const original = tooltip.innerHTML;

        if (regex.test(tooltip.textContent)) {

            tooltip.innerHTML = original.replace(
                regex,
                '<span class="search-highlight">$1</span>'
            );

            // buka tooltip otomatis
            tooltip.style.opacity = '1';
            tooltip.style.visibility = 'visible';

            // tambahin indicator di +X
            const parent = tooltip.closest('.tech-more');
            if (parent) {
                parent.classList.add('tech-match');
            }
        }

    });

}



// ========================================
// ESCAPE REGEX (biar aman karakter aneh)
// ========================================
function escapeRegex(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}
