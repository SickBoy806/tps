@extends('layouts.app')

@section('title', 'Sports')

@section('content')
<style>
  /* Add this to create space for the navbar */
  .content-wrapper {
    padding-top: 0px; /* Adjust this value based on your navbar height */
  }

  .header {
    background: #1e3a8a;
    color: white;
    text-align: center;
    padding: 20px;
    font-size: 24px;
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

<!-- Wrap all your content in a div with the content-wrapper class -->
<div class="content-wrapper">
  <header class="header">
    <p>Your Source for Sports Excellence</p>
  </header>

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
</div>

<script>
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