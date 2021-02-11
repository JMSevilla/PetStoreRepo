function onaddtocart(id){
    $.ajax({
        method: 'post',
        url: 'sessions/session.php',
        data:{
            type: 'check'
        },
        success:function(response){
            console.log(response);
           
           try {
            var Generate = JSON.parse(response);
            if(Generate.accessCode == 'ACCESS'){
               swal('Yey!', 'Successfully Added to cart', 'success');
               
               onaddtocarthandler(id);
           }
           } catch (error) {
            swal('Oops!', 'You must login', 'error');
            return false;
           }
        }
    })
}

function onaddtocarthandler(id){
    $.ajax({
        method: 'POST',
        url: 'Handlers/carthandler.php',
        data: {
            action: 'update',
            id: id,
            isaccount: localStorage.getItem('email')
        },
        cache: false,
        success : function(response){
            console.log(response);
        },
        error: function(e){
            console.log(e);
        }
    })
}