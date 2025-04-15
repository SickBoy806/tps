@extends('layouts.app')

@section('title', 'TPS - Interactive History')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tanzania Police Force - Departments</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <style>
    :root {
      --tpf-primary: #1A4D2E; /* Dark green */
      --tpf-secondary: #FED700; /* Yellow/Gold */
      --tpf-accent: #0F5091; /* Blue */
      --tpf-light: #F5F5F5;
      --tpf-dark: #222222;
    }
    
    .tpf-container * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .tpf-container {
      background-color: var(--tpf-light);
      color: var(--tpf-dark);
      padding: 2rem;
    }
    
    .tpf-heading {
      color: var(--tpf-primary);
      text-align: center;
      margin-bottom: 2rem;
    }
    
    .tpf-filter-container {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }
    
    .tpf-filter-btn {
      background-color: var(--tpf-light);
      color: var(--tpf-primary);
      border: 2px solid var(--tpf-primary);
      padding: 0.5rem 1rem;
      border-radius: 30px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .tpf-filter-btn:hover, .tpf-filter-btn.tpf-active {
      background-color: var(--tpf-primary);
      color: white;
    }
    
    .tpf-departments-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1.5rem;
    }
    
    .tpf-department-card {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      opacity: 0;
      transform: translateY(30px);
    }
    
    .tpf-department-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .tpf-department-header {
      background: linear-gradient(135deg, var(--tpf-primary) 0%, var(--tpf-accent) 100%);
      color: white;
      padding: 1.5rem;
      position: relative;
    }
    
    .tpf-department-icon {
      position: absolute;
      top: 1rem;
      right: 1rem;
      background-color: var(--tpf-secondary);
      width: 40px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      color: var(--tpf-primary);
    }
    
    .tpf-department-content {
      padding: 1.5rem;
    }
    
    .tpf-learn-more {
      display: inline-block;
      background-color: var(--tpf-secondary);
      color: var(--tpf-primary);
      padding: 0.5rem 1rem;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      margin-top: 1rem;
      transition: all 0.3s ease;
    }
    
    .tpf-learn-more:hover {
      background-color: var(--tpf-primary);
      color: white;
    }
    
    .tpf-hidden {
      display: none;
    }
    
    /* Modal Styles */
    .tpf-modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }
    
    .tpf-modal-content {
      background: white;
      width: 90%;
      max-width: 600px;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 30px rgba(0, 0, 0, 0.3);
      transform: scale(0.8);
      opacity: 0;
      transition: all 0.3s ease;
    }
    
    .tpf-modal-header {
      background: linear-gradient(135deg, var(--tpf-primary) 0%, var(--tpf-accent) 100%);
      color: white;
      padding: 1.5rem;
      position: relative;
    }
    
    .tpf-close-modal {
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: var(--tpf-secondary);
      width: 30px;
      height: 30px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      color: var(--tpf-primary);
      font-weight: bold;
      transition: all 0.3s ease;
    }
    
    .tpf-close-modal:hover {
      transform: rotate(90deg);
    }
    
    .tpf-modal-body {
      padding: 2rem;
    }

    /* Admin controls (optional) */
    .tpf-admin-controls {
      background: var(--tpf-light);
      padding: 1rem;
      margin-top: 2rem;
      border-radius: 10px;
      border: 1px solid #ddd;
    }
    
    .tpf-admin-controls h3 {
      margin-bottom: 1rem;
      color: var(--tpf-primary);
    }
    
    .tpf-control-group {
      margin-bottom: 1rem;
    }
    
    .tpf-control-group button {
      background-color: var(--tpf-primary);
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 0.5rem;
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
      .tpf-departments-grid {
        grid-template-columns: 1fr;
      }
      
      .tpf-container {
        padding: 1rem;
      }
    }

    /* Animation for cards */
    @keyframes tpf-pulse {
      0% {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      }
      50% {
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
      }
      100% {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      }
    }

    .tpf-pulse {
      animation: tpf-pulse 2s infinite;
    }
  </style>
</head>
<body>
  <div class="tpf-container">
    <h1 class="tpf-heading">Tanzania Police Force Departments</h1>
    
    <div class="tpf-filter-container">
      <button class="tpf-filter-btn tpf-active" data-filter="all">All Departments</button>
      <button class="tpf-filter-btn" data-filter="admin">Administrative</button>
      <button class="tpf-filter-btn" data-filter="training">Training & Education</button>
      <button class="tpf-filter-btn" data-filter="operations">Operations</button>
      <button class="tpf-filter-btn" data-filter="support">Support Services</button>
    </div>
    
    <div class="tpf-departments-grid">
      <!-- Procurement Department -->
      <div class="tpf-department-card" data-category="admin">
        <div class="tpf-department-header">
          <h3>Procurement Department</h3>
          <div class="tpf-department-icon">
            <i>📋</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Responsible for the acquisition of goods and services, ensuring transparency and compliance with regulations.</p>
          <a href="#" class="tpf-learn-more" data-department="procurement">Learn More</a>
        </div>
      </div>
      
      <!-- Administration And Human Resources -->
      <div class="tpf-department-card" data-category="admin">
        <div class="tpf-department-header">
          <h3>Administration And Human Resources</h3>
          <div class="tpf-department-icon">
            <i>👥</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Manages personnel affairs, recruitment, staff development, and overall administrative functions.</p>
          <a href="#" class="tpf-learn-more" data-department="hr">Learn More</a>
        </div>
      </div>
      
      <!-- Military and Defence Training -->
      <div class="tpf-department-card" data-category="training">
        <div class="tpf-department-header">
          <h3>Military and Defence Training</h3>
          <div class="tpf-department-icon">
            <i>🛡️</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Provides specialized military and defense training to enhance tactical capabilities and readiness.</p>
          <a href="#" class="tpf-learn-more" data-department="military">Learn More</a>
        </div>
      </div>
      
      <!-- Information and Technology -->
      <div class="tpf-department-card" data-category="training support">
        <div class="tpf-department-header">
          <h3>Information and Technology (IT)</h3>
          <div class="tpf-department-icon">
            <i>💻</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Maintains and develops technological infrastructure, digital systems, and cybersecurity measures.</p>
          <a href="#" class="tpf-learn-more" data-department="it">Learn More</a>
        </div>
      </div>
      
      <!-- Police Science -->
      <div class="tpf-department-card" data-category="training">
        <div class="tpf-department-header">
          <h3>Police Science</h3>
          <div class="tpf-department-icon">
            <i>🔍</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Focuses on the scientific aspects of police work including forensics, investigation techniques, and crime analysis.</p>
          <a href="#" class="tpf-learn-more" data-department="science">Learn More</a>
        </div>
      </div>
      
      <!-- Laws and Regal Studies -->
      <div class="tpf-department-card" data-category="training">
        <div class="tpf-department-header">
          <h3>Laws and Regal Studies</h3>
          <div class="tpf-department-icon">
            <i>⚖️</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Provides education and expertise in legal matters, constitutional law, and criminal justice procedures.</p>
          <a href="#" class="tpf-learn-more" data-department="legal">Learn More</a>
        </div>
      </div>
      
      <!-- Academic Department -->
      <div class="tpf-department-card" data-category="training">
        <div class="tpf-department-header">
          <h3>Academic Department</h3>
          <div class="tpf-department-icon">
            <i>🎓</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Oversees educational programs, curriculum development, and academic standards for police training.</p>
          <a href="#" class="tpf-learn-more" data-department="academic">Learn More</a>
        </div>
      </div>
      
      <!-- Cross cutting issue -->
      <div class="tpf-department-card" data-category="support">
        <div class="tpf-department-header">
          <h3>Cross Cutting Issue</h3>
          <div class="tpf-department-icon">
            <i>🔄</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Addresses intersectional matters such as gender integration, disability inclusion, and diversity management.</p>
          <a href="#" class="tpf-learn-more" data-department="crosscutting">Learn More</a>
        </div>
      </div>
      
      <!-- Criminal Investigation Department -->
      <div class="tpf-department-card" data-category="operations">
        <div class="tpf-department-header">
          <h3>Criminal Investigation Department (CID)</h3>
          <div class="tpf-department-icon">
            <i>🕵️</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Responsible for investigating crimes, collecting evidence, and bringing perpetrators to justice.</p>
          <a href="#" class="tpf-learn-more" data-department="cid">Learn More</a>
        </div>
      </div>
      
      <!-- Traffic Police -->
      <div class="tpf-department-card" data-category="operations">
        <div class="tpf-department-header">
          <h3>Traffic Police</h3>
          <div class="tpf-department-icon">
            <i>🚦</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Enforces traffic laws, manages road safety, and investigates traffic accidents.</p>
          <a href="#" class="tpf-learn-more" data-department="traffic">Learn More</a>
        </div>
      </div>
      
      <!-- Community Policing -->
      <div class="tpf-department-card" data-category="operations">
        <div class="tpf-department-header">
          <h3>Community Policing</h3>
          <div class="tpf-department-icon">
            <i>🏘️</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Builds partnerships with communities to address local security concerns and prevent crime.</p>
          <a href="#" class="tpf-learn-more" data-department="community">Learn More</a>
        </div>
      </div>
      
      <!-- Anti-Narcotics Unit -->
      <div class="tpf-department-card" data-category="operations">
        <div class="tpf-department-header">
          <h3>Anti-Narcotics Unit</h3>
          <div class="tpf-department-icon">
            <i>🚫</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Combats illegal drug trafficking and substance abuse through enforcement and public education.</p>
          <a href="#" class="tpf-learn-more" data-department="narcotics">Learn More</a>
        </div>
      </div>
      
      <!-- Logistics Department -->
      <div class="tpf-department-card" data-category="support">
        <div class="tpf-department-header">
          <h3>Logistics Department</h3>
          <div class="tpf-department-icon">
            <i>🚚</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Manages supply chains, equipment distribution, and maintenance of resources across the force.</p>
          <a href="#" class="tpf-learn-more" data-department="logistics">Learn More</a>
        </div>
      </div>
      
      <!-- Finance Department -->
      <div class="tpf-department-card" data-category="admin">
        <div class="tpf-department-header">
          <h3>Finance Department</h3>
          <div class="tpf-department-icon">
            <i>💰</i>
          </div>
        </div>
        <div class="tpf-department-content">
          <p>Handles budgeting, payroll, financial planning, and accounting for the police force.</p>
          <a href="#" class="tpf-learn-more" data-department="finance">Learn More</a>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="tpf-modal" id="tpfDepartmentModal">
      <div class="tpf-modal-content">
        <div class="tpf-modal-header">
          <h2 id="tpfModalTitle">Department Details</h2>
          <div class="tpf-close-modal">×</div>
        </div>
        <div class="tpf-modal-body" id="tpfModalBody">
          <!-- Content will be loaded dynamically -->
        </div>
      </div>
    </div>
  </div>

  <script>
    // Department data
    const departmentDetails = {
      procurement: {
        title: "Procurement Department",
        description: "The Procurement Department is responsible for the acquisition of goods and services needed by the Tanzania Police Force. This department ensures transparency, fairness, and compliance with government regulations in all procurement processes.",
        responsibilities: [
          "Managing tender processes for police equipment and services",
          "Maintaining relationships with suppliers and contractors",
          "Ensuring value for money in all acquisitions",
          "Keeping inventory of procured items",
          "Developing procurement policies and procedures"
        ],
        leadership: "Currently headed by ACP Francis Mwema"
      },
      hr: {
        title: "Administration And Human Resources",
        description: "The Administration and Human Resources department oversees personnel management, recruitment, training, and overall administrative functions of the Tanzania Police Force.",
        responsibilities: [
          "Staff recruitment and selection processes",
          "Performance management and career development",
          "Payroll administration and benefits management",
          "Management of disciplinary procedures",
          "Handling transfers and promotions",
          "Employee welfare and relations"
        ],
        leadership: "Currently headed by DCP Elizabeth Mushi"
      },
      military: {
        title: "Military and Defence Training",
        description: "This specialized department focuses on providing tactical and strategic training to enhance the defensive capabilities of police officers, especially those dealing with high-risk situations.",
        responsibilities: [
          "Physical fitness and combat training",
          "Weapons handling and tactical operations",
          "Counter-terrorism techniques",
          "Special operations procedures",
          "Field survival skills"
        ],
        leadership: "Currently headed by SSP James Kilonzo"
      },
      it: {
        title: "Information and Technology (IT)",
        description: "The IT Department develops and maintains technological infrastructure and systems to support modern policing activities and administrative functions.",
        responsibilities: [
          "Maintaining police networks and computer systems",
          "Developing security protocols for digital information",
          "Supporting criminal database management",
          "Implementing new technologies for policing",
          "Training staff on IT systems and cybersecurity"
        ],
        leadership: "Currently headed by SP Maria Komba"
      },
      science: {
        title: "Police Science",
        description: "The Police Science department applies scientific methods and techniques to support criminal investigations and evidence collection.",
        responsibilities: [
          "Forensic analysis and crime scene investigation",
          "Laboratory testing of evidence",
          "Development of investigation methodologies",
          "Research on criminal behavior patterns",
          "Training officers in scientific investigation techniques"
        ],
        leadership: "Currently headed by ACP Dr. Samuel Ndosi"
      },
      legal: {
        title: "Laws and Regal Studies",
        description: "This department provides expertise in legal matters related to law enforcement, ensuring police operations comply with legislation and constitutional rights.",
        responsibilities: [
          "Legal education for police officers",
          "Interpretation of laws and regulations",
          "Advisory services on legal procedures",
          "Human rights compliance monitoring",
          "Review of case files before prosecution"
        ],
        leadership: "Currently headed by DCP Advocate Sarah Mwakyusa"
      },
      academic: {
        title: "Academic Department",
        description: "The Academic Department oversees formal educational programs for police officers, developing curriculum and maintaining academic standards in police training institutions.",
        responsibilities: [
          "Curriculum development for police training",
          "Academic research in policing methods",
          "Coordination with educational institutions",
          "Management of examinations and assessments",
          "Professional development courses"
        ],
        leadership: "Currently headed by ACP Prof. Emmanuel Luoga"
      },
      crosscutting: {
        title: "Cross Cutting Issue",
        description: "This department addresses intersectional matters that affect multiple areas of policing, focusing on inclusion, equality, and diverse perspectives.",
        responsibilities: [
          "Gender mainstreaming within the force",
          "Disability inclusion policies",
          "Environmental sustainability practices",
          "HIV/AIDS awareness and support",
          "Cultural diversity and sensitivity training"
        ],
        leadership: "Currently headed by SP Grace Mwakipesile"
      },
      cid: {
        title: "Criminal Investigation Department (CID)",
        description: "The CID is responsible for investigating serious crimes, gathering evidence, and building cases against suspects for prosecution.",
        responsibilities: [
          "Investigation of serious crimes",
          "Evidence collection and preservation",
          "Suspect interviewing and interrogation",
          "Case file preparation",
          "Coordination with prosecutors",
          "Intelligence gathering on criminal activities"
        ],
        leadership: "Currently headed by CP Rashid Mangi"
      },
      traffic: {
        title: "Traffic Police",
        description: "The Traffic Police department enforces road traffic laws and regulations, ensuring safety on Tanzania's roads and managing traffic flow.",
        responsibilities: [
          "Traffic law enforcement",
          "Accident investigation",
          "Traffic management during events",
          "Road safety education",
          "Vehicle inspection and licensing"
        ],
        leadership: "Currently headed by ACP Michael Msaki"
      },
      community: {
        title: "Community Policing",
        description: "This department builds partnerships between the police and communities to jointly identify and solve local security issues and prevent crime.",
        responsibilities: [
          "Community engagement and outreach",
          "Neighborhood watch coordination",
          "Public education on security matters",
          "Local dispute resolution",
          "Crime prevention initiatives"
        ],
        leadership: "Currently headed by SP Janet Mgaya"
      },
      narcotics: {
        title: "Anti-Narcotics Unit",
        description: "This specialized unit combats drug trafficking and abuse through intelligence gathering, enforcement operations, and awareness campaigns.",
        responsibilities: [
          "Drug trafficking investigation",
          "Narcotics seizure operations",
          "Border control coordination",
          "Public education on drug abuse",
          "Rehabilitation program partnerships"
        ],
        leadership: "Currently headed by ACP Joseph Konyo"
      },
      logistics: {
        title: "Logistics Department",
        description: "The Logistics Department ensures that all police stations and units are equipped with necessary resources and maintains the force's supply chain.",
        responsibilities: [
          "Equipment distribution and tracking",
          "Vehicle fleet management",
          "Facility maintenance coordination",
          "Uniform and supply management",
          "Resource allocation planning"
        ],
        leadership: "Currently headed by SP Thomas Mwampashi"
      },
      finance: {
        title: "Finance Department",
        description: "This department manages all financial aspects of the Tanzania Police Force, including budgeting, payroll, and financial reporting.",
        responsibilities: [
          "Budget preparation and management",
          "Financial reporting and accounting",
          "Payroll administration",
          "Audit coordination",
          "Financial policy development"
        ],
        leadership: "Currently headed by DCP Rebecca Mwaikambo"
      }
    };

    // Filter functionality
    document.querySelectorAll('.tpf-filter-btn').forEach(button => {
      button.addEventListener('click', () => {
        // Remove active class from all buttons
        document.querySelectorAll('.tpf-filter-btn').forEach(btn => {
          btn.classList.remove('tpf-active');
        });
        
        // Add active class to clicked button
        button.classList.add('tpf-active');
        
        const filter = button.getAttribute('data-filter');
        
        // Filter the cards
        document.querySelectorAll('.tpf-department-card').forEach(card => {
          if (filter === 'all') {
            card.classList.remove('tpf-hidden');
          } else {
            if (card.getAttribute('data-category').includes(filter)) {
              card.classList.remove('tpf-hidden');
            } else {
              card.classList.add('tpf-hidden');
            }
          }
        });
        
        // Animate the visible cards
        animateCards();
      });
    });
    
    // Modal functionality
    const modal = document.getElementById('tpfDepartmentModal');
    const modalTitle = document.getElementById('tpfModalTitle');
    const modalBody = document.getElementById('tpfModalBody');
    
    // Open modal
    document.querySelectorAll('.tpf-learn-more').forEach(button => {
      button.addEventListener('click', (e) => {
        e.preventDefault();
        const department = button.getAttribute('data-department');
        const details = departmentDetails[department];
        
        modalTitle.textContent = details.title;
        
        // Build modal content
        let content = `
          <p>${details.description}</p>
          <h3>Key Responsibilities:</h3>
          <ul>
        `;
        
        details.responsibilities.forEach(responsibility => {
          content += `<li>${responsibility}</li>`;
        });
        
        content += `
          </ul>
          <p><strong>${details.leadership}</strong></p>
        `;
        
        modalBody.innerHTML = content;
        
        // Show modal with animation
        modal.style.display = 'flex';
        setTimeout(() => {
          document.querySelector('.tpf-modal-content').style.transform = 'scale(1)';
          document.querySelector('.tpf-modal-content').style.opacity = '1';
        }, 10);
      });
    });
    
    // Close modal
    document.querySelector('.tpf-close-modal').addEventListener('click', () => {
      document.querySelector('.tpf-modal-content').style.transform = 'scale(0.8)';
      document.querySelector('.tpf-modal-content').style.opacity = '0';
      
      setTimeout(() => {
        modal.style.display = 'none';
      }, 300);
    });
    
    // Close modal if clicked outside
    window.addEventListener('click', (e) => {
      if (e.target === modal) {
        document.querySelector('.tpf-modal-content').style.transform = 'scale(0.8)';
        document.querySelector('.tpf-modal-content').style.opacity = '0';
        
        setTimeout(() => {
          modal.style.display = 'none';
        }, 300);
      }
    });
    
    // Animate cards on load
    function animateCards() {
      gsap.set('.tpf-department-card:not(.tpf-hidden)', {opacity: 0, y: 30});
      
      gsap.to('.tpf-department-card:not(.tpf-hidden)', {
        opacity: 1,
        y: 0,
        duration: 0.5,
        stagger: 0.1
      });
    }
    
    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
      animateCards();
    });
  </script>
</body>
</html>

@endsection