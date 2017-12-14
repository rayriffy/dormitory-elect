(function($){
  $(function(){
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('.collapsible').collapsible();
    $('.modal').modal({
      startingTop: '4%',
      endingTop: '10%'
    });
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false,
      hover: false,
      belowOrigin: false,
      alignment: "left",
      stopPropagation: false
    });
    $('.timepicker').pickatime({
      default: '16:00',
      fromnow: 0,
      twelvehour: false,
      donetext: 'OK',
      cleartext: 'Clear',
      canceltext: 'Cancel',
      autoclose: false,
      ampmclickable: true,
      aftershow: function(){}
    });
    $('.datepicker').pickadate({
      selectMonths: true,
      selectYears: 10,
      today: 'Today',
      clear: 'Clear',
      close: 'Ok',
      closeOnSelect: false
    });
  });
})(jQuery);
