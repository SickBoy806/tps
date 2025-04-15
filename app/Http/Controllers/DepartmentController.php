<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display the departments page
     */
    public function index()
    {
        $departments = Department::all();
        return view('about.departments', compact('departments'));
    }

    /**
     * Get all departments (API endpoint)
     */
    public function getAllDepartments()
    {
        $departments = Department::all();
        return response()->json([
            'success' => true,
            'data' => $departments
        ]);
    }

    /**
     * Get a specific department (API endpoint)
     */
    public function getDepartment($id)
    {
        $department = Department::find($id);
        
        if (!$department) {
            return response()->json([
                'success' => false,
                'message' => 'Department not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $department
        ]);
    }

    /**
     * Show the form for creating a new department
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created department
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'leadership' => 'nullable|string|max:255',
            'responsibilities' => 'required|array',
            'responsibilities.*' => 'string'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('departments.create')
                ->withErrors($validator)
                ->withInput();
        }

        $department = Department::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'leadership' => $request->leadership,
            'responsibilities' => json_encode($request->responsibilities),
            'icon' => $request->icon ?? '📋'
        ]);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department created successfully');
    }

    /**
     * Show the form for editing a department
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified department
     */
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'leadership' => 'nullable|string|max:255',
            'responsibilities' => 'required|array',
            'responsibilities.*' => 'string'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('departments.edit', $department->id)
                ->withErrors($validator)
                ->withInput();
        }

        $department->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'leadership' => $request->leadership,
            'responsibilities' => json_encode($request->responsibilities),
            'icon' => $request->icon ?? $department->icon
        ]);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department updated successfully');
    }

    /**
     * API endpoint to update a department
     */
    public function apiUpdate(Request $request, $id)
    {
        $department = Department::find($id);
        
        if (!$department) {
            return response()->json([
                'success' => false,
                'message' => 'Department not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'leadership' => 'nullable|string|max:255',
            'responsibilities' => 'nullable|array',
            'responsibilities.*' => 'string',
            'icon' => 'nullable|string|max:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $updateData = [];
        
        if ($request->has('title')) $updateData['title'] = $request->title;
        if ($request->has('description')) $updateData['description'] = $request->description;
        if ($request->has('category')) $updateData['category'] = $request->category;
        if ($request->has('leadership')) $updateData['leadership'] = $request->leadership;
        if ($request->has('responsibilities')) $updateData['responsibilities'] = json_encode($request->responsibilities);
        if ($request->has('icon')) $updateData['icon'] = $request->icon;

        $department->update($updateData);

        return response()->json([
            'success' => true,
            'message' => 'Department updated successfully',
            'data' => $department
        ]);
    }

    /**
     * Remove the specified department
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department deleted successfully');
    }

    /**
     * API endpoint to remove a department
     */
    public function apiDestroy($id)
    {
        $department = Department::find($id);
        
        if (!$department) {
            return response()->json([
                'success' => false,
                'message' => 'Department not found'
            ], 404);
        }

        $department->delete();

        return response()->json([
            'success' => true,
            'message' => 'Department deleted successfully'
        ]);
    }
}