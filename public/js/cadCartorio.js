function cadCartorio () {
  $.get('/cartorio/formCad', function (data) {
    let footer = '<button type="button" class="btn btn-success" onclick="next()">Avançar</button>'
    footer += '<button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>'

    modal('Cartorio', data, footer)
  })

}

function next () {
  $('.error').html('')
  let form = $('#formCadCartorio')
  $.post('/cartorio', form.serialize(), function (result) {
    if (result['errors']) {
      $.each(result['errors'], function (key, value) {
        let error = $('#' + key).siblings('.error')
        error.html(value)

      })
    }
  })
}