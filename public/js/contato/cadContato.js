function cadContato (cnpj) {
  $.get('/contato/formCad', function (data) {
    let footer = '<button type="button" class="btn btn-success" ' +
      'onclick="submitContato(\'' + cnpj + '\')">Avançar</button>'

    data = data.replace('{{ cnpj }}', cnpj)
    modal('Contato', data, footer)
  })
}

function submitContato(cnpj)
{
  let fone = $("#fone")
  fone.val(fone.val().replace(/[^\d]+/g,''))
  let next = function () {
    cadEndereco(cnpj);
  }
  submit('/contato','#formCadContato', next)
}
