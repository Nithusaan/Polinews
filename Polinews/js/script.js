document.getElementById("language-selected").addEventListener("click", function() {
    let dropdown = document.getElementById("language-dropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
});

function changeLanguage(lang) {
    document.getElementById("language-selected").innerText = lang;
    document.getElementById("language-dropdown").style.display = "none";
}

document.addEventListener("click", function(event) {
    let languages = document.getElementById("languages");
    if (!languages.contains(event.target)) {
        document.getElementById("language-dropdown").style.display = "none";
    }
});