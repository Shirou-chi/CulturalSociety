const filterButton = document.getElementById('filterButton');
const normalDiv = document.querySelector('.normal'); // Selecting the div with class "normal"
const wrapp = document.querySelector('.wrapper');
const returnButton = document.getElementById('return');

filterButton.addEventListener("click", function () {
    normalDiv.style.display = 'none';
    wrapp.style.display = 'block';

});

returnButton.addEventListener("click", function () {
    normalDiv.style.display = 'block';
    wrapp.style.display = 'none';

});
