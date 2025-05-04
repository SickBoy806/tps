@extends('layouts.app')

@section('title', 'TPS - Interactive History')

@section('content')
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2d4739; /* Dark green background similar to Greta */
            color: #fff;
            overflow-x: hidden;
        }

        /* Hide default cursor */
        body {
            cursor: none;
        }
        
        /* Custom cursor */
        .cursor {
            position: fixed;
            width: 20px;
            height: 20px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            pointer-events: none;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
            z-index: 9999;
            mix-blend-mode: difference;
        }

        /* Main container */
        .main-container {
            position: relative;
            width: 100%;
            height: 90vh;
            overflow: hidden;
        }

        /* Scene and 3D elements */
        #scene {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Timeline navigation */
        .timeline {
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 60%;
            z-index: 10;
        }

        .timeline-label {
            font-size: 1.2rem;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .timeline-line {
            flex-grow: 1;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.3);
            margin: 0 20px;
            position: relative;
        }

        .timeline-marker {
            position: absolute;
            width: 12px;
            height: 12px;
            background-color: #fff;
            border-radius: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .timeline-marker:hover {
            transform: translate(-50%, -50%) scale(1.5);
        }

        .timeline-marker.active {
            background-color: #fff;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
        }

        /* Header and branding */
        .header {
            position: absolute;
            top: 5%;
            left: 5%;
            z-index: 10;
        }

        .school-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0;
        }

        .school-subtitle {
            font-size: 1rem;
            opacity: 0.8;
            margin: 0;
        }

        /* Content display */
        .content-display {
            position: absolute;
            width: 30%;
            left: 5%;
            bottom: 15%;
            z-index: 10;
        }

        .year-title {
            font-size: 2.5rem;
            margin-bottom: 0;
            color: #fff;
        }

        .content-heading {
            font-size: 2rem;
            margin: 0;
        }

        .content-text {
            font-size: 1rem;
            line-height: 1.6;
            max-width: 500px;
        }

        /* Media display */
        .media-display {
            position: absolute;
            width: 35%;
            right: 10%;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            perspective: 1000px;
        }

        .media-frame {
            width: 100%;
            height: 0;
            padding-bottom: 75%;
            position: relative;
            transform-style: preserve-3d;
            transform: rotateY(-15deg) rotateX(5deg);
            transition: transform 0.5s ease;
        }

        .media-image {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        /* Navigation buttons */
        .nav-controls {
            position: absolute;
            bottom: 10%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 20px;
            z-index: 10;
        }

        .nav-button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-button:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        /* Social sharing */
        .social-links {
            position: absolute;
            bottom: 10%;
            right: 5%;
            display: flex;
            gap: 15px;
            z-index: 10;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        /* Central 3D Model */
        .central-model {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            height: 80%;
            z-index: 3;
            pointer-events: none;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .content-display {
                width: 45%;
            }
            
            .media-display {
                width: 40%;
            }
        }
        
        @media (max-width: 768px) {
            .timeline {
                width: 90%;
            }
            
            .content-display {
                width: 90%;
                left: 5%;
                bottom: 25%;
            }
            
            .media-display {
                width: 70%;
                right: 15%;
                top: 30%;
            }
            
            .central-model {
                height: 50%;
                bottom: 10%;
            }
            .header h1.school-title {
                font-size: 1.6rem; /* Adjust as needed */
                padding-top: -1.5rem;
            }

            .header p.school-subtitle {
                font-size: 1rem;
                padding-top: 0.5rem;
            }

            .content-display {
                padding-top: 1.5rem;
            }

            .year-title, .content-heading, .content-text {
                font-size: 1rem;
            }

            .nav-button {
                font-size: 1.2rem;
                padding: 0.5rem 1rem;
            }

            .social-link {
                font-size: 0.9rem;
            }

            .timeline-label {
                font-size: 0.9rem;
            }
            
            .md:hidden {
            display: none !important;
        }
        }
    </style>
<body>
    <!-- Custom Cursor -->
    <div class="cursor" id="custom-cursor"></div>

    <!-- Main Container -->
    <div class="main-container">
        <!-- WebGL Scene -->
        <canvas id="scene"></canvas>
        
        <!-- Header -->
        <div class="header">
            <h1 class="school-title">Tanzania Police School</h1>
            <p class="school-subtitle">A Century of Service and Training</p>
        </div>
        
        <!-- Timeline Navigation -->
        <div class="timeline">
            <div class="timeline-label">1921</div>
            <div class="timeline-line" id="timeline-line">
                <!-- Timeline markers will be generated by JS -->
            </div>
            <div class="timeline-label">2023</div>
        </div>
        
        <!-- Content Display -->
        <div class="content-display">
            <h3 class="year-title" id="year-display">1921</h3>
            <h2 class="content-heading" id="content-heading">Foundation of Police Training</h2>
            <p class="content-text" id="content-text">
                The first formal police training in Tanganyika (now Tanzania) was established under British colonial rule. Initial training focused on basic law enforcement skills for colonial officers. The training facility was basic but laid the groundwork for future developments in police education in the region.
            </p>
        </div>
        
        <!-- Media Display -->
        <div class="media-display">
            <div class="media-frame" id="media-frame">
                <img src="/api/placeholder/800/600" alt="Historical photo1" class="media-image" id="media-image">
            </div>
        </div>
        
        <!-- Central 3D Model -->
        <!-- <img src="/api/placeholder/400/800" alt="3D Police Officer Model" class="central-model" id="central-model"> -->
        
        <!-- Navigation Controls -->
        <div class="nav-controls">
            <div class="nav-button" id="prev-btn">&lt;</div>
            <div class="nav-button" id="play-btn">॥</div>
            <div class="nav-button" id="next-btn">&gt;</div>
        </div>
        
        <!-- Social Links -->
        <div class="social-links">
            <div class="social-link">FB</div>
            <div class="social-link">TW</div>
            <div class="social-link">YT</div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tanzania Police School History Data
            const historyData = [
                {
                    year: "1921",
                    title: "Foundation of Police Training",
                    image: "{{ asset('assets/images/history/photo1.jpg ') }}",
                    description: "The first formal police training in Tanganyika (now Tanzania) was established under British colonial rule. Initial training focused on basic law enforcement skills for colonial officers. The training facility was basic but laid the groundwork for future developments in police education in the region."
                },
                {
                    year: "1946",
                    title: "Establishment of Central Police Training School",
                    image: "{{ asset('assets/images/history/school.jpg ') }}",
                    description: "The Central Police Training School was formally established in Dar es Salaam as the main training institution for police officers in the territory. This marked a significant step in the professionalization of police services with standardized curriculum and training methods."
                },
                {
                    year: "1961",
                    title: "Independence Era Transformation",
                    image: "{{ asset('assets/images/history/photo2.jpg ') }}",
                    description: "Following Tanganyika's independence, the police training curriculum was revised to align with the needs of the newly independent nation, emphasizing service to local communities rather than colonial interests. This period saw significant changes in leadership and training philosophy."
                },
                {
                    year: "1964",
                    title: "United Republic and Police Unification",
                    image: "{{ asset('assets/images/history/photo3.jpg ') }}",
                    description: "After the union of Tanganyika and Zanzibar forming Tanzania, the police training systems were gradually integrated to create a unified approach. This process involved harmonizing different procedures, ranks, and training methodologies to create a cohesive national police force."
                },
                {
                    year: "1975",
                    title: "Police School Modernization",
                    image: "{{ asset('assets/images/history/policing.jpg ') }}",
                    description: "Major curriculum reforms were implemented, introducing modern policing techniques and expanding specialized training programs. The physical facilities were upgraded, and new departments were created to address emerging security challenges in a developing Tanzania."
                },
                {
                    year: "1984",
                    title: "Advanced Training Programs",
                    image: "{{ asset('assets/images/history/cid.jpg ') }}",
                    description: "The Tanzania Police School introduced advanced courses in criminal investigation, forensics, and community policing to address evolving security challenges. This era saw a more scientific approach to police education with laboratory facilities and specialized instructors."
                },
                {
                    year: "1996",
                    title: "International Partnership Era",
                    image: "{{ asset('assets/images/history/africa.jpg ') }}",
                    description: "The school began forming international partnerships with police academies across Africa and beyond, enhancing training standards and exchange programs. This period marked Tanzania Police School's emergence on the international stage, with training collaborations with agencies from Europe, Asia, and other African nations."
                },
                {
                    year: "2008",
                    title: "Technology Integration",
                    image: "{{ asset('assets/images/history/technology.jpg ') }}",
                    description: "Digital training programs and computer-based learning were introduced, modernizing the curriculum to include cybercrime investigation and digital evidence handling. Computer labs were established, and officers began receiving training in digital forensics and electronic crime prevention."
                },
                {
                    year: "2015",
                    title: "Comprehensive Reform",
                    image: "{{ asset('assets/images/history/reformation.jpg ') }}",
                    description: "A comprehensive reform of the Tanzania Police School was implemented, focusing on human rights, professional ethics, and community-oriented policing principles. This reform acknowledged global standards in police education and emphasized accountability and transparency."
                },
                {
                    year: "2023",
                    title: "Contemporary Excellence Center",
                    image: "{{ asset('assets/images/history/tps.jpg ') }}",
                    description: "Today, the Tanzania Police School stands as a center of excellence in law enforcement education in East Africa, offering diverse specialized programs and continuing to evolve with contemporary policing challenges. The institution now trains officers from neighboring countries and collaborates with international law enforcement agencies on various initiatives."
                }
            ];
            
            // Global variables
            let currentIndex = 0;
            const totalItems = historyData.length;
            let autoplay = true;
            let autoplayInterval;
            let isAnimating = false;
            
            // DOM Elements
            const cursor = document.getElementById('custom-cursor');
            const yearDisplay = document.getElementById('year-display');
            const contentHeading = document.getElementById('content-heading');
            const contentText = document.getElementById('content-text');
            const mediaImage = document.getElementById('media-image');
            const mediaFrame = document.getElementById('media-frame');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const playBtn = document.getElementById('play-btn');
            const timelineLine = document.getElementById('timeline-line');
            
            // Custom cursor
            document.addEventListener('mousemove', (e) => {
                gsap.to(cursor, {
                    left: e.clientX,
                    top: e.clientY,
                    duration: 0.1
                });
                
                // Add hover effect for clickable elements
                const target = e.target;
                if (target.classList.contains('nav-button') || 
                    target.classList.contains('timeline-marker') || 
                    target.classList.contains('social-link')) {
                    cursor.style.transform = 'translate(-50%, -50%) scale(1.5)';
                    cursor.style.backgroundColor = 'rgba(255, 255, 255, 0.9)';
                } else {
                    cursor.style.transform = 'translate(-50%, -50%) scale(1)';
                    cursor.style.backgroundColor = 'rgba(255, 255, 255, 0.7)';
                }
            });
            
            // Create timeline markers
            function createTimelineMarkers() {
                historyData.forEach((item, index) => {
                    const percent = index / (totalItems - 1) * 100;
                    const marker = document.createElement('div');
                    marker.className = 'timeline-marker';
                    marker.style.left = `${percent}%`;
                    marker.setAttribute('data-index', index);
                    
                    if (index === 0) marker.classList.add('active');
                    
                    marker.addEventListener('click', () => {
                        if (isAnimating) return;
                        navigateToIndex(index);
                    });
                    
                    timelineLine.appendChild(marker);
                });
            }
            
            // Update content based on current index
            function updateContent(index) {
                const item = historyData[index];
                
                // Update text content with animation
                gsap.to([yearDisplay, contentHeading, contentText], {
                    opacity: 0,
                    y: 20,
                    duration: 0.4,
                    stagger: 0.1,
                    onComplete: () => {
                        yearDisplay.textContent = item.year;
                        contentHeading.textContent = item.title;
                        contentText.textContent = item.description;
                        
                        gsap.to([yearDisplay, contentHeading, contentText], {
                            opacity: 1,
                            y: 0,
                            duration: 0.4,
                            stagger: 0.1
                        });
                    }
                });
                
                // Update image with animation
                gsap.to(mediaFrame, {
                    rotationY: -25,
                    opacity: 0.7,
                    duration: 0.5,
                    onComplete: () => {
                        mediaImage.src = item.image;
                        
                        gsap.to(mediaFrame, {
                            rotationY: -15,
                            opacity: 1,
                            duration: 0.5,
                            delay: 0.1
                        });
                    }
                });
                
                // Update timeline markers
                document.querySelectorAll('.timeline-marker').forEach((marker, i) => {
                    if (i === index) {
                        marker.classList.add('active');
                    } else {
                        marker.classList.remove('active');
                    }
                });
            }
            
            // Navigation
            function navigateToPrevious() {
                if (isAnimating) return;
                isAnimating = true;
                
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                updateContent(currentIndex);
                
                setTimeout(() => {
                    isAnimating = false;
                }, 800);
            }
            
            function navigateToNext() {
                if (isAnimating) return;
                isAnimating = true;
                
                currentIndex = (currentIndex + 1) % totalItems;
                updateContent(currentIndex);
                
                setTimeout(() => {
                    isAnimating = false;
                }, 800);
            }
            
            function navigateToIndex(index) {
                if (isAnimating || index === currentIndex) return;
                isAnimating = true;
                
                currentIndex = index;
                updateContent(currentIndex);
                
                setTimeout(() => {
                    isAnimating = false;
                }, 800);
            }
            
            // Toggle autoplay
            function toggleAutoplay() {
                autoplay = !autoplay;
                
                if (autoplay) {
                    playBtn.textContent = '॥';
                    startAutoplay();
                } else {
                    playBtn.textContent = '▶';
                    clearInterval(autoplayInterval);
                }
            }
            
            function startAutoplay() {
                clearInterval(autoplayInterval);
                autoplayInterval = setInterval(() => {
                    if (!isAnimating) {
                        navigateToNext();
                    }
                }, 5000);
            }
            
            // Three.js background scene setup
            function initThreeScene() {
                const scene = new THREE.Scene();
                const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
                const renderer = new THREE.WebGLRenderer({ 
                    canvas: document.getElementById('scene'),
                    alpha: true,
                    antialias: true
                });
                
                renderer.setSize(window.innerWidth, window.innerHeight);
                renderer.setPixelRatio(window.devicePixelRatio);
                
                // Create particles
                const particleGeometry = new THREE.BufferGeometry();
                const particleCount = 1500;
                const posArray = new Float32Array(particleCount * 3);
                
                for (let i = 0; i < particleCount * 3; i++) {
                    posArray[i] = (Math.random() - 0.5) * 20;
                }
                
                particleGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
                
                const particleMaterial = new THREE.PointsMaterial({
                    color: 0x5f9ea0,
                    size: 0.05,
                    transparent: true,
                    blending: THREE.AdditiveBlending
                });
                
                const particleSystem = new THREE.Points(particleGeometry, particleMaterial);
                scene.add(particleSystem);
                
                // 3D shapes in background
                const geometries = [
                    new THREE.IcosahedronGeometry(0.6, 0),
                    new THREE.BoxGeometry(0.7, 0.7, 0.7),
                    new THREE.TorusGeometry(0.5, 0.2, 16, 100)
                ];
                
                const material = new THREE.MeshPhongMaterial({
                    color: 0x5f9ea0,
                    transparent: true,
                    opacity: 0.7,
                    wireframe: true
                });
                
                const shapes = [];
                
                // Create floating shapes
                for (let i = 0; i < 15; i++) {
                    const geometry = geometries[Math.floor(Math.random() * geometries.length)];
                    const mesh = new THREE.Mesh(geometry, material);
                    
                    mesh.position.set(
                        (Math.random() - 0.5) * 15,
                        (Math.random() - 0.5) * 15,
                        (Math.random() - 0.5) * 15 - 5
                    );
                    
                    scene.add(mesh);
                    
                    shapes.push({
                        mesh,
                        rotSpeed: {
                            x: (Math.random() - 0.5) * 0.01,
                            y: (Math.random() - 0.5) * 0.01,
                            z: (Math.random() - 0.5) * 0.01
                        },
                        floatSpeed: {
                            x: (Math.random() - 0.5) * 0.005,
                            y: (Math.random() - 0.5) * 0.005,
                            z: (Math.random() - 0.5) * 0.005
                        }
                    });
                }
                
                // Add ambient light
                const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
                scene.add(ambientLight);
                
                // Add directional light
                const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
                directionalLight.position.set(1, 1, 1);
                scene.add(directionalLight);
                
                camera.position.z = 5;
                
                // Animation loop
                function animate() {
                    requestAnimationFrame(animate);
                    
                    // Rotate particle system
                    particleSystem.rotation.y += 0.0005;
                    particleSystem.rotation.x += 0.0002;
                    
                    // Animate shapes
                    shapes.forEach(shape => {
                        shape.mesh.rotation.x += shape.rotSpeed.x;
                        shape.mesh.rotation.y += shape.rotSpeed.y;
                        shape.mesh.rotation.z += shape.rotSpeed.z;
                        
                        shape.mesh.position.x += Math.sin(Date.now() * 0.001) * shape.floatSpeed.x;
                        shape.mesh.position.y += Math.cos(Date.now() * 0.001) * shape.floatSpeed.y;
                        shape.mesh.position.z += Math.sin(Date.now() * 0.001) * shape.floatSpeed.z;
                    });
                    
                    renderer.render(scene, camera);
                }
                
                animate();
                
                // Mouse movement effects
                document.addEventListener('mousemove', (e) => {
                    const x = (e.clientX / window.innerWidth) * 2 - 1;
                    const y = -(e.clientY / window.innerHeight) * 2 + 1;
                    
                    // Move camera slightly based on mouse position
                    gsap.to(camera.position, {
                        x: x * 0.8,
                        y: y * 0.8,
                        duration: 1
                    });
                    
                    // Rotate media frame based on mouse position
                    gsap.to(mediaFrame, {
                        rotationY: -15 + x * 5,
                        rotationX: 5 + y * 5,
                        duration: 1
                    });
                });
                
                // Handle window resize
                window.addEventListener('resize', () => {
                    camera.aspect = window.innerWidth / window.innerHeight;
                    camera.updateProjectionMatrix();
                    renderer.setSize(window.innerWidth, window.innerHeight);
                });
            }
            
            // Initialize everything
            function init() {
                createTimelineMarkers();
                updateContent(currentIndex);
                initThreeScene();
                
                // Start autoplay
                if (autoplay) {
                    startAutoplay();
                }
                
                // Setup event listeners
                prevBtn.addEventListener('click', navigateToPrevious);
                nextBtn.addEventListener('click', navigateToNext);
                playBtn.addEventListener('click', toggleAutoplay);
                
                // Initial animations
                gsap.from('.header', { opacity: 0, y: -20, duration: 1, delay: 0.5 });
                gsap.from('.timeline', { opacity: 0, y: -20, duration: 1, delay: 0.7 });
                gsap.from('.content-display', { opacity: 0, x: -50, duration: 1, delay: 0.9 });
                gsap.from('.media-display', { opacity: 0, scale: 0.9, duration: 1, delay: 1.1 });
                gsap.from('.nav-controls', { opacity: 0, y: 20, duration: 1, delay: 1.3 });
                gsap.from('.social-links', { opacity: 0, y: 20, duration: 1, delay: 1.5 });
                gsap.from('.central-model', { opacity: 0, y: 50, duration: 1.5, delay: 1.2 });
            }
            
            // Start the application
            init();
        });
    </script>
</body>
@endsection