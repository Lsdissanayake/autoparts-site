console.log("Data Launched!");
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
  const refItems = firestore.collection('items');
  const refReserve = firestore.collection('reserves');
  const refList = firestore.collection('list');
  const refMails = firestore.collection('mails');
  const refOrders = firestore.collection('orders');
  const refUsers = firestore.collection('user');
  const refContact = firestore.collection('contacts');
  const refStats = firestore.collection('stats');
  const refArea = firestore.collection('areas');

//   Input Fields
const bname = document.querySelector('#name');
const isbn = document.querySelector('#isbn');
const userd = document.querySelector('#user');
const eprice = document.querySelector('#price');
const qty = document.querySelector('#qty'); 
const category = document.querySelector('#category');
const desc = document.querySelector('#description');
// const upload_sect = document.querySelector('#upload2');
const item_submit = document.querySelector('#btn_book');
var uploaded = '';
var uploaded2 = 'sample.png';
var requests = [];

if(item_submit){
  
  item_submit.addEventListener('click', () => {
    refItems.add({
      name: bname.value,
      category: category.value,
      user: userd.value,
      info: desc.value,
      price: parseInt(eprice.value),
      qty: parseInt(qty.value),
      image: uploaded2,
      copy: uploaded
    }).then(() => {
      alert("Your Item has added");
      window.location.href = "items.php";
    })
  });
}

function testSMS(contact, message) {
        const endPoint = "php/notify-custom.php";
        setTimeout(() => {
          alert("Message has sent!");
          $.post(endPoint, {
            contact: contact,
            message: message
          }, function(response) {
            console.log(response);
          });
        }, 10000);
}

// Items >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function getItemsTable(mode, role) {
  console.log("Syncing");
  let tble = document.getElementById("tb-books");
  refItems.get().then((snaps) => {
    snaps.forEach((snap) => {
      let sample = '';
      let image = 'icons/logo/download.png';
      if(mode=="Physical"&&snap.data().copy){
        return;
      }
      if(snap.data().copy){
        sample = `<a href="js/firebase/uploads/${snap.data().copy}" target="_blank"><small>[LINK]</small></a>`;
      }
      if(!(!(snap.data().image)||snap.data().image=='')){
        image = `js/firebase/uploads/${snap.data().image}`;
      }
      let tr = document.createElement('tr');
      tr.innerHTML = `
      <td class="text-center"><img src=${image} alt="homepage" class="dark-logo" width="30" height="30"/></td>
      <td>${snap.id}</td>
      <td>${snap.data().name} ${sample}</td>
      <td><span class="badge badge-dark">${snap.data().category}</span></td>
      <td>${snap.data().user}</td>
      <td>${snap.data().price}</td>
      <td>${snap.data().qty}</td>
      <td>
        <a href='item.php?id=${snap.id}&cat=${snap.data().category}' class="btn btn-info">View</a>
      </td>
      `;
      let td = document.createElement('td');
      let a = document.createElement('a');
      a.className = "btn btn-danger";
      a.innerText = "Remove";
      a.onclick = () => deleteItem(snap.id);
      if(role=="Admin"||role=="Management Staff") td.appendChild(a);
      
      tr.appendChild(td);
      tble.appendChild(tr);
    });
  });
}

function getYourItemsTable(user) {
  console.log("Syncing");
  let tble = document.getElementById("tb-items");
  refItems.where("user", "==", user).get().then((snaps) => {
    snaps.forEach((snap) => {
      let sample = '';
      let image = 'icons/logo/download.png';
      
      if(!(!(snap.data().image)||snap.data().image=='')){
        image = `js/firebase/uploads/${snap.data().image}`;
      }
      let tr = document.createElement('tr');
      tr.innerHTML = `
      <td class="text-center"><img src=${image} alt="homepage" class="dark-logo" width="30" height="30"/></td>
      <td>${snap.id}</td>
      <td>${snap.data().name}</td>
      <td>${snap.data().category}</td>
      <td>${snap.data().price}</td>
      <td>${snap.data().qty}</td>
      <td>
        <a href='item.php?id=${snap.id}&cat=${snap.data().category}' class="btn btn-info">View</a>
      </td>
      `;
      let td = document.createElement('td');
      let a = document.createElement('a');
      a.className = "btn btn-danger";
      a.innerText = "Remove";
      a.onclick = () => deleteItem(snap.id);
      td.appendChild(a);
      tr.appendChild(td);
      tble.appendChild(tr);
    });
  });
}

function getItemsCatelog(mode) {
  console.log("Syncing");
  let tble = document.getElementById("cat-sect");
  refItems.get().then((snaps) => {
    snaps.forEach((snap) => {
      let sample = '';
      let image = 'icons/logo/download.png';
      if(mode=="Physical"&&snap.data().copy){
        return;
      }
      if(snap.data().copy){
        sample = `<a href="js/firebase/uploads/${snap.data().copy}" target="_blank"><small>[LINK]</small></a>`;
      }
      if(!(!(snap.data().image)||snap.data().image=='')){
        image = `js/firebase/uploads/${snap.data().image}`;
      }
      let tr = document.createElement('div');
      tr.className="col-md-3";
      tr.innerHTML = `
                        <div class="card">
                            <div class="card-body text-center">
                                <img src=${image} alt="homepage" class="dark-logo" width="150"/>
                                <a href="#"><h4 class="card-title" id="cb-name">${snap.data().name}</h4></a>
                                <br>
                                Rs.<span id="cb-author" style="font-size:50px">${snap.data().price}</span>.00
                                <p id="cb-details">${snap.data().info}</p>
                                <p>Available QTY: <span id="cb-qty">${snap.data().qty}</span></p>
                                <span class="badge badge-dark">${snap.data().category}</span>
                                <hr>
                                <a href='item.php?id=${snap.id}&cat=${snap.data().category}' class="btn btn-info">View</a>

                            </div>
                        </div>
      `;
      tble.appendChild(tr);
    });
  });
}

function getItemProductsCatelog(mode) {
  console.log("Items syncing");
  let tble = document.getElementById("cat-sect");
  refItems.get().then((snaps) => {
    snaps.forEach((snap) => {
      if(!(snap.data().category=="Products"))return;
      let sample = '';
      let image = 'icons/logo/download.png';
      if(mode=="Physical"&&snap.data().copy){
        return;
      }
      if(snap.data().copy){
        sample = `<a href="js/firebase/uploads/${snap.data().copy}" target="_blank"><small>[LINK]</small></a>`;
      }
      if(!(!(snap.data().image)||snap.data().image=='')){
        image = `js/firebase/uploads/${snap.data().image}`;
      }
      let tr = document.createElement('div');
      tr.className="col-md-3";
      tr.innerHTML = `
                        <div class="card">
                            <div class="card-body text-center">
                                <img src=${image} alt="homepage" class="dark-logo" width="150"/>
                                <a href="#"><h4 class="card-title" id="cb-name">${snap.data().name}</h4></a>
                                <br>
                                Rs.<span id="cb-author" style="font-size:50px">${snap.data().price}</span>.00
                                <p id="cb-details">${snap.data().info}</p>
                                <p>Available QTY: <span id="cb-qty">${snap.data().qty}</span></p>
                                <span class="badge badge-dark">${snap.data().category}</span>
                                <hr>
                                <a href='item.php?id=${snap.id}&cat=${snap.data().category}' class="btn btn-info">View</a>

                            </div>
                        </div>
      `;
      tble.appendChild(tr);
    });
  });
}

function getItemSuppliesCatelog(mode, type) {
  console.log("Items syncing");
  let tble = document.getElementById("cat-sect");
  tble.innerHTML = '';
  refItems.get().then((snaps) => {
    snaps.forEach((snap) => {
      if(!(snap.data().category=="Fertilizer"||snap.data().category=="Chemicals"||snap.data().category=="Seeds"||snap.data().category=="Tools"))return;
      if(!(snap.data().category=="Fertilizer")&&type=="Fertilizer") return;
      if(!(snap.data().category=="Chemicals")&&type=="Chemicals") return;
      if(!(snap.data().category=="Seeds")&&type=="Seeds") return;
      if(!(snap.data().category=="Tools")&&type=="Tools") return;

      let sample = '';
      let image = 'icons/logo/download.png';
      if(mode=="Physical"&&snap.data().copy){
        return;
      }
      if(snap.data().copy){
        sample = `<a href="js/firebase/uploads/${snap.data().copy}" target="_blank"><small>[LINK]</small></a>`;
      }
      if(!(!(snap.data().image)||snap.data().image=='')){
        image = `js/firebase/uploads/${snap.data().image}`;
      }
      let tr = document.createElement('div');
      tr.className="col-md-3";
      tr.innerHTML = `
                        <div class="card">
                            <div class="card-body text-center">
                                <img src=${image} alt="homepage" class="dark-logo" width="150"/>
                                <a href="#"><h4 class="card-title" id="cb-name">${snap.data().name}</h4></a>
                                <br>
                                Rs.<span id="cb-author" style="font-size:50px">${snap.data().price}</span>.00
                                <p id="cb-details">${snap.data().info}</p>
                                <p>Available QTY: <span id="cb-qty">${snap.data().qty}</span></p>
                                <span class="badge badge-dark">${snap.data().category}</span>
                                <hr>
                                <a href='item.php?id=${snap.id}&cat=${snap.data().category}' class="btn btn-info">View</a>

                            </div>
                        </div>
      `;
      tble.appendChild(tr);
    });
  });
}

function getItemToolsCatelog(mode) {
  console.log("Syncing");
  let tble = document.getElementById("cat-sect");
  refItems.where("category", "==", "Tools").get().then((snaps) => {
    snaps.forEach((snap) => {
      let sample = '';
      let image = 'icons/logo/download.png';
      if(mode=="Physical"&&snap.data().copy){
        return;
      }
      if(snap.data().copy){
        sample = `<a href="js/firebase/uploads/${snap.data().copy}" target="_blank"><small>[LINK]</small></a>`;
      }
      if(!(!(snap.data().image)||snap.data().image=='')){
        image = `js/firebase/uploads/${snap.data().image}`;
      }
      let tr = document.createElement('div');
      tr.className="col-md-3";
      tr.innerHTML = `
                        <div class="card">
                            <div class="card-body text-center">
                                <img src=${image} alt="homepage" class="dark-logo" width="150"/>
                                <a href="#"><h4 class="card-title" id="cb-name">${snap.data().name}</h4></a>
                                <br>
                                Rs.<span id="cb-author" style="font-size:50px">${snap.data().price}</span>.00
                                <p id="cb-details">${snap.data().info}</p>
                                <p>Available QTY: <span id="cb-qty">${snap.data().qty}</span></p>
                                <hr>
                                <a href='item.php?id=${snap.id}&cat=${snap.data().category}' class="btn btn-info">View</a>

                            </div>
                        </div>
      `;
      tble.appendChild(tr);
    });
  });
}

function getItemsCatelogByCategory(mode, cat) {
  console.log("Syncing");
  let tble = document.getElementById("cat-sect");
  refItems.where("category", "==", cat).limit(4).get().then((snaps) => {
    snaps.forEach((snap) => {
      let sample = '';
      let image = 'icons/logo/download.png';
      if(mode=="Physical"&&snap.data().copy){
        return;
      }
      if(snap.data().copy){
        sample = `<a href="js/firebase/uploads/${snap.data().copy}" target="_blank"><small>[LINK]</small></a>`;
      }
      if(!(!(snap.data().image)||snap.data().image=='')){
        image = `js/firebase/uploads/${snap.data().image}`;
      }
      let tr = document.createElement('div');
      tr.className="col-md-3";
      tr.innerHTML = `
                        <div class="card">
                            <div class="card-body text-center">
                                <img src=${image} alt="homepage" class="dark-logo" width="150"/>
                                <a href="#"><h4 class="card-title" id="cb-name">${snap.data().name}</h4></a>
                                <br>
                                Rs.<span id="cb-author" style="font-size:50px">${snap.data().price}</span>.00
                                <p id="cb-details">${snap.data().info}</p>
                                <p>Available QTY: <span id="cb-qty">${snap.data().qty}</span></p>
                                <hr>
                                <a href='item.php?id=${snap.id}&cat=${snap.data().category}' class="btn btn-info">View</a>

                            </div>
                        </div>
      `;
      tble.appendChild(tr);
    });
  });
}

function getItemsTableBySearches(type, term, mode, role, sub){
  console.log("Syncing");
  let tble = document.getElementById("tb-books");
  tble.innerHTML = '';
  refItems.get().then((snaps) => {
    snaps.forEach((snap) => {
      let image = 'icons/logo/download.png';
      if(mode=="Physical"&&snap.data().copy){
        return;
      }
      if(sub=='Products'&&(snap.data().category!='Products')) return;
      if(sub=='Fertilizer'&&(snap.data().category!='Fertilizer')) return;
      if(sub=='Chemicals'&&(snap.data().category!='Chemicals')) return;
      if(sub=='Seeds'&&(snap.data().category!='Seeds')) return;
      if(sub=='Tools'&&(snap.data().category!='Tools')) return;
      // if(sub=='products'&&(snap.data().copy&&snap.data().category!='Products')) {return;}
      // else if(sub=='supplies'&&(!snap.data().copy||snap.data().copy=='')) {return;}
      if(!snap.data().name.toLowerCase().match(term)&&type=='name'){
        return;
      } else if(!snap.data().category.toLowerCase().match(term)&&type=='category'){
        return;
      }

      let sample = '';
      if(snap.data().copy){
        sample = `<a href="js/firebase/uploads/${snap.data().copy}" target="_blank"><small>[LINK]</small></a>`;
      }
      if(!(!(snap.data().image)||snap.data().image=='')){
        image = `js/firebase/uploads/${snap.data().image}`;
      }
      let tr = document.createElement('tr');
      tr.innerHTML = `
      <td class="text-center"><img src=${image} alt="homepage" class="dark-logo" width="30" height="30"/></td>
      <td>${snap.id}</td>
      <td>${snap.data().name} ${sample}</td>
      <td>${snap.data().category}</td>
      <td>${snap.data().user}</td>
      <td>${snap.data().price}</td>
      <td>${snap.data().qty}</td>
      <td>
        <a href='item.php?id=${snap.id}&cat=${snap.data().category}' class="btn btn-info">View</a>
        
      </td>
      `;
      let td = document.createElement('td');
      let a = document.createElement('a');
      a.className = "btn btn-danger";
      a.innerText = "Remove";
      a.onclick = () => deleteItem(snap.id);
      if(role=="Admin"||role=="Management Staff") td.appendChild(a);
      tr.appendChild(td);
      tble.appendChild(tr);
    });
  });
}

function getItem(id, user) {
  const sect = document.getElementById("book-sect");
  const btn = document.getElementById("btn-order");
  refItems.doc(id).get().then((doc) => {
    let image = 'icons/logo/download.png';
    let sample = ``;
    if(user ==doc.data().user) {
      btn.style.display = "none";
    }
    if(!(!(doc.data().image)||doc.data().image=='')){
      image = `js/firebase/uploads/${doc.data().image}`;
    }
    if(doc.data().qty<=0){
      sample = `<a class="btn btn-warning" href="item-add-to-list.php?id=${doc.id}&book=${doc.data().name}">Add to Reminder List</a>`;
    }
    let div = document.createElement('div');
    div.innerHTML = `
    <div>
      <h4 class="card-title">${doc.data().name}</h4>
      <h6 class="card-subtitle">${doc.data().category}</h6>
      <hr>
      <img src=${image} alt="homepage" class="dark-logo" height="200"/>
      <br>
      <br>
      Rs.<span id="cb-author" style="font-size:50px">${doc.data().price}</span>.00
      <p>Quantity: ${doc.data().qty}</p>
      <div class="form-row">
        <input type="range" class="form-range" placeholder="Quantity" id="qty" min="1" value="1" max="${doc.data().qty}"  oninput="this.nextElementSibling.value = this.value">
        <output>1</output>
      </div>
      <p>${doc.data().info}</p>
      <hr>
      ${sample}
      <hr>
      
    </div>
    
    `;
    sect.appendChild(div);
  })
}

function getItemForOrder(id, user, qty) {
  const sect = document.getElementById("item-sect");
  refItems.doc(id).get().then((doc) => {
    let image = 'icons/logo/download.png';
    let sample = `<a onclick="createOrder('${doc.data().name}', '${id}', '${user}', ${doc.data().price}, ${qty}, '${doc.data().user}', '${doc.data().category}')" class="btn btn-success">Order Now</a>`;
    if(!(!(doc.data().image)||doc.data().image=='')){
      image = `js/firebase/uploads/${doc.data().image}`;
    }
    if(doc.data().qty<=0){
      sample = `<a class="btn btn-warning" href="item-add-to-list.php?id=${doc.id}&book=${doc.data().name}">Add to Reminder List</a>`;
    }
    let div = document.createElement('div');
    div.innerHTML = `
    <div>
      <h4 class="card-title">${doc.data().name}</h4>
      <h6 class="card-subtitle">${doc.data().category}</h6>
      <hr>
      <img src=${image} alt="homepage" class="dark-logo" height="200"/>
      <br>
      <br>
      TOTAL PRICE:
      <br><br>
      Rs.<span id="cb-author" style="font-size:50px">${doc.data().price*qty}</span>.00
      <p>${doc.data().info}</p>
      <hr>
      ${sample}
      <hr>
      
    </div>
    
    `;
    sect.appendChild(div);
  })
}

function deleteItem(id) {
  refItems.doc(id).delete().then(() => {
    alert("Your Item is deleted");
    window.location.reload();
  })
}

function rateItem(item, user, val, comment) {
  refItems.doc(item).collection("rates").add({
    user: user,
    value: val,
    comment: comment,
  }).then(() => {
    refItems.doc(item).get().then((rec) => {
      let rate = rec.data().rate;
      let voters = rec.data().ratecount;
      if(isNaN(rate)) rate = 0;
      if(isNaN(voters)) voters = 0;
      refItems.doc(item).update({
        rate: (rate + val),
        ratecount: (voters + 1)
      });
    }).then(() => alert("Your Rating added."));
  });
}

function getItemRate(id) {
  console.log("Rates Syncing");
  var imscore = document.getElementById('rate');
  var impvotes = document.getElementById('voters');
  var rate = 0, users = 0;
  const container = document.getElementById('comments');
  refItems.doc(id).collection("rates").get().then((docs) => {
    docs.forEach((doc) => {
      users++;
      rate = rate + doc.data().value;
      let com_container = document.createElement('div');
      com_container.className = "ct-contact list-light";
      let row = document.createElement('div');
      row.className = "row";

      let col1 = document.createElement('div');
      col1.className = "col";

      let name = document.createElement('span');
      name.className = "ct-txt-highlight";
      name.innerText = doc.data().user;
      let br = document.createElement('br');
      let comm = document.createElement('div');
      comm.className = "text-left";
      comm.innerText = doc.data().comment;

      col1.appendChild(name);
      col1.appendChild(br);
      col1.appendChild(comm);


      let col2 = document.createElement('div');
      col2.className = "col";

      let tray = document.createElement('div');
      tray.className = "ct-flex-tray";

      let rate_txt = document.createElement('span');
      rate_txt.innerText = "User Rate |";

      let star1 = document.createElement('span');
      let star2 = document.createElement('span');
      let star3 = document.createElement('span');
      let star4 = document.createElement('span');
      let star5 = document.createElement('span');

      let icon1 = document.createElement('i');
      icon1.className = "fas fa-star";
      let icon2 = document.createElement('i');
      icon2.className = "fas fa-star";
      let icon3 = document.createElement('i');
      icon3.className = "fas fa-star";
      let icon4 = document.createElement('i');
      icon4.className = "fas fa-star";
      let icon5 = document.createElement('i');
      icon5.className = "fas fa-star";

      let arr = [icon1, icon2, icon3, icon4, icon5];
      for(let i = 0; i<doc.data().value; i++) {
        arr[i].className = "fas fa-star ct-blink-star";
      }

      star1.appendChild(icon1);
      star2.appendChild(icon2);
      star3.appendChild(icon3);
      star4.appendChild(icon4);
      star5.appendChild(icon5);

      tray.appendChild(rate_txt);
      tray.appendChild(star1);
      tray.appendChild(star2);
      tray.appendChild(star3);
      tray.appendChild(star4);
      tray.appendChild(star5);
      col2.appendChild(tray);


      row.appendChild(col1);
      row.appendChild(col2);
      com_container.appendChild(row);
      container.appendChild(com_container);

    });
  }).then(() => {
    console.log("Rates Sections");
    imscore.innerText = rate/users;
    impvotes.innerText = users;
  });
}

// Orders >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function createOrder(name, id, user, total, qty, seller, category){
  refOrders.add({
    name: name,
    user: user,
    seller: seller,
    id: id,
    total: total,
    qty:qty,
    category: category,
    approved: false, 
    date: firebase.firestore.FieldValue.serverTimestamp()
  }).then(() => {
    alert("Order is Settled");
    window.location.href = "items-catelog.php";
  })
}

function getOrder(user, id) {
  refUsers.where("username", "==", user).get().then((user) => {
    user.forEach((doc) => {
      refUsers.doc(doc.id).collection("orders").doc(id).get().then((order) => {
        console.log(order);
      })
    })
  });
}

function getOrdersMade(user) {
  console.log("Orders syncing");

  const container = document.getElementById('tb-items');
  refOrders.where("user", "==", user).orderBy("date", "desc").get().then((snaps) => {
    snaps.forEach((snap) => {
      // if(snap.data().approved==true) return;
      let tr = document.createElement('tr');
      let td1 = document.createElement('td');
      let a1 = document.createElement('a');
      
      let line = `<span class="badge badge-secondary">New</span>`;

      tr.innerHTML = `
      <td>${snap.data().date.toDate()}</td>
      <td>${snap.data().id}</td>
      <td>${snap.data().name}</td>
      <td>${snap.data().seller}</td>
      <td>${snap.data().approved}</td>`;


      let td2 = document.createElement('td');
      let a2 = document.createElement('a');
      a2.className = "btn btn-warning";
      a2.innerText = "Pay Now";
      a2.onclick = () => payOrder(snap.id);
      if((!snap.data().paid||snap.data().paid==false)&&snap.data().approved)td2.appendChild(a2);
      
      tr.appendChild(td2);

      let td = document.createElement('td');
      let a = document.createElement('a');
      a.className = "btn btn-danger";
      a.innerText = "Remove";
      a.onclick = () => deleteOrder(snap.id);
      td.appendChild(a);
      tr.appendChild(td);
      container.appendChild(tr);

    })
  })
}

function getOrdersSold(user) {
  console.log("Orders syncing");

  const container = document.getElementById('tb-sold');
  refOrders.where("seller", "==", user).orderBy("date", "desc").get().then((snaps) => {
    snaps.forEach((snap) => {
      // if(snap.data().approved==false) return;
      let tr = document.createElement('tr');
      let td1 = document.createElement('td');
      let a1 = document.createElement('a');
      
      let line = `<span class="badge badge-secondary">New</span>`;

      tr.innerHTML = `
      <td>${snap.data().date.toDate()}</td>
      <td>${snap.data().id}</td>
      <td>${snap.data().name}</td>
      <td>${snap.data().user}</td>
      <td>${snap.data().paid||false}</td>`;

      let td2 = document.createElement('td');
      let a2 = document.createElement('a');
      a2.className = "btn btn-warning";
      a2.innerText = "Approve";
      a2.onclick = () => approveOrder(snap.id);
      if(snap.data().approved==false) {td2.appendChild(a2);}
      tr.appendChild(td2);

      let td = document.createElement('td');
      let a = document.createElement('a');
      a.className = "btn btn-danger";
      a.innerText = "Remove";
      a.onclick = () => deleteOrder(snap.id);
      td.appendChild(a);
      tr.appendChild(td);
      container.appendChild(tr);

    })
  })
}

function getSalesMadeAsAO() {
  console.log("Orders syncing");

  const container = document.getElementById('tb-items');
  refOrders.where("approved", "==", true).orderBy("date", "desc").get().then((snaps) => {
    snaps.forEach((snap) => {
      let tr = document.createElement('tr');
      let td1 = document.createElement('td');
      let a1 = document.createElement('a');
      
      let line = `<span class="badge badge-secondary">New</span>`;

      tr.innerHTML = `
      <td>${snap.data().date.toDate()}</td>
      <td>${snap.data().id}</td>
      <td>${snap.data().name}</td>
      <td>${snap.data().seller}</td>
      <td>${snap.data().user}</td>`;


      let td = document.createElement('td');
      let a = document.createElement('a');
      a.className = "btn btn-danger";
      a.innerText = "Remove";
      a.onclick = () => deleteOrder(snap.id);
      td.appendChild(a);
      tr.appendChild(td);
      container.appendChild(tr);

    })
  })
}



function approveOrder(id) {
  refOrders.doc(id).update({
    approved: true
  }).then(() => {
    alert("Order Approved Successfully"); 
    window.location.reload();
  });
}

function deleteOrder(id) {
  refOrders.doc(id).delete().then(() => {
    alert("Order is deleted");
    window.location.reload();
  });
}

function payOrder(id) {
  refOrders.doc(id).update({
    paid: true
  }).then(() => {
    alert("Ppaid for Your Order!"); 
    window.location.reload();
  });
}

// Areas >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function addArea(user, area) {
  refArea.where("user", "==", user).get().then((snaps) => {
    if(snaps.empty){
      refArea.add({
        user: user,
        date: firebase.firestore.FieldValue.serverTimestamp(),
        area: parseFloat(area)
      }).then(() => {
        alert("Your area is updated.");
        window.location.href = "profile.php?user="+user;
      })
    } else {
      refArea.where("user", "==", user).get().then((docs) => {
        docs.forEach((doc) => {
          refArea.doc(doc.id).update({
            area: parseFloat(area)
          }).then(() => {
            alert("Your area is updated.");
            window.location.href = "profile.php?user="+user;
          })
        })
      })
    }
  })
}

function getLlatestArea(user) {
  refArea.where("user", "==", user).orderBy("date", "desc").get().then(() => {
    
  })
}

// Issue Tax >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function issueFineForReserve(user, fine) {
  console.log(user, fine);
  refUsers.where("username", "==", user).get().then((docs) => {
    docs.forEach((doc) => {
      refUsers.doc(doc.id).collection('payments').doc("Book Fine").set({
        title: "Book Fine",
        amount: fine,
        paid: false,
        date: firebase.firestore.FieldValue.serverTimestamp()
      });
    })
  });
}
function issueTax(user, title, fine, list) {
  console.log(user, fine);
  refUsers.where("username", "==", user).get().then((docs) => {
    docs.forEach((doc) => {
      refUsers.doc(doc.id).collection('payments').add({
        title: title,
        amount: fine,
        list: list,
        paid: false,
        date: firebase.firestore.FieldValue.serverTimestamp()
      });
    })
  });
}

function getBookReservesCatelog(user, contact) {
  console.log("Book Reserves syncing");
  var fine = 0;
  let tble = document.getElementById("cat-sect");
  let danger = document.getElementById("sect-danger");
  danger.style.display = "none";
  refReserve.where("borrower", "==", user).get().then((snaps) => {
    snaps.forEach((snap) => {
      let sample = '';
      let image = 'icons/logo/download.png';
      let left = 0;
      let passed = "left";
      if(snap.data().accepted==false){
        return;
      } 
      if(snap.data().paid&&snap.data().paid==true){
        return;
      } 
      if(snap.data().handover&&snap.data().handover==true){
        return;
      } 
      if(snap.data().handover_date){
        left = 1 + Math.round((snap.data().handover_date.toDate()-firebase.firestore.Timestamp.fromDate(new Date()).toDate())/(1000*3600*24));
        if(left<10&&left>0){
          testSMS(contact, `You have ${left} days to return ${snap.data().book}.`);
        }
      }
      
      let tr = document.createElement('div');
      tr.className="col-md-3";
      tr.innerHTML = `
                        <div class="card">
                            <div class="card-body text-center">
                                <img src=${image} alt="homepage" class="dark-logo" width="150"/>
                                <a href="#"><h4 class="card-title" id="cb-name">${snap.data().book}</h4></a>
                                <span id="cb-author">${snap.data().handover_date.toDate()|| "No Date"}</span>
                                <p id="cb-details">${Math.abs(left)} days ${passed}</p>
                                
                                <hr>
                                <a href='item.php?id=${snap.data().id}' class="btn btn-info">View</a>

                            </div>
                        </div>
      `;

      if(snap.data().handover&&snap.data().handover==false){
        tble.appendChild(tr);
      } else if(!snap.data().handover) {
        tble.appendChild(tr);
      }
      
    })
  }).then(() => {
    
  });
}

// Mails >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function createMail(sender, receiver, subject, message) {
  refMails.add({
    sender: sender,
    receiver : receiver,
    subject: subject,
    message: message,
    read: false,
    attachement: uploaded,
    date: firebase.firestore.FieldValue.serverTimestamp()
  }).then(() => {
    // alert("Mail is sended!");
    // window.location.href = "email-sent.php";
  })
}

function getMailsSent(user) {
  console.log("Mails syncing");
  let tble = document.getElementById("email-list");
  refMails.where("sender", "==", user).orderBy("date", 'desc').get().then((snaps) => {
    snaps.forEach((snap) => {
      let tr = document.createElement('li');
      tr.innerHTML = `
                                                        <li class="unread">
                                                          <a href="email-read.php?mail=${snap.id}">
                                                                <div class="col-mail col-mail-1">
                                                                    <div class="checkbox-wrapper-mail">
                                                                        <input type="checkbox" id="chk1">
                                                                        <label class="toggle" for="chk1"></label>
                                                                    </div>
                                                                    <p class="title">${snap.data().subject}</p><span class="star-toggle fa fa-star-o"></span>
                                                                </div>
                                                                <div class="col-mail col-mail-2">
                                                                    <div class="subject">Sended By : ${snap.data().sender}
                                                                        <span class="teaser">@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                                                    </div>
                                                                    <div class="date" styles="">${snap.data().date.toDate().toLocaleTimeString()}</div>
                                                                </div>
                                                            </a>
                                                        </li>
      
      `;
      
      tble.appendChild(tr);
    });
  });
}

function getMailsReceive(user, role) {
  console.log("Mails syncing");
  let tble = document.getElementById("email-list");
  refMails.orderBy("date", 'desc').get().then((snaps) => {
    snaps.forEach((snap) => {
      if(snap.data().receiver!=user){
        if(snap.data().receiver=="Management Staff"&&role=="Management Staff"){}
        else return;
      }
      let tr = document.createElement('li');
      tr.innerHTML = `
                                                        <li class="unread">
                                                          <a href="email-read.php?mail=${snap.id}">
                                                                <div class="col-mail col-mail-1">
                                                                    <div class="checkbox-wrapper-mail">
                                                                        <input type="checkbox" id="chk1">
                                                                        <label class="toggle" for="chk1"></label>
                                                                    </div>
                                                                    <p class="title">${snap.data().subject}</p><span class="star-toggle fa fa-star-o"></span>
                                                                </div>
                                                                <div class="col-mail col-mail-2">
                                                                    <div class="subject">Sended By : ${snap.data().sender}
                                                                        <span class="teaser">@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                                                    </div>
                                                                    <div class="date" styles="">${snap.data().date.toDate().toLocaleTimeString()}</div>
                                                                </div>
                                                            </a>
                                                        </li>
      
      `;
      
      tble.appendChild(tr);
    });
  });
}

function getMmail(id) {
  var topic = document.getElementById('m-topic');
  var subject = document.getElementById('m-subject');
  var sender = document.getElementById('m-sender');
  var message = document.getElementById('m-message');
  var date = document.getElementById('m-time');
  var link = document.getElementById('m-doc');
  var link_name = document.getElementById('m-doc-name');
  refMails.doc(id).get().then((doc) => {
    topic.innerText = doc.data().subject;
    subject.innerText = doc.data().subject;
    sender.innerText = doc.data().sender;
    message.innerText = doc.data().message;
    date.innerText = doc.data().date.toDate();
    link.href = "js/firebase/uploads/"+doc.data().attachement;
    link_name.innerText = doc.data().attachement;
  })
}

// Tax Lists >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function createList(list, total){
  refList.add({
    books:list,
    accepted: false,
    total: total,
    date: firebase.firestore.FieldValue.serverTimestamp()
  }).then(() => {alert("List is ceated!");});
}

function getListsTable(role) {
  console.log("Syncing");
  let tble = document.getElementById("tb-books");
  refList.orderBy("amount").get().then((snaps) => {
    snaps.forEach((snap) => {
      let total = 0;
      snap.data().books.forEach((book) => {
        console.log(book);
        total = total + parseInt(book.price)*parseInt(book.qty);
      });
      let line = `<span class="badge badge-warning">Not Accepted</span>`;
      if(snap.data().accepted){
        line = `<span class="badge badge-success">Accepted</span>`;
      }
      let tr = document.createElement('tr');
      tr.innerHTML = `
      <td>${snap.id}</td>
      <td>${snap.data().date.toDate()}</td>
      <td class="text-right">${total}.00</td>
      <td>${line}</td>
      <td>
        <a href='invoice.php?id=${snap.id}' class="btn btn-info">View</a>
      </td>
      `;
      let td = document.createElement('td');
      let a = document.createElement('a');
      a.className = "btn btn-danger";
      a.innerText = "Remove";
      a.onclick = () => deleteList(snap.id);
      if(role=="Admin"||role=="Management Staff") td.appendChild(a);
      
      tr.appendChild(td);
      tble.appendChild(tr);
    });
  });
}

function getList(id, list) {
  refList.doc(id).get().then((doc) => {
    list = doc.data();
  }).then(() => {
    return doc.da
  })
}

function createInvoice(list, name, user, amount){
  refList.add({
    books:list,
    name: name,
    issuedBy: user,
    amount: amount,
    accepted: false,
    date: firebase.firestore.FieldValue.serverTimestamp()
  }).then(() => {alert("Quotation is created!");});
}

function deleteList(id) {
  refList.doc(id).delete().then(() => {
    alert("List is deleted");
    window.location.reload();
  });
}

// Stats >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function createStat(user, value, ans){
  refStats.add({
    name: user,
    value: value,
    answers: ans,
    date: firebase.firestore.FieldValue.serverTimestamp()
  }).then(() => {alert("Your Survey Recorded! Thanks for your participation."); window.history.back()});
}

function getLists(){
  refStats.orderBy("date", 'desc').get().then((snaps) => {

  }).then(() => {
    
  })
}

// User and User Payments >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function getUser(user){
  console.log("Profile Syncing");
  var userf = document.getElementById('user-uname');
  var rolef = document.getElementById('user-role');
  var namef = document.getElementById('user-name');
  var contf = document.getElementById('user-contact');
  var emailf = document.getElementById('user-email');
  var member = document.getElementById('user-member'); 
  var district = document.getElementById('user-area');
  member.style.display = "none";
  refUsers.where('username', '==', user).get().then((snaps)=>{
    snaps.forEach((snap) => {
      console.log("Hii");
      userf.innerText = snap.data().username;
      rolef.innerText = snap.data().designation;
      namef.innerText = snap.data().name;
      contf.innerText = snap.data().contact;
      emailf.innerText = snap.data().email;
      district.innerText = snap.data().area;
      if(snap.data().designation=="Member"){
        refUsers.doc(snap.id).collection("payments").where("title", "==", "Membership Fee").get().then((docs) => {
          docs.forEach((doc) => {
            if(doc.data().paid==false){
              member.style.display = "block";
              member.innerText = "Membership Payment "+Math.round((firebase.firestore.Timestamp.fromDate(new Date()).toDate()-doc.data().date.toDate())/(1000*3600*24))+" Days Passed";
            }
          })
        });
      }
      
    })

  });
}

function getUserPaymemnts(user, contact){
  console.log("Payments Syncing");
  let ammount = document.getElementById("user-ammount");
  refUsers.where('username', '==', user).get().then((snaps)=>{
    snaps.forEach((doc) => {
      refUsers.doc(doc.id).collection("payments").where("paid", "==", false).get().then((prices) => {
        prices.forEach((price) => {
          if(price.data().amount == 0) return; 
          testSMS(contact, `You have pendding Tax paayment for ${price.data().title}`);
          let tr = document.createElement('div');
          tr.className="col-md-3";
          tr.innerHTML = `
                            <div class="card">
                                <div class="card-body text-center">
                                      <img src="icons/logo/cash.png" alt="homepage" class="dark-logo" width="150"/>
                                      <h5>
                                        ${price.data().title}
                                      </h5>
                                      <div>
                                        Rs. ${price.data().amount}
                                      </div>
                                      <div>
                                        ${price.data().date.toDate()}
                                      </div>
                                      <hr>
                                      <div>
                                        <a href="payment.php?title=${price.data().title}" class="btn btn-info">Pay</a>
                                      </div>
                                    
                                </div>
                            </div>
          `;
          ammount.appendChild(tr);
        })
      })
    })
  })
}

function getUserPaymemnts(user, contact){
  console.log("Payments Syncing");
  let ammount = document.getElementById("user-ammount");
  refUsers.where('username', '==', user).get().then((snaps)=>{
    snaps.forEach((doc) => {
      refUsers.doc(doc.id).collection("payments").where("paid", "==", false).get().then((prices) => {
        prices.forEach((price) => {
          if(price.data().amount == 0) return; 
          testSMS(contact, `You have pendding Tax paayment for ${price.data().title}`);
          let tr = document.createElement('div');
          tr.className="col-md-3";
          tr.innerHTML = `
                            <div class="card">
                                <div class="card-body text-center">
                                      <img src="icons/logo/cash.png" alt="homepage" class="dark-logo" width="150"/>
                                      <h5>
                                        ${price.data().title}
                                      </h5>
                                      <span>Waiting Tax Payment</span><br>
                                      <div>
                                        Rs. ${price.data().amount}
                                      </div>
                                      <div>
                                        ${price.data().date.toDate()}
                                      </div>
                                      <hr>
                                      <div>
                                        <a href="payment.php?title=${price.data().title}" class="btn btn-info">Pay</a>
                                      </div>
                                    
                                </div>
                            </div>
          `;
          ammount.appendChild(tr);
        })
      })
    })
  })
}
function getUserPaymemntsAsNotification(user){
  console.log("Payments Syncing");
  let ammount = document.getElementById("user-buffer");
  refUsers.where('username', '==', user).get().then((snaps)=>{
    snaps.forEach((doc) => {
      refUsers.doc(doc.id).collection("payments").where("paid", "==", false).get().then((prices) => {
        prices.forEach((price) => {
          if(price.data().amount == 0) return; 
          
          let tr = document.createElement('a');
          tr.innerHTML = `
              
                  <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                  <div class="mail-contnet">
                      <h5>${price.data().title}</h5> <span class="mail-desc">You're issued with a tax.</span> <span class="time">${price.data().date.toDate()}</span>
                  </div>
              
          `;
          ammount.appendChild(tr);
        })
      })
    })
  })
}

function getUserPaymemnt(user, title){
  console.log("Payment Syncing");
  let ammount = document.getElementById("user-ammount");
  refUsers.where('username', '==', user).get().then((snaps)=>{
    snaps.forEach((doc) => {
      console.log(title);
      refUsers.doc(doc.id).collection("payments").where("title", "==", title).get().then((prices) => {
        prices.forEach((price) => {
          console.log(price.data());
          ammount.innerText = price.data().amount;
        })
      })
    })
  })
}

function updateUserPaymemnt(user, title){
  console.log("Payment Update Syncing");
  refUsers.where('username', '==', user).get().then((snaps)=>{
    snaps.forEach((doc) => {
      refUsers.doc(doc.id).collection("payments").where("title", "==", title).get().then((prices) => {
        prices.forEach((price) => {
          refUsers.doc(doc.id).collection("payments").doc(price.id).update({
            paid: true,
            paid_date: firebase.firestore.FieldValue.serverTimestamp()
          }).then(()=>{
            var previous = 0;
            refUsers.doc(doc.id).collection("profile").doc("amount").get().then((dd) => {
              previous = dd.data().value;
              console.log(previous);
            }).then(() => {
              refUsers.doc(doc.id).collection("profile").doc("amount").update({
                value: previous - price.data().amount,
              })
            }).then(() => {
              window.location.href = `profile.php?user=${user}`;
            })
            
          })
        })
      })
    })
  })
}

// USER >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function getUsersTable(condition, user) {
  console.log("Reservations syncing");
  let tble = document.getElementById("tb-books");
  let count = 0;
  if(condition=="All"){
    tble.innerHTML='';
    refUsers.get().then((snaps) => {
      snaps.forEach((snap) => {
        refUsers.doc(snap.id).collection('logs').get().then((logs) => {
          count = 0;
          logs.forEach((log) => {
            count++;
          })
        }).then(() => {
          if(user==snap.data().username){
            return;
          }
          let tr = document.createElement('tr');
          tr.innerHTML = `
          <td><a href="profile.php?user=${snap.data().username}">${snap.data().username}</a></td>
          <td>${snap.data().name}</td>
          <td>${snap.data().contact}</td>
          <td>${snap.data().area}</td>
          <td>${snap.data().designation}</td>
          <td>${count}</td>
          `;
          let td1 = document.createElement('td');
          if(!snap.data().accepted){
            
            let a1 = document.createElement('a');
            a1.className = "btn btn-success";
            a1.innerText = "Accept";
            a1.onclick = () => acceptUser(snap.id, snap.data().contact, snap.data().name);
            td1.appendChild(a1);
            
          }
          tr.appendChild(td1);
          
          let td = document.createElement('td');
          let a = document.createElement('a');
          a.className = "btn btn-danger";
          a.innerText = "Remove";
          a.onclick = () => deleteUser(snap.id);
          td.appendChild(a);
          tr.appendChild(td);
          tble.appendChild(tr);
        })
        
      });
    });
  } else if(condition=="New"){
    tble.innerHTML='';
    refUsers.where("accepted", "==", false).get().then((snaps) => {
      snaps.forEach((snap) => {
        refUsers.doc(snap.id).collection('logs').get().then((logs) => {
          count = 0;
          logs.forEach((log) => {
            count++;
          })
        }).then(() => {
          if(user==snap.data().username){
            return;
          }
          let tr = document.createElement('tr');
          tr.innerHTML = `
          <td><a href="profile.php?user=${snap.data().username}">${snap.data().username}</a></td>
          <td>${snap.data().name}</td>
          <td>${snap.data().contact}</td>
          <td>${snap.data().area}</td>
          <td>${snap.data().designation}</td>
          <td>${count}</td>
          `;
          let td1 = document.createElement('td');
          let a1 = document.createElement('a');
          a1.className = "btn btn-success";
          a1.innerText = "Accept";
          a1.onclick = () => acceptUser(snap.id, snap.data().contact, snap.data().name);
          td1.appendChild(a1);
          tr.appendChild(td1);
    
          let td = document.createElement('td');
          let a = document.createElement('a');
          a.className = "btn btn-danger";
          a.innerText = "Remove";
          a.onclick = () => deleteUser(snap.id);
          td.appendChild(a);
          tr.appendChild(td);
          tble.appendChild(tr);
        })
        
      });
    });
  } else if(condition=="Registered"){
    tble.innerHTML='';
    refUsers.where("accepted", "==", true).get().then((snaps) => {
      snaps.forEach((snap) => {
        refUsers.doc(snap.id).collection('logs').get().then((logs) => {
          count = 0;
          logs.forEach((log) => {
            count++;
          })
        }).then(() => {
          if(user==snap.data().username){
            return;
          }
          let tr = document.createElement('tr');
          tr.innerHTML = `
          <td><a href="profile.php?user=${snap.data().username}">${snap.data().username}</a></td>
          <td>${snap.data().name}</td>
          <td>${snap.data().contact}</td>
          <td>${snap.data().area}</td>
          <td>${snap.data().designation}</td>
          <td>${count}</td>
          `;
          let td1 = document.createElement('td');
          let a1 = document.createElement('a');
          a1.className = "btn btn-warning";
          a1.innerText = "Block";
          a1.onclick = () => blockUser(snap.id);
          td1.appendChild(a1);
          tr.appendChild(td1);
    
          let td = document.createElement('td');
          let a = document.createElement('a');
          a.className = "btn btn-danger";
          a.innerText = "Remove";
          a.onclick = () => deleteUser(snap.id);
          td.appendChild(a);
          tr.appendChild(td);
          tble.appendChild(tr);
        });
      });
    });
  } else if(condition=="Technician") {
    
    tble.innerHTML='';
    refUsers.where("designation", "==", "Technician").get().then((snaps) => {
      snaps.forEach((snap) => {
        refUsers.doc(snap.id).collection('logs').get().then((logs) => {
          count = 0;
          logs.forEach((log) => {
            count++;
          })
        }).then(() => {
          if(user==snap.data().username){
            return;
          }
          let tr = document.createElement('tr');
          tr.innerHTML = `
          <td><a href="profile.php?user=${snap.data().username}">${snap.data().username}</a></td>
          <td>${snap.data().name}</td>
          <td>${snap.data().contact}</td>
          <td>${snap.data().area}</td>
          <td>${snap.data().designation}</td>
          <td>${count}</td>
          `;
          let td1 = document.createElement('td');
          let a1 = document.createElement('a');
          a1.className = "btn btn-success";
          a1.innerText = "Accept";
          a1.onclick = () => acceptUser(snap.id, snap.data().contact, snap.data().name);
          td1.appendChild(a1);
          tr.appendChild(td1);

          let td2 = document.createElement('td');
          let a2 = document.createElement('a');
          a2.className = "btn btn-warning";
          a2.innerText = "Issue Tax";
          a2.href = "document.php?name=Invoice&user="+snap.data().username;
          td2.appendChild(a2);
          tr.appendChild(td2);
    
          let td = document.createElement('td');
          let a = document.createElement('a');
          a.className = "btn btn-danger";
          a.innerText = "Remove";
          a.onclick = () => deleteUser(snap.id);
          td.appendChild(a);
          tr.appendChild(td);
          tble.appendChild(tr);
        })
        
      });
    });
  }
  
}

function acceptUser(id, contact, name) {
  refUsers.doc(id).update({
    accepted: true
  }).then(() => {
    alert("User Approved Successfully"); 
    window.location=`./php/notify-config.php?user=${name}&contact=${contact}`;
    // window.location.reload();
  });
}

function blockUser(id) {
  refUsers.doc(id).update({
    accepted: false
  }).then(() => {
    alert("User is Blocked!"); 
    window.location.reload();
  });
}

function deleteUser(id) {
  refUsers.doc(id).delete().then(() => {
    alert("User is removed");
    window.location.reload();
  });
}

// Chat Section

function sendMessage(sender, reciever, message) {
  console.log(reciever + "||" + sender);
  refUsers.where("username", "==", sender).get().then((docs) => {
    docs.forEach((doc) => {
      refUsers.doc(doc.id).collection("messages").add({
        message: message,
        sender: sender,
        reciever: reciever,
        date: firebase.firestore.FieldValue.serverTimestamp()
      });
    });
  }).then(() => {
    console.log(reciever + "||" + sender);
    refUsers.where("username", "==", reciever).get().then((docs) => {
      docs.forEach((doc) => {
        refUsers.doc(doc.id).collection("messages").add({
          message: message,
          sender: sender,
          reciever: reciever,
          date: firebase.firestore.FieldValue.serverTimestamp()
        });
      });
    });
  });
}

function getMessage(user, contact) {
  refUsers.doc(item).collection("messages").get().then((docs))
}

function logout(){
  window.location="./php/logout.php";
}