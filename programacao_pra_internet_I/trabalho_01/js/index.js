function storageForm() {
    localStorage.setItem('nome', document.forms['dadosPessoais']['nome'].value.toUpperCase());
    localStorage.setItem('endereco', document.forms['dadosPessoais']['endereco'].value);
    localStorage.setItem('cidade', document.forms['dadosPessoais']['cidade'].value);
    localStorage.setItem('estado', document.forms['dadosPessoais']['estado'].value);
    localStorage.setItem('usuario', document.forms['dadosPessoais']['usuario'].value);

    alert('Dados cadastrados com Sucesso!')

}

function showData() {
    document.getElementById('showNome').innerHTML = localStorage.getItem('nome');
    document.getElementById('showEndereco').innerHTML = localStorage.getItem('endereco');
    document.getElementById('showCidade').innerHTML = localStorage.getItem('cidade');
    document.getElementById('showEstado').innerHTML = localStorage.getItem('estado');
    document.getElementById('showUsuario').innerHTML = localStorage.getItem('usuario');
}

function verifyPassword() {
    var password = document.forms['dadosPessoais']['password'].value;
    var confirmPassword = document.forms['dadosPessoais']['confirm_password'].value;

    if (password != confirmPassword) {
        document.forms['dadosPessoais']['password'].setCustomValidity('As senhas devem ser iguais!');
    } else {
        document.forms['dadosPessoais']['password'].setCustomValidity('');
    }

}