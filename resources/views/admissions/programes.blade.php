@extends('layouts.app')

@section('title', 'courses')
@section('meta_description', 'Explore diverse')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanzania Police School Moshi - Academic Courses</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <style>
        :root {
            --primary: #1a3a6e;
            --secondary: #223b64;
            --accent: #c49b33;
            --light: #f5f5f5;
            --dark: #333;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--dark);
            overflow-x: hidden;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            text-align: center;
            padding: 2rem 0;
            position: relative;
            overflow: hidden;
        }
        
        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/api/placeholder/1200/300');
            background-size: cover;
            background-position: center;
            opacity: 0.15;
            z-index: 0;
        }
        
        .header-content {
            position: relative;
            z-index: 1;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .subtitle {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            font-weight: 300;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .intro {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .intro p {
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .course-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            cursor: pointer;
            min-height: 280px;
            display: flex;
            flex-direction: column;
            opacity: 0;
            transform: translateY(30px);
        }
        
        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .course-icon {
            font-size: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            transition: all 0.3s ease;
        }
        
        .course-card:hover .course-icon {
            transform: scale(1.1);
        }
        
        .course-icon i {
            filter: drop-shadow(2px 2px 3px rgba(0, 0, 0, 0.3));
        }
        
        .course-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .course-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--primary);
            font-weight: 600;
        }
        
        .course-desc {
            font-size: 0.95rem;
            line-height: 1.5;
            color: #666;
            margin-bottom: 1rem;
            flex-grow: 1;
        }
        
        .course-level {
            display: inline-block;
            padding: 0.3rem 0.7rem;
            background-color: #f0f0f0;
            border-radius: 20px;
            font-size: 0.8rem;
            color: var(--dark);
            margin-top: auto;
        }
        
        .degree {
            background-color: #e6f7ff;
            border-left: 4px solid #1890ff;
        }
        
        .masters {
            background-color: #f6ffed;
            border-left: 4px solid #52c41a;
        }
        
        .bachelor {
            background-color: #fff7e6;
            border-left: 4px solid #fa8c16;
        }
        
        .diploma {
            background-color: #fff2e8;
            border-left: 4px solid #fa541c;
        }
        
        .certificate {
            background-color: #f9f0ff;
            border-left: 4px solid #722ed1;
        }
        
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 100;
            overflow-y: auto;
        }
        
        .modal {
            background-color: white;
            width: 90%;
            max-width: 600px;
            border-radius: 10px;
            padding: 2rem;
            position: relative;
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.3s ease;
        }
        
        .modal-active {
            opacity: 1;
            transform: scale(1);
        }
        
        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--dark);
        }
        
        .modal-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .modal-content {
            margin-bottom: 1.5rem;
        }
        
        .modal-button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
            margin-top: 1rem;
        }
        
        .modal-button:hover {
            background-color: var(--secondary);
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            
            .courses-grid {
                grid-template-columns: 1fr;
            }
            
            .course-card {
                min-height: 220px;
            }
        }
        
        /* Animation classes */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, -10px); }
            100% { transform: translate(0, 0px); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .spin {
            animation: spin 5s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Tanzania Police School Moshi</h1>
            <p class="subtitle">Excellence in Security Education and Training</p>
            <div class="pulse" style="font-size: 2rem; margin-top: 1rem;">
                <i class="fas fa-shield-alt"></i>
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="intro">
            <h2>Academic Courses</h2>
            <p>The Tanzania Police School Moshi offers a comprehensive range of academic courses designed to equip law enforcement professionals with the knowledge and skills needed for modern policing and security challenges.</p>
        </div>
        
        <div class="courses-grid">
            <!-- Master of Information Technology -->
            <div class="course-card masters" data-course="mis">
                <div class="course-icon">
                    <i class="fas fa-server floating"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Master of Information Technology (MIS)</h3>
                    <p class="course-desc">Advanced study of information systems, database management, network security, and IT leadership for security contexts.</p>
                    <span class="course-level">Master's Degree</span>
                </div>
            </div>
            
            <!-- Master of Peace and Security Studies -->
            <div class="course-card masters" data-course="mapss">
                <div class="course-icon">
                    <i class="fas fa-dove floating"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Master of Arts in Peace and Security Studies (MA-PSS)</h3>
                    <p class="course-desc">Advanced study of conflict resolution, international relations, security challenges, and peace-building strategies.</p>
                    <span class="course-level">Master's Degree</span>
                </div>
            </div>
            
            <!-- Bachelor of Security and Strategic Studies -->
            <div class="course-card bachelor" data-course="bsss">
                <div class="course-icon">
                    <i class="fas fa-chess floating"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Bachelor of Science in Security and Strategic Studies (BSSS)</h3>
                    <p class="course-desc">Comprehensive study of security management, threat assessment, strategy, and defensive tactics.</p>
                    <span class="course-level">Bachelor's Degree</span>
                </div>
            </div>
            
            <!-- Bachelor of Cyber Security -->
            <div class="course-card bachelor" data-course="bcs">
                <div class="course-icon">
                    <i class="fas fa-shield-virus floating"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Bachelor of Science in Cyber Security</h3>
                    <p class="course-desc">Specialized training in network security, digital forensics, ethical hacking, and cyber threat intelligence.</p>
                    <span class="course-level">Bachelor's Degree</span>
                </div>
            </div>
            
            <!-- Bachelor of Records Management -->
            <div class="course-card bachelor" data-course="brim">
                <div class="course-icon">
                    <i class="fas fa-folder-open floating"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Bachelor Degree in Records and Information Management</h3>
                    <p class="course-desc">Study of document management, archiving systems, information governance, and data protection.</p>
                    <span class="course-level">Bachelor's Degree</span>
                </div>
            </div>
            
            <!-- Diploma in Information Technology -->
            <div class="course-card diploma" data-course="dit">
                <div class="course-icon">
                    <i class="fas fa-laptop-code floating"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Diploma in Information Technology</h3>
                    <p class="course-desc">Practical training in computer systems, networking, programming, and IT support for security operations.</p>
                    <span class="course-level">Diploma</span>
                </div>
            </div>
            
            <!-- Basic Technician Certificate in Police Science -->
            <div class="course-card certificate" data-course="btcps">
                <div class="course-icon">
                    <i class="fas fa-user-shield floating"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Basic Technician Certificate in Police Science</h3>
                    <p class="course-desc">Foundation training in policing principles, legal frameworks, community relations, and basic investigative techniques.</p>
                    <span class="course-level">Certificate</span>
                </div>
            </div>
            
            <!-- Basic Technician Certificate in Police Communication -->
            <div class="course-card certificate" data-course="btcpc">
                <div class="course-icon">
                    <i class="fas fa-broadcast-tower floating"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Basic Technician Certificate in Police Communication</h3>
                    <p class="course-desc">Specialized training in police radio operations, emergency communications, and dispatch protocols.</p>
                    <span class="course-level">Certificate</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Overlay -->
    <div class="overlay">
        <div class="modal">
            <button class="close-modal">×</button>
            <h3 class="modal-title">Course Details</h3>
            <div class="modal-content">
                <!-- Content will be dynamically loaded -->
            </div>
            <button class="modal-button">Apply Now</button>
        </div>
    </div>
    
    <script>
        // Course details data
        const courseDetails = {
            mis: {
                title: "Master of Information Technology (MIS)",
                duration: "2 years",
                level: "Postgraduate",
                description: "This master's program focuses on advanced information technology concepts and management within security contexts. Students develop expertise in database systems, network architecture, cybersecurity frameworks, and IT leadership to support law enforcement and security operations.",
                requirements: "Bachelor's degree in IT, Computer Science, or related field with a minimum GPA of 3.0.",
                career: "Graduates pursue careers as IT Managers, Security Systems Analysts, Database Administrators, and Network Security Specialists within police forces and security agencies."
            },
            mapss: {
                title: "Master of Arts in Peace and Security Studies (MA-PSS)",
                duration: "2 years",
                level: "Postgraduate",
                description: "This comprehensive program addresses contemporary peace and security challenges through advanced study of conflict resolution, peacekeeping operations, international security frameworks, and strategic crisis management.",
                requirements: "Bachelor's degree in International Relations, Security Studies, Political Science, or related field with a minimum GPA of 3.0.",
                career: "Graduates work as Security Analysts, Peace and Conflict Advisors, Policy Officers, and Intelligence Analysts in government agencies, international organizations, and NGOs."
            },
            bsss: {
                title: "Bachelor of Science in Security and Strategic Studies (BSSS)",
                duration: "4 years",
                level: "Undergraduate",
                description: "This program provides comprehensive understanding of security management, threat assessment, strategic planning, and tactical operations. Students learn to analyze complex security environments and develop strategic responses to emerging threats.",
                requirements: "High school diploma or equivalent with good grades in relevant subjects.",
                career: "Graduates pursue careers in security management, intelligence analysis, strategic planning, and law enforcement leadership."
            },
            bcs: {
                title: "Bachelor of Science in Cyber Security",
                duration: "4 years",
                level: "Undergraduate",
                description: "This specialized program focuses on protecting digital assets and information systems. Students learn about network security, ethical hacking, digital forensics, security policy development, and cyber threat intelligence.",
                requirements: "High school diploma or equivalent with good grades in Mathematics and Computer Studies.",
                career: "Graduates work as Cyber Security Analysts, Digital Forensic Specialists, Security Operations Center Analysts, and IT Security Consultants."
            },
            brim: {
                title: "Bachelor Degree in Records and Information Management",
                duration: "4 years",
                level: "Undergraduate",
                description: "This program focuses on the systematic management of vital records and information. Students learn about document management systems, archiving protocols, data protection, and information governance in security contexts.",
                requirements: "High school diploma or equivalent with good academic standing.",
                career: "Graduates pursue careers as Records Managers, Information Compliance Officers, Archive Specialists, and Data Protection Officers."
            },
            dit: {
                title: "Diploma in Information Technology",
                duration: "2 years",
                level: "Diploma",
                description: "This program provides practical skills in computer systems, networking, programming, and IT support. Students learn to implement and maintain information technology systems relevant to law enforcement and security operations.",
                requirements: "Certificate of Secondary Education or equivalent.",
                career: "Graduates work as IT Support Specialists, Network Technicians, System Administrators, and Database Operators in various security organizations."
            },
            btcps: {
                title: "Basic Technician Certificate in Police Science",
                duration: "1 year",
                level: "Certificate",
                description: "This foundational program covers essential principles of policing, criminal law, community relations, and basic investigative techniques. Students develop core competencies required for entry-level police work.",
                requirements: "Certificate of Secondary Education or equivalent.",
                career: "Graduates typically enter the police force at junior ranks or pursue further education in law enforcement fields."
            },
            btcpc: {
                title: "Basic Technician Certificate in Police Communication",
                duration: "1 year",
                level: "Certificate",
                description: "This specialized program trains students in police radio operations, emergency communications protocols, dispatch systems, and crisis communication. Students learn to manage critical communications in law enforcement contexts.",
                requirements: "Certificate of Secondary Education or equivalent.",
                career: "Graduates work as Police Radio Operators, Emergency Dispatchers, and Communications Technicians within the police force."
            }
        };
        
        // Animation for course cards
        document.addEventListener('DOMContentLoaded', () => {
            // Animate course cards on load
            gsap.to('.course-card', {
                opacity: 1,
                y: 0,
                stagger: 0.1,
                duration: 0.7,
                ease: 'power2.out'
            });
            
            // Course card click handlers
            const courseCards = document.querySelectorAll('.course-card');
            const overlay = document.querySelector('.overlay');
            const modal = document.querySelector('.modal');
            const closeModal = document.querySelector('.close-modal');
            const modalContent = document.querySelector('.modal-content');
            const modalTitle = document.querySelector('.modal-title');
            const modalButton = document.querySelector('.modal-button');
            
            courseCards.forEach(card => {
                card.addEventListener('click', () => {
                    const courseId = card.getAttribute('data-course');
                    const courseData = courseDetails[courseId];
                    
                    // Populate modal with course data
                    modalTitle.textContent = courseData.title;
                    modalContent.innerHTML = `
                        <p><strong>Duration:</strong> ${courseData.duration}</p>
                        <p><strong>Level:</strong> ${courseData.level}</p>
                        <p><strong>Description:</strong> ${courseData.description}</p>
                        <p><strong>Entry Requirements:</strong> ${courseData.requirements}</p>
                        <p><strong>Career Prospects:</strong> ${courseData.career}</p>
                    `;
                    
                    // Show overlay
                    overlay.style.display = 'flex';
                    setTimeout(() => {
                        modal.classList.add('modal-active');
                    }, 10);
                });
            });
            
            // Close modal
            closeModal.addEventListener('click', () => {
                modal.classList.remove('modal-active');
                setTimeout(() => {
                    overlay.style.display = 'none';
                }, 300);
            });
            
            // Close modal when clicking outside
            overlay.addEventListener('click', (e) => {
                if (e.target === overlay) {
                    modal.classList.remove('modal-active');
                    setTimeout(() => {
                        overlay.style.display = 'none';
                    }, 300);
                }
            });
            
            // Button animation on hover
            modalButton.addEventListener('mouseenter', () => {
                gsap.to(modalButton, {
                    scale: 1.05,
                    duration: 0.3
                });
            });
            
            modalButton.addEventListener('mouseleave', () => {
                gsap.to(modalButton, {
                    scale: 1,
                    duration: 0.3
                });
            });
            
            // Apply now button
            modalButton.addEventListener('click', () => {
                alert('Thank you for your interest! The application system would open here in a real implementation.');
            });
        });
    </script>
</body>
</html>

@endsection