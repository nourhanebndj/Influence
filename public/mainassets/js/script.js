//Humberger menu (Home)
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

//Slider functions
let slideIndex = 0;
showSlides(slideIndex);

function prevSlide() {
    showSlides(slideIndex -= 1);
}

function nextSlide() {
    showSlides(slideIndex += 1);
}

function showSlides(n) {
    let slides = document.getElementsByClassName("testimonial-slide");
    
    if (n >= slides.length) { 
        slideIndex = 0; 
    }
    if (n < 0) { 
        slideIndex = slides.length - 1; 
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "flex";
}

//Humberger menu (Other pages)
function toggleMobileMenu() {
    const mobileMenu = document.querySelector('#mobile-menu');
    mobileMenu.classList.toggle('hidden');
}

// Toggle Dropdown for Languages
function toggleDropdown() {
    const dropdownContent = document.querySelector('.dropdown-content');
    dropdownContent.classList.toggle('show');
}

// Close the dropdown if clicked outside
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        const dropdowns = document.getElementsByClassName("dropdown-content");
        for (let i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};

