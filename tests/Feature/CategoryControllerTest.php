<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('exibe a lista de categorias', function () {
    $categories = Category::factory()->count(3)->create();

    $response = $this->get(route('categories.index'));

    $response->assertStatus(200);
    $response->assertViewIs('categories.index');
    $response->assertViewHas('categories', function ($viewCategories) use ($categories) {
        return $viewCategories->count() === 3;
    });
});

it('exibe o formulário de criação de categoria', function () {
    $response = $this->get(route('categories.create'));

    $response->assertStatus(200);
    $response->assertViewIs('categories.create');
});

it('cria uma nova categoria', function () {
    $data = ['name' => 'New Category'];

    $response = $this->post(route('categories.store'), $data);

    $response->assertRedirect(route('categories.index'));
    $this->assertDatabaseHas('categories', $data);
});

it('exibe uma categoria específica', function () {
    $category = Category::factory()->create();

    $response = $this->get(route('categories.show', $category));

    $response->assertStatus(200);
    $response->assertViewIs('categories.show');
    $response->assertViewHas('category', $category);
});

it('exibe o formulário de edição de uma categoria', function () {
    $category = Category::factory()->create();

    $response = $this->get(route('categories.edit', $category));

    $response->assertStatus(200);
    $response->assertViewIs('categories.edit');
    $response->assertViewHas('category', $category);
});

it('atualiza uma categoria existente', function () {
    $category = Category::factory()->create(['name' => 'Old Name']);
    $data = ['name' => 'Updated Name'];

    $response = $this->put(route('categories.update', $category), $data);

    $response->assertRedirect(route('categories.index'));
    $this->assertDatabaseHas('categories', $data);
});

it('deleta uma categoria', function () {
    $category = Category::factory()->create();

    $response = $this->delete(route('categories.destroy', $category));

    $response->assertRedirect(route('categories.index'));
    $this->assertSoftDeleted('categories', ['id' => $category->id]);
});
