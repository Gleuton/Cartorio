function cadCartorio () {

  $.get('/cartorio/formCad', function (data) {
    let footer = '<button type="button" onclick="submitCartorio()" class="btn btn-success" id="next">Avançar</button>'

    footer += '<button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>'

    modal('Cartorio', data, footer)

  })
}

function submitCartorio()
{
  let next = function (cnjp) {
    cadTabeliao(cnjp.cnpj);
  }
  submit('/cartorio','#formCadCartorio', next)
}
