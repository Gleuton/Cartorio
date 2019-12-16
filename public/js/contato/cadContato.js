function cadContato (cnpj) {
  $.get('/contato/formCad', function (data) {
    let footer = '<button type="button" class="btn btn-success" ' +
      'onclick="submitContato(\'' + cnpj + '\')">Avançar</button>'
    footer += '<button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>'

    data = data.replace('{{ cnpj }}', cnpj)
    modal('Contato', data, footer)
  })
}

function submitContato(cnpj)
{
  let next = function () {
    console.log(cnpj)
    //cadCartorio(cnpj);
  }
  submit('/contato','#formCadContato', next)
}
