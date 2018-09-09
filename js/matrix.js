var canvas = document.getElementById('matrix');
var ctx = canvas.getContext('2d');
var fontSize = 12;
var chars = generateChars();
var columns;
var drops; // Current position of last letter (for each column)
var drawnToBottom;

// Generate Matrix code characters
function generateChars() {
  var chars = '0123456789';

  // Get ALL half-width katakana characters by unicode value
  for (var i = 0; i <= 57; i++) {
    chars += String.fromCharCode(i + 65);
  }
  
  return chars.split('');
}

// Initialize default canvas state
function initCanvas() {
  canvas.width = window.innerWidth;
  canvas.height = 180;

  columns = Math.round(canvas.width / fontSize);
  drops = [];

  // Set initial position on y coordinate for each column
  for (var i = 0; i < columns; i++) {
    drops[i] = 1;
  }

  drawnToBottom = false;
}

// Resize canvas to fit window
window.onresize = function() {
  initCanvas();
};

function draw() {
  // Set nearly transparent background so character trail is visible
  ctx.fillStyle = 'rgba(0, 0, 0, 0.05)';
  ctx.fillRect(0, 0, canvas.width, canvas.height);
	
  // Set color and font of falling letters
  ctx.fillStyle = '#222';
  ctx.font = 'bold ' + fontSize + 'px monospace';

  var dropCount = drops.length;
  var charCount = chars.length;

  for (var i = 0; i < dropCount; i++) {
    // Choose a random letter
    var text = chars[Math.floor(Math.random() * charCount)];
    // Get the y position of the letter
    var rowNum = drops[i] * fontSize;
		// Draw it!
    ctx.fillText(text, i * fontSize, rowNum);

    // Check if the canvas has been drawn to the bottom
    if (rowNum > canvas.height) drawnToBottom = true;

    // Randomly reset the y position of a column
    if ((!drawnToBottom && Math.random() > 0.925) || (drawnToBottom && Math.random() > 0.95)) drops[i] = 0;

    drops[i]++;
  }
}

initCanvas();
setInterval(draw, 100);