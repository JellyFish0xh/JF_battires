$(".loginform").submit(function(e){
    e.preventDefault();
    var myform = new FormData(this);
    $.ajax({
        url: '../fun/login.php',
        type: 'POST',
        data: myform,
        processData: false,
        contentType: false,
        success:function(res){
            var error = document.getElementById("error")
            res = res.trim();
            if(res=="EnterData"){
                error.innerText="Enter data";
                console.log("enterdata");
            }
            else if(res=="no-data-found"){
                error.innerText="Wrong username";
                console.log("wrong username");
            }
            else if(res=="wrong password")
            {
                error.innerText="Wrong Password";
                console.log("wrong password");
            }
            window.location.href = "../index.php";
        }
    });
})
