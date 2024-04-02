document.getElementById('loginForm').addEventListener('submit', function(event) {
    var email = document.getElementById('email').value.trim();
    var senha = document.getElementById('senha').value.trim();

    if (email === 'email') {
        event.preventDefault();
        alert('Usuário não inseriu um email!');
    } else if (senha === 'senha') {
        event.preventDefault();
        alert('Usuário não inseriu uma senha!');
    }
});