$(document).ready(function() {

//Список параметров
 $(".choose").click(function(){
      $(this).parent('.col').children('.microModal').removeClass('d-none');
      return false;
  });

  //Установить параметр
   $(".param").click(function(){

      	var id = $(this).attr('rel');

        $.ajax({
      		  url: '/set_params/'+id, dataType: 'json', type: 'get',
      		  success: function(result){

              $('.modal').removeClass('show').addClass('fade').removeAttr('style');
              $('.modal-backdrop').remove();

              if(result.id_type==1) $('.door').css('border','10px solid '+result.img);
              if(result.id_type==2) $('.door').css('background', result.img).removeClass('bg-light');
              if(result.id_type==3) $('.knob').css('background', result.img);
              if(result.id_type==6) {
                if(result.id==5) {
                  $('.one').children(".knob").removeClass('right').addClass('left');
                  $('.two').children(".knob").removeClass('left').addClass('right');
                }
                if(result.id==6) {
                  $('.one').children(".knob").removeClass('left').addClass('right');
                  $('.two').children(".knob").removeClass('right').addClass('left');
                }
              }

              $('#choose'+result.id_type).text(result.param);
              $('.price').text(result.sum);

              return false;
      	    }
      	});

        $(this).parent('.row').parent('.microModal').addClass('d-none');
    });

    $(document).click(function (e) {
        $('.microModal').removeClass('d-none').addClass('d-none');
    });
});
