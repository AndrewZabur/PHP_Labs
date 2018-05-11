function isSure(id) {
    let check = confirm("Confirm deleting?");
    if (check === true) {
        document.location.href = 'index.php?action=deleteProduct&id=' + id;
    } 
}