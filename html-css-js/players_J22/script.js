'use strict';
const b1 = document.getElementById('b1');
const b2 = document.getElementById('b2');
const winner = document.getElementById('winner');
const p1 = document.getElementById('points1');
const p2 = document.getElementById('points2');


b1.addEventListener('click', () => {
     p1.innerHTML = Number(p1.innerHTML) + 1;
     if(Number(p1.innerHTML) == 5){
        winner.innerHTML = 'Νικητής: 1ος Παίκτης';
    }
  });

b2.addEventListener('click', () => {
    p2.innerHTML = Number(p2.innerHTML) + 1;
    if(Number(p2.innerHTML )== 5){
        winner.innerHTML = 'Νικητής: 2ος Παίκτης';
   }
  });