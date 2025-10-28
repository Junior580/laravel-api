<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('exibe a lista de produtos', function () {
    Product::factory()->count(3)->create();

    $response = $this->get(route('products.index'));

    $response->assertStatus(200);
    $response->assertViewIs('products.index');
});

it('exibe o formulário de criação de produto', function () {
    $response = $this->get(route('products.create'));

    $response->assertStatus(200);
    $response->assertViewIs('products.create');
});

it('cria um novo produto com dados válidos', function () {
    $category = Category::factory()->create();

    $response = $this->post(route('products.store'), [
        'name' => 'Notebook Gamer',
        'price' => 7500.00,
        'category_id' => $category->id,
    ]);

    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseHas('products', ['name' => 'Notebook Gamer']);
});

it('exibe a página de edição do produto', function () {
    $product = Product::factory()->create();

    $response = $this->get(route('products.edit', $product));

    $response->assertStatus(200);
    $response->assertViewIs('products.edit');
});

it('atualiza um produto existente', function () {
    $product = Product::factory()->create();

    $response = $this->put(route('products.update', $product), [
        'name' => 'Monitor 4K',
        'price' => 2500.00,
        'category_id' => $product->category_id,
    ]);

    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseHas('products', ['name' => 'Monitor 4K']);
});

it('deleta um produto', function () {
    $product = Product::factory()->create();

    $response = $this->delete(route('products.destroy', $product));

    $response->assertRedirect(route('products.index'));
    $this->assertSoftDeleted('products', ['id' => $product->id]);
});
