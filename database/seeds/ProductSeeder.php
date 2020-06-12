<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'name' => 'Risk',
            'excerpt' => 'Verover de wereld',
            'body' => 'Versla je vrienden en verover de wereld',
            'price' => 30,
            'stock' => 25,
            'image' => 'risk.jpeg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $category = Category::where('name', '=', 'wargame')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'boardgame')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'strategy game')->firstOrFail();
        $product->categories()->attach($category);
        $product = Product::create([
            'name' => 'spel kaarten',
            'excerpt' => 'spel kaarten',
            'body' => 'een spel kaarten',
            'price' => 3,
            'stock' => 55,
            'image' => 'kaarten.jpeg',
            'on_sale' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $category = Category::where('name', '=', 'cardgame')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'mind sport')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'strategy game')->firstOrFail();
        $product->categories()->attach($category);
        $product = Product::create([
            'name' => 'Dammen',
            'excerpt' => 'Vernietig je tegenstander',
            'body' => 'Versla je tegenstander en vernietig zijn stukken',
            'price' => 15,
            'stock' => 18,
            'image' => 'damspel.jpeg',
            'on_sale' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $category = Category::where('name', '=', 'boardgame')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'mind sport')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'strategy game')->firstOrFail();
        $product->categories()->attach($category);
        $product = Product::create([
            'name' => 'Schaken',
            'excerpt' => 'Vang de koning',
            'body' => 'Vang de koning van je tegenstander en bescherm je eigen koning',
            'price' => 18,
            'stock' => 28,
            'image' => 'schaken.jpeg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $category = Category::where('name', '=', 'boardgame')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'mind sport')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'strategy game')->firstOrFail();
        $product->categories()->attach($category);
        $product = Product::create([
            'name' => 'Go',
            'excerpt' => 'Beheers het grootste deel van het bord',
            'body' => 'Zorg dat je een groter deel van het bord beheerst dan je tegentander',
            'price' => 25,
            'stock' => 8,
            'image' => 'go.jpeg',
            'on_sale' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $category = Category::where('name', '=', 'boardgame')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'mind sport')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'strategy game')->firstOrFail();
        $product->categories()->attach($category);
        $product = Product::create([
            'name' => 'Bidding boxes',
            'excerpt' => 'Bidding boxes',
            'body' => '4 bidding boxes om te bieden',
            'price' => 21,
            'stock' => 28,
            'image' => 'bidding_box.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $category = Category::where('name', '=', 'cardgame')->firstOrFail();
        $product->categories()->attach($category);
        $product = Product::create([
            'name' => 'Pandemy',
            'excerpt' => 'Stop de wereldwijde pandemy',
            'body' => 'Stop het virus voordat deze de hele wereld heeft besmet',
            'price' => 45,
            'stock' => 65,
            'image' => 'virus.jpeg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $product = Product::create([
            'name' => 'Monopoly',
            'excerpt' => 'Koop de wereld',
            'body' => 'Versla je vrienden koop de wereld',
            'price' => 55,
            'stock' => 45,
            'image' => 'monopoly.jpeg',
            'on_sale' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $category = Category::where('name', '=', 'boardgame')->firstOrFail();
        $product->categories()->attach($category);
        $product = Product::create([
            'name' => 'Yahtzee',
            'excerpt' => 'verkrijg meer punten dan je tegenstander',
            'body' => 'Gooi goed met de dobbelstenen en verkrij zo veel mogelijk punten',
            'price' => 17,
            'stock' => 110,
            'image' => 'yahtzee.jpeg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $category = Category::where('name', '=', 'dicegame')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'computergame')->firstOrFail();
        $product->categories()->attach($category);
        $product = Product::create([
            'name' => 'Snooker tafel',
            'excerpt' => 'Snooker tafel om te snookeren',
            'body' => 'Snooker tafel met snooker ballen om te snookeren',
            'price' => 256,
            'stock' => 5,
            'image' => 'snooker.jpeg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $product = Product::create([
            'name' => 'Stratego',
            'excerpt' => 'Verover de vlag van je tegenstander',
            'body' => 'Zoek de vlag van je tegenstander en verover deze en bescherm je eigen vlag',
            'price' => 23,
            'stock' => 16,
            'image' => 'stratego.jpeg',
            'on_sale' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $category = Category::where('name', '=', 'boardgame')->firstOrFail();
        $product->categories()->attach($category);
        $category = Category::where('name', '=', 'wargame')->firstOrFail();
        $product->categories()->attach($category);
        $product = Product::create([
            'name' => 'Vier op een rij',
            'excerpt' => 'Maak vier op een rij',
            'body' => 'Maak vier op een rij voordat je tegenstander dat doet',
            'price' => 14,
            'stock' => 17,
            'image' => 'vier_op_een_rij.jpeg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $category = Category::where('name', '=', 'boardgame')->firstOrFail();
        $product->categories()->attach($category);
    }
}
