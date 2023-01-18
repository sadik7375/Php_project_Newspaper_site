
//checkpassowrd
function passcheck() {
//pattern match password validation sir to ask


var p1=document.getElementById('Password1').value;
var p2=document.getElementById('password2').value;

if(p1.length<6){
document.getElementById('msg1').innerHTML="password length must be more than 6 charactor ";
document.getElementById('msg1').style.backgroundColor="rga(255,0,0";
}
else{

    document.getElementById('msg1').innerHTML=" password length ok";
}

if(p1!=p2)
{

   document.getElementById('pass').innerHTML="Password Don't match";
   document.getElementById('pass').style.backgroundColor="rga(255,0,0";
      document.getElementById('submitted').style.display="none";
}else{

  document.getElementById('pass').innerHTML="password matched";

}
}


/////////////////////////
//check phonenumber
function phonevalidation(){


var number=document.getElementById('phoneerror').value;
var two =number.substring(0,2);
if(number.length>11 || number.length<11)
{

   document.getElementById("errorphone").innerHTML="invalid phone number";
}

else if(two!= 01)
{
   document.getElementById(errorphone).innerHTML="invalid phone number";
}
else{

   document.getElementById("errorphone").innerHTML="valid phone number";

}


}







//Check email
function checkemail()
{
   var checkemail=document.getElementById('email').value;
    var erroremail=document.getElementById('error');
    erroremail.innerHTML="";

    if(checkemail.length<=2)
    {

       erroremail.innerHTML="Email address is invalid";
       return false;

    }
  
var atposition=checkemail.indexOf("@");  
var dotposition=checkemail.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=checkemail.length){  
  erroremail.innerHTML="Email address is invalid";  
  return false;  
  } 

    


}

function usercheck()
{

  $.ajax({

   type:"POST",
   url:"../adminsignupcontroller.php",
   cache:false,
   data:{

           type:1,
           username:$("#username").val(),


   },
   success:function(data)
   {

      $("#useravailable").html(data);

   }


});
}  







function validuser(){
              let username = document.getElementById('username').value;
            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../../controller/adminController/adminsignupcontroller.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('username='+username);
            xhttp.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    //alert(this.responseText);
                    document.getElementById('valid').innerHTML = this.responseText;
                    document.getElementById('valid').style.color = "red";
                    document.getElementById('valid').style.fontSize = 12+'px';
                }
            }
                }
            
    
function checkvalidemail(){
              let email = document.getElementById('email').value;
            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../../controller/adminController/adminsignupcontroller.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('email='+email);
            xhttp.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    //alert(this.responseText);
                    document.getElementById('error').innerHTML = this.responseText;
                    document.getElementById('error').style.color = "red";
                    document.getElementById('error').style.fontSize = 12+'px';
                }
            }
                }
            
    





