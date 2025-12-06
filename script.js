    // $sql = "INSERT INTO courses (title, description, level ) VALUES('$inps[0]','zdze', 'Débutant'); -- ','$inps[2]')";

// header('Location: '.$newURL);
// ($result = mysqli_query($con, "SELECT * FROM Persons", MYSQLI_USE_RESULT ou MYSQLI_STORE_RESULT)
  const modal = document.getElementById("courseModal");
  const openBtn = document.querySelector(".open-modal-btn");
  const closeBtn = document.querySelector(".close");
  openBtn.onclick = () => modal.style.display = "inline";
  closeBtn.onclick = () => modal.style.display = "none";
  window.onclick = (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };











const modal2 = document.getElementById("modal1");
const overlay = document.getElementById("modalOverlay");
const openBtn = document.querySelector(".open-modal-btn1");
const closeBtn = document.getElementById("closeModal");

openBtn.addEventListener("click", () => {
  modal2.style.display = "flex";
  overlay.style.display = "block";
});

closeBtn.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);

function closeModal() {
  modal2.style.display = "none";
  overlay.style.display = "none";
}

