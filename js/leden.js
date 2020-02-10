// leden functies
function getLid(id) {
    return $.getJSON("ajax/get.lid.php", { "id": id });
}

function saveLid(id, naam, email, telefoon) {
    return $.getJSON("ajax/save.lid.php", { "id": id, "naam": naam, "email": email, "telefoon": telefoon });
}