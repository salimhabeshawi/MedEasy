<?php

use App\Models\User;

it('creates a new idea', function () {
    $this->actingAs($user = User::factory()->create());

    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', 'Some Example Title')
        ->click('@button-status-completed')
        ->fill('description', 'An example description')
        ->fill('@new-link', 'https://salimhabeshawi.com')
        ->click('@submit-new-link-button')
        ->fill('@new-link', 'https://google.com')
        ->click('@submit-new-link-button')
        ->click('Create')
        ->assertPathIs('/ideas');

    expect($user->ideas()->first())->toMatchArray([
        'title' => 'Some Example Title',
        'status' => 'completed',
        'description' => 'An example description',
        'links' => ['https://salimhabeshawi.com', 'https://google.com'],
    ]);
});
