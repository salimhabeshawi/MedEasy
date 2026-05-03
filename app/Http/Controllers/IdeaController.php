<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\Idea as ModelsIdea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ideas = Auth::user()
            ->ideas()
            ->when($request->status, fn ($query, $status) => $query->where('status', $status))
            ->get();

        // SELECT status, count(*) FROM ideas GROUP BY status;

        return view('idea.index', [
            'ideas' => $ideas,
            'statusCounts' => ModelsIdea::statusCounts(Auth::user()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(idea $idea): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(idea $idea): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, idea $idea): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(idea $idea): void
    {
        //
    }
}
