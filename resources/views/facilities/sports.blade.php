@extends('layouts.app')

@section('title', 'Sports')

@section('content')
<header class="header">
<style>
  .header {
    background: #1e3a8a;
    color: white;
    text-align: center;
    padding: 20px;
    font-size: 24px;
  }

  .sports-nav {
    background: #0f172a;
    padding: 10px;
  }

  .nav-list {
    display: flex;
    justify-content: center;
    gap: 20px;
    list-style: none;
  }

  .nav-item {
    cursor: pointer;
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    background: #2563eb;
    transition: 0.3s;
  }

  .nav-item:hover {
    background: #1d4ed8;
  }

  .main-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
  }

  .sport-card {
    background: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    transition: 0.3s;
    opacity: 0;
  }

  .sport-card:hover {
    transform: scale(1.05);
  }

  .card-image {
    width: 100%;
    height: 200px;
    background-size: cover;
    background-position: center;
  }

  .card-content {
    padding: 20px;
  }

  .card-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #1e3a8a;
  }

  .card-text {
    color: #475569;
  }

  .read-more {
    display: inline-block;
    margin-top: 10px;
    color: #2563eb;
    text-decoration: none;
  }

  .read-more:hover {
    text-decoration: underline;
  }
</style>

  <p>Your Source for College Sports Excellence</p>
</header>

<nav class="sports-nav">
  <ul class="nav-list">
    @foreach($categories as $category)
      <li class="nav-item">{{ $category }}</li>
    @endforeach
  </ul>
</nav>

<div class="live-scores">
  <div class="score-ticker">
    @foreach($liveScores as $score)
      @if($score->sport_type == 'Football')
        🏈 
      @elseif($score->sport_type == 'Basketball')
        🏀 
      @elseif($score->sport_type == 'Volleyball')
        🏐 
      @else
        ⚽ 
      @endif
      {{ $score->sport_type }}: {{ $score->team1 }} {{ $score->score1 }} - {{ $score->team2 }} {{ $score->score2 }} |
    @endforeach
  </div>
</div>

<main class="main-content">
  @foreach($sports as $index => $sport)
    <article class="sport-card" style="animation-delay: {{ $index * 0.1 }}s">
      <div class="card-image" style="background-image: url('{{ Voyager::image($sport->image) }}')"></div>
      <div class="card-content">
        <h2 class="card-title">{{ $sport->title }}</h2>
        <p class="card-text">{{ Str::limit($sport->description, 150) }}</p>
        <a href="#" class="read-more">Read More</a>
      </div>
    </article>
  @endforeach
</main>

<script>
  // Smooth scroll for navigation
  document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', () => {
      const category = item.textContent.trim();
      
      // Filter cards based on category
      document.querySelectorAll('.sport-card').forEach(card => {
        card.style.display = 'none';
      });
      
      document.querySelectorAll('.sport-card[data-category="' + category + '"]').forEach(card => {
        card.style.display = 'block';
        card.style.animation = 'none';
        card.offsetHeight;
        card.style.animation = 'fadeIn 0.5s ease forwards';
      });
      
      // If "All" is clicked, show all cards
      if (category === 'All') {
        document.querySelectorAll('.sport-card').forEach(card => {
          card.style.display = 'block';
          card.style.animation = 'none';
          card.offsetHeight;
          card.style.animation = 'fadeIn 0.5s ease forwards';
        });
      }
    });
  });

  // Intersection Observer for card animations
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.sport-card').forEach(card => {
    observer.observe(card);
  });
</script>
@endsection