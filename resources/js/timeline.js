import './bootstrap';
import './timeline';
// resources/js/timeline.js
import * as THREE from 'three';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

class PoliceHistoryTimeline {
    constructor() {
        // Initialize Three.js scene
        this.scene = new THREE.Scene();
        this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        this.renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        
        // Timeline data points
        this.timelineEvents = [
            { year: 1921, title: "Establishment", description: "Founding of the Tanzania Police School", model: 'building' },
            { year: 1945, title: "Post-War Reforms", description: "Restructuring after World War II", model: 'document' },
            { year: 1961, title: "Independence Era", description: "Transition during Tanzania's independence", model: 'flag' },
            { year: 1975, title: "Modern Training", description: "Introduction of new training methodologies", model: 'badge' },
            { year: 1990, title: "Technology Integration", description: "Adoption of computer-based training", model: 'computer' },
            { year: 2010, title: "International Collaboration", description: "Partnership with global police organizations", model: 'globe' },
            { year: 2023, title: "Present Day", description: "Current state and future vision", model: 'shield' }
        ];
        
        this.init();
    }
    
    init() {
        // Setup renderer
        this.renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('timeline-canvas').appendChild(this.renderer.domElement);
        
        // Position camera
        this.camera.position.z = 5;
        
        // Add lighting
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
        this.scene.add(ambientLight);
        
        const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
        directionalLight.position.set(0, 1, 1);
        this.scene.add(directionalLight);
        
        // Create timeline elements
        this.createTimelineElements();
        
        // Setup animations
        this.setupScrollAnimations();
        
        // Handle window resize
        window.addEventListener('resize', () => this.onWindowResize());
        
        // Start animation loop
        this.animate();
    }
    
    createTimelineElements() {
        this.timelineElements = [];
        
        this.timelineEvents.forEach((event, index) => {
            // Create placeholder geometry for now (would be replaced with actual models)
            let geometry;
            switch(event.model) {
                case 'building':
                    geometry = new THREE.BoxGeometry(1, 1, 1);
                    break;
                case 'document':
                    geometry = new THREE.PlaneGeometry(1, 1.4);
                    break;
                case 'flag':
                    geometry = new THREE.ConeGeometry(0.5, 1, 32);
                    break;
                case 'badge':
                    geometry = new THREE.CircleGeometry(0.5, 32);
                    break;
                case 'computer':
                    geometry = new THREE.BoxGeometry(1, 0.7, 0.1);
                    break;
                case 'globe':
                    geometry = new THREE.SphereGeometry(0.5, 32, 32);
                    break;
                case 'shield':
                    geometry = new THREE.CylinderGeometry(0.5, 0.5, 1, 32);
                    break;
                default:
                    geometry = new THREE.SphereGeometry(0.5, 32, 32);
            }
            
            const material = new THREE.MeshStandardMaterial({ 
                color: 0x1a3668, // Police blue color
                metalness: 0.3,
                roughness: 0.4
            });
            
            const mesh = new THREE.Mesh(geometry, material);
            
            // Position along timeline
            mesh.position.x = (index - (this.timelineEvents.length - 1) / 2) * 3;
            mesh.position.y = 0;
            mesh.position.z = 0;
            
            // Initially scale down and make transparent
            mesh.scale.set(0.1, 0.1, 0.1);
            mesh.material.transparent = true;
            mesh.material.opacity = 0;
            
            this.scene.add(mesh);
            this.timelineElements.push({
                mesh,
                data: event
            });
        });
    }
    
    setupScrollAnimations() {
        // Create a timeline section for each event
        this.timelineElements.forEach((element, index) => {
            const sectionId = `#timeline-section-${index}`;
            
            // Create scroll animation for each element
            gsap.timeline({
                scrollTrigger: {
                    trigger: sectionId,
                    start: "top center",
                    end: "bottom center",
                    scrub: 1,
                    markers: false,
                    onEnter: () => {
                        // Update text content
                        document.getElementById('year-display').textContent = element.data.year;
                        document.getElementById('event-title').textContent = element.data.title;
                        document.getElementById('event-description').textContent = element.data.description;
                        
                        // Animate 3D model
                        gsap.to(element.mesh.scale, { x: 1, y: 1, z: 1, duration: 1, ease: "back.out" });
                        gsap.to(element.mesh.material, { opacity: 1, duration: 1 });
                        gsap.to(element.mesh.rotation, { y: Math.PI * 2, duration: 2, ease: "power1.inOut" });
                    },
                    onLeaveBack: () => {
                        // Scale down when scrolling back up
                        gsap.to(element.mesh.scale, { x: 0.1, y: 0.1, z: 0.1, duration: 1 });
                        gsap.to(element.mesh.material, { opacity: 0.3, duration: 1 });
                    }
                }
            });
            
            // Parallax effect for background elements
            gsap.to(`${sectionId} .parallax-bg`, {
                scrollTrigger: {
                    trigger: sectionId,
                    scrub: true
                },
                y: (i, target) => -ScrollTrigger.maxScroll(window) * target.dataset.speed,
                ease: "none"
            });
        });
    }
    
    onWindowResize() {
        this.camera.aspect = window.innerWidth / window.innerHeight;
        this.camera.updateProjectionMatrix();
        this.renderer.setSize(window.innerWidth, window.innerHeight);
    }
    
    animate() {
        requestAnimationFrame(() => this.animate());
        
        // Rotate elements gently
        this.timelineElements.forEach(element => {
            element.mesh.rotation.y += 0.005;
        });
        
        this.renderer.render(this.scene, this.camera);
    }
}

// Initialize timeline on document ready
document.addEventListener('DOMContentLoaded', () => {
    new PoliceHistoryTimeline();
});