const container = document.getElementById('container');
const loginForm = document.getElementById('loginForm');

// Referências aos campos de login e elementos de erro
const loginEmail = document.getElementById('loginEmail');
const loginPassword = document.getElementById('loginPassword');
const loginError = document.getElementById('loginError');

// Referência ao botão de mostrar/ocultar senha
const loginTogglePassword = document.getElementById('loginTogglePassword');

// Manipulador de eventos para alternar visibilidade da senha
loginTogglePassword.addEventListener('click', () => {
    if (loginPassword.type === 'password') {
        loginPassword.type = 'text';
        loginTogglePassword.textContent = 'Ocultar';
    } else {
        loginPassword.type = 'password';
        loginTogglePassword.textContent = 'Mostrar';
    }
});

// Validação do formulário de login
loginForm.addEventListener('submit', (e) => {
    e.preventDefault(); // Evita o envio do formulário padrão

    // Verifica se os campos estão preenchidos
    if (loginEmail.value === '' || loginPassword.value === '') {
        loginError.style.display = 'block'; // Exibe a mensagem de erro
    } else {
        loginError.style.display = 'none'; // Oculta a mensagem de erro
        // Aqui você pode adicionar o código para processar o login
        console.log('Login bem-sucedido!'); // Por exemplo, enviar os dados ao servidor
        loginForm.submit(); // Envia o formulário após validação
    }
});
