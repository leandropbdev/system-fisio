
//MOSTRAR SENHA
const passwordInput = document.getElementById("yourPassword");
let desc = document.querySelector("#desc");
function eyeSenha() {
    let inputTypeIsPassword = passwordInput.type == "password"
    

    if (inputTypeIsPassword) {
        //TROCAR O QUE TEM DENTRO DO TYPE DO INPUT DA SENHA
        passwordInput.setAttribute("type", "text")
        desc.innerHTML = "Ocultar senha"
    } else {
        passwordInput.setAttribute("type", "password")
        desc.innerHTML = "Mostrar senha"
    }
}

