window.addEventListener('load', function() {
    setTimeout(function() {
        const loader = document.querySelector('.loader-container');
        loader.style.display = 'none';
        document.querySelector('.content').style.display = 'block';
    }, 1000); // Le loader sera masqué après 3 secondes
});
