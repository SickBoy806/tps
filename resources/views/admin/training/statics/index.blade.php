<!-- resources/views/admin/training/statistics/index.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Training Statistics')
@section('header', 'Training Statistics')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-4">Add New Statistic</h3>
        <form action="{{ route('admin.training-statistics.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Value</label>
                    <input type="text" name="value" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Display Order</label>
                    <input type="number" name="display_order" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Add Statistic
                </button>
            </div>
        </form>
    </div>

    <div class="mt-8">
        <h3 class="text-xl font-semibold mb-4">Current Statistics</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Value</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($statistics as $stat)
                <tr>
                    <td class="px-6 py-4">{{ $stat->display_order }}</td>
                    <td class="px-6 py-4">{{ $stat->title }}</td>
                    <td class="px-6 py-4">{{ $stat->value }}</td>
                    <td class="px