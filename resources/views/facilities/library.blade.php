@extends('layouts.app')

@section('title', 'Library - Ninter')

<!DOCTYPE html>
<html>
<head>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: system-ui, -apple-system, sans-serif;
    }

    body {
      padding-top: 64px;
      background: #f5f5f5;
      color: #333;
    }

    .library-header {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: white;
      padding: 4rem 2rem;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .search-section {
      max-width: 600px;
      margin: -2rem auto 2rem;
      padding: 1rem;
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 20;
    }

    .search-bar {
      display: flex;
      gap: 1rem;
      padding: 1rem;
    }

    .search-input {
      flex: 1;
      padding: 0.75rem 1rem;
      border: 2px solid #e2e8f0;
      border-radius: 6px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .search-input:focus {
      outline: none;
      border-color: #1e3c72;
    }

    .search-btn {
      background: #1e3c72;
      color: white;
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .search-btn:hover {
      background: #2a5298;
    }

    .main-content {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0 2rem;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .feature-card {
      background: white;
      border-radius: 8px;
      padding: 1.5rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .card-icon {
      width: 48px;
      height: 48px;
      background: #1e3c72;
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1rem;
    }

    .stats-section {
      background: #1e3c72;
      color: white;
      padding: 4rem 2rem;
      margin: 4rem 0;
    }

    .stats-grid {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
      text-align: center;
    }

    .stat-item h3 {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
    }

    .opening-hours {
      background: white;
      border-radius: 8px;
      padding: 2rem;
      margin-top: 2rem;
    }

    .hours-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
      margin-top: 1rem;
    }

    .news-section {
      margin-top: 4rem;
    }

    .news-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .news-card {
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .news-content {
      padding: 1.5rem;
    }

    .news-date {
      color: #666;
      font-size: 0.875rem;
    }

    /* Research upload and browse section styles */
    .research-section {
      margin-top: 4rem;
      background: white;
      border-radius: 8px;
      padding: 2rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .research-tabs {
      display: flex;
      border-bottom: 2px solid #e2e8f0;
      margin-bottom: 2rem;
    }

    .research-tab {
      padding: 1rem 2rem;
      font-weight: bold;
      cursor: pointer;
      border-bottom: 3px solid transparent;
      transition: all 0.3s ease;
    }

    .research-tab.active {
      border-bottom: 3px solid #1e3c72;
      color: #1e3c72;
    }

    .research-content {
      display: none;
    }

    .research-content.active {
      display: block;
      animation: fadeIn 0.5s ease forwards;
    }

    .upload-form {
      max-width: 800px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
    }

    .form-input,
    .form-textarea,
    .form-select {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 2px solid #e2e8f0;
      border-radius: 6px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
      outline: none;
      border-color: #1e3c72;
    }

    .form-textarea {
      min-height: 150px;
      resize: vertical;
    }

    .upload-btn {
      background: #1e3c72;
      color: white;
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: bold;
    }

    .upload-btn:hover {
      background: #2a5298;
    }

    .research-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    .research-card {
      background: white;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      padding: 1.5rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .research-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .research-meta {
      display: flex;
      justify-content: space-between;
      color: #666;
      font-size: 0.875rem;
      margin-bottom: 0.5rem;
    }

    .research-actions {
      margin-top: 1rem;
      display: flex;
      gap: 0.5rem;
    }

    .research-btn {
      padding: 0.5rem 1rem;
      border-radius: 4px;
      font-size: 0.875rem;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .view-btn {
      background: #e2e8f0;
      color: #1e3c72;
    }

    .view-btn:hover {
      background: #cbd5e1;
    }

    .download-btn {
      background: #1e3c72;
      color: white;
    }

    .download-btn:hover {
      background: #2a5298;
    }

    .research-filters {
      display: flex;
      gap: 1rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .filter-select {
      padding: 0.5rem 1rem;
      border: 2px solid #e2e8f0;
      border-radius: 6px;
      font-size: 0.875rem;
    }

    .pagination {
      display: flex;
      justify-content: center;
      gap: 0.5rem;
      margin-top: 2rem;
    }

    .page-link {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #e2e8f0;
      color: #333;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .page-link:hover,
    .page-link.active {
      background: #1e3c72;
      color: white;
    }

    .tag-list {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-top: 0.5rem;
    }

    .tag {
      background: #e2e8f0;
      color: #1e3c72;
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: bold;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .animated {
      animation: fadeIn 0.5s ease forwards;
    }
  </style>
</head>
<body>
  <header class="library-header">
    <h1 class="text-4xl font-bold mb-4">Police Academy Library</h1>
    <p class="text-xl">Your Gateway to Knowledge and Research</p>
  </header>

  <section class="search-section">
    <div class="search-bar">
      <input type="text" class="search-input" placeholder="Search for books, journals, articles...">
      <button class="search-btn">Search</button>
    </div>
  </section>

  <main class="main-content">
    <div class="features-grid">
      <div class="feature-card animated" style="animation-delay: 0.1s">
        <div class="card-icon">📚</div>
        <h3 class="text-xl font-bold mb-2">Extensive Collection</h3>
        <p>Access to over 50,000 books, journals, and digital resources focused on law enforcement, criminal justice, and related fields.</p>
      </div>

      <div class="feature-card animated" style="animation-delay: 0.2s">
        <div class="card-icon">💻</div>
        <h3 class="text-xl font-bold mb-2">Digital Resources</h3>
        <p>24/7 access to online databases, e-books, and academic journals. Remote access available for all students and faculty.</p>
      </div>

      <div class="feature-card animated" style="animation-delay: 0.3s">
        <div class="card-icon">🎓</div>
        <h3 class="text-xl font-bold mb-2">Research Support</h3>
        <p>Expert librarians available to assist with research methodology, citations, and accessing specialized resources.</p>
      </div>
    </div>

    <!-- New Research Repository Section -->
    <section class="research-section">
      <h2 class="text-2xl font-bold mb-4">Research Repository</h2>
      <p class="mb-6">Share your research with the community or browse through our collection of papers, case studies, and publications.</p>
      
      <div class="research-tabs">
        <div class="research-tab active" data-target="browse">Browse Research</div>
        <div class="research-tab" data-target="upload">Upload Research</div>
      </div>
      
      <!-- Browse Research Tab -->
      <div id="browse" class="research-content active">
        <div class="research-filters">
          <select class="filter-select">
            <option>All Categories</option>
            <option>Criminal Justice</option>
            <option>Forensic Science</option>
            <option>Law Enforcement</option>
            <option>Public Safety</option>
            <option>Criminology</option>
          </select>
          
          <select class="filter-select">
            <option>Sort By: Newest</option>
            <option>Sort By: Most Viewed</option>
            <option>Sort By: Title A-Z</option>
          </select>
          
          <select class="filter-select">
            <option>All Years</option>
            <option>2025</option>
            <option>2024</option>
            <option>2023</option>
            <option>2022</option>
            <option>2021</option>
          </select>
        </div>
        
        <div class="research-grid">
          <div class="research-card">
            <div class="research-meta">
              <span>Criminal Justice</span>
              <span>Feb 12, 2025</span>
            </div>
            <h3 class="text-xl font-bold mb-2">Modern Approaches to Community Policing</h3>
            <p>A comprehensive analysis of effective community policing strategies in urban environments.</p>
            <div class="tag-list">
              <span class="tag">Policing</span>
              <span class="tag">Community</span>
              <span class="tag">Urban</span>
            </div>
            <div class="research-actions">
              <button class="research-btn view-btn">View</button>
              <button class="research-btn download-btn">Download PDF</button>
            </div>
          </div>
          
          <div class="research-card">
            <div class="research-meta">
              <span>Forensic Science</span>
              <span>Jan 28, 2025</span>
            </div>
            <h3 class="text-xl font-bold mb-2">Advances in Digital Forensics</h3>
            <p>Exploring new methodologies in digital evidence collection and analysis for cybercrime investigations.</p>
            <div class="tag-list">
              <span class="tag">Digital</span>
              <span class="tag">Forensics</span>
              <span class="tag">Cybercrime</span>
            </div>
            <div class="research-actions">
              <button class="research-btn view-btn">View</button>
              <button class="research-btn download-btn">Download PDF</button>
            </div>
          </div>
          
          <div class="research-card">
            <div class="research-meta">
              <span>Law Enforcement</span>
              <span>Jan 15, 2025</span>
            </div>
            <h3 class="text-xl font-bold mb-2">Crisis Intervention Training</h3>
            <p>Effectiveness of specialized mental health response training for police officers in the field.</p>
            <div class="tag-list">
              <span class="tag">Mental Health</span>
              <span class="tag">Training</span>
              <span class="tag">Intervention</span>
            </div>
            <div class="research-actions">
              <button class="research-btn view-btn">View</button>
              <button class="research-btn download-btn">Download PDF</button>
            </div>
          </div>
          
          <div class="research-card">
            <div class="research-meta">
              <span>Criminology</span>
              <span>Dec 20, 2024</span>
            </div>
            <h3 class="text-xl font-bold mb-2">Predictive Policing Models</h3>
            <p>Ethical considerations and effectiveness of data-driven crime prediction systems.</p>
            <div class="tag-list">
              <span class="tag">Data</span>
              <span class="tag">Ethics</span>
              <span class="tag">Prediction</span>
            </div>
            <div class="research-actions">
              <button class="research-btn view-btn">View</button>
              <button class="research-btn download-btn">Download PDF</button>
            </div>
          </div>
          
          <div class="research-card">
            <div class="research-meta">
              <span>Public Safety</span>
              <span>Dec 5, 2024</span>
            </div>
            <h3 class="text-xl font-bold mb-2">Emergency Response Protocols</h3>
            <p>Analysis of multi-agency coordination during large-scale public safety incidents.</p>
            <div class="tag-list">
              <span class="tag">Emergency</span>
              <span class="tag">Coordination</span>
              <span class="tag">Protocol</span>
            </div>
            <div class="research-actions">
              <button class="research-btn view-btn">View</button>
              <button class="research-btn download-btn">Download PDF</button>
            </div>
          </div>
          
          <div class="research-card">
            <div class="research-meta">
              <span>Criminal Justice</span>
              <span>Nov 15, 2024</span>
            </div>
            <h3 class="text-xl font-bold mb-2">Juvenile Justice Reform</h3>
            <p>Evaluating the impact of rehabilitation-focused approaches in juvenile justice systems.</p>
            <div class="tag-list">
              <span class="tag">Juvenile</span>
              <span class="tag">Reform</span>
              <span class="tag">Rehabilitation</span>
            </div>
            <div class="research-actions">
              <button class="research-btn view-btn">View</button>
              <button class="research-btn download-btn">Download PDF</button>
            </div>
          </div>
        </div>
        
        <div class="pagination">
          <div class="page-link active">1</div>
          <div class="page-link">2</div>
          <div class="page-link">3</div>
          <div class="page-link">4</div>
          <div class="page-link">→</div>
        </div>
      </div>
      
      <!-- Upload Research Tab -->
      <div id="upload" class="research-content">
        <form class="upload-form">
          <div class="form-group">
            <label class="form-label" for="title">Research Title *</label>
            <input type="text" id="title" class="form-input" placeholder="Enter the title of your research" required>
          </div>
          
          <div class="form-group">
            <label class="form-label" for="category">Category *</label>
            <select id="category" class="form-select" required>
              <option value="" disabled selected>Select a category</option>
              <option>Criminal Justice</option>
              <option>Forensic Science</option>
              <option>Law Enforcement</option>
              <option>Public Safety</option>
              <option>Criminology</option>
              <option>Other</option>
            </select>
          </div>
          
          <div class="form-group">
            <label class="form-label" for="abstract">Abstract/Summary *</label>
            <textarea id="abstract" class="form-textarea" placeholder="Provide a brief summary of your research" required></textarea>
          </div>
          
          <div class="form-group">
            <label class="form-label" for="authors">Authors *</label>
            <input type="text" id="authors" class="form-input" placeholder="e.g. John Smith, Jane Doe" required>
          </div>
          
          <div class="form-group">
            <label class="form-label" for="keywords">Keywords/Tags</label>
            <input type="text" id="keywords" class="form-input" placeholder="e.g. forensics, investigation, crime scene (comma separated)">
          </div>
          
          <div class="form-group">
            <label class="form-label" for="file">Upload Document *</label>
            <input type="file" id="file" class="form-input" accept=".pdf,.doc,.docx" required>
            <p class="text-sm text-gray-500 mt-1">Accepted formats: PDF, DOC, DOCX (Max size: 20MB)</p>
          </div>
          
          <div class="form-group">
            <label class="form-label">Publication Status *</label>
            <div>
              <input type="radio" id="published" name="publication_status" value="published">
              <label for="published">Published</label>
            </div>
            <div>
              <input type="radio" id="unpublished" name="publication_status" value="unpublished">
              <label for="unpublished">Unpublished</label>
            </div>
            <div>
              <input type="radio" id="preprint" name="publication_status" value="preprint">
              <label for="preprint">Preprint</label>
            </div>
          </div>
          
          <div class="form-group">
            <label class="form-label">Visibility *</label>
            <div>
              <input type="radio" id="public" name="visibility" value="public">
              <label for="public">Public (Viewable by anyone)</label>
            </div>
            <div>
              <input type="radio" id="restricted" name="visibility" value="restricted">
              <label for="restricted">Restricted (Academy members only)</label>
            </div>
          </div>
          
          <div class="form-group">
            <button type="submit" class="upload-btn">Upload Research</button>
          </div>
        </form>
      </div>
    </section>

    <section class="stats-section">
      <div class="stats-grid">
        <div class="stat-item">
          <h3>50,000+</h3>
          <p>Books</p>
        </div>
        <div class="stat-item">
          <h3>100+</h3>
          <p>Online Databases</p>
        </div>
        <div class="stat-item">
          <h3>5,000+</h3>
          <p>E-Journals</p>
        </div>
        <div class="stat-item">
          <h3>24/7</h3>
          <p>Online Access</p>
        </div>
      </div>
    </section>

    <section class="opening-hours">
      <h2 class="text-2xl font-bold mb-4">Opening Hours</h2>
      <div class="hours-grid">
        <div>
          <h3 class="font-bold">Weekdays</h3>
          <p>8:00 AM - 10:00 PM</p>
        </div>
        <div>
          <h3 class="font-bold">Weekends</h3>
          <p>9:00 AM - 6:00 PM</p>
        </div>
        <div>
          <h3 class="font-bold">Exam Period</h3>
          <p>24/7 Access</p>
        </div>
      </div>
    </section>

    <section class="news-section">
      <h2 class="text-2xl font-bold mb-4">Library News & Updates</h2>
      <div class="news-grid">
        <div class="news-card animated" style="animation-delay: 0.1s">
          <div class="news-content">
            <span class="news-date">February 15, 2025</span>
            <h3 class="text-xl font-bold my-2">New Database Subscriptions</h3>
            <p>Access now available to specialized law enforcement databases including Criminal Justice Abstracts and Police Science Index.</p>
          </div>
        </div>

        <div class="news-card animated" style="animation-delay: 0.2s">
          <div class="news-content">
            <span class="news-date">February 10, 2025</span>
            <h3 class="text-xl font-bold my-2">Research Workshop Series</h3>
            <p>Join our upcoming workshops on advanced research methodologies and database usage techniques.</p>
          </div>
        </div>

        <div class="news-card animated" style="animation-delay: 0.3s">
          <div class="news-content">
            <span class="news-date">February 5, 2025</span>
            <h3 class="text-xl font-bold my-2">Extended Hours During Finals</h3>
            <p>The library will be open 24/7 during the final examination period from March 1-15.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script>
    // Intersection Observer for animation
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animated').forEach(el => observer.observe(el));

    // Search functionality
    document.querySelector('.search-btn').addEventListener('click', () => {
      const searchValue = document.querySelector('.search-input').value;
      if (searchValue.trim() !== '') {
        alert('Search functionality would be implemented here with: ' + searchValue);
      }
    });
    
    // Research tabs functionality
    const tabs = document.querySelectorAll('.research-tab');
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        // Remove active class from all tabs
        tabs.forEach(t => t.classList.remove('active'));
        // Add active class to clicked tab
        tab.classList.add('active');
        
        // Hide all content
        document.querySelectorAll('.research-content').forEach(content => {
          content.classList.remove('active');
        });
        
        // Show content corresponding to clicked tab
        const target = tab.getAttribute('data-target');
        document.getElementById(target).classList.add('active');
      });
    });
    
    // Research upload form handling
    const uploadForm = document.querySelector('.upload-form');
    if (uploadForm) {
      uploadForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // Here you would normally send the form data to the server
        alert('Thank you for your submission! Your research will be reviewed and published soon.');
        uploadForm.reset();
        
        // Switch back to browse tab after submission
        document.querySelector('.research-tab[data-target="browse"]').click();
      });
    }
    
    // Pagination handling
    const pageLinks = document.querySelectorAll('.page-link');
    pageLinks.forEach(link => {
      link.addEventListener('click', () => {
        pageLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
        // Here you would normally load the content for that page
      });
    });
    
    // Research card view button
    const viewButtons = document.querySelectorAll('.view-btn');
    viewButtons.forEach(button => {
      button.addEventListener('click', function() {
        const title = this.closest('.research-card').querySelector('h3').textContent;
        alert(`Viewing research: ${title}\nIn a full implementation, this would open a detailed view of the research.`);
      });
    });
    
    // Research card download button
    const downloadButtons = document.querySelectorAll('.download-btn');
    downloadButtons.forEach(button => {
      button.addEventListener('click', function() {
        const title = this.closest('.research-card').querySelector('h3').textContent;
        alert(`Downloading: ${title}\nIn a full implementation, this would initiate a download of the research PDF.`);
      });
    });
  </script>
</body>
</html>
@section('content')

@endsection