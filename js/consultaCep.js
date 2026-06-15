const HTML_cep = document.getElementById("txtCep");
HTML_cep.addEventListener("blur", (e) => {
     let valor_cep = document.getElementById("txtCep").value;
     let search = valor_cep.replace("-", "");
     fetch(`https://viacep.com.br/ws/${search}/json/`).then((response) => {
          response.json().then(data => {
               console.log(data);
               document.getElementById("txtCidade").value = data.localidade;
               document.getElementById("txtBairro").value = data.bairro;
               document.getElementById("txtRua").value = data.logradouro;
          })
     })
})


