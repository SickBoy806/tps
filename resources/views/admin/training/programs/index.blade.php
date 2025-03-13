<!-- resources/views/admin/training/programs/index.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Training Programs')
@section('header', 'Training Programs')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">All Programs</h3>
        <a href="{{ route('admin.training-programs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add New Program
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Media Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($programs as $program)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $program->display_order }}</td>
                    <td class="px-6 py-4">{{ $program->title }}</td>
                    <td class="px-6 py-4">{{ ucfirst($program->media_type) }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $program->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $program->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('admin.training-programs.edit', $program) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.training-programs.destroy', $program) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- resources/views/admin/training/programs/create.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Add Training Program')
@section('header', 'Add New Training Program')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('admin.training-programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Short Description</label>
            <input type="text" name="short_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Detailed Description</label>
            <textarea name="detailed_description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Media Type</label>
            <select name="media_type" id="media_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>
        </div>

        <div id="image_upload" class="media-upload">
            <label class="block text-sm font-medium text-gray-700">Upload Image</label>
            <input type="file" name="image" accept="image/*" class="mt-1 block w-full">
        </div>

        <div id="video_upload" class="media-upload hidden">
            <label class="block text-sm font-medium text-gray-700">Video URL</label>
            <input type="text" name="video_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Enter video URL">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Display Order</label>
            <input type="number" name="display_order" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" checked class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <span class="ml-2 text-sm text-gray-600">Active</span>
            </label>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Create Program
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('media_type').addEventListener('change', function() {
    const imageUpload = document.getElementById('image_upload');
    const videoUpload = document.getElementById('video_upload');
    
    if (this.value === 'image') {
        imageUpload.classList.remove('hidden');
        videoUpload.classList.add('hidden');
    } else {
        imageUpload.classList.add('hidden');
        videoUpload.classList.remove('hidden');
    }
});
</script>