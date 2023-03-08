$(".smsg").click(function(){
  console.log("test");
  var name = $("input[name='txtName']").val();
  var Email = $("input[name='txtEmail']").val();
  var Msg = $("textarea[name='txtMsg']").val();
  var fun = "smsg";
  var url ="fun/fun.php";
  $.post(url,{fun,name,Email,Msg},function(res)
  {
      $('input , textarea').val('');
      $(".res").html(res);
  });
});