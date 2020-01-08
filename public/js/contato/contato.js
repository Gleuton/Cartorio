function contato (cartorio_cnpj) {
  let url = '/contato/cartorio/' + cartorio_cnpj
  $.get('/dtlContato', function (data) {
    contatoModal(url, data, cartorio_cnpj)
  })

  function contatoModal (url, templateHtml, cartorio_cnpj) {
    let footer = '<button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>'
    let body = '<h4>Contato não cadastrado.</h4>'

    body += '<button type="button" onclick="insertContato('+cartorio_cnpj+')" class="btn btn-success">inserir</button>'

    $.getJSON(url, function (data) {

      if (data) {
        body = template(data, templateHtml)
      }
      modal('Contato', body, footer)
    })
  }
}