function configurarExclusao(classeFormulario, mensagem) {

  const forms = document.getElementsByClassName(classeFormulario);

  for (let formulario of forms) {

    formulario.addEventListener("submit", function(event) {

      event.preventDefault();

      const confirmado = window.confirm(mensagem);

      if (confirmado) {
        event.target.submit();
      }

    });

  }

}

configurarExclusao(
  "formExcluir",
  "Deseja excluir esse animal?"
);

configurarExclusao(
  "formExcluirCliente",
  "Deseja excluir esse cliente?"
);

configurarExclusao(
  "formExcluirOng",
  "Deseja excluir essa ONG?"
);