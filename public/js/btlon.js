 // lấy phương thức
var modal = document.getElementById('id01');       
// Khi người dùng nhấp vào bất cứ nơi nào bên ngoài phương thức, hãy đóng nó lại
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}