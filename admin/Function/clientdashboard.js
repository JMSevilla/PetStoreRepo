function onupdateclientdashboard(){
    var description = document.getElementById("description").value;
    if(!description){
        swal("Oops!", "Empty description", "error");
        return false;
    }
    else{
       
        $.ajax({
            method: 'post',
            url : 'server/DataHandler/clientDashboardHandler.php',
            data : {
                action: 'onclientaction',
                description: description
            },
            cache: false,
            success: function(response){
                var generate = JSON.parse(response);
                if(generate.statusCode == 200){
                    swal("Good!", "Successfully Update!", "success");
                }
            }
        })
    }q
}