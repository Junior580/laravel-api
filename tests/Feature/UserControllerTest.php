<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});


it('exibe a lista de usuários', function () {
    $users = User::factory()->count(3)->create();

    $response = $this->get(route('users.index'));

    $response->assertStatus(200);
    $response->assertViewIs('users.index');
    $viewUsers = $response->viewData('users');
    foreach ($users as $user) {
        $this->assertTrue($viewUsers->contains($user));
    }
});

it('exibe o formulário de criação de usuário', function () {
    $response = $this->get(route('users.create'));

    $response->assertStatus(200);
    $response->assertViewIs('users.create');
});

it('cria um novo usuário com dados válidos', function () {
    $data = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => bcrypt('password123'),
    ];

    $response = $this->post(route('users.store'), $data);

    $response->assertRedirect(route('users.index'));
    $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
});

it('exibe uma página de edição de usuário', function () {
    $user = User::factory()->create();

    $response = $this->get(route('users.edit', $user));

    $response->assertStatus(200);
    $response->assertViewIs('users.edit');
    $response->assertViewHas('user', $user);
});

it('atualiza um usuário existente', function () {
    $user = User::factory()->create();

    $data = [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'password' => bcrypt('newpassword123'),
    ];

    $response = $this->put(route('users.update', $user), $data);

    $response->assertRedirect(route('users.index'));
    $this->assertDatabaseHas('users', ['email' => 'jane@example.com']);
});

it('deleta um usuário', function () {
    $user = User::factory()->create();

    $response = $this->delete(route('users.destroy', $user));

    $response->assertRedirect(route('users.index'));
    $this->assertDatabaseMissing('users', ['id' => $user->id]);
});
