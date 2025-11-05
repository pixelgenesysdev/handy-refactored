// Extracted from: pages/messages.php

const contacts = [
  { name: "Alex Johnson", profilePic: "https://i.pravatar.cc/100?img=1", unread: 2 },
  { name: "Sarah Lee", profilePic: "https://i.pravatar.cc/100?img=2", unread: 0 },
  { name: "John Smith", profilePic: "https://i.pravatar.cc/100?img=3", unread: 4 },
  { name: "Emily Davis", profilePic: "https://i.pravatar.cc/100?img=4", unread: 1 },
];

const chatData = {
  "Alex Johnson": [
    { type: "received", text: "Hey! How are you doing?", time: "10:20 AM" },
    { type: "sent", text: "I'm good, thanks! What about you?", time: "10:22 AM" }
  ],
  "Sarah Lee": [
    { type: "received", text: "Did you finish the report?", time: "9:05 AM" },
    { type: "sent", text: "Yes, already mailed it.", time: "9:10 AM" }
  ],
  "John Smith": [
    { type: "received", text: "See you at the meeting later.", time: "11:00 AM" },
    { type: "sent", text: "Sure!", time: "11:02 AM" }
  ],
  "Emily Davis": [
    { type: "sent", text: "Hey, got a sec?", time: "3:15 PM" },
    { type: "received", text: "Yeah, tell me.", time: "3:16 PM" }
  ]
};

let currentChat = contacts[0].name;

const contactList = document.querySelector('.contact-list');
const chatHeader = document.querySelector('.chat-header');
const messagesDiv = document.querySelector('.messages');
const messageInput = document.querySelector('.message-input');
const sendBtn = document.querySelector('.send-btn');

function renderContacts(filter = '') {
  contactList.innerHTML = '';
  contacts
    .filter(c => c.name.toLowerCase().includes(filter.toLowerCase()))
    .forEach(c => {
      const contactEl = document.createElement('div');
      contactEl.classList.add('contact');
      contactEl.dataset.user = c.name;
      contactEl.innerHTML = `
        <img src="${c.profilePic}" alt="">
        <div class="info">
          <h4>${c.name}</h4>
          ${c.unread > 0 ? `<span class="badge">${c.unread}</span>` : ''}
        </div>`;
      contactList.appendChild(contactEl);
      contactEl.addEventListener('click', () => openChat(c.name));
    });
}

function openChat(name) {
  currentChat = name;
  contacts.find(c => c.name === name).unread = 0;
  renderContacts();
  document.querySelectorAll('.contact').forEach(c => c.classList.remove('active'));
  document.querySelector(`[data-user="${name}"]`)?.classList.add('active');
  
  const chat = chatData[name] || [];
  chatHeader.innerHTML = `
    <img src="${contacts.find(c => c.name === name).profilePic}" class="profile">
    <div><h4>${name}</h4><p>Online</p></div>`;
  
  messagesDiv.innerHTML = '';
  chat.forEach(m => {
    const msg = document.createElement('div');
    msg.classList.add('msg', m.type);
    msg.innerHTML = `<p>${m.text}</p><span>${m.time}</span>`;
    messagesDiv.appendChild(msg);
  });
  messagesDiv.scrollTop = messagesDiv.scrollHeight;
}

sendBtn.addEventListener('click', () => {
  const text = messageInput.value.trim();
  if (!text) return;
  const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
  chatData[currentChat].push({ type: 'sent', text, time });
  openChat(currentChat);
  messageInput.value = '';
});

function searchContacts(value) {
  renderContacts(value);
}

renderContacts();
openChat(currentChat);