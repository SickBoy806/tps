@extends('layouts.app')

@section('title', 'Academicblock')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    {{-- Hero Section --}}
    <div class="text-center mb-16">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            Experience Modern Academic Excellence
        </h1>
        <p class="text-xl text-gray-600">
            Discover TPS Moshi's state-of-the-art facilities designed for optimal learning
        </p>
    </div>

    {{-- Replace the old Facilities Grid section with this new one --}}
    @if(isset($facilities) && $facilities->count() > 0)
        {{-- Facilities Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @foreach($facilities as $facility)
            <div class="facility-card bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105"
                 data-facility-id="{{ $facility->id }}">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <i class="{{ $facility->icon }} text-blue-600 text-2xl mr-3"></i>
                        <h3 class="text-xl font-semibold text-gray-900">{{ $facility->name }}</h3>
                    </div>
                    <p class="text-gray-600 mb-4">{{ $facility->description }}</p>
                    <div class="features-list hidden">
                        <ul class="space-y-2">
                            @if(isset($facility->features))
                                @foreach($facility->features as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <button class="show-features mt-4 text-blue-600 hover:text-blue-800 font-medium">
                        Learn More
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-gray-600">
            No facilities available at this time.
        </div>
    @endif


    {{-- Photo Gallery Section --}}
    <div class="mb-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Explore Our Facilities</h2>
        <div class="gallery-grid grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($facilities as $facility)
                @foreach($facility->images as $image)
                <div class="gallery-item relative overflow-hidden rounded-lg shadow-lg aspect-w-16 aspect-h-9 cursor-pointer">
                    <img src="{{ asset($image->image_path) }}" 
                         alt="{{ $image->caption }}"
                         class="object-cover w-full h-full transform transition-transform duration-300 hover:scale-110">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <p class="text-white text-center px-4">{{ $image->caption }}</p>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>

    {{-- Modal for Gallery Images --}}
    <div id="gallery-modal" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-50">
        <div class="max-w-4xl w-full mx-4">
            <div class="relative">
                <img id="modal-image" src="" alt="" class="w-full rounded-lg">
                <p id="modal-caption" class="text-white text-center mt-4 text-lg"></p>
                <button id="close-modal" class="absolute top-4 right-4 text-white hover:text-gray-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Facility card interaction
    const facilityCards = document.querySelectorAll('.facility-card');
    facilityCards.forEach(card => {
        const featuresBtn = card.querySelector('.show-features');
        const featuresList = card.querySelector('.features-list');
        
        featuresBtn.addEventListener('click', () => {
            featuresList.classList.toggle('hidden');
            featuresBtn.textContent = featuresList.classList.contains('hidden') ? 'Learn More' : 'Show Less';
        });
    });

    // Gallery modal interaction
    const galleryItems = document.querySelectorAll('.gallery-item');
    const modal = document.getElementById('gallery-modal');
    const modalImage = document.getElementById('modal-image');
    const modalCaption = document.getElementById('modal-caption');
    const closeModal = document.getElementById('close-modal');

    galleryItems.forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            const caption = item.querySelector('p').textContent;
            
            modalImage.src = img.src;
            modalCaption.textContent = caption;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });

    closeModal.addEventListener('click', () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });

    // Close modal on outside click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    });
});
</script>
@endpush