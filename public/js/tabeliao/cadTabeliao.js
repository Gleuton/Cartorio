function cadTabeliao (cnpj) {
  $.get('/tabeliao/formCad', function (data) {
    let footer = '<button type="button" class="btn btn-success" ' +
      'onclick="submitTabeliao(\'' + cnpj + '\')">Avançar</button>'
    footer += '<button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>'

    data = data.replace('{{ cnpj }}', cnpj)
    modal('Tabelião', data, footer)
  })
}

function submitTabeliao (cnpj) {
  let next = function () {
    cadContato(cnpj)
  }
  submit('/tabeliao', '#formCadTabeliao', next)
}
