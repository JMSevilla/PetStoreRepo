function onsetadmin(id){
    
    $.ajax({
      method: 'post',
      url: 'server/DataHandler/usermanagementHandler.php',
      data: {
          usermngment: 'user',
          id: id
      } ,
      cache: false,
      success:function(response){
          var generateResponse = JSON.parse(response);
          if(generateResponse.statusCode == 'OK'){
             swal("Good!", "Successfully Set to Admin", "success");
            
              setTimeout(() => {
                window.location.href = "http://localhost/ecommerce-html-template/admin/usermanagementviews.php";
              }, 2000)
          }
      } 
    })
}

function onsetsupervisor(id){
    $.ajax({
        method: 'post', url: 'server/DataHandler/usermanagementHandler.php',
        data: {
            supervisor: 'supervisordata',
            id: id
        },
        cache: false,
        success: function(response){
            var generateResp = JSON.parse(response);
            if(generateResp.statusCode == 'OK'){
                swal("Good!", "Successfully Set to Supervisor", "success");
            
              setTimeout(() => {
                window.location.href = "http://localhost/ecommerce-html-template/admin/usermanagementviews.php";
              }, 2000)
            }
        }
    })
}

function onsetcustomer(id){
    $.ajax({
        method: 'post', url: 'server/DataHandler/usermanagementHandler.php',
        data: {
            customer: 'customer',
            id: id
        },
        cache: false,
        success: function(response){
            var generateCustomerResponse = JSON.parse(response);
            if(generateCustomerResponse.statusCode == 'OK'){
                swal("Good!", "Successfully Set to Customer", "success");
            
              setTimeout(() => {
                window.location.href = "http://localhost/ecommerce-html-template/admin/usermanagementviews.php";
              }, 2000)
            }
        }
    })
}

function onremoveuser(id){
    $.ajax({
        method: 'post', url: 'server/DataHandler/usermanagementHandler.php',
        data: {
            remover: 'remover',
            id: id
        },
        cache: false,
        success: function(response){
            var generateCustomerResponse = JSON.parse(response);
            if(generateCustomerResponse.statusCode == 'OK'){
                swal("Good!", "Successfully Removed user", "success");
            
              setTimeout(() => {
                window.location.href = "http://localhost/ecommerce-html-template/admin/usermanagementviews.php";
              }, 2000)
            }
        }
    })
}