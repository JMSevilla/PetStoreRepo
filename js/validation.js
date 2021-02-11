var firstname = document.getElementById("firstname");
firstname.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("onsubmit").click();
    }
})

var lastname = document.getElementById("lastname");
lastname.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("onsubmit").click();
    }
})

var email = document.getElementById("email");
email.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("onsubmit").click();
    }
})

var mobileno = document.getElementById("mobileno");
mobileno.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("onsubmit").click();
    }
}) 

var password = document.getElementById("password");
password.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("onsubmit").click();
    }
})

var conpassword = document.getElementById("conpassword");
conpassword.addEventListener("keyup", function(event){
    if(event.keyCode === 13){
        event.preventDefault();
        document.getElementById("onsubmit").click();
    }
})

$(document).ready(function(){
    $('#onsubmit').click(function(){
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var email = $('#email').val();
        var mobileno = $('#mobileno').val();
        var password = $('#password').val();
        var conpassword = $('#conpassword').val();
        let dataArray = {
            firstname: "",
            lastname: "",
            email: "",
            mobileno: "",
            password: ""
        }
        if(!firstname){
            swal("Oops!", "Firstname is empty", "error");
            return false;
        }
        else if(!lastname){
            swal("Oops!", "Lastname is empty", "error");
            return false;
        } 

        else if(!email){
            swal("Oops!", "Email is empty", "error");
            return false;
        }
        else if(!mobileno){
            swal("Oops!", "Mobile Number is empty", "error");
            return false;
        }

        else if(!password){
            swal("Oops!", "Password is empty", "error");
            return false;
        }

        else if(!conpassword){
            swal("Oops!", "Confirm Password is empty", "error");
            return false;
        }
        
        else if(password != conpassword){
            swal("Password not match");
            return false;
        }
        else{
            dataArray.firstname = firstname
            dataArray.lastname = lastname
            dataArray.email = email
            dataArray.mobileno = mobileno
            dataArray.password = password
            $.ajax({
                type: "POST",
                url: "api/registration.php",
                data: dataArray,
                success: function(response){
                    var generateResponse = JSON.parse(response);
                    if(generateResponse.statusCode == 'OK'){
                         // swal("Good job!", "Account registered", "success");  
                    localStorage.setItem("email", email);
                    localStorage.setItem("userdata", JSON.stringify(dataArray));
                    localStorage.setItem("firstname", dataArray.firstname);
                    localStorage.setItem("usraccess", 1);
                    $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");
                   setTimeout(() => {
                    window.location.href = "http://localhost/ecommerce-html-template/my-account.php";
                   }, 3000)
                    } else if(generateResponse.existCode == 'UserExist'){
                        swal("Oops!", "Account already taken please login", "warning");
                        return false;
                    }
                   
                },
                error: function(e){
                    console.log("Something went wrong" + e);
                }
            })
        }
    })
})


