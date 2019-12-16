function cadTabeliao (cnpj) {
  $.get('/tabeliao/formCad', function (data) {
    let footer = '<button type="button" class="btn btn-success" onclick="submitTabeliao()">Avançar</button>'
    footer += '<button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>'
    console.log(cnpj)
    data = data.replace('{{ cnpj }}', cnpj)
    modal('Tabelião', data, footer)
  })
}

function submitTabeliao()
{
  let next = function () {
    cadCartorio();
  }
  submit('/tabeliao','#formCadTabeliao', next)
}
