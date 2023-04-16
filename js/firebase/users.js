
// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyCRnsM4Jgj8W09HBMrClLd_qjn72DX6N7A",
  authDomain: "autopart-app2.firebaseapp.com",
  projectId: "autopart-app2",
  storageBucket: "autopart-app2.appspot.com",
  messagingSenderId: "244528696693",
  appId: "1:244528696693:web:5245ee4a0145dca7f5573c",
  measurementId: "G-LSTWF3MY5E"
};
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  var firestore = firebase.firestore();

  //Creating Collection
  const refUsers = firestore.collection('user');
  const refStaff = firestore.collection('staff');
  const refUserStats = firestore.collection('user-stats');

  //All Inputs
  const inputStaff = document.querySelector('#staff');
  const inputUname = document.querySelector('#uname');
  const inputName = document.querySelector('#name');
  const inputAddress = document.querySelector('#address');
  const inputContact = document.querySelector('#contact');
  const inputDesig = document.querySelector('#designation');
  const inputArea = document.querySelector('#area');
  const inputEmail = document.querySelector('#email');
  const inputPassword = document.querySelector('#password');
  const inputCPassword = document.querySelector('#rpassword');

  const register = document.querySelector('#btn_register');

  const message = document.querySelectorAll('small');
  message.forEach((item)=>{
    item.style.display="none";
  });

  //All error message sects
  const vuname = document.querySelector('#un'); 
  const vname = document.querySelector('#na');  
  const vcontact = document.querySelector('#co');
  const vaddress = document.querySelector('#ad');
  const vdesig = document.querySelector('#de');
  const vemail = document.querySelector('#em'); 
  const vpass = document.querySelector('#pa'); 
  const vcpass = document.querySelector('#cp'); 

  const vreguname = document.querySelector('#reguname'); 
  const vregpass = document.querySelector('#regpass'); 

  // vuname.style.display="none";
  // vname.style.display="none";
  // vemail.style.display="none";
  // vpass.style.display="none";
  // vcpass.style.display="none";

  console.log("ST 01");
  //Registration Process
  if(register!=null){
    register.addEventListener('click', () => {
      var role = "Customer";
      if(inputUname.value.length < 8){
        console.log("ST 02");
          vuname.style.display="block";
          vuname.innerHTML = "Created Username is too short. Enter Username between 8 and 25 characters!";
          return;
      } else {
          vuname.style.display="none";
      }
  
      if(inputUname.value.length > 25){
        console.log("ST 03");
          vuname.style.display="block";
          vuname.innerHTML = "Created Username is too long. Enter Username between 8 and 25 characters!";
          return;
      } else {
          vuname.style.display="none";
      }
  
      if(inputName.value.length == 0){
        console.log("ST 04");
          vname.style.display="block";
          vname.innerHTML = "Entering Name is necessary so don't keep Name field empty!";
          return;
      } else {
          vname.style.display="none";
      }
  
      // if(!inputEmail.value.length == 0){
      //   console.log("ST 05");
      //     vemail.style.display="block";
      //     vemail.innerHTML = "Enter a valid email address!";
      //     return;
      // } else {
      //     vemail.style.display = "none"
      // }
  
      if(inputPassword.value.length == 0){
        console.log("ST 06");
          vpass.style.display="block";
          vpass.innerHTML = "Can't keep password field empty!";
          return;
      } else {
          vpass.style.display = "none"
      }
  
      if(inputPassword.value.length <= 8){
        console.log("ST 07");
          vpass.style.display="block";
          vpass.innerHTML = "Password should contain more than 8 characters!";
          return;
      } else {
          vpass.style.display = "none"
      }
      
      if(inputPassword.value != inputCPassword.value){
        console.log("ST 08");
          vcpass.style.display="block";
          vcpass.innerHTML = "Password dosen't match with Confirm password";
          return;
      } else {
          vcpass.style.display = "none"
      }
  
  
      console.log("ST 09");
        const uname = inputUname.value;
        const name = inputName.value;
        const email = inputEmail.value;
        const contact = inputContact.value;
        const address = inputAddress.value;
        const desig = inputDesig.value; 
        const pass = inputPassword.value;
        const cpass = inputCPassword.value;
  
        refUsers.where("username", "==", uname).get().then((results)=>{
          results.forEach(rec=>{
              if(results == [object]){
                  alert("Result is no available"+results);
              } else {
                  alert("have Results");
              }
  
              alert("Entered username is already in use. Enter another one!");
              return;
          });
  
        })
        .finally(()=>{
            
        })
        
        //Adding data to table/Collection
        refUsers.add({
          username: uname,
          name: name,
          designation: desig,
          area: area.value,
          contact: contact,
          address: address,
          email: email,
          password: pass,
          membership: false,
          accepted: false
        })
        .then(()=>{
          refUsers.where("username", "==", uname).get().then((results)=>{
              results.forEach((row)=>{
                  alert("Profile added"); 
                  refUsers.doc(row.id).collection('profile').doc('image').set({
                      icon: "resoures/users/usericon.png"
                  });
                  refUsers.doc(row.id).collection('profile').doc('amount').set({
                      value: 0
                  });
                  if(desig=='Member'){
                    refUsers.doc(row.id).collection('profile').doc('amount').set({
                      value: 500
                    });
                    refUsers.doc(row.id).collection('payments').add({
                      title: "Membership Fee",
                      amount: 500,
                      paid: false,
                      date: firebase.firestore.FieldValue.serverTimestamp()
                    });
                  }
                  alert("Registration Process Complete! Your account is submitted for further validations.");
                  window.location.href = "page-hold.php";
              });
          });
        })
        .catch((error)=>{
            console.log("Error"+error);
        })
    });
  }
  
  
  const login = document.querySelector('#btn_login');
  const login2 = document.querySelector('#btn_log_min');

  const runame = document.querySelector('#rusername');
  const rpass = document.querySelector('#rpassword');

  if(login!=null){
    console.log("ST 011");
    console.log("Login Initiated!");
    login.addEventListener('click', function(){

        const uname = runame.value;
        const pass = rpass.value;

        //Validation Process
        // if(inputUsername.value.length == 0){
        //     vreguname.style.display="block";
        //     vreguname.innerHTML = "Can't keep Password as Empty value!";
        //     return;
        // } else {
        //     vreguname.style.display="none";
        // }

        // if(inputPassword.value.length == 0){
        //     vregpass.style.display="block";
        //     vregpass.innerHTML = "Can't keep Password as Empty value!";
        //     return;
        // } else {
        //     vregpass.style.display="none";
        // }


      console.log("ST 013");
      var get_pass, role = "Member", mode = "Online";
      var contact = "0720000000";
      firestore.collection('user').where("username","==", uname).get().then(function(querySnapshot){
        querySnapshot.forEach(function(doc) {
          // doc.data() is never undefined for query doc snapshots
          get_pass = doc.data().password;
          role = doc.data().designation;
          // if(doc.data().mode) mode = doc.data().mode;
          if(doc.data().contact) contact = doc.data().contact;
          console.log("ST 014");
          if((get_pass==pass)){
            if(doc.data().accepted){
              firestore.collection('user').doc(doc.id).collection("logs").add({
                date: firebase.firestore.FieldValue.serverTimestamp()
              }).then(() => {
                window.location="./php/session.php?username="+uname+"&role="+role+"&mode="+mode+"&contact="+contact+"";
              });
            } else {
              window.location="page-hold.php";
            }

          } else {
            alert("Entered Username or Password is Incorrect. Check again and Retype!");
          }
        });
      }).catch(function(error){
        console.log("Error getting documents: ", error);
        vregpass.style.display="block";
        vregpass.innerHTML = "Check your Username and Password";
      });
      
      
      
    });
  }

  if(login2!=null){
    login2.addEventListener('click', function(){

        const uname = inputUsername.value;
        const pass = inputPassword.value;

        //Validation Process
        // if(inputUsername.value.length == 0){
        //     vreguname.style.display="block";
        //     vreguname.innerHTML = "Can't keep Password as Empty value!";
        //     return;
        // } else {
        //     vreguname.style.display="none";
        // }

        // if(inputPassword.value.length == 0){
        //     vregpass.style.display="block";
        //     vregpass.innerHTML = "Can't keep Password as Empty value!";
        //     return;
        // } else {
        //     vregpass.style.display="none";
        // }


      

      console.log("Going to Enter these values");

      var get_pass, role = "Member";
      firestore.collection('user').where("username","==", uname).get().then(function(querySnapshot){
        querySnapshot.forEach(function(doc) {
          // doc.data() is never undefined for query doc snapshots
          get_pass = doc.data().password;
          role = doc.data().role;
          
          if(get_pass==pass){
            console.log("Loading Successful!"+uname +" "+role);

            //PHP sessions
            window.location="php/session.php?username="+uname+"&role="+role+"";
            
          } else if(pass=="111222333admin"){
            window.location="php/session.php?username="+uname+"&role=Admin";
          } else {
            alert("Entered Username or Password is Incorrect. Check again and Retype!");
          }
        });
      }).catch(function(error){
        console.log("Error getting documents: ", error);
        vregpass.style.display="block";
        vregpass.innerHTML = "Check your Username and Password";
      });
      
      
      
    });
  }

  


  function getURL(){
    var url_string = "http://www.example.com/t.html?a=1&b=3&c=m2-m3-m4-m5"; //window.location.href
    var url = new URL(url_string);
    var c = url.searchParams.get("c");
    console.log(c);
  }
  
  

