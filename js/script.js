document.addEventListener('DOMContentLoaded', function() {
    // Мобильное меню
    const menuToggle = document.createElement('div');
    menuToggle.className = 'menu-toggle';
    menuToggle.innerHTML = '☰ Меню';
    document.querySelector('header').appendChild(menuToggle);
    
    const nav = document.querySelector('nav');
    menuToggle.addEventListener('click', function() {
        nav.style.display = nav.style.display === 'block' ? 'none' : 'block';
    });
    
    // Закрытие меню при клике на ссылку (для мобильных)
    document.querySelectorAll('nav a').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                nav.style.display = 'none';
            }
        });
    });
    
    // Плавная прокрутка
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});