$.ajaxSetup({
	headers:{
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
  });

  $(document).ready(function() {  	  	
    $('.lActivo').change(function() {      
      var id = $(this).attr('id');
      var row = $(this).parents('tr');
      var form = $(this).parents('form');
      var url = form.attr('action');
      if ($(this).prop('checked')) {      	      	
      	$.post(url, form.serialize(), function(data) {      		
      		console.log('Activado '+id);  
      		row.removeClass('danger inactivo');
      		row.addClass('success');      		      		
      	});
      }
      else{
      	$.post(url,form.serialize(), function(data) {
      		console.log('Desactivado '+id);
      		row.addClass('danger inactivo');
      		row.removeClass('success');      		
      	});
      }
    });


  $('.estados').change(function(e) {
    console.log(e);
    var idEstado=$(this).val();
    $.get('encontrarMunicipios/'+idEstado, function(data) {
          // console.log(data);
          // console.log(idEstado);
          $('#idMunicipios').empty();
          $.each(data, function(index, val) {
             $('#idMunicipios').append('<option value="'+val.id+'">'+val.nombre+'</option>');
          });
        });    
   
  }); 


  });
