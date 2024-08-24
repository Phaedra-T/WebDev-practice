let text = document.getElementById("points");
let newCount = 0;
function addP(x){
    newCount += x;
    points.innerHTML = newCount;
}