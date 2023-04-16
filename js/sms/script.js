fetch('https://textbelt.com/text', {
  method: 'post',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({
    phone: '+94725237603',
    message: 'Hello world',
    key: 'textbelt',
  }),
}).then(response => {
    console.log("Message Sended!");
  return response.json();
}).then(data => {
  console.log(data);
});