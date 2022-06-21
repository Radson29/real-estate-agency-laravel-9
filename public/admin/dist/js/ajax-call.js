function deleteData(route, id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    swal({
      title: "Jesteś pewny?",
      text: "Czy napewno chcesz usunąć",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // var CSRF_TOKEN = `{{ csrf_token() }}`;
        // console.log(CSRF_TOKEN);
        $.ajax({
            type: 'POST',
            url: route,
            data : {'_method' : 'DELETE', '_token' : CSRF_TOKEN },
         
            success : function(data) {
                // table1.ajax.reload();
                swal({
                  title: "Usunięto pomyślnie!",
                  text: "",
                  icon: "success",
                  button: "Ok",
                });
                $("#row_"+id).remove();
            },
            error : function () {
                swal({
                    title: 'Ops...',
          
                    timer: '1500'
                })
            }
        });
      } else {
        swal("powrót");
      }
    });
  }