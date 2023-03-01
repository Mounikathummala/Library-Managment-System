function func()
{
    var name=document.getElementById("name").value;
var regname=/\d+$/g;
var rollno=document.getElementById("rollno").value;
var regrno=/^\d{10}$/;
var mailid=document.getElementById("email").value;
var regmailid=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
var phone=document.getElementById("phone").value;
var regphno=/^\d{10}$/;
var pswd=document.getElementById("pswd").value;
var l=/[a-z]/g;
var c=/[A-Z]/g;
var d=/[0-9]/g;
if(name==" " || regname.test(name))
{
alert("enter valid name");
name.focus();
return false;
}
if(rollno==" " || !regrno.test(rollno))
{
alert("enter a valid 10 digit rollno");
rollno.focus();
return false;
}

if(mailid==" " || !regmailid.test(mailid))
{
alert("enter valid email id");
mailid.focus();
return false;
}
if(phone==" " || !regphno.test(phone))
{
alert("enter valid phone number");
phno.focus();
return false;
}
if(pswd=="" || !l.test(pswd) ||!c.test(pswd) || !d.test(pswd))
{
alert("your password should contain atleast one small letter,capital letter and a number");
pswd.focus();
return false;
}
return true;
}
