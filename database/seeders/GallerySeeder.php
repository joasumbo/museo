<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Arqueologia',
                'slug' => 'arqueologia',
                'description' => 'Coleção de artefactos arqueológicos que documentam 45 mil anos de história no território de Alcanena, desde o Paleolítico até à Idade Moderna.',
                'image' => null,
                'order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Arte Sacra',
                'slug' => 'arte-sacra',
                'description' => 'Coleção de arte religiosa que inclui esculturas, pinturas e objetos litúrgicos do património religioso do concelho.',
                'image' => null,
                'order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Etnografia',
                'slug' => 'etnografia',
                'description' => 'Objetos e ferramentas que testemunham as práticas quotidianas, tradições e modos de vida das populações locais ao longo dos tempos.',
                'image' => null,
                'order' => 3,
                'is_active' => true
            ],
            [
                'title' => 'Cerâmica de Bordalo Pinheiro',
                'slug' => 'ceramica-bordalo-pinheiro',
                'description' => 'Peças de cerâmica do reconhecido artista Rafael Bordalo Pinheiro, incluindo obras satíricas e decorativas que marcaram a arte portuguesa.',
                'image' => null,
                'order' => 4,
                'is_active' => true
            ],
            [
                'title' => 'História Local',
                'slug' => 'historia-local',
                'description' => 'Documentos, fotografias e objetos que contam a história do concelho de Alcanena e das suas gentes.',
                'image' => null,
                'order' => 5,
                'is_active' => true
            ],
            [
                'title' => 'Paleontologia',
                'slug' => 'paleontologia',
                'description' => 'Fósseis e vestígios paleontológicos encontrados na região, testemunhos da vida pré-histórica no território.',
                'image' => null,
                'order' => 6,
                'is_active' => true
            ]
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
