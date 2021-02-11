function onreceived(id){
    $.ajax({
        method: 'post',
        url: 'Handlers/onreceivedHandler.php',
        data: {
            action: 'onreceived',
            id: id
        },
        cache: false,
        success: function(response){
            var generate = JSON.parse(response);
            if(generate.removeStatusCode == 'OK'){
                swal('Good!', 'Successfully Removed!', 'success');
                setTimeout(() => {
                    window.location.href = "http://localhost/ecommerce-html-template/my-account.php";
                }, 2000)
            }
        }
    })
}