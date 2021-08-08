let num = 1;
let previousBtn = document.getElementById("prevBtn");
let nextBtn = document.getElementById("nextBtn");
let image;
let imageContainer = document.getElementById("workImg");
let title = document.getElementById("imageModalTitle");

function checkNum() {
	if (num == 1) {
		previousBtn.disabled = true;
		previousBtn.className="btn btn-secondary";
	} else {
		previousBtn.disabled = false;
		previousBtn.className="btn btn-outline-primary";
	}

	if (num == 6) {
		nextBtn.disabled = true;
		nextBtn.className="btn btn-secondary";
	} else {
		nextBtn.disabled = false;
		nextBtn.className="btn btn-primary";
	}
}

function showImage(clickedImage) {
	image = "images/work" + clickedImage;
	num = clickedImage;
	imageContainer.src= image + ".jpg";
	imageContainer.alt="Work Image" + num;
	title.innerHTML="Work Image " + num;
	checkNum();
}

function nextImage() {
	num++;
	checkNum();

	imageContainer.src= "images/work" + num + ".jpg";
	imageContainer.alt="Work Image" + num;
	title.innerHTML="Work Image " + num;
}

function prevImage() {
	num--;
	checkNum();

	imageContainer.src= "images/work" + num + ".jpg";
	imageContainer.alt="Work Image" + num;
	title.innerHTML="Work Image " + num;
}