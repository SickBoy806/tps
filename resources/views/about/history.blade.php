<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanzania Police Force Historical Timeline - 3D Rotation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            perspective: 1000px;
            overflow-x: hidden;
        }
        
        .page-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(rgba(245, 245, 245, 0.85), rgba(245, 245, 245, 0.85)), url('/api/placeholder/1200/800');
            background-size: cover;
            background-position: center;
            z-index: -1;
        }
        
        .statue-container {
            position: fixed;
            bottom: 0;
            right: 5%;
            width: 200px;
            height: 400px;
            z-index: -1;
            opacity: 0.7;
        }
        
        .statue-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .timeline-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            padding: 20px;
            background-color: #00592d; /* Tanzania flag green */
            color: white;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .header h1 {
            margin: 0;
            font-size: 32px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        
        .header p {
            margin: 10px 0 0;
            font-size: 18px;
        }
        
        .carousel-container {
            position: relative;
            height: 600px;
            margin: 0 auto;
            perspective: 2000px;
        }
        
        .carousel {
            position: absolute;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 1.2s ease-in-out;
            transform: rotateY(0deg);
        }
        
        .slide {
            position: absolute;
            width: 60%; /* Reduced width for better rotation */
            height: 80%; /* Reduced height for better proportion */
            max-width: 600px;
            left: 50%;
            top: 10%;
            transform-style: preserve-3d;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            display: flex;
            overflow: hidden;
            backface-visibility: hidden;
            padding: 0;
            transition: all 0.5s ease;
        }
        
        .slide:hover {
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.3);
            transform: translateZ(50px) rotateY(0deg) !important;
        }
        
        .slide-image {
            width: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #f8f8f8;
        }
        
        .slide-image img {
            max-width: 100%;
            max-height: 250px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        
        .slide:hover .slide-image img {
            transform: scale(1.05);
        }
        
        .slide-content {
            width: 60%;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .year {
            font-size: 28px;
            font-weight: bold;
            color: #00592d; /* Tanzania flag green */
            margin-bottom: 15px;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
        }
        
        .event-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .event-description {
            font-size: 15px;
            line-height: 1.6;
        }
        
        .controls {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        
        .control-button {
            background-color: #ffcd00; /* Tanzania flag yellow */
            color: #333;
            border: none;
            padding: 12px 24px;
            margin: 0 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .control-button:hover {
            background-color: #e6b800;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        .control-button:active {
            transform: translateY(0);
        }
        
        .progress-dots {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .dot {
            width: 12px;
            height: 12px;
            background-color: #ccc;
            border-radius: 50%;
            margin: 0 6px;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid transparent;
        }
        
        .dot:hover {
            transform: scale(1.2);
        }
        
        .dot.active {
            background-color: #00592d; /* Tanzania flag green */
            border-color: #ffcd00;
            transform: scale(1.2);
        }
        
        @media (max-width: 768px) {
            .slide {
                width: 75%;
                flex-direction: column;
                overflow-y: auto;
            }
            
            .slide-image, .slide-content {
                width: 100%;
                padding: 15px;
            }
            
            .carousel-container {
                height: 700px;
            }
            
            .statue-container {
                width: 120px;
                height: 240px;
                right: 2%;
            }
        }
    </style>
</head>
<body>
    <div class="page-background"></div>
    
    <div class="statue-container">
        <img src="/api/placeholder/300/600" alt="Police Statue" class="statue-img">
    </div>
    
    <div class="timeline-container">
        <div class="header">
            <h1>Tanzania Police Force</h1>
            <p>Historical Timeline of Key Events</p>
        </div>
        
        <div class="carousel-container">
            <div class="carousel" id="carousel">
                <!-- Slides will be inserted here by JavaScript -->
            </div>
        </div>
        
        <div class="controls">
            <button class="control-button" id="prev">Previous</button>
            <button class="control-button" id="next">Next</button>
        </div>
        
        <div class="progress-dots" id="dots">
            <!-- Dots will be generated by JavaScript -->
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Timeline events data
            const timelineEvents = [
                {
                    year: "1919",
                    title: "Formation of Tanganyika Police Force",
                    description: "After World War I, when Tanganyika became a British-administered territory under League of Nations mandate, the colonial administration established the Tanganyika Police Force. The force was primarily created to maintain colonial law and order, protect colonial interests, and enforce colonial policies.",
                    image: "/api/placeholder/400/320",
                    alt: "Colonial Police Force"
                },
                {
                    year: "1961",
                    title: "Independence and Police Transformation",
                    description: "Following Tanganyika's independence from British colonial rule, the police force underwent significant reforms. The focus shifted from protecting colonial interests to serving the newly independent nation. This period marked the beginning of the indigenization of the police leadership and a restructuring of the force to align with the new nation's needs.",
                    image: "/api/placeholder/400/320",
                    alt: "Independence Era Police"
                },
                {
                    year: "1964",
                    title: "Union of Tanganyika and Zanzibar",
                    description: "With the union of Tanganyika and Zanzibar to form Tanzania, the police forces of both territories began the process of integration. This led to the formation of the unified Tanzania Police Force, though Zanzibar maintained some autonomy in its internal security affairs.",
                    image: "/api/placeholder/400/320",
                    alt: "Zanzibar Revolution"
                },
                {
                    year: "1970s",
                    title: "Police Force Expansion",
                    description: "During this decade, the Tanzania Police Force underwent significant expansion. New units were created to address emerging security challenges, and efforts were made to increase the force's capacity for maintaining law and order across the growing nation. This period also saw the establishment of specialized training programs for police officers.",
                    image: "/api/placeholder/400/320",
                    alt: "Police Modernization"
                },
                {
                    year: "1995",
                    title: "Police Reform Initiative",
                    description: "Following Tanzania's transition to a multi-party democracy, the police force initiated comprehensive reforms to enhance professionalism, accountability, and service delivery. This included revising the Police Force and Auxiliary Services Act to align with democratic principles and human rights standards.",
                    image: "/api/placeholder/400/320",
                    alt: "Police Academy"
                },
                {
                    year: "2006",
                    title: "Community Policing Implementation",
                    description: "The Tanzania Police Force formally adopted community policing as a core strategy. This approach emphasized collaboration between the police and communities to identify and address security concerns. Community Police Forums were established across the country to facilitate this partnership.",
                    image: "/api/placeholder/400/320",
                    alt: "Modern Police Force"
                },
                {
                    year: "2013",
                    title: "Technological Modernization",
                    description: "A significant technological upgrade initiative was launched to enhance the force's operational capabilities. This included the introduction of digital criminal records management systems, automated fingerprint identification systems, and modern forensic laboratories to improve crime detection and investigation.",
                    image: "/api/placeholder/400/320",
                    alt: "Police Technology"
                },
                {
                    year: "2021",
                    title: "Comprehensive Strategic Plan",
                    description: "The Tanzania Police Force launched a new strategic plan focusing on countering emerging security threats, including cybercrime and terrorism. The plan emphasized capacity building, international cooperation, and the use of intelligence-led policing methodologies to enhance security across the nation.",
                    image: "/api/placeholder/400/320",
                    alt: "Police Strategic Plan"
                }
            ];
            
            const carousel = document.getElementById('carousel');
            const dotsContainer = document.getElementById('dots');
            const prevButton = document.getElementById('prev');
            const nextButton = document.getElementById('next');
            let currentSlide = 0;
            const totalSlides = timelineEvents.length;
            
            // Create slides and append to carousel
            timelineEvents.forEach((event, index) => {
                const slide = document.createElement('div');
                slide.className = 'slide';
                
                // Calculate 3D position - reduced radius for better rotation
                const angle = (index / totalSlides) * 2 * Math.PI;
                const radius = 800; // Increased for more spacing between slides
                const translateZ = radius * Math.cos(angle);
                const translateX = radius * Math.sin(angle);
                
                slide.style.transform = `translateX(-50%) translateZ(${translateZ}px) translateX(${translateX}px) rotateY(${angle * (180/Math.PI)}deg)`;
                
                slide.innerHTML = `
                    <div class="slide-image">
                        <img src="${event.image}" alt="${event.alt}">
                    </div>
                    <div class="slide-content">
                        <div class="year">${event.year}</div>
                        <div class="event-title">${event.title}</div>
                        <div class="event-description">${event.description}</div>
                    </div>
                `;
                
                carousel.appendChild(slide);
                
                // Create dot for this slide
                const dot = document.createElement('div');
                dot.classList.add('dot');
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => {
                    goToSlide(index);
                });
                dotsContainer.appendChild(dot);
            });
            
            const dots = document.querySelectorAll('.dot');
            const slides = document.querySelectorAll('.slide');
            
            // Function to rotate carousel to show a specific slide
            function rotateCarousel(slideIndex) {
                const angle = (slideIndex / totalSlides) * 360;
                carousel.style.transform = `rotateY(${-angle}deg)`;
                
                // Update active dot
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === slideIndex);
                });
                
                // Highlight active slide
                slides.forEach((slide, i) => {
                    if (i === slideIndex) {
                        slide.style.zIndex = "10";
                    } else {
                        slide.style.zIndex = "1";
                    }
                });
            }
            
            // Function to go to specific slide
            function goToSlide(index) {
                currentSlide = index;
                rotateCarousel(currentSlide);
            }
            
            // Event listeners for controls
            prevButton.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                rotateCarousel(currentSlide);
            });
            
            nextButton.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % totalSlides;
                rotateCarousel(currentSlide);
            });
            
            // Auto-rotate carousel every 10 seconds
            let autoRotate = setInterval(() => {
                currentSlide = (currentSlide + 1) % totalSlides;
                rotateCarousel(currentSlide);
            }, 10000);
            
            // Stop auto-rotation when user interacts
            document.querySelector('.carousel-container').addEventListener('mouseenter', () => {
                clearInterval(autoRotate);
            });
            
            // Resume auto-rotation when user stops interacting
            document.querySelector('.carousel-container').addEventListener('mouseleave', () => {
                autoRotate = setInterval(() => {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    rotateCarousel(currentSlide);
                }, 10000);
            });
            
            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                    rotateCarousel(currentSlide);
                } else if (e.key === 'ArrowRight') {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    rotateCarousel(currentSlide);
                }
            });
            
            // Initial rotation to show first slide properly
            rotateCarousel(0);
        });
    </script>
</body>
</html>