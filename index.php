<!DOCTYPE html>
<html>
<head>
  <title>Community Help Portal</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>🤝 Helping Hands</h1>
    <p>Connecting people who need help with local volunteers</p>
  </header>

  <div class="buttons">
    <a href="request.php" class="btn">Request Help</a><br>
    <a href="offer.php" class="btn">Offer Help</a><br>
    <a href="view_request.php" class="btn">View Requests</a>
  </div>
  <div id="secret-bottle">
  🧪
</div>

<div id="chat-container">
  <div id="chat-header">Whispering Bottle</div>
  <div id="chat-messages"></div>

  <div id="chat-input-area">
    <input type="text" id="chat-input" placeholder="Ask me something...">
    <button id="chat-send">Send</button>
  </div>
</div>

  <footer>
    <p>© 2025 Helping Hands | Made with ❤️ for Social Good</p>
  </footer>
  
</div>

<script>
const bottle = document.getElementById("secret-bottle");
const chatBox = document.getElementById("chat-container");
const messages = document.getElementById("chat-messages");
const sendBtn = document.getElementById("chat-send");
const input = document.getElementById("chat-input");

bottle.addEventListener("click", () => {
  chatBox.style.display = "flex";
  respond("Hello! You discovered the Whispering Bottle. Ask me anything!");
});

// Add a message to chat
function addMessage(text, sender="bot") {
  let div = document.createElement("div");
  div.style.margin = "8px 0";
  div.innerHTML = (sender === "you" ? "<b>You:</b> " : "<b>Genie:</b> ") + text;
  messages.appendChild(div);
  messages.scrollTop = messages.scrollHeight;
}

// Text-to-Speech
function speak(text) {
  let utter = new SpeechSynthesisUtterance(text);
  utter.pitch = 1;
  utter.rate = 1;
  utter.volume = 1;
  speechSynthesis.speak(utter);
}

// Smart Reply System
function getReply(userText) {
  const text = userText.toLowerCase();

  // Greetings
  if (text.includes("hi") || text.includes("hii") || text.includes("hello") || text.includes("hey")) {
    return "Hello! How can I assist you today?";
  }

  // Name questions
  if (text.includes("your name")) {
    return "I'm the Genie of the Whispering Bottle! Nice to meet you.";
  }

  // Who are you?
  if (text.includes("who are you")) {
    return "I’m a magical assistant living inside this bottle. Ask me anything!";
  }

  // What can you do?
  if (text.includes("what can you do")) {
    return "I can answer questions, give advice, and guide you inside this website!";
  }

  // Help related
  if (text.includes("help")) {
    return "Of course! Tell me what you need help with.";
  }

  // Time-related
  if (text.includes("time")) {
    return "Time is an illusion… but your device clock can tell you. 😊";
  }

  // Date-related
  if (text.includes("date") && !text.includes("your")) {
    return "Today's date is " + new Date().toLocaleDateString();
  }

  // How are you?
  if (text.includes("how are you")) {
    return "I'm glowing and magical! How about you?";
  }

  // Thank you
  if (text.includes("thank")) {
    return "You're welcome! Happy to help. ✨";
  }

  // Jokes section
  if (text.includes("joke")) {
    return "Why don’t skeletons fight each other? Because they don’t have the guts! 😄";
  }

  // Weather (funny fictional reply)
  if (text.includes("weather")) {
    return "I can't see the real weather from inside the bottle, but it's always magical in here! 🌈";
  }

  // Location
  if (text.includes("where are you")) {
    return "I live inside this glowing bottle… you opened the portal!";
  }

  // Purpose of life 😄
  if (text.includes("life")) {
    return "Life is a beautiful journey — stay curious and kind!";
  }

  // Study help
  if (text.includes("study") || text.includes("learn")) {
    return "Learning never ends. What subject do you need help with?";
  }

  // Website-specific
  if (text.includes("request") || text.includes("volunteer") || text.includes("help portal")) {
    return "You can request help or offer help using the options on the homepage!";
  }

  // Developer easter egg 😄
  if (text.includes("are you real")) {
    return "Real? Maybe not. Helpful? Definitely!";
  }

  // Love jokes 😆
  if (text.includes("love")) {
    return "Aww! Even genies feel warm sparkles sometimes. ❤️";
  }

  // Default fallback
  return "Hmm, interesting! Could you explain it a bit more?";
}


// Respond function
function respond(message) {
  addMessage(message);
  speak(message);
}

// On send button click
sendBtn.addEventListener("click", () => {
  let userText = input.value.trim();
  if (!userText) return;

  addMessage(userText, "you");

  let reply = getReply(userText);

  setTimeout(() => {
    respond(reply);
  }, 500);

  input.value = "";
});
</script>


</body>
</html>