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
    $service = Service::factory()->create();

    $response = $this->get(route('services.edit', $service));

    $response->assertStatus(200);
    $response->assertViewIs('services.edit');
});

it('atualiza um serviço existente', function () {
    $service = Service::factory()->create();

    $response = $this->put(route('services.update', $service), [
        'name' => 'service1',
        'description' => 'description1',
        'price' => 2500.00,
    ]);

    $response->assertRedirect(route('services.index'));
    $this->assertDatabaseHas('services', ['name' => 'service1']);
});

it('deleta um serviço', function () {
    $service = Service::factory()->create();

    $response = $this->delete(route('services.destroy', $service));

    $response->assertRedirect(route('services.index'));
    $this->assertSoftDeleted('services', ['id' => $service->id]);
});
