@extends('layouts.app')

@section('title', 'Training')

@push('styles')
<style>
    .training-header {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: white;
        padding: 4rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .main-content {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 2rem;
    }

    .training-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .training-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
        height: 400px;
        transition: transform 0.3s ease;
    }

    /* ... rest of your CSS ... */
</style>
@endpush

@section('content')
    <header class="training-header">
        <h1 class="text-4xl font-bold mb-4">{{ setting('training.header_title', 'Elite Training Programs') }}</h1>
        <p class="text-xl">{{ setting('training.header_subtitle', 'Shaping the Future of Law Enforcement') }}</p>
    </header>

    <main class="main-content">
        <div class="stat-grid">
            <div class="stat-item animated" style="animation-delay: 0.1s">
                <div class="stat-number">6+</div>
                <p>Specialized Programs</p>
            </div>
            <div class="stat-item animated" style="animation-delay: 0.2s">
                <div class="stat-number">1000+</div>
                <p>Trained Officers</p>
            </div>
            <div class="stat-item animated" style="animation-delay: 0.3s">
                <div class="stat-number">95%</div>
                <p>Success Rate</p>
            </div>
        </div>

        <div class="training-grid" id="trainingGrid">
            <!-- Training cards will be inserted here by JavaScript -->
        </div>
    </main>
@endsection

@push('scripts')
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

    // Keep overlay visible when hovering over it
    document.querySelectorAll('.content-overlay').forEach(overlay => {
        overlay.addEventListener('mouseenter', () => {
            overlay.style.opacity = '1';
            overlay.style.transform = 'translateY(0)';
        });
        overlay.addEventListener('mouseleave', () => {
            overlay.style.opacity = '0';
            overlay.style.transform = 'translateY(100%)';
        });
    });

    // Fetch data and generate cards
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/trainings')
            .then(response => response.json())
            .then(trainings => {
                const trainingGrid = document.getElementById('trainingGrid');
                trainings.forEach((training, index) => {
                    // ... rest of your JavaScript ...
const trainingCard = document.createElement('div');
            trainingCard.className = 'training-card animated';
            trainingCard.style.animationDelay = (0.1 * (index + 1)) + 's';

            const mediaContainer = document.createElement('div');
            mediaContainer.className = 'media-container';

            const img = document.createElement('img');
            img.src = training.image_url || '/api/placeholder/400/250';
            img.alt = training.title;
            img.className = 'media-placeholder';

            const viewButton = document.createElement('button');
            viewButton.className = 'view-button';
            viewButton.textContent = 'View';

            const contentOverlay = document.createElement('div');
            contentOverlay.className = 'content-overlay';
            contentOverlay.innerHTML = `<h3 class="text-xl font-bold mb-2">${training.title}</h3><p>${training.short_description}</p>`;

            const trainingInfo = document.createElement('div');
            trainingInfo.className = 'training-info';
            trainingInfo.innerHTML = `<h2 class="training-title">${training.title}</h2><p class="training-description">${training.short_description}</p>`;

            mediaContainer.appendChild(img);
            mediaContainer.appendChild(viewButton);
            mediaContainer.appendChild(contentOverlay);
            trainingCard.appendChild(mediaContainer);
            trainingCard.appendChild(trainingInfo);
            trainingGrid.appendChild(trainingCard);

            // Overlay hover functionality
            contentOverlay.addEventListener('mouseenter', () => {
              contentOverlay.style.opacity = '1';
              contentOverlay.style.transform = 'translateY(0)';
            });
            contentOverlay.addEventListener('mouseleave', () => {
              contentOverlay.style.opacity = '0';
              contentOverlay.style.transform = 'translateY(100%)';
            });

            // Intersection Observer for animation
            observer.observe(trainingCard);

                });
            });
    });
</script>
@endpush