function startcount(){
$.ajax({
    method: 'POST',
    url: 'Handlers/cartcounterHandler.php',
    data: {
        action: 'count',
        isaccount: localStorage.getItem('email')
    },
    cache:false,
    success: function(response){
        
         var generatorResponse = JSON.parse(response);
        if(generatorResponse.stateGetter.pdname > 0){
            document.getElementById("totalcounts").innerHTML = "(" + generatorResponse.stateGetter.pdname + ")";
        }else{
            document.getElementById("totalcounts").innerHTML = "(" + 0 + ")";
        }
    }
})
}

setInterval(() => {
startcount();
}, 2000)

function navigatecart(){
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
               window.location.href= "http://localhost/ecommerce-html-template/cart.php";
           }
           } catch (error) {
            swal('Oops!', 'You must login', 'error');
            return false;
           }
        }
    })
}