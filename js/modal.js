// Get modal element
var modal = document.getElementById('simpleModal1');
var modal2 = document.getElementById('simpleModal2');
var modal3 = document.getElementById('simpleModal3');
// Get modal button
var modalBtn = document.getElementById('modalBtn1');
var modalBtn2 = document.getElementById('modalBtn2');
var modalBtn3 = document.getElementById('modalBtn3');

// Get close button
var closeBtn = document.getElementsByClassName('closeBtn')[0];
var closeBtn2 = document.getElementsByClassName('closeBtn')[1];
var closeBtn3 = document.getElementsByClassName('closeBtn')[2];

// Listen for open click
modalBtn.addEventListener('click', openModal);
modalBtn2.addEventListener('click', openModal2);
modalBtn3.addEventListener('click', openModal3);

// Listen for close click
closeBtn.addEventListener('click', closeModal);
closeBtn2.addEventListener('click', closeModal2);
closeBtn3.addEventListener('click', closeModal3);

// Listen for outside click
window.addEventListener('click', clickOutside);

// Function to open modal
function openModal() {
  modal.style.display = 'block';
}
function openModal2() {
  modal2.style.display = 'block';
}
function openModal3() {
  modal3.style.display = 'block';
}
// Function to close modal
function closeModal() {
  modal.style.display = 'none';
}
function closeModal2() {
  modal2.style.display = 'none';
}
function closeModal3() {
  modal3.style.display = 'none';
}

// Function to close modal if outside click
function clickOutside(e) {
  if(e.target == modal){
  modal.style.display = 'none';
  }
}