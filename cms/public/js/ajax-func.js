let email = document.getElementById("forgot-email");

email.addEventListener("focusout", function (){
  console.log("I am working");
  let emailAddress = email.value;
  let xhr = new XMLHttpRequest();
  url = "./public/phpservers/backgroundemail.php?email="+emailAddress;
  xhr.open("GET", url);
  xhr.onload = function () {
    if(xhr.status == 200){
      console.log(xhr.responseText);
      alert(xhr.responseText);
    }else{
      console.log(xhr.status);
      alert(xhr.status);
    }
  };
  xhr.send();
});
