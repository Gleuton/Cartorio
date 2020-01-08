function insertContato (cnpj) {
  $.get('/contato/formCad', function (data) {
    let footer = '<button type="button" class="btn btn-success" ' +
      'onclick="submit(\'/contato\',\'#formCadContato\')">salvar</button>'

    data = data.replace('{{ cnpj }}', cnpj)
    modal('Contato', data, footer)
  })

}


