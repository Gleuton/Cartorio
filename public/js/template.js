function template (data, html) {
  $.each(data, function (key, value) {
    html = html.replace('{{ ' + key + ' }}', value)
  })

  return html
}

function modal (titulo, body, footer) {
  let myModal = $('#myModal')
  myModal.html('')
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

function submit (url, form, callback) {
  $('.error').html('')

  $.post(url, $(form).serialize(), function (serialize) {
    if (serialize['errors']) {
      $.each(serialize['errors'], function (key, value) {
        let error = $('#' + key).siblings('.error')
        error.html(value)
      })
      return 0;
    }
    callback(serialize)
  })

}