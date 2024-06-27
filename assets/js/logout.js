document.addEventListener('DOMContentLoaded', function () {
    let countdownElement = document.getElementById('countdown');
    let countdown = 3;

    const interval = setInterval(() => {
        countdown--;
        countdownElement.textContent = countdown;

        if (countdown <= 0) {
            clearInterval(interval);
            window.location.href = 'login.php';
        }
    }, 1000);
});
