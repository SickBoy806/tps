// resources/js/app.js
import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Desktop dropdowns
    const dropdownBtns = document.querySelectorAll('.dropdown-btn');
    
    dropdownBtns.forEach(btn => {
        const content = btn.nextElementSibling;
        
        // Show dropdown on hover for desktop
        btn.parentElement.addEventListener('mouseenter', () => {
            content.classList.remove('hidden');
        });
        
        btn.parentElement.addEventListener('mouseleave', () => {
            content.classList.add('hidden');
        });
        
        // Also handle click for touch devices
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            content.classList.toggle('hidden');
        });
    });

    // Mobile dropdowns
    const mobileDropdownBtns = document.querySelectorAll('.mobile-dropdown-btn');
    
    mobileDropdownBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const content = btn.nextElementSibling;
            content.classList.toggle('hidden');
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.relative')) {
            document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        }
        
        if (mobileMenu && !mobileMenu.contains(e.target) && !menuBtn.contains(e.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
});