@extends('layouts.app')

@section('title', 'Tanzania Police School Moshi - Undergraduate Courses')

@section('content')
<style>
    :root {
        --primary: #00205b;     /* Dark navy blue for Tanzania Police */
        --secondary: #001540;   /* Darker navy blue */
        --accent: #f7d117;      /* Gold/yellow accent color */
        --light: #f5f5f5;
        --dark: #00102a;
    }
    
    .hero {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        padding: 3rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        margin-top: 70px; /* Add margin-top to create space for the navbar */
    }
    
.hero::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url('/api/placeholder/1200/600');
  background-size: cover;
  background-position: center;
  opacity: 0.2;
  z-index: -1; /* Negative z-index to place it behind the content */
}
    .hero-content {
        position: relative;
        z-index: 1;
    }
    
    .hero h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .hero p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto 2rem;
        line-height: 1.6;
    }
    
    .courses-container {
        max-width: 1200px;
        margin: 3rem auto;
        padding: 0 2rem;
    }
    
    .section-title {
        text-align: center;
        font-size: 2rem;
        color: var(--primary);
        margin-bottom: 3rem;
        position: relative;
    }
    
    .section-title::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background-color: var(--accent);
        margin: 1rem auto 0;
    }
    
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    
    .course-card {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
        position: relative;
    }
    
    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }
    
    .course-header {
        background: linear-gradient(to right, var(--primary), var(--secondary));
        color: white;
        padding: 1.5rem;
        position: relative;
        padding-top: 2rem; /* Increased padding to accommodate the icon */
    }
    
    .course-header h3 {
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
    }
    
    .course-icon {
        position: absolute;
        top: -5px; /* Moved up to avoid obscuring the frame margin */
        right: 20px;
        width: 50px;
        height: 50px;
        background-color: var(--accent);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        color: var(--dark);
        font-size: 1.5rem;
        z-index: 2; /* Ensure it appears above other elements */
    }
    
    .course-content {
        padding: 1.5rem;
    }
    
    .course-content p {
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }
    
    .course-features {
        list-style: none;
        margin-bottom: 1.5rem;
    }
    
    .course-features li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #eee;
        display: flex;
        align-items: center;
    }
    
    .course-features li::before {
        content: '✓';
        color: var(--primary);
        margin-right: 10px;
        font-weight: bold;
    }
    
    .view-details-btn {
        display: block;
        width: 100%;
        padding: 0.75rem;
        background-color: #f0f0f0;
        color: var(--primary);
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        margin-bottom: 1rem;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .view-details-btn:hover {
        background-color: #e0e0e0;
    }
    
    .apply-btn {
        display: block;
        width: 100%;
        padding: 1rem;
        background-color: var(--primary);
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: background-color 0.3s;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    
    .apply-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.7s;
    }
    
    .apply-btn:hover {
        background-color: var(--secondary);
    }
    
    .apply-btn:hover::before {
        left: 100%;
    }
    
    .course-details {
        height: 0;
        overflow: hidden;
        transition: height 0.5s;
    }
    
    .course-details h4 {
        margin-top: 1rem;
        margin-bottom: 0.5rem;
        color: var(--primary);
    }
    
    .course-details ul {
        list-style: disc;
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .course-details ul li {
        margin-bottom: 0.3rem;
    }
    
    .application-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s, visibility 0.3s;
    }
    
    .application-modal.active {
        opacity: 1;
        visibility: visible;
    }
    
    .modal-content {
        background-color: white;
        border-radius: 10px;
        max-width: 600px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        padding: 2rem;
        position: relative;
        transform: scale(0.7);
        transition: transform 0.5s;
    }
    
    .application-modal.active .modal-content {
        transform: scale(1);
    }
    
    .close-modal {
        position: absolute;
        top: 15px;
        right: 15px;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #888;
        transition: color 0.3s;
    }
    
    .close-modal:hover {
        color: var(--primary);
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: var(--dark);
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    
    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(0, 32, 91, 0.2);
    }
    
    .submit-application {
        background-color: var(--primary);
        color: white;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .submit-application:hover {
        background-color: var(--secondary);
    }
    
    /* Animation classes */
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 1s, transform 1s;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2rem;
        }
        
        .courses-grid {
            grid-template-columns: 1fr;
        }
        
        .course-icon {
            top: -20px;
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }
        
        .hero {
            margin-top: 60px; /* Slightly less margin for mobile */
        }
    }
</style>

<section class="hero">
    <div class="hero-content">
        <h1>Tanzania Police School Moshi</h1>
        <p>Offering premier education in security, law enforcement, and defense studies to prepare the next generation of Tanzania's security professionals.</p>
    </div>
</section>
<div class="courses-container">
    <h2 class="section-title fade-in">Our Undergraduate Programs</h2>
    
    <div class="courses-grid">
        <!-- BSc in Security and Strategic Studies -->
        <div class="course-card fade-in" style="animation-delay: 0.2s;">
            <div class="course-header">
                <div class="course-icon">🔒</div>
                <h3>Bachelor of Science in Security and Strategic Studies</h3>
                <span>Duration: 3 Years</span>
            </div>
            <div class="course-content">
                <p>A comprehensive program designed to develop specialists in national security, strategic analysis, and defense planning.</p>
                
                <ul class="course-features">
                    <li>Strategic Security Management</li>
                    <li>National Defense Policy</li>
                    <li>Intelligence Analysis</li>
                    <li>Counter-terrorism Studies</li>
                    <li>International Security Relations</li>
                </ul>
                
                <button class="view-details-btn" data-course="bsss">View More Details</button>
                
                <div class="course-details" id="bsss-details">
                    <h4>Program Overview</h4>
                    <p>The BSc in Security and Strategic Studies prepares students for careers in national security, defense, intelligence agencies, and strategic planning roles. The program combines theoretical knowledge with practical applications to develop critical thinking and analytical skills.</p>
                    
                    <h4>Career Opportunities</h4>
                    <p>Graduates are equipped for roles in:</p>
                    <ul>
                        <li>Security Policy Analysis</li>
                        <li>Intelligence Services</li>
                        <li>Strategic Planning</li>
                        <li>Defense Management</li>
                        <li>National Security Agencies</li>
                    </ul>
                    
                    <h4>Entry Requirements</h4>
                    <p>Advanced Certificate of Secondary Education with at least two principal passes in relevant subjects. Direct entry qualifications may also be considered.</p>
                </div>
                
                <button class="apply-btn" data-course="Bachelor of Science in Security and Strategic Studies">Apply Now</button>
            </div>
        </div>
        
        <!-- BSc in Cyber Security -->
        <div class="course-card fade-in" style="animation-delay: 0.4s;">
            <div class="course-header">
                <div class="course-icon">💻</div>
                <h3>Bachelor of Science in Cyber Security</h3>
                <span>Duration: 3 Years</span>
            </div>
            <div class="course-content">
                <p>Develop expertise in protecting digital infrastructure, investigating cyber crimes, and implementing robust security systems.</p>
                
                <ul class="course-features">
                    <li>Network Security</li>
                    <li>Digital Forensics</li>
                    <li>Ethical Hacking</li>
                    <li>Cryptography</li>
                    <li>Cyber Law and Policy</li>
                </ul>
                
                <button class="view-details-btn" data-course="bcs">View More Details</button>
                
                <div class="course-details" id="bcs-details">
                    <h4>Program Overview</h4>
                    <p>The BSc in Cyber Security program combines technical skills with strategic understanding of cyber threats. Students learn to protect systems, investigate breaches, and develop security solutions for organizations and national infrastructure.</p>
                    
                    <h4>Career Opportunities</h4>
                    <p>Graduates are prepared for careers in:</p>
                    <ul>
                        <li>Cyber Security Analysis</li>
                        <li>Digital Forensic Investigation</li>
                        <li>Security Operations Management</li>
                        <li>Penetration Testing</li>
                        <li>Cyber Threat Intelligence</li>
                    </ul>
                    
                    <h4>Entry Requirements</h4>
                    <p>Advanced Certificate of Secondary Education with at least two principal passes in Mathematics/Physics/Computer Science. Diploma holders in relevant fields may apply for direct entry.</p>
                </div>
                
                <button class="apply-btn" data-course="Bachelor of Science in Cyber Security">Apply Now</button>
            </div>
        </div>
    </div>
</div>

<!-- Application Modal -->
<div class="application-modal" id="application-modal">
    <div class="modal-content">
        <button class="close-modal">&times;</button>
        <h2 id="modal-title">Online Application</h2
            <p id="modal-subtitle">Complete the form below to apply for your selected program.</p>
            
            <form id="application-form" action="#" method="POST">
                <input type="hidden" id="selected-course" name="selected-course">
                
                <div class="form-group">
                    <label for="full-name">Full Name</label>
                    <input type="text" id="full-name" name="full-name" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="id-number">National ID Number</label>
                    <input type="text" id="id-number" name="id-number" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="education">Highest Level of Education</label>
                    <select id="education" name="education" class="form-control" required>
                        <option value="">Select Education Level</option>
                        <option value="ACSE">Advanced Certificate of Secondary Education</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Bachelors">Bachelor's Degree</option>
                        <option value="Masters">Master's Degree</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="message">Statement of Purpose (Why do you want to join this program?)</label>
                    <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                </div>
                
                <button type="submit" class="submit-application">Submit Application</button>
            </form>
        </div>
    </div>
    
    <script>
        // Animations on scroll
        document.addEventListener('DOMContentLoaded', function() {
            // Animate elements when they come into view
            const fadeElements = document.querySelectorAll('.fade-in');
            
            function checkFade() {
                fadeElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }
                });
            }
            
            // Initial check
            checkFade();
            
            // Check on scroll
            window.addEventListener('scroll', checkFade);
            
            // Course details toggle
            const viewDetailsButtons = document.querySelectorAll('.view-details-btn');
            viewDetailsButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const courseId = this.getAttribute('data-course');
                    const detailsElement = document.getElementById(`${courseId}-details`);
                    
                    if (detailsElement.style.height === '0px' || !detailsElement.style.height) {
                        detailsElement.style.height = detailsElement.scrollHeight + 'px';
                        this.textContent = 'Hide Details';
                    } else {
                        detailsElement.style.height = '0';
                        this.textContent = 'View More Details';
                    }
                });
            });
            
            // Application modal functionality
            const applyButtons = document.querySelectorAll('.apply-btn');
            const modal = document.getElementById('application-modal');
            const closeModal = document.querySelector('.close-modal');
            const modalTitle = document.getElementById('modal-title');
            const modalSubtitle = document.getElementById('modal-subtitle');
            const selectedCourseInput = document.getElementById('selected-course');
            
            applyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const courseName = this.getAttribute('data-course');
                    modalTitle.textContent = 'Apply for ' + courseName;
                    modalSubtitle.textContent = 'Complete the form below to begin your application process for ' + courseName;
                    selectedCourseInput.value = courseName;
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            });
            
            closeModal.addEventListener('click', function() {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });
            
            // Close modal if clicking outside content
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
            
            // Form submission (redirects to blank page as requested)
            const applicationForm = document.getElementById('application-form');
            applicationForm.addEventListener('submit', function(e) {
                e.preventDefault();
                window.open('about:blank', '_blank');
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
                applicationForm.reset();
                alert('Your application has been submitted successfully!');
            });
        });
    </script>
