// JavaScript for VisitMalang website

document.querySelector('.profile-btn').addEventListener('click', function() {
    window.location.href = 'profile.php';
});

document.querySelector('.back-btn').addEventListener('click', function() {
    history.back();
});
