function endereco (cartorio_cnpj) {
  let url = '/endereco/cartorio/' + cartorio_cnpj
  $.get('/dtlEndereco', function (data) {
    enderecoModal(url, data)
  })

  function enderecoModal (url, templateHtml) {
    let footer = '<button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>';

    $.getJSON(url, function (data) {
      let body = 'Endereção não cadastrado'
      if (data){
        body = template(data, templateHtml)
      }
      modal('Endereço', body, footer)
    })
  }
}