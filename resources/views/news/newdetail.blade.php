@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen pt-20 pb-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            {{-- Article Header --}}
            <div class="mb-8">
                <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-sm inline-block mb-4">
                    {{ $article->category }}
                </span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                    {{ $article->title }}
                </h1>
                <div class="flex items-center text-gray-500 text-sm mb-4">
                    <span>{{ $article->formatted_date }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ $article->read_time }}</span>
                </div>
            </div>

            {{-- Featured Image --}}
            <div class="mb-8 rounded-2xl overflow-hidden shadow-lg">
                <img 
                    src="{{ Voyager::image($article->featured_image) }}" 
                    alt="{{ $article->title }}" 
                    class="w-full h-auto object-cover"
                >
            </div>
            
            {{-- Article Content --}}
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 prose prose-lg max-w-none">
                {!! $article->body !!}
            </div>

            {{-- Image Gallery (optional) --}}
            @if(!empty($article->images) && count($article->images) > 1)
              <div class="mb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Image Gallery</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($article->images as $image)
                <div class="rounded-lg overflow-hidden shadow-md aspect-w-16 aspect-h-9">
                <img 
                    src="{{ $image }}" 
                    alt="{{ $article->title }} Gallery Image" 
                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-110"
                >
                </div>
            @endforeach
        </div>
    </div>
@endif

            {{-- Back to News Button --}}
            <div class="text-center">
                
                   <a href="{{ route('news.latest') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-all shadow-lg">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    Back to All News
</a>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection