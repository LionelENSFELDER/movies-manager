//navbar scroll behavior
window.onscroll = () => {
	let navbar = document.getElementById("navbar");

	if (window.scrollY <= 80) {
		navbar.classList.remove("bg-success");
	} else if (window.scrollY > 80) {
		navbar.classList.add("bg-success");
	}
};