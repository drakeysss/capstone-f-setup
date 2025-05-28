var modal = document.getElementById("ingredientsPopup");




window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "show";
    }
    if (event.target.classList.contains('close')) {
        modal.style.display = "none";
    }
}