// Utility
const $ = (selector) => document.querySelector(selector);
const $$ = (selector) => document.querySelectorAll(selector);

// Fetch JSON helpers
const fetchJSON = async (url) => {
    const res = await fetch(url);
    return res.json();
};

// Planet Data
let planets = {};
(async () => {
    planets = await fetchJSON('./data/planet_data.json');
})();

const tabs = $$('.planet-tabs li');
const planetImage = $('.planet-image img');
const planetName = $('.planet-name');
const planetDesc = $('.planet-description');
const stats = $$('.stats p');
let currentPlanet = "Moon";

tabs.forEach(tab => {
    tab.addEventListener("click", () => {
        const nextPlanet = tab.textContent.trim();
        if (nextPlanet === currentPlanet) return;
        switchPlanet(nextPlanet, getDirection(currentPlanet, nextPlanet));
        tabs.forEach(t => t.classList.remove("active"));
        tab.classList.add("active");
        currentPlanet = nextPlanet;
    });
});

const getDirection = (current, next) => {
    const order = ["Moon", "Venus", "Mars", "Europa", "Titan"];
    return order.indexOf(next) > order.indexOf(current) ? "right" : "left";
};

const switchPlanet = (planet, direction) => {
    const container = $('.destination-content');
    container.classList.add(`slide-${direction}`);
    setTimeout(() => {
        const { image, name, description, distance, travel } = planets[planet];
        planetImage.src = image;
        planetImage.alt = name;
        planetName.textContent = name;
        planetDesc.textContent = description;
        stats[0].textContent = distance;
        stats[1].textContent = travel;
        container.classList.remove(`slide-${direction}`);
    }, 300);
};

// Crew Data
let crewMembers = [];
let currentIndex = 0;

const crewContent = $('.crew-content');
const roleEl = $('.crew-role');
const nameEl = $('.crew-name');
const descEl2 = $('.crew-description');
const imageEl2 = $('.crew-image img');
const dots = $$('.dot');

(async () => {
    crewMembers = await fetchJSON('./data/crew_member.json');
    updateCrew(0);
})();

const updateCrew = (index, direction = "right") => {
    crewContent.classList.add(direction === "right" ? "slide-right" : "slide-left");

    setTimeout(() => {
        const { role, name, description, image } = crewMembers[index];
        roleEl.textContent = role;
        nameEl.textContent = name;
        descEl2.textContent = description;
        imageEl2.src = image;
        dots.forEach((dot, i) => dot.classList.toggle("active", i === index));
        crewContent.classList.remove("slide-right", "slide-left");
    }, 300);
};

const changeCrew = (newIndex) => {
    if (newIndex === currentIndex || crewMembers.length === 0) return;
    updateCrew(newIndex, newIndex > currentIndex ? "right" : "left");
    currentIndex = newIndex;
};

$('#prev')?.addEventListener("click", () => {
    changeCrew((currentIndex - 1 + crewMembers.length) % crewMembers.length);
});

$('#next')?.addEventListener("click", () => {
    changeCrew((currentIndex + 1) % crewMembers.length);
});

dots.forEach((dot, i) => {
    dot.addEventListener("click", () => changeCrew(i));
});

// Technology Data
let techData = [];

const subtitleEl = $('.tech-subtitle');
const titleEl = $('.tech-title');
const descEl = $('.tech-description');
const imageEl = $('.tech-image img');
const contentEl = $('.tech-content');
const imageContainer = $('.tech-image');
const navDots = $$('.tech-dot');

(async () => {
    techData = await fetchJSON('./data/tech_data.json');
    updateTech(0);
})();

const updateTech = (index) => {
    contentEl.classList.add("fade-out");
    imageContainer.classList.add("fade-out");

    setTimeout(() => {
        const { title, description, image, alt } = techData[index];
        titleEl.textContent = title;
        descEl.textContent = description;
        imageEl.src = image;
        imageEl.alt = alt;
        navDots.forEach((dot, i) => dot.classList.toggle("active", i === index));
        contentEl.classList.remove("fade-out");
        imageContainer.classList.remove("fade-out");
    }, 300);
};

navDots.forEach((dot, i) => {
    dot.addEventListener("click", () => updateTech(i));
});
