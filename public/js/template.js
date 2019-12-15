function template (data, html) {
  $.each(data, function (key, value) {
    html = html.replace('{{ ' + key + ' }}', value)
  })

  return html
}

function modal (titulo, body, footer) {
  let myModal = $('#myModal')
  let modal = {
    'title': titulo,
    'body': body,
    'footer': footer,
  }
  $.get('/modal', function (data) {
    data = template(modal, data)

    myModal.html(data)
  })
  myModal.modal()
}