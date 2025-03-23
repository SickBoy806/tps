@extends('layouts.app')

@section('title', 'Internship Opportunities - Ninter')
@section('meta_description', 'Explore diverse internship opportunities across research, teaching, technology, and more. Find your perfect professional development experience.')

@section('content')
<div 
    x-data="internshipController()" 
    class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 py-20 px-4"
    aria-label="Internship Opportunities"
>
    <div class="container mx-auto max-w-7xl">
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-12 text-gray-800 
            animate-fade-in-down tracking-tight">
            Internship Opportunities
        </h1>

        {{-- Category Filter --}}
        <div class="flex flex-wrap justify-center gap-3 md:gap-4 mb-12">
            @php
            $categories = [
                ['id' => 'research', 'name' => 'Research', 'icon' => 'microscope'],
                ['id' => 'teaching', 'name' => 'Teaching', 'icon' => 'chalkboard-teacher'],
                ['id' => 'accounting', 'name' => 'Accounting', 'icon' => 'calculator'],
                ['id' => 'it', 'name' => 'IT', 'icon' => 'laptop-code'],
                ['id' => 'veterinarian', 'name' => 'Veterinarian', 'icon' => 'dog'],
                ['id' => 'agriculture', 'name' => 'Agriculture', 'icon' => 'seedling'],
                ['id' => 'medical', 'name' => 'Medical', 'icon' => 'clinic-medical']
            ];
            @endphp

            {{-- Clear Filter Button --}}
            <button 
                @click="clearFilter()"
                :class="{
                    'bg-gray-200 text-gray-700 cursor-not-allowed': activeCategory === null,
                    'bg-red-500 text-white hover:bg-red-600': activeCategory !== null
                }"
                class="
                    px-4 py-2 rounded-full transition-all duration-300 ease-in-out
                    flex items-center gap-2 text-sm
                "
                aria-label="Clear Category Filter"
            >
                <i class="fas fa-times-circle"></i> Clear Filter
            </button>

            @foreach($categories as $category)
                <button 
                    @click="toggleCategory('{{ $category['id'] }}')"
                    :class="{
                        'bg-blue-600 text-white scale-105 ring-2 ring-blue-300': activeCategory === '{{ $category['id'] }}',
                        'bg-white text-gray-700 hover:bg-blue-50': activeCategory !== '{{ $category['id'] }}'
                    }"
                    class="
                        px-4 py-2 rounded-full transition-all duration-300 ease-in-out
                        flex items-center gap-2 text-sm
                    "
                    aria-label="Filter {{ $category['name'] }} Internships"
                >
                    <i class="fas fa-{{ $category['icon'] }} text-blue-500"></i>
                    {{ $category['name'] }}
                </button>
            @endforeach
        </div>

       {{-- Internship Grid with Alpine.js Transitions --}}
<div 
    class="grid sm:grid-cols-2 md:grid-cols-3 gap-6"
    x-animate
>
    @if(isset($internships) && is_array($internships) && count($internships) > 0)
        @foreach($internships as $internship)
        <div 
            x-show="activeCategory === '{{ $internship['category'] }}' || activeCategory === null"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="
                bg-white rounded-2xl shadow-lg overflow-hidden
                transform transition-all duration-300 hover:scale-105
                hover:shadow-2xl border-b-4 border-blue-500
            "
        >
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full mr-4 flex items-center justify-center">
                        <i class="fas fa-{{ 
                            $internship['department'] === 'Research & Development' ? 'microscope' :
                            ($internship['department'] === 'Marketing' ? 'laptop-code' :
                            ($internship['department'] === 'Technology' ? 'code' : 'briefcase'))
                        }} text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">
                        {{ $internship['title'] }}
                    </h3>
                </div>
                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ $internship['description'] }}
                </p>
                <div class="flex justify-between text-sm text-gray-500 mb-4">
                    <span class="flex items-center">
                        <i class="fas fa-clock mr-2"></i>
                        {{ $internship['duration'] }}
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-building mr-2"></i>
                        {{ $internship['department'] }}
                    </span>
                </div>
                <a 
                    href="{{ route('internships.apply', ['id' => $internship['id']]) }}" 
                    class="
                        block text-center 
                        bg-blue-500 text-white 
                        py-2 rounded-lg 
                        hover:bg-blue-600 
                        transition-colors
                        group
                    "
                >
                    Apply Now
                    <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>
        @endforeach
    @else
        <div class="col-span-full text-center py-12">
            <p class="text-gray-600">No internship opportunities available at this time.</p>
        </div>
    @endif
</div>
        {{-- No Results State --}}
        <div 
            x-show="isNoResultsState"
            x-transition
            class="text-center mt-12 bg-white p-8 rounded-xl shadow-md"
        >
            <p class="text-gray-600 text-xl">
                No internships match your current filter. 
                <button 
                    @click="clearFilter()" 
                    class="text-blue-600 hover:underline"
                >
                    Clear filter
                </button>
            </p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function internshipController() {
        return {
            activeCategory: null,
            toggleCategory(category) {
                this.activeCategory = this.activeCategory === category ? null : category;
            },
            clearFilter() {
                this.activeCategory = null;
            },
            get isNoResultsState() {
                const internships = document.querySelectorAll('[x-show]');
                return Array.from(internships).every(el => 
                    el.getAttribute('x-show').includes('false')
                );
            }
        }
    }
</script>
@endpush

{{-- Add to your layout's head section or as a separate link --}}
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endpush