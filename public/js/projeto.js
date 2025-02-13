function deleteRegistroPaginacao(rotaUrl, idDoRegistro) {
    alert(rotaUrl);
    alert(idDoRegistro);

    if (confirm('Deseja confirmar a exclusão?')){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id :idDoRegistro,
            },
            beforeSend: function(){
                $.blockUI({
                    message: 'Carregando...',
                    timeout: 2000,
                });
            },
        }).done(function(data){
            $.unblockUI();
            if(data.success == true) {
                window.location.reload();
            } else {
                alert('Nao foi possivel buscar os dados.')
            }

        }).fail(function (data) {
            $.unblockUI();
            alert('Não foi possivel buscar os dados');
        });
    }
}
//inputIp e InputData
$('#InputIp').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });

$('#InputData').mask('00/00/0000');


