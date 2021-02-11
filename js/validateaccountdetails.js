var firstname = document.getElementById("txtfirstname");
firstname.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("btnupdate").click();
    }
});
var lastname = document.getElementById("txtlastname");
lastname.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("btnupdate").click();
    }
});
var mobileno = document.getElementById("txtmob");
mobileno.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("btnupdate").click();
    }
});
var email = document.getElementById("txtemail");
email.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("btnupdate").click();
    }
});
var address = document.getElementById("txtadd");
address.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("btnupdate").click();
    }
});
var currentpassword = document.getElementById("txtcurrentpw");
currentpassword.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("btnsavechanges").click();
    }
});
var newpassword = document.getElementById("txtnp");
newpassword.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("btnsavechanges").click();
    }
});
var conpassword = document.getElementById("txtcp");
conpassword.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("btnsavechanges").click();
    }
});

function previewFile(input){
    var file = $("input[type=file]").get(0).files[0];
    var reader = new FileReader();
    if(file){
        
        reader.onload = function(){
            $("#preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}
var lateimage = "";
function btnupdate(){
    var property = document.getElementById("file").files[0];
        lateimage = property;
    
    
 
var firstname = $('#txtfirstname').val();
var lastname = $('#txtlastname').val();
var mobileno = $('#txtmob').val();
var address = $('#txtadd').val();
var email = $('#txtemail').val();
if(!firstname){
    swal("Oops","First name must be filled out!","warning");
    return false;
}
else if(!lastname){
    swal("Oops","Last name must be filled out!","warning");
    return false;
}
else if(!mobileno){
    swal("Oops","Mobile Number must be filled out!","warning");
    return false;
}
else if(!email){
    swal("Oops","Email must be filled out!","warning");
    return false;
}

else{
    var OauthForm = new FormData();
    
    OauthForm.append("file", property);
    OauthForm.append("firstname", firstname);
    OauthForm.append("lastname", lastname);
    OauthForm.append("mobile", mobileno);
    OauthForm.append("address", address);
    OauthForm.append("email", email)
    OauthForm.append("acountupdateaction", "update");
    $.ajax({
        method: 'post',
        url: 'Handlers/AccountDetailsUpdateHandler.php',
        data: OauthForm,
        cache: false,
        processData: false,
contentType: false,
        success: function(response){
           
            swal("Good!", "Successfully Update Account Details!", "success");
            setTimeout(() => {
                window.location.href = "http://localhost/ecommerce-html-template/my-account.php";
            }, 2000)
        }
    })
}
}

$('#btnsavechanges').click(function(){
    var currentpassword = $('#txtcurrentpw').val();
    var newpassword = $('#txtnp').val();
    var conpassword = $('#txtcp').val();

        if(!currentpassword){
            swal("Oops","Current password must be filled out!","warning");
            return false;
        }
        else if(!newpassword){
            swal("Oops","New password must be filled out!","warning");
            return false;
        }
        else if(!conpassword){
            swal("Oops","Confirm password must be filled out!","warning");
            return false;
        }        
        else if(newpassword != conpassword){
            
            swal("Oops!","Password didn't match","error");
            return false;
        }      
       else{
             $.ajax({
                 method: 'post',
                 url: 'Handlers/ChangePasswordHandler.php',
                 data: {
                     current_password: currentpassword,
                     currentaction : "curr"
                 },
                 cache: false,
                 success: function(response){
                     var generateResponse = JSON.parse(response);
                     if(generateResponse.match == 'OK'){
                         //update function
                         updatenewpassword(newpassword);
                     }else if(generateResponse.mismatch == 404){
                         swal("Oops!", "Current Password Incorrect Please try again.", "error");
                         return false;
                     }
                 }
             })
       }
       
    });

    function updatenewpassword(newpass){
        $.ajax({
            method: 'post',
            url: 'Handlers/ChangePasswordHandler.php',
            data: {
                newpassword: newpass,
                newpasswordaction: 'newpassword'
            },
            cache: false,
            success: function(response){
                console.log(response);
                var generateResp = JSON.parse(response);
                if(generateResp.statusCode == "OK"){
                    swal("Good!", "Successfully Change Password", "success");
                    setTimeout(() => {
                        window.location.href = "http://localhost/ecommerce-html-template/my-account.php";
                    }, 2000)
                }
            }
        })
    }