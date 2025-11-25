// === Secret Chatbot in a Bottle ===

// Elements
const bottle = document.getElementById('mystery-bottle');
const popup = document.getElementById('chat-popup');
const closeBtn = document.getElementById('close-chat');
const chatBody = document.getElementById('chat-body');
const sendBtn = document.getElementById('send-btn');
const userInput = document.getElementById('user-input');

// Toggle popup
bottle.addEventListener('click', () => popup.classList.toggle('hidden'));
closeBtn.addEventListener('click', () => popup.classList.add('hidden'));

// Speak text
function speak(text) {
  const speech = new SpeechSynthesisUtterance(text);
  speech.lang = 'en-US';
  speech.pitch = 1;
  speech.rate = 1;
  window.speechSynthesis.speak(speech);
}

// Send message
sendBtn.addEventListener('click', sendMessage);
userInput.addEventListener('keypress', e => {
  if (e.key === 'Enter') sendMessage();
});

function sendMessage() {
  const msg = userInput.value.trim();
  if (!msg) return;

  appendMessage(msg, 'user');
  userInput.value = '';

  setTimeout(() => {
    const reply = getBotReply(msg);
    appendMessage(reply, 'bot');
    speak(reply);
  }, 600);
}

// Display message
function appendMessage(text, sender) {
  const p = document.createElement('p');
  p.className = sender;
  p.textContent = text;
  chatBody.appendChild(p);
  chatBody.scrollTop = chatBody.scrollHeight;
}

// Simple chatbot logic
function getBotReply(input) {
  input = input.toLowerCase();

  if (input.includes('hello') || input.includes('hi')) {
    return "👋 Hello there! I'm the whispering bottle. Ask me anything.";
  }
  if (input.includes('help')) {
    return "I can guide you to offer or request help — try visiting the portal above!";
  }
  if (input.includes('who are you')) {
    return "I'm a secret guardian of this portal, here to listen and talk. 💫";
  }
  if (input.includes('thank')) {
    return "You're very welcome! 🌸";
  }

  // Random fun fallback
  const replies = [
    "Interesting... tell me more!",
    "Hmm, that's mysterious.",
    "✨ The bottle hums softly in response.",
    "I'm listening carefully.",
    "Would you like to share a secret?"
  ];
  return replies[Math.floor(Math.random() * replies.length)];
}