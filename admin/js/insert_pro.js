$("#insert_product").submit(function(e){
    e.preventDefault();
    $.ajax({
            url:"fun/insert.php",
            type:"POST",
            data: new FormData(this),
            success:function(res){
				console.log(res);
			} ,
			error(err)
                        {
                                console.log(err);
			} ,
			processData : false ,
			contentType : false ,
        })
})

