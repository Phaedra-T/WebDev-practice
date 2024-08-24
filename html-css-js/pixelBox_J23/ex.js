const box = document.getElementById("box");
const add = document.getElementById("add");
const sub = document.getElementById("sub");

add.addEventListener('click', () => {
  let computedStyle = getComputedStyle(box);
  let currentWidth = parseInt(computedStyle.width);
  let newWidth = currentWidth + 10;

  if(newWidth<= 200){
    box.style.width = newWidth + 'px';
    box.style.height = newWidth + 'px';
    updateSizeDisplay(newWidth);
  }
})

sub.addEventListener('click', () => {
    let computedStyle = getComputedStyle(box);
    let currentWidth = parseInt(computedStyle.width);
    let newWidth = currentWidth - 10;
  
    if(newWidth>= 100){
      box.style.width = newWidth + 'px';
      box.style.height = newWidth + 'px';
      updateSizeDisplay(newWidth);
    }
})


function updateSizeDisplay(dim) {
    box.textContent = dim + 'px';
  }