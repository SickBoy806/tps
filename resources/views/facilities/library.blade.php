@extends('layouts.app')

@section('title', 'library - Ninter')
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
  </script>
</body>
</html>
@section('content')

@endsection