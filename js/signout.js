function onsignout(){
    $.ajax({
        url: 'api/signout.php',
        cache: false,
        success: function(response){
            localStorage.removeItem('email');
            setTimeout(() => {
                window.location.href = "http://localhost/ecommerce-html-template/login.php";
            }, 1000)
        }
    })
}