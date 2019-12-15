function listCartorios () {
  $.getJSON('/cartorio', function (data) {
    let tb_body = ''
    $.each(data, function () {
      this.ativo = (this.ativo === '1') ? 'Sim' : 'Não'
      let tb_row = '<tr>'
      tb_row += '<td>' + this.nome_fantasia + '</td>'
      tb_row += '<td>' + this.razao_social + '</td>'
      tb_row += '<td>' + this.cnpj + '</td>'
      tb_row += '<td>' + this.tabeliao + '</td>'
      tb_row += '<td>' + this.ativo + '</td>'
      tb_row += '<td>' + this.nome_fantasia + '</td>'
      tb_row += '<td>' + this.nome_fantasia + '</td>'
      tb_row += '</tr>'
      tb_body += tb_row
    })
    $('#tbcartorios tbody').html(tb_body)
  })
}