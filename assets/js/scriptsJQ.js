
$(document).ready(function(){
  // date picker for record_date field in form
    $( "#recordDate" ).datepicker({
      dateFormat: 'yy-mm-dd'
    });
    $( "#pastDate" ).datepicker({
      dateFormat: 'yy-mm-dd'
    });
    $( "#recentDate" ).datepicker({
      dateFormat: 'yy-mm-dd'
    });

    // Nav bar adjust on scroll
    $(window).scroll(function(){
      if($(document).scrollTop() > 100){
          $('#navBar a').removeClass('nav-design');
          $('#navBar a').addClass('nav-design-active');
        //  $('#navBar').removeClass('bg-opacity-light');
          $('#navBar').addClass('bg-full-light');
          $('#navBar').css({'height':'65px'});
      }else{
        $('#navBar a').addClass('nav-design');
        $('#navBar a').removeClass('nav-design-active');
      //  $('#navBar').addClass('bg-opacity-light');
        $('#navBar').removeClass('bg-full-light');
        $('#navBar').css({'height':'55px'});
      }

    });


});
