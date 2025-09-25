// Data from Flutter app
const destinations = [
    'Pakistan', 'Azad Kashmir', 'Islamabad', 'Fairy Meadows', 
    'Kaghan Valley', 'Swat', 'KPK', 'Deosai National Park', 
    'Murree', 'Skardu'
];

const packages = [
    {
        title: 'Kashmir',
        image: 'assets/images/kashmir2.jpg',
        description: 'Azad Kashmir is a region of Pakistan situated in the Northern part of the country.',
        price: '21000PKR',
        rating: 4,
    },
    {
        title: 'Kaghan Valley',
        image: 'assets/images/kaghan3.jpg',
        description: 'Kaghan Valley is a picturesque valley located in the Mansehra District of Pakistan\'s KPK.',
        price: '19000PKR',
        rating: 5,
    },
    {
        title: 'KpK',
        image: 'assets/images/KPK2.jpg',
        description: 'Khyber Pakhtunkhwa (KPK) is a province in the northwest of Pakistan, known for its stunning landscapes, rich history, and diverse cultures.',
        price: '19000PKR',
        rating: 5,
    },
    {
        title: 'Skardu',
        image: 'assets/images/Skardu.jfif',
        description: 'Skardu is a breathtaking valley in Gilgit-Baltistan region, known for its high-altitude lakes, and trekking routes.',
        price: '19000PKR',
        rating: 5,
    },
    {
        title: 'Swat',
        image: 'assets/images/swat2.jpg',
        description: 'Swat valley is locally known as Pakistan Switzerland thanks to its snow-capped mountains and scenic views.',
        price: '19000PKR',
        rating: 5,
    },
    {
        title: 'Fairy Meadows',
        image: 'assets/images/kg2.jpg',
        description: 'Fairy Meadows is a breathtaking alpine meadow located in the Gilgit-Baltistan region of Pakistan.',
        price: '25000PKR',
        rating: 5,
    },
    {
        title: 'Lahore',
        image: 'assets/images/lahore2.jpg',
        description: 'Lahore is often described as the "City of Gardens" and the "Cultural Heart of Pakistan," known for its rich history, art, and cuisine.',
        price: '25000PKR',
        rating: 5,
    },
    {
        title: 'Deosai National Park',
        image: 'assets/images/des3.jpg',
        description: 'Deosai National Park is a national park located between the Skardu District and in Gilgit-Baltistan.',
        price: '25000PKR',
        rating: 5,
    },
    {
        title: 'Islamabad',
        image: 'assets/images/islamabad2.jfif',
        description: 'Islamabad (ISB) is the capital city of Pakistan, known for its modern infrastructure and green spaces.',
        price: '14000PKR',
        rating: 4,
    }
];

const services = [
    {
        icon: 'fas fa-hotel',
        title: 'Affordable Hotel',
        description: 'Quality stays at budget-friendly prices',
    },
    {
        icon: 'fas fa-utensils',
        title: 'Food & Drinks',
        description: 'Delight in local flavors and beverages',
    },
    {
        icon: 'fas fa-shield-alt',
        title: 'Safety Guide',
        description: 'Stay safe while exploring',
    },
    {
        icon: 'fas fa-plane',
        title: 'Fastest Travel',
        description: 'Convenient and comfortable travel',
    }
];

const galleryImages = [
    'assets/images/swat2.jpg',
    'assets/images/kaghan3.jpg',
    'assets/images/kashmir.jpg',
    'assets/images/kg2.jpg',
    'assets/images/swat5.jpg',
    'assets/images/KpK3.jpg'
];

// Initialize the application
document.addEventListener('DOMContentLoaded', function() {
    initializeVideo();
    startDestinationChanger();
    loadPackages();
    loadServices();
    loadGallery();
    setupEventListeners();
});

// Video initialization
function initializeVideo() {
    const video = document.getElementById('background-video');
    if (video) {
        video.play().catch(error => {
            console.log('Video autoplay prevented:', error);
        });
    }
}

// Destination changer animation
function startDestinationChanger() {
    let currentIndex = 0;
    const destinationElement = document.getElementById('changing-destination');
    
    setInterval(() => {
        currentIndex = (currentIndex + 1) % destinations.length;
        destinationElement.style.opacity = '0';
        
        setTimeout(() => {
            destinationElement.textContent = destinations[currentIndex];
            destinationElement.style.opacity = '1';
        }, 500);
    }, 3000);
}

// Load packages into the grid
function loadPackages() {
    const container = document.getElementById('packages-container');
    
    packages.forEach(package => {
        const packageCard = createPackageCard(package);
        container.appendChild(packageCard);
    });
}

function createPackageCard(package) {
    const card = document.createElement('div');
    card.className = 'package-card';
    
    const stars = Array.from({length: 5}, (_, i) => 
        `<span class="star ${i < package.rating ? 'filled' : 'empty'}">★</span>`
    ).join('');
    
    card.innerHTML = `
        <div class="package-image">
            <img src="${package.image}" alt="${package.title}" 
                 onerror="this.src='https://via.placeholder.com/300x200?text=Image+Not+Found'">
        </div>
        <div class="package-content">
            <h3>${package.title}</h3>
            <p class="package-description">${package.description}</p>
            <div class="package-rating">
                ${stars}
                <span class="package-price">${package.price}</span>
            </div>
            <button class="package-book-btn" onclick="bookPackage('${package.title}')">
                Book Now
            </button>
        </div>
    `;
    
    return card;
}

// Load services
function loadServices() {
    const container = document.getElementById('services-container');
    
    services.forEach(service => {
        const serviceCard = document.createElement('div');
        serviceCard.className = 'service-card';
        
        serviceCard.innerHTML = `
            <i class="${service.icon} service-icon"></i>
            <h3>${service.title}</h3>
            <p>${service.description}</p>
        `;
        
        container.appendChild(serviceCard);
    });
}

// Load gallery
function loadGallery() {
    const container = document.getElementById('gallery-container');
    
    galleryImages.forEach(image => {
        const galleryItem = document.createElement('div');
        galleryItem.className = 'gallery-item';
        
        galleryItem.innerHTML = `
            <img src="${image}" alt="Gallery Image" 
                 onerror="this.src='https://via.placeholder.com/300x300?text=Image+Not+Found'">
        `;
        
        container.appendChild(galleryItem);
    });
}

// Setup event listeners
function setupEventListeners() {
    // Smooth scrolling for navigation links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            scrollToSection(targetId);
        });
    });

    // Booking form submission
    const bookingForm = document.getElementById('booking-form');
    bookingForm.addEventListener('submit', handleBooking);

    // Modal functionality
    const modal = document.getElementById('success-modal');
    const closeBtn = document.querySelector('.close');
    const okBtn = document.querySelector('.modal-ok-btn');

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    okBtn.addEventListener('click', () => {
        modal.style.display = 'none';
        bookingForm.reset();
    });

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Mobile menu toggle
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    hamburger.addEventListener('click', () => {
        navMenu.style.display = navMenu.style.display === 'flex' ? 'none' : 'flex';
    });
}

// Smooth scroll to section
function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }
}

// Book package function
function bookPackage(destination) {
    const select = document.getElementById('destination');
    select.value = destination;
    scrollToSection('book');
}

// Handle booking form submission
function handleBooking(e) {
    e.preventDefault();
    
    const destination = document.getElementById('destination').value;
    const name = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    
    if (!destination || !name || !email) {
        alert('Please fill all required fields');
        return;
    }
    
    // Show success modal
    const modal = document.getElementById('success-modal');
    const message = document.getElementById('success-message');
    message.textContent = `Your booking for ${destination} has been submitted successfully!`;
    modal.style.display = 'block';
}

// Responsive navigation
function toggleOptions(id) {
  const options = document.getElementById(id);
  const allOptions = document.querySelectorAll(".options");

  // Close others
  allOptions.forEach(opt => {
    if (opt.id !== id) {
      opt.style.display = "none";
    }
  });

  // Toggle current
  if (options.style.display === "block") {
    options.style.display = "none";
  } else {
    options.style.display = "block";
  }
}

