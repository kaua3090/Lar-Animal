const nome = document.getElementById('txtNome');

nome.addEventListener('keyup', function(ev) {
  const input = ev.target;
  const value = ev.target.value;

  if (value.length <= 3) {
    input.classList.add('--has-error');
    
  } else {
    input.classList.remove('--has-error');
  }
});