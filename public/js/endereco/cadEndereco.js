function cadEndereco (cnpj) {

  $.get('/endereco/formCad', function (data) {
    let footer = '<button type="button" onclick="submitEndereco()"' +
      ' class="btn btn-success">Salvar</button>'

    data = data.replace('{{ cnpj }}', cnpj)

    modal('Endereço', data, footer)
  })
}

function submitEndereco () {

  submit('/endereco', '#formCadEndereco', function () {
    location.reload()
  })
}

function optionsEstados () {
  let select = $('#ufSelect')
  select.html('')

  $.getJSON('/uf', function (result) {
    $.each(result, function (key, value) {
      select.append($('<option />').val(value.uf).text(value.uf))
    })
  })
}

function optionsCidades (uf) {
  let select = $('#cidadeSelect')
  select.html('')

  $.getJSON('/cidade/uf/' + uf, function (result) {
    $.each(result, function (key, value) {

      select.append($('<option />').val(value.id_cidade).text(value.cidade))
    })
  })
}