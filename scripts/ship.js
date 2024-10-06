// Ship Data
const ships = [
	{
		name: "Orion",
		images: {
			png: "./assets/ship/Orion.png",
		},
		description:
			"The Orion is a state-of-the-art spacecraft designed for long-range exploration. Equipped with a quantum propulsion system, it allows faster-than-light travel, making distant galaxies reachable within days.",
		specifications: {
			engine: "Quantum Pulse Engine",
			speed: "0.5 Light-years per hour",
			crewCapacity: "100 personnel",
			armament: "Photon Cannons",
		},
	},
	{
		name: "Nebula",
		images: {
			png: "./assets/ship/Nebula.png",
		},
		description:
			"The Nebula is a sleek, agile ship designed for deep-space reconnaissance missions. With advanced stealth technology, it can avoid detection while collecting valuable data from unexplored regions.",
		specifications: {
			engine: "Plasma Wave Thrusters",
			speed: "60,000 km/h",
			crewCapacity: "15 personnel",
			armament: "Plasma Disruptor Cannons",
		},
	},
	{
		name: "Artemis",
		images: {
			png: "./assets/ship/Artemis.png",
		},
		description:
			"The Artemis is built for interstellar warfare. With heavy armor and high-powered weaponry, it is the most formidable combat vessel in the fleet, capable of defending entire planets from enemy fleets.",
		specifications: {
			engine: "Antimatter Core Reactor",
			speed: "0.3 Light-years per hour",
			crewCapacity: "500 personnel",
			armament: "Plasma Torpedoes",
		},
	},
];

// Select DOM elements
const tabs = document.querySelectorAll(".tab-list li");
const imgElement = document.getElementById("ship-img");
const nameElement = document.getElementById("ship-name");
const descriptionElement = document.getElementById("ship-description");
const engineElement = document.getElementById("ship-engine");
const speedElement = document.getElementById("ship-speed");
const crewCapacityElement = document.getElementById("ship-crew-capacity");
const armamentElement = document.getElementById("ship-armament");

// Function to update content based on ship
function updateContent(ship) {
	const data = ships.find((s) => s.name === ship);
	if (data) {
		imgElement.src = data.images.png;
		imgElement.alt = data.name;
		nameElement.textContent = data.name;
		descriptionElement.textContent = data.description;
		engineElement.textContent = data.specifications.engine;
		speedElement.textContent = data.specifications.speed;
		crewCapacityElement.textContent = data.specifications.crewCapacity;
		armamentElement.textContent = data.specifications.armament;
	}
}

// Add click event listeners to tabs
tabs.forEach((tab) => {
	tab.addEventListener("click", (e) => {
		// Remove active class from all tabs
		tabs.forEach((tab) => tab.classList.remove("active"));

		// Add active class to the clicked tab
		e.target.classList.add("active");

		// Update content
		const ship = e.target.getAttribute("data-ship");
		updateContent(ship);
	});
});
