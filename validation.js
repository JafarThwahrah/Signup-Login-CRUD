let signupForm = document.getElementById("signUpForm");

signupForm.addEventListener("submit", function (evt) {
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
  const Email = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
  const Password = new RegExp(/([a-zA-Z]+[0-9]+)/);
  const CPassword = new RegExp(/([a-zA-Z]+[0-9]+)/);

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
      alert(`JS FILE WELCOME ${username}`);
    //   window.location.href='index.php'   
    } else {
      alert("Please confirm your password again");
      
    }
  } else {
    alert(
      "Please make sure to enter acorrect username,password and email address"
    );
  }
}

// regForm.addEventListener("submit", function (e) {
//     if (fName.value && lName.value && signEmail.value && signPassword.value) {
//       let verified = false;
//       e.preventDefault();
//       // get data into array
//       if (arr != null) {
//         arr.forEach((user) => {
//           if (signEmail.value != user.email) {
//             verified = true;
//           }
//         });

//         if (verified) {
//           signUpAction();
//         } else {
//           alert("This email is already registered!");
//         }
//       } else {
//         signUpAction();
//       }
//     } else {
//       e.preventDefault();
//       return false;
//     }
//   });

//   function signUpAction() {
//     usersArr.push(
//       new User(fName.value, lName.value, signEmail.value, signPassword.value)
//     );
//     console.log(usersArr);
//     // save array into local
//     localStorage.setItem("users", JSON.stringify(usersArr));
//     //set current user
//     localStorage.setItem(
//       "currentloggedin",
//       JSON.stringify(usersArr[usersArr.length - 1])
//     );
//     window.location = "./taskpage.html";
//     alert(`Welcome ${fName.value} ${lName.value}`);
//   }
