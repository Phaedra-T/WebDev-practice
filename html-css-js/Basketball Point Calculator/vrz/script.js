let score = 0;
const scoreBox = document.getElementById("scoreBox");

function addPoints(points) {
  score += points;
  scoreBox.textContent = score;
}
