function handleKeyPress(e) {
  $(".carousel").carousel();
  if (e.key === "ArrowLeft") {
    $(".carousel").carousel("prev");
  }
  if (e.key === "ArrowRight") {
    $(".carousel").carousel("next");
  }
}

document.addEventListener("keydown", handleKeyPress);
