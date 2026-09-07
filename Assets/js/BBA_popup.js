// Open Popup
function openPopup(popupId) {
    var popup = document.getElementById(popupId);

    if (popup) {
        popup.style.display = "block";
    }
}


// Close Popup
function closePopup(popupId) {
    var popup = document.getElementById(popupId);

    if (popup) {
        popup.style.display = "none";
    }
}


// Close popup when clicking outside the popup box
window.onclick = function(event) {

    if (event.target.classList.contains("popup")) {
        event.target.style.display = "none";
    }

};


// Close popup when pressing ESC key
document.addEventListener("keydown", function(event) {

    if (event.key === "Escape") {

        var bbaPopup = document.getElementById("bbaPopup");
        var bimPopup = document.getElementById("bimPopup");
        var bcaPopup = document.getElementById("bcaPopup");

        if (bbaPopup) {
            bbaPopup.style.display = "none";
        }

        if (bimPopup) {
            bimPopup.style.display = "none";
        }

        if (bcaPopup) {
            bcaPopup.style.display = "none";
        }

    }

});