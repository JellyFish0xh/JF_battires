$(".loginform").submit(function(e){
    e.preventDefault();
    var myform = new FormData(this);
    $.ajax({
        url: 'fun/login.php',
        type: 'POST',
        data: myform,
        processData: false,
        contentType: false,
        success:function(res){
            console.log(res);
            var error = $(".error");
            if(res=="no_data"){
                error[0].innerHTML="Enter data";
            }
            else if(res==1){
                error[0].innerHTML="Wrong username";
            }
            else if(res==2)
            {
                error[1].innerText="Wrong Password";
            }
            else{
                alert("hello");
            }
        }
    });
})
