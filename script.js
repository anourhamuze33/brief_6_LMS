  const modal = document.getElementById("courseModal");
  const openBtn = document.querySelector(".open-modal-btn");
  const closeBtn = document.querySelector(".close");
  openBtn.onclick = () => modal.style.display = "block";
  if(closeBtn){

    closeBtn.onclick = () => modal.style.display = "none";
  }

const cards = document.querySelectorAll(".course-card");
// const container = document.querySelector(".cont")
// const container2 = document.querySelector(".section_Container")
cards.forEach(card => {
  card.addEventListener("click", (e) =>{
    const input = card.querySelector(".inpuuut");
    const formcache = card.querySelector(".formcache");
    const id = card.dataset.id;
      console.log(id);
    input.value = id;
    // container.classList.add("none");
    // container2.classList.remove("none")
    console.log(formcache);
    formcache.submit(); 
  })
});




