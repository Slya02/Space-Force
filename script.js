export const $ = (selector) => document.querySelector(selector);
export const $$ = (selector) => document.querySelectorAll(selector);

const fetchJSON = async (url) => {
  const res = await fetch(url);
  return res.json();
};

const getDirection = (current, next, order) =>
  order.indexOf(next) > order.indexOf(current) ? "right" : "left";

const switchContent = (data, itemKey, direction) => {
  const container = $('.destination-content');
  const { image, name, description, distance, travel } = data[itemKey];

  container.classList.add(`slide-${direction}`);
  setTimeout(() => {
    const img = $('.planet-image img');
    img.src = image;
    img.alt = name;
    $('.planet-name').textContent = name;
    $('.planet-description').textContent = description;

    const stats = $$('.stats p');
    stats[0].textContent = distance || "";
    stats[1].textContent = travel || "";

    container.classList.remove(`slide-${direction}`);
  }, 300);
};

export const initPage = async ({ dataUrl, defaultItem, order, tabSelector = '.planet-tabs li' }) => {
    const $ = (selector) => document.querySelector(selector);
    const $$ = (selector) => document.querySelectorAll(selector);
  
    const fetchJSON = async (url) => {
      const res = await fetch(url);
      return res.json();
    };
  
    const getDirection = (current, next, order) =>
      order.indexOf(next) > order.indexOf(current) ? "right" : "left";
  
    const switchContent = (data, itemKey, direction) => {
      const container = document.querySelector('.destination-content');
      const { image, name, description, distance, travel } = data[itemKey];
  
      container.classList.add(`slide-${direction}`);
      setTimeout(() => {
        const img = document.querySelector('.planet-image img');
        img.src = image;
        img.alt = name;
        document.querySelector('.planet-name').textContent = name;
        document.querySelector('.planet-description').textContent = description;
  
        const stats = document.querySelectorAll('.stats p');
        stats[0].textContent = distance || '';
        stats[1].textContent = travel || '';
  
        container.classList.remove(`slide-${direction}`);
      }, 300);
    };
  
    const data = await fetchJSON(dataUrl);
    let currentItem = defaultItem;
    const tabs = document.querySelectorAll(tabSelector);
  
    tabs.forEach(tab => {
      tab.addEventListener("click", () => {
        const nextItem = tab.textContent.trim();
        if (nextItem === currentItem) return;
        const direction = getDirection(currentItem, nextItem, order);
        switchContent(data, nextItem, direction);
        tabs.forEach(t => t.classList.remove("active"));
        tab.classList.add("active");
        currentItem = nextItem;
      });
    });
  
    switchContent(data, defaultItem, "right");
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

// Review
let reviewList = [];
let reviewCurrentIndex = 0;

const reviewContent = $('.review-content');
const reviewRating = $('.review-rating');
const reviewName = $('.review-name');
const reviewText = $('.review-text');
const reviewImg = $('#review-img'); 
const reviewDots = $$('.dot');  
const reviewPrev = $('#review-prev');  
const reviewNext = $('#review-next');  

(async () => {
    reviewList = await fetchReviewJSON('./data/review.json');
    updateReview(0);  
})();

function updateReview(index, direction = "right") {
    reviewContent.classList.add(direction === "right" ? "slide-right" : "slide-left");

    setTimeout(() => {
        const { name, rating, text, image } = reviewList[index];
        reviewRating.textContent = `Rating: ${rating}`;
        reviewName.textContent = name;
        reviewText.textContent = text;
        reviewImg.src = image;

        reviewDots.forEach((dot, i) => dot.classList.toggle("active", i === index));

        reviewContent.classList.remove("slide-right", "slide-left");
    }, 300);
}

function changeReview(newIndex) {
    if (newIndex === reviewCurrentIndex || reviewList.length === 0) return;
    
    updateReview(newIndex, newIndex > reviewCurrentIndex ? "right" : "left");
    reviewCurrentIndex = newIndex; 
}

reviewPrev?.addEventListener("click", () => {
    changeReview((reviewCurrentIndex - 1 + reviewList.length) % reviewList.length);
});

reviewNext?.addEventListener("click", () => {
    changeReview((reviewCurrentIndex + 1) % reviewList.length);
});

reviewDots.forEach((dot, i) => {
    dot.addEventListener("click", () => changeReview(i));  
});

async function fetchReviewJSON(url) {
    const res = await fetch(url);
    return await res.json();
}

