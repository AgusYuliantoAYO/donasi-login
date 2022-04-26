function setDatePicker(){
  $(".datepicker").datepicker({
    format: "yyyy-mm-dd",
    todayHighlight: true,
    autoclose: true
  }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}
function setDateRangePicker(input1, input2){
  $(input1).datepicker({
    autoclose: true,
    format: "yyyy-mm-dd",
  }).on("change", function(){
    $(input2).val("").datepicker('setStartDate', $(this).val());
  }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  $(input2).datepicker({
    autoclose: true,
    format: "yyyy-mm-dd",
    orientation: "bottom right"
  }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}
function setMonthPicker(){
  $(".monthpicker").datepicker({
    format: "mm",
    maxViewMode: "months",
    minViewMode: "months",
    todayHighlight: true,
    autoclose: true
  }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}
function setYearPicker(){
  $(".yearpicker").datepicker({
    format: "yyyy",
    maxViewMode: "years",
    minViewMode: "years",
    todayHighlight: true,
    autoclose: true
  }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}
function setYearRangePicker(input1, input2){
  $(input1).datepicker({
    format: "yyyy",
    maxViewMode: "years",
    minViewMode: "years",
    todayHighlight: true,
    autoclose: true
  }).on("change", function(){
    $(input2).val("").datepicker('setStartDate', $(this).val());
  }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  $(input2).datepicker({
    format: "yyyy",
    maxViewMode: "years",
    minViewMode: "years",
    todayHighlight: true,
    autoclose: true,
    orientation: "bottom right"
  }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}