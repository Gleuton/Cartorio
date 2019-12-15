function listCartorios () {
  $.get('/listCartorio', function (data) {
    tbCartorio(data)
  })

  function tbCartorio (template) {

    $.getJSON('/cartorio', function (data) {
      let rw = ''
      $.each(data, function (key, value) {
        rw += trcartorio(value)
      })
      template = template.replace('{{ trcartorios }}', rw)
      $('#content').html(template)
    })
  }

  function trcartorio (td) {
    let tr = '<tr>'
    td.ativo = (td.ativo) ? 'sim' : 'não'
    td.acoes = acoes(td.cnpj)
    tr += '<td>' + td.nome_fantasia + '</td>'
    tr += '<td>' + td.razao_social + '</td>'
    tr += '<td>' + td.cnpj + '</td>'
    tr += '<td>' + td.tabeliao + '</td>'
    tr += '<td>' + td.ativo + '</td>'
    tr += '<td>' + td.acoes + '</td>'

    tr += '</tr>'

    return tr
  }

  function acoes (cnpj) {
    return '<div class="btn-group" role="group">' +
      '<button type="button" class="btn btn-default" onclick="endereco(\''+cnpj+'\')">Endereço</button>' +
      '<button type="button" class="btn btn-default" onclick="contato(\''+cnpj+'\')">Contato</button>' +
      '<button type="button" class="btn btn-default" onclick="editar(\''+cnpj+'\')">Editar</button>' +
      '</div>'
  }

}