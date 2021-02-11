function onremove(id){
    $.ajax({
        method: 'post',
        url: 'Handlers/isremovecartHandler.php',
        data: {
            action: 'removing',
            id: id
        },
        cache: false,
        success: function(response){
            var generate = JSON.parse(response);
            if(generate.statusCode == 200){
                swal('Good!', 'Successfully Removed', 'success');
                setTimeout(() => {
                    window.location.href = "http://localhost/ecommerce-html-template/cart.php";
                }, 2000)
            }
        }
    })
}