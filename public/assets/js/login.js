 const roleCards = document.querySelectorAll(".role-card");
  const forms = {
    admin: document.getElementById("form-admin"),
    karyawan: document.getElementById("form-karyawan")
  };

  roleCards.forEach(card => {
    card.addEventListener("click", () => {
      roleCards.forEach(c => c.classList.remove("active"));
      card.classList.add("active");
      const role = card.getAttribute("data-role");
      Object.keys(forms).forEach(r => {
        forms[r].classList.remove("active");
      });
      forms[role].classList.add("active");
    });
  });

    document.querySelector("#form-admin form").addEventListener("submit", function(e) {
    e.preventDefault(); 
    window.location.href = "index.html"; 
  });

  document.querySelector("#form-karyawan form").addEventListener("submit", function(e) {
    e.preventDefault();
    window.location.href = "index.html";
  });