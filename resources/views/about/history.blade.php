@extends('layouts.app')

@section('title', 'Year of Change')

@section('content')
<!-- Custom Cursor -->
<div class="cursor" id="custom-cursor"></div>

<!-- Main Content Area - Only content section -->
<div class="content-wrapper">
    <header id="hero-section">
        <canvas id="heroCanvas"></canvas>
        <div class="hero-content">
            
        </div>
    </header>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<style>
    /* Global Styles */
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: Arial, sans-serif;
        background-color: #000;
    }

    /* Custom Cursor */
    body {
        cursor: none;
    }
    
    .cursor {
        position: fixed;
        width: 20px;
        height: 20px;
        background-color: #0077ff;
        border-radius: 50%;
        pointer-events: none;
        transform: translate(-50%, -50%);
        transition: transform 0.1s ease;
        z-index: 1000;
    }

    /* Content Wrapper - Full viewport height */
    .content-wrapper {
        width: 100%;
        height: 100vh;
        overflow: hidden;
        position: relative;
    }

    /* Hero Section */
    #heroCanvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    
    
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
    }
    
    .delay {
        transition-delay: 0.3s;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // GSAP Animation for hero content
        gsap.to(".fade-in", { 
            opacity: 1, 
            y: 0, 
            duration: 1.5, 
            stagger: 0.3,
            ease: "power2.out" 
        });

        // Three.js Background Animation
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ 
            canvas: document.getElementById("heroCanvas"), 
            alpha: true,
            antialias: true 
        });
        
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        
        // Create particle system
        const particleGeometry = new THREE.BufferGeometry();
        const particleCount = 1000;
        const posArray = new Float32Array(particleCount * 3);
        
        for (let i = 0; i < particleCount * 3; i++) {
            posArray[i] = (Math.random() - 0.5) * 15;
        }
        
        particleGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
        
        const particleMaterial = new THREE.PointsMaterial({
            color: 0x0077ff,
            size: 0.05,
            transparent: true,
            blending: THREE.AdditiveBlending,
            sizeAttenuation: true
        });
        
        const particleSystem = new THREE.Points(particleGeometry, particleMaterial);
        scene.add(particleSystem);
        
        camera.position.z = 5;
        
        // Add ambient light
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
        scene.add(ambientLight);
        
        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            
            particleSystem.rotation.y += 0.0005;
            particleSystem.rotation.x += 0.0003;
            
            // Wave effect
            const positions = particleSystem.geometry.attributes.position.array;
            const time = Date.now() * 0.0001;
            
            for (let i = 0; i < particleCount; i++) {
                const i3 = i * 3;
                positions[i3 + 1] += Math.sin(time + positions[i3] * 0.1) * 0.003;
            }
            
            particleSystem.geometry.attributes.position.needsUpdate = true;
            
            renderer.render(scene, camera);
        }
        
        animate();
        
        // Resize handler
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
        
        // Custom cursor
        const cursor = document.getElementById('custom-cursor');
        
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            
            // Subtle camera movement based on mouse position
            let x = (e.clientX / window.innerWidth) * 2 - 1;
            let y = -(e.clientY / window.innerHeight) * 2 + 1;
            
            gsap.to(camera.position, {
                x: x * 0.5,
                y: y * 0.5,
                duration: 1
            });
        });
        
        // Update cursor for interactive elements (keeping this for any elements added by layouts.app)
        const interactiveElements = document.querySelectorAll('a, button');
        
        interactiveElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursor.style.width = '40px';
                cursor.style.height = '40px';
                cursor.style.backgroundColor = 'rgba(0, 119, 255, 0.5)';
            });
            
            el.addEventListener('mouseleave', () => {
                cursor.style.width = '20px';
                cursor.style.height = '20px';
                cursor.style.backgroundColor = '#0077ff';
            });
        });
    });
</script>
@endsection