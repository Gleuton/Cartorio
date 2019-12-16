function sendxmlModal (cnpj) {
  $.get('/send/xml', function (data) {
    let footer = btnExit();

    modal('Importar XML', data, footer)
  })
}
