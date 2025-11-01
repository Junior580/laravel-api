<?php

use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('exibe a lista de serviços', function () {
    Service::factory()->count(3)->create();

    $response = $this->get(route('services.index'));

    $response->assertStatus(200);
    $response->assertViewIs('services.index');
});

it('exibe o formulário de criação de serviço', function () {
    $response = $this->get(route('services.create'));

    $response->assertStatus(200);
    $response->assertViewIs('services.create');
});

it('cria um novo serviço com dados válidos', function () {
    $response = $this->post(route('services.store'), [
        'name' => 'service1',
        'description' => 'service description1',
        'price' => 500.00,
    ]);

    $response->assertRedirect(route('services.index'));
    $this->assertDatabaseHas('services', ['name' => 'service1']);
});

it('exibe a página de edição do service', function () {
    $product = Service::factory()->create();

    $response = $this->get(route('services.edit', $product));

    $response->assertStatus(200);
    $response->assertViewIs('services.edit');
});
