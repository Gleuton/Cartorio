function cadCartorio () {

  $.get('/cartorio/formCad', function (data) {
    let footer = '<button type="button" onclick="submitCartorio()" class="btn btn-success">Avançar</button>'

    footer += btnExit()

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
