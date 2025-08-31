<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;


class PostsTableSeeder extends Seeder
{
    
    public function run(): void
    {
        
  

        $posts = [
            [
               
                'location' => 'Sardegna, Italia',
                'description' => 'Una giornata perfetta al mare, acqua cristallina e relax totale.',
                'mood' => 'rilassato',
                'positive' => 'La pace del mare e il suono delle onde.',
                'negative' => 'Troppa folla nel pomeriggio.',
                'physical_effort' => 2,
                'economic_effort' => 3,
                'cost' => 45.00,
                'tags' => 'mare, relax, estate',
            ],
            [
              
                'location' => 'Dolomiti, Italia',
                'description' => 'Escursione impegnativa ma mozzafiato in cima alle Tre Cime.',
                'mood' => 'emozionato',
                'positive' => 'La vista spettacolare una volta raggiunta la vetta.',
                'negative' => 'La fatica e il sole a picco.',
                'physical_effort' => 5,
                'economic_effort' => 2,
                'cost' => 20.00,
                'tags' => 'montagna, trekking, natura',
            ],
            [
                
                'location' => 'Firenze, Italia',
                'description' => 'Visita alla Galleria degli Uffizi, arte ovunque!',
                'mood' => 'felice',
                'positive' => 'L’incredibile patrimonio culturale.',
                'negative' => 'Fila d’ingresso lunga e poco organizzata.',
                'physical_effort' => 1,
                'economic_effort' => 4,
                'cost' => 30.00,
                'tags' => 'arte, cultura, città',
            ],
        ];

        foreach ($posts as $post) {
            $newPost = new Post();

            // $newPost->media = $data['media'];
            $newPost->location = $post['location'];
            $newPost->description = $post['description'];
            $newPost->mood = $post['mood'];
            $newPost->positive = $post['positive'];
            $newPost->negative = $post['negative'];
            $newPost->physical_effort = $post['physical_effort'];
            $newPost->economic_effort = $post['economic_effort'];
            $newPost->cost = $post['cost'];
            $newPost->tags = $post['tags'];
            $newPost->save();
        }
    }
}
