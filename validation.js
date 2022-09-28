// Need to fetch data from php post

let signupForm = document.getElementById("Signupformbtn");

signupForm.addEventListener("click", function (evt) {
  evt.preventDefault();

  let username = document.forms["regForm"]["usrname"].value;
  let email = document.forms["regForm"]["email"].value;
  let password = document.forms["regForm"]["pass"].value;
  let cpassword = document.forms["regForm"]["cpass"].value;

  console.log("hello world!");
  console.log(username, email, password, cpassword);
  checkPassword(username, email, password, cpassword);
});

function checkPassword(username, email, password, cpassword) {
  const Name = new RegExp(/[a-zA-Z]+ [a-zA-Z]+ [a-zA-Z]+ [a-zA-Z]/);
  const Email = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})/);
  const Password = new RegExp(/([a-zA-Z]+[0-9])/);
  const CPassword = new RegExp(/([a-zA-Z]+[0-9])/);

  console.log(Name.test(username));
  console.log(Name.test(email));
  console.log(Name.test(password));
  console.log(Name.test(cpassword));

  if (
    Name.test(username) &&
    Email.test(email) &&
    Password.test(password) &&
    CPassword.test(cpassword)
  ) {
    if (password == cpassword) {
        window.location.href='register.php'
    } else {
      alert("Please confirm your password again");
    }
  } else {
    alert(
      "Please make sure to enter acorrect username,password and email address"
    );
  }
}
