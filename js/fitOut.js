// The actual content elements
const retailPanel = document.getElementById("retailPanel");
const hospitalityPanel = document.getElementById("hospitalityPanel");

// Individual buttons to toggle the content
const retailBtn = document.getElementById("retailBtn");
const hospitalityBtn = document.getElementById("hospitalityBtn");

// Event listeners
hospitalityBtn.addEventListener("click", () => {
  retailPanel.classList.add("hidden");
  hospitalityPanel.classList.remove("hidden");
  retailBtn.classList.replace("btn-primary", "btn-outline-primary");
  hospitalityBtn.classList.replace("btn-outline-primary", "btn-primary");
});

retailBtn.addEventListener("click", () => {
  hospitalityPanel.classList.add("hidden");
  retailPanel.classList.remove("hidden");
  hospitalityBtn.classList.replace("btn-primary", "btn-outline-primary");
  retailBtn.classList.replace("btn-outline-primary", "btn-primary");
});
