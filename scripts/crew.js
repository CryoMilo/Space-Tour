// Crew Data
const crews = [
	{
		name: "Crew A",
		description:
			"The crew is made up of seasoned astronauts who have ventured to the farthest reaches of space. Known for their resilience and unmatched teamwork, the crew specializes in deep space missions to the Moon and beyond. They have a legacy of overcoming extreme challenges and setting new milestones in human space exploration.",
		image: "./assets/crew/crew1.jpg",
	},
	{
		name: "Crew B",
		description:
			"The crew is at the forefront of scientific discovery, dedicated to exploring unknown celestial bodies. This crew consists of top scientists and engineers, working together to push the boundaries of space research. Their mission is to find new habitable planets and uncover the mysteries of the universe.",
		image: "./assets/crew/crew2.jpg",
	},
	{
		name: "Crew C",
		description:
			"Known for their cutting-edge space exploration techniques and unparalleled expertise in planetary geology. As pioneers in lunar and Martian exploration, the crew is tasked with building the first permanent human colonies beyond Earth, setting the stage for humanity’s next leap into the stars.",
		image: "./assets/crew/crew3.jpg",
	},
];

// Select DOM elements
const tabs = document.querySelectorAll(".tab-list li");
const imgElement = document.getElementById("crew-img");
const nameElement = document.getElementById("crew-name");
const descriptionElement = document.getElementById("crew-description");

// Function to update crew content
function updateCrewContent(crewName) {
	const crew = crews.find((c) => c.name === crewName);
	if (crew) {
		imgElement.src = crew.image;
		imgElement.alt = crew.name;
		nameElement.textContent = crew.name;
		descriptionElement.textContent = crew.description;
	}
}

// Add click event listeners to tabs
tabs.forEach((tab) => {
	tab.addEventListener("click", (e) => {
		// Remove active class from all tabs
		tabs.forEach((tab) => tab.classList.remove("active"));

		// Add active class to the clicked tab
		e.target.classList.add("active");

		// Update content based on the clicked tab
		const crewName = e.target.getAttribute("data-crew");
		updateCrewContent(crewName);
	});
});
