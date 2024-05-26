document.getElementById('NavMobile').addEventListener('click', function () {
    const menu = document.getElementById('MenuItems');
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
});