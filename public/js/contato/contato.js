function contato (cartorio_cnpj) {
  let url = '/contato/cartorio/' + cartorio_cnpj
  $.get('/dtlContato', function (data) {
    contatoModal(url, data)
  })

  function contatoModal (url, templateHtml) {
    let footer = '<button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>';

    $.getJSON(url, function (data) {
      let body = 'Contato não cadastrado'
      if (data){
        body = template(data, templateHtml)
      }
      modal('Contato', body, footer)
    })
  }
}