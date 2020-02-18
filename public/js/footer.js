$(".custom-file-input").on("change", function() {  
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

//   $(function () {
//     $('#datetimepicker2').datetimepicker({
//         locale: 'ru'
//     });
// });

$(function () {
  $('#datetimepicker1').datetimepicker();
});

