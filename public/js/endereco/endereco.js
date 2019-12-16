function endereco (cartorio_cnpj) {
  let url = '/endereco/cartorio/' + cartorio_cnpj
  $.get('/dtlEndereco', function (data) {
    enderecoModal(url, data)
  })

  function enderecoModal (url, templateHtml) {
    let footer = btnExit();

    $.getJSON(url, function (data) {
      let body = 'Endereço não cadastrado'
      if (data){
        body = template(data, templateHtml)
      }
      modal('Endereço', body, footer)
    })
  }
}