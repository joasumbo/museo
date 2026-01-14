<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Models\Gallery;

Route::get('/', function () {
    // Buscar próximos 3 eventos ativos, ordenados por data
    $upcomingEvents = Event::where('is_active', true)
        ->where('start_date', '>=', now())
        ->orderBy('start_date', 'asc')
        ->limit(3)
        ->get();
    
    // Buscar exposições em destaque
    $featuredExhibitions = Event::where('is_active', true)
        ->where('is_featured', true)
        ->where('type', 'exhibition')
        ->orderBy('start_date', 'desc')
        ->limit(3)
        ->get();
    
    return view('home', compact('upcomingEvents', 'featuredExhibitions'));
})->name('home');

Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

Route::get('/colecoes', function () {
    $galleries = Gallery::where('is_active', true)
        ->orderBy('order', 'asc')
        ->get();
    
    // Buscar galeria mais recente com imagem para o background
    $latestGallery = Gallery::where('is_active', true)
        ->whereNotNull('image')
        ->orderBy('created_at', 'desc')
        ->first();
    
    return view('colecoes', compact('galleries', 'latestGallery'));
})->name('colecoes');

Route::get('/colecoes/{slug}', function ($slug) {
    // Dados de exemplo - depois virá do banco de dados
    $colecoes = [
        'arqueologia' => [
            'titulo' => 'Arqueologia',
            'slug' => 'arqueologia',
            'badge' => 'Coleção Permanente',
            'descricao_curta' => 'Do Paleolítico à Idade Moderna - 45 mil anos de história preservados em cada artefacto',
            'imagem_hero' => 'assets/img/gallery/DSC_3932.jpg',
            'texto_completo' => 'A coleção de arqueologia do Museu Municipal de Alcanena representa um dos mais significativos conjuntos patrimoniais da região, documentando 45 mil anos de presença humana no território.

Desde as primeiras ocupações paleolíticas até aos vestígios da Idade Moderna, cada peça conta uma história sobre a evolução das sociedades humanas que habitaram este espaço ao longo dos milénios.

O acervo inclui instrumentos em pedra lascada e polida, cerâmicas de diversos períodos históricos, objetos metálicos, moedas, e outros artefactos que testemunham as práticas quotidianas, económicas e rituais das comunidades que aqui viveram.

Esta coleção é resultado de décadas de investigação arqueológica sistemática no concelho, envolvendo escavações, prospeções e estudos científicos que continuam a revelar novos dados sobre o passado remoto de Alcanena.',
            'galeria' => [
                ['url' => 'assets/img/gallery/DSC_3932.jpg', 'titulo' => 'Sala de Arqueologia'],
                ['url' => 'assets/img/gallery/DSC_3946.jpg', 'titulo' => 'Vitrines com artefactos'],
                ['url' => 'assets/img/gallery/DSC_3950.jpg', 'titulo' => 'Cerâmica antiga'],
                ['url' => 'assets/img/exhibition/mma_1.jpg', 'titulo' => 'Instrumentos líticos'],
            ],
            'destaques' => [
                [
                    'icone' => 'fas fa-mountain',
                    'titulo' => 'Paleolítico',
                    'descricao' => 'Instrumentos em pedra lascada com mais de 40 mil anos, evidenciando as primeiras ocupações humanas na região.'
                ],
                [
                    'icone' => 'fas fa-coins',
                    'titulo' => 'Período Romano',
                    'descricao' => 'Moedas, cerâmicas e objetos metálicos que atestam a presença romana no território de Alcanena.'
                ],
                [
                    'icone' => 'fas fa-chess-rook',
                    'titulo' => 'Idade Média',
                    'descricao' => 'Vestígios medievais que documentam a organização social e económica da região durante este período.'
                ],
                [
                    'icone' => 'fas fa-microscope',
                    'titulo' => 'Investigação Científica',
                    'descricao' => 'Coleção em constante crescimento através de escavações arqueológicas e estudos científicos.'
                ],
            ],
            'info' => [
                ['label' => 'Período', 'valor' => 'Paleolítico - Idade Moderna'],
                ['label' => 'Nº de Peças', 'valor' => 'Mais de 5.000 artefactos'],
                ['label' => 'Tipo', 'valor' => 'Coleção Permanente'],
                ['label' => 'Origem', 'valor' => 'Concelho de Alcanena'],
            ]
        ],
        'curtumes' => [
            'titulo' => 'Curtumes',
            'slug' => 'curtumes',
            'badge' => '⭐ Única no País',
            'descricao_curta' => 'Especificidade técnica, científica e industrial incomparável - um testemunho vivo da história industrial de Alcanena',
            'imagem_hero' => 'assets/img/portfolio/mma_portfolio_2.jpg',
            'texto_completo' => 'A coleção de curtumes do Museu Municipal de Alcanena é única em Portugal pela sua especificidade técnica, científica e industrial.

Alcanena foi um dos principais centros de curtumes em Portugal durante o século XX, e esta coleção preserva a memória de uma indústria que marcou profundamente a identidade do concelho e a vida de várias gerações.

O acervo inclui máquinas, ferramentas, produtos químicos, documentação técnica e empresarial, fotografias e testemunhos orais que reconstituem todo o processo de transformação da pele em couro.

Esta é uma coleção viva que documenta não apenas os aspectos técnicos da produção, mas também as condições de trabalho, a organização social das fábricas e o impacto económico desta indústria na região.

A preservação deste património industrial é fundamental para compreender a história económica e social de Alcanena no século XX.',
            'galeria' => [
                ['url' => 'assets/img/portfolio/mma_portfolio_2.jpg', 'titulo' => 'Máquinas industriais'],
                ['url' => 'assets/img/gallery/DSC_3958.jpg', 'titulo' => 'Ferramentas de curtumes'],
                ['url' => 'assets/img/exhibition/mma_2.jpg', 'titulo' => 'Processo de curtição'],
                ['url' => 'assets/img/gallery/DSC_3961.jpg', 'titulo' => 'Documentação histórica'],
            ],
            'destaques' => [
                [
                    'icone' => 'fas fa-industry',
                    'titulo' => 'Património Industrial',
                    'descricao' => 'Única coleção em Portugal dedicada exclusivamente à indústria dos curtumes e seus processos.'
                ],
                [
                    'icone' => 'fas fa-cog',
                    'titulo' => 'Maquinaria Original',
                    'descricao' => 'Máquinas e equipamentos originais utilizados nas fábricas de curtumes de Alcanena.'
                ],
                [
                    'icone' => 'fas fa-users',
                    'titulo' => 'Memória Social',
                    'descricao' => 'Testemunhos e fotografias que documentam a vida dos trabalhadores e suas famílias.'
                ],
                [
                    'icone' => 'fas fa-flask',
                    'titulo' => 'Processos Técnicos',
                    'descricao' => 'Documentação completa dos processos químicos e técnicos de curtição do couro.'
                ],
            ],
            'info' => [
                ['label' => 'Período', 'valor' => 'Século XX'],
                ['label' => 'Especificidade', 'valor' => 'Única no país'],
                ['label' => 'Tipo', 'valor' => 'Património Industrial'],
                ['label' => 'Origem', 'valor' => 'Fábricas de Alcanena'],
            ]
        ],
        'historia-local' => [
            'titulo' => 'História Local',
            'slug' => 'historia-local',
            'badge' => 'Coleção Permanente',
            'descricao_curta' => 'Etnografia regional - Da "Rata Cega" aos utensílios de Minde',
            'imagem_hero' => 'assets/img/portfolio/mma_portfolio_3.jpg',
            'texto_completo' => 'A coleção de História Local reúne o património etnográfico e cultural que define a identidade das comunidades de Alcanena.

Desde a emblemática "Rata Cega" - o moinho de sangue que se tornou símbolo do concelho - até aos utensílios tradicionais de Minde, esta coleção documenta as práticas, saberes e modos de vida das populações locais.

O acervo inclui instrumentos agrícolas, objetos de uso doméstico, trajes tradicionais, alfaias religiosas, documentação histórica e fotográfica que reconstituem o quotidiano das gentes de Alcanena ao longo dos séculos XIX e XX.

Particular destaque para os utensílios e ferramentas relacionados com as atividades económicas tradicionais: agricultura, pastorícia, olaria e pequenas indústrias locais.

Esta coleção é essencial para compreender as transformações sociais e económicas que marcaram a passagem de uma sociedade rural tradicional para a modernidade industrial.',
            'galeria' => [
                ['url' => 'assets/img/portfolio/mma_portfolio_3.jpg', 'titulo' => 'Sala de etnografia'],
                ['url' => 'assets/img/gallery/DSC_3961.jpg', 'titulo' => 'Utensílios tradicionais'],
                ['url' => 'assets/img/exhibition/mma_3.jpg', 'titulo' => 'Objetos de uso quotidiano'],
                ['url' => 'assets/img/gallery/DSC_3950.jpg', 'titulo' => 'Instrumentos agrícolas'],
            ],
            'destaques' => [
                [
                    'icone' => 'fas fa-dharmachakra',
                    'titulo' => 'Rata Cega',
                    'descricao' => 'O emblemático moinho de sangue, símbolo da engenhosidade e trabalho das gentes de Alcanena.'
                ],
                [
                    'icone' => 'fas fa-hammer',
                    'titulo' => 'Utensílios de Minde',
                    'descricao' => 'Ferramentas e objetos que documentam as atividades económicas tradicionais da freguesia.'
                ],
                [
                    'icone' => 'fas fa-tractor',
                    'titulo' => 'Agricultura',
                    'descricao' => 'Instrumentos e alfaias agrícolas que testemunham as práticas rurais tradicionais.'
                ],
                [
                    'icone' => 'fas fa-home',
                    'titulo' => 'Vida Quotidiana',
                    'descricao' => 'Objetos de uso doméstico que reconstituem o dia-a-dia das famílias locais.'
                ],
            ],
            'info' => [
                ['label' => 'Período', 'valor' => 'Séculos XIX e XX'],
                ['label' => 'Âmbito', 'valor' => 'Etnografia Regional'],
                ['label' => 'Tipo', 'valor' => 'Coleção Permanente'],
                ['label' => 'Origem', 'valor' => 'Concelho de Alcanena'],
            ]
        ],
    ];

    // Verificar se a coleção existe
    if (!isset($colecoes[$slug])) {
        abort(404);
    }

    $colecao = $colecoes[$slug];

    // Outras coleções (excluindo a atual)
    $outras_colecoes = [];
    foreach ($colecoes as $key => $col) {
        if ($key !== $slug) {
            $outras_colecoes[] = [
                'titulo' => $col['titulo'],
                'slug' => $col['slug']
            ];
        }
    }

    return view('colecao-detalhes', compact('colecao', 'outras_colecoes'));
})->name('colecao.detalhes');

Route::get('/galeria', function () {
    return view('galeria');
})->name('galeria');

Route::get('/eventos', function () {
    // Buscar todos os eventos ativos do banco de dados
    $events = Event::where('is_active', true)
        ->orderBy('start_date', 'desc')
        ->get();
    
    return view('eventos', compact('events'));
})->name('eventos');

// Detalhes de Evento da BD (DEVE VIR ANTES das rotas com slug hardcoded)
Route::get('/evento/{slug}', function ($slug) {
    $event = Event::where('is_active', true)
        ->where('slug', $slug)
        ->firstOrFail();
    
    return view('evento-detalhes-bd', compact('event'));
})->name('evento.detalhes.bd');

Route::get('/eventos/{slug}', function ($slug) {
    // Todos os eventos disponíveis
    $todos_eventos = [
        'exposicao-arqueologia-45mil-anos' => [
            'titulo' => '45 Mil Anos de História',
            'slug' => 'exposicao-arqueologia-45mil-anos',
            'tipo' => 'Exposição Permanente',
            'status' => 'A decorrer',
            'descricao_curta' => 'Viagem fascinante desde o Paleolítico até à Idade Moderna através dos vestígios arqueológicos encontrados em Alcanena.',
            'descricao_completa' => 'Esta exposição permanente apresenta o extraordinário património arqueológico de Alcanena, documentando 45 mil anos de presença humana no território.

Através de uma seleção criteriosa de artefactos, o visitante é conduzido numa viagem temporal que se inicia nas primeiras ocupações paleolíticas e atravessa os diversos períodos da pré-história e história, até aos tempos modernos.

A exposição está organizada cronologicamente, permitindo compreender a evolução das sociedades humanas que habitaram este território. Cada período é ilustrado com peças originais, painéis explicativos, reconstituições e recursos multimédia que contextualizam os achados arqueológicos.

Destaque para os instrumentos em pedra lascada do Paleolítico, as cerâmicas neolíticas, os objetos metálicos da Idade do Bronze e do Ferro, os vestígios da presença romana, e os testemunhos medievais e modernos.

Esta coleção é fruto de décadas de investigação arqueológica sistemática no concelho, envolvendo escavações, prospeções e estudos científicos que continuam a revelar novos dados sobre o passado remoto de Alcanena.',
            'imagem' => 'assets/img/exhibition/mma_1.jpg',
            'data' => 'Permanente',
            'horario' => 'Verão: 10h-13h | 14h-18h / Inverno: 9h-12h30 | 14h-17h30',
            'horario_funcionamento' => 'Quarta a Domingo | Horário de Verão (Abr-Set): 10h-13h e 14h-18h | Horário de Inverno (Out-Mar): 9h-12h30 e 14h-17h30',
            'localizacao' => 'Piso 1 - Sala de Arqueologia',
            'entrada' => 'Gratuita',
            'curador' => 'Dr. João Silva, Arqueólogo',
            'parceiros' => 'Câmara Municipal de Alcanena, Direção Geral do Património Cultural',
            'galeria' => [
                ['url' => 'assets/img/gallery/DSC_3932.jpg', 'titulo' => 'Vista geral da exposição'],
                ['url' => 'assets/img/gallery/DSC_3946.jpg', 'titulo' => 'Vitrines com artefactos'],
                ['url' => 'assets/img/gallery/DSC_3950.jpg', 'titulo' => 'Cerâmicas antigas'],
                ['url' => 'assets/img/exhibition/mma_1.jpg', 'titulo' => 'Instrumentos líticos'],
            ],
            'destaques' => [
                [
                    'icone' => 'fas fa-gem',
                    'titulo' => 'Peças Únicas',
                    'descricao' => 'Artefactos raros e únicos encontrados exclusivamente no território de Alcanena.'
                ],
                [
                    'icone' => 'fas fa-book-reader',
                    'titulo' => 'Painéis Informativos',
                    'descricao' => 'Informação detalhada sobre cada período histórico e contexto dos achados.'
                ],
                [
                    'icone' => 'fas fa-vr-cardboard',
                    'titulo' => 'Recursos Multimédia',
                    'descricao' => 'Vídeos e conteúdos interativos que complementam a experiência da visita.'
                ],
                [
                    'icone' => 'fas fa-users',
                    'titulo' => 'Visitas Guiadas',
                    'descricao' => 'Visitas guiadas gratuitas aos sábados às 15h00 (mediante marcação prévia).'
                ],
            ],
            'objetivos' => 'Esta exposição tem como objetivo dar a conhecer ao público a riqueza do património arqueológico de Alcanena, sensibilizando para a importância da preservação e estudo do nosso passado comum.

Pretende-se criar uma consciência histórica que permita aos visitantes compreender as raízes culturais da região e valorizar o legado deixado pelas gerações que nos precederam.'
        ],
        'exposicao-curtumes-memoria-industrial' => [
            'titulo' => 'Curtumes: Memória Industrial',
            'slug' => 'exposicao-curtumes-memoria-industrial',
            'tipo' => 'Exposição Permanente',
            'status' => 'A decorrer',
            'descricao_curta' => 'A única exposição em Portugal dedicada à indústria dos curtumes, com maquinaria original e testemunhos de trabalhadores.',
            'descricao_completa' => 'Esta exposição única em Portugal é dedicada à memória da indústria dos curtumes que marcou profundamente a identidade de Alcanena durante o século XX.

Alcanena foi um dos principais centros de produção de couro em Portugal, e esta indústria empregou centenas de trabalhadores, moldando a vida económica e social do concelho durante várias décadas.

A exposição apresenta maquinaria e equipamentos originais utilizados nas fábricas, reconstituindo todo o processo de transformação da pele em couro. O visitante pode conhecer as diferentes fases da curtição, desde a preparação das peles até ao produto final.

Para além dos aspectos técnicos, a exposição documenta também as condições de trabalho, a organização social das fábricas e o impacto económico desta indústria na região. Testemunhos orais de antigos trabalhadores, fotografias históricas e documentação empresarial completam esta narrativa.

Esta é uma coleção viva que preserva não apenas máquinas e processos, mas sobretudo a memória de quem trabalhou nos curtumes e das famílias que dependiam desta indústria.',
            'imagem' => 'assets/img/portfolio/mma_portfolio_2.jpg',
            'data' => 'Permanente',
            'horario' => 'Verão: 10h-13h | 14h-18h / Inverno: 9h-12h30 | 14h-17h30',
            'horario_funcionamento' => 'Quarta a Domingo | Horário de Verão (Abr-Set): 10h-13h e 14h-18h | Horário de Inverno (Out-Mar): 9h-12h30 e 14h-17h30',
            'localizacao' => 'Piso 2 - Sala dos Curtumes',
            'entrada' => 'Gratuita',
            'curador' => 'Eng. Manuel Fernandes, Especialista em Património Industrial',
            'parceiros' => 'Associação de Antigos Trabalhadores dos Curtumes, Câmara Municipal de Alcanena',
            'galeria' => [
                ['url' => 'assets/img/portfolio/mma_portfolio_2.jpg', 'titulo' => 'Maquinaria industrial'],
                ['url' => 'assets/img/gallery/DSC_3958.jpg', 'titulo' => 'Ferramentas de curtumes'],
                ['url' => 'assets/img/exhibition/mma_2.jpg', 'titulo' => 'Processo de curtição'],
                ['url' => 'assets/img/gallery/DSC_3961.jpg', 'titulo' => 'Fotografias históricas'],
            ],
            'destaques' => [
                [
                    'icone' => 'fas fa-industry',
                    'titulo' => 'Maquinaria Original',
                    'descricao' => 'Equipamentos e máquinas originais das fábricas de curtumes de Alcanena.'
                ],
                [
                    'icone' => 'fas fa-camera-retro',
                    'titulo' => 'Arquivo Fotográfico',
                    'descricao' => 'Centenas de fotografias históricas documentando o dia-a-dia nas fábricas.'
                ],
                [
                    'icone' => 'fas fa-microphone',
                    'titulo' => 'Testemunhos Orais',
                    'descricao' => 'Gravações de entrevistas com antigos trabalhadores partilhando as suas memórias.'
                ],
                [
                    'icone' => 'fas fa-award',
                    'titulo' => 'Exposição Única',
                    'descricao' => 'A única coleção em Portugal dedicada exclusivamente aos curtumes.'
                ],
            ],
            'objetivos' => 'Preservar e divulgar a memória da indústria dos curtumes de Alcanena, valorizando o trabalho e o conhecimento de quem nela trabalhou.

Através desta exposição, pretendemos que as novas gerações conheçam esta parte fundamental da história económica e social do concelho, mantendo viva a memória de uma indústria que tanto marcou Alcanena.'
        ],
        'exposicao-historia-local-etnografia' => [
            'titulo' => 'História Local e Etnografia',
            'slug' => 'exposicao-historia-local-etnografia',
            'tipo' => 'Exposição Permanente',
            'status' => 'A decorrer',
            'descricao_curta' => 'Da "Rata Cega" aos utensílios tradicionais de Minde - o quotidiano das gentes de Alcanena nos séculos XIX e XX.',
            'descricao_completa' => 'Esta exposição reúne o património etnográfico que define a identidade das comunidades de Alcanena, documentando os modos de vida tradicionais dos séculos XIX e XX.

O percurso expositivo inicia-se com a emblemática "Rata Cega", o moinho de sangue que se tornou símbolo do concelho. Esta estrutura, movida por tração animal, representa a engenhosidade das populações rurais na transformação dos recursos agrícolas.

A exposição apresenta ainda uma vasta coleção de utensílios tradicionais, com destaque para os instrumentos agrícolas, alfaias, ferramentas de ofícios tradicionais e objetos de uso doméstico que reconstituem o quotidiano das famílias locais.

Particular atenção é dada aos utensílios de Minde, documentando as atividades económicas tradicionais: agricultura, pastorícia, olaria e pequenas indústrias locais.

Completam a exposição trajes tradicionais, alfaias religiosas, documentação histórica e fotográfica que ilustram as transformações sociais e económicas que marcaram a passagem de uma sociedade rural tradicional para a modernidade.',
            'imagem' => 'assets/img/portfolio/mma_portfolio_3.jpg',
            'data' => 'Permanente',
            'horario' => '14h00 - 18h00',
            'horario_funcionamento' => 'Terça a Domingo: 14h00 - 18h00',
            'localizacao' => 'Piso 0 - Sala de Etnografia',
            'entrada' => 'Gratuita',
            'curador' => 'Dr.ª Maria Santos, Antropóloga',
            'parceiros' => 'Juntas de Freguesia de Alcanena e Minde, Associações Locais',
            'galeria' => [
                ['url' => 'assets/img/portfolio/mma_portfolio_3.jpg', 'titulo' => 'Sala de etnografia'],
                ['url' => 'assets/img/gallery/DSC_3961.jpg', 'titulo' => 'Utensílios tradicionais'],
                ['url' => 'assets/img/exhibition/mma_3.jpg', 'titulo' => 'Objetos quotidianos'],
                ['url' => 'assets/img/gallery/DSC_3950.jpg', 'titulo' => 'Instrumentos agrícolas'],
            ],
            'destaques' => [
                [
                    'icone' => 'fas fa-dharmachakra',
                    'titulo' => 'Rata Cega',
                    'descricao' => 'O emblemático moinho de sangue, símbolo de Alcanena e da engenhosidade rural.'
                ],
                [
                    'icone' => 'fas fa-hammer',
                    'titulo' => 'Ofícios Tradicionais',
                    'descricao' => 'Ferramentas e instrumentos de trabalho de ofícios já desaparecidos.'
                ],
                [
                    'icone' => 'fas fa-home',
                    'titulo' => 'Vida Doméstica',
                    'descricao' => 'Objetos que reconstituem o interior das casas tradicionais de Alcanena.'
                ],
                [
                    'icone' => 'fas fa-book',
                    'titulo' => 'Documentos Históricos',
                    'descricao' => 'Arquivo fotográfico e documental das transformações sociais do concelho.'
                ],
            ],
            'objetivos' => 'Preservar e divulgar o património etnográfico de Alcanena, valorizando as práticas, saberes e modos de vida tradicionais das comunidades locais.

Esta exposição pretende criar pontes entre gerações, permitindo que os mais jovens conheçam as raízes culturais do concelho e que os mais velhos revivam memórias e reconheçam o valor do seu próprio património cultural.'
        ],
    ];

    // Verificar se o evento existe
    if (!isset($todos_eventos[$slug])) {
        abort(404);
    }

    $evento = $todos_eventos[$slug];

    // Outros eventos (excluindo o atual)
    $outros_eventos = [];
    $count = 0;
    foreach ($todos_eventos as $key => $evt) {
        if ($key !== $slug && $count < 3) {
            $outros_eventos[] = $evt;
            $count++;
        }
    }

    return view('evento-detalhes', compact('evento', 'outros_eventos'));
})->name('evento.detalhes');

Route::get('/contactos', function () {
    return view('contactos');
})->name('contactos');

Route::post('/contactos', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    \App\Models\Contact::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'] ?? null,
        'subject' => $validated['subject'],
        'message' => $validated['message'],
        'status' => 'unread',
    ]);

    return redirect()->route('contactos')->with('success', 'Mensagem enviada com sucesso! Entraremos em contacto em breve.');
})->name('contactos.store');

Route::post('/agendar-visita', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'organization' => 'nullable|string|max:255',
        'visit_date' => 'required|date|after:today',
        'preferred_time' => 'required',
        'visit_type' => 'required|in:individual,group,school,guided',
        'group_size' => 'required|integer|min:1',
        'special_requests' => 'nullable|string',
    ]);

    \App\Models\Visit::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'] ?? null,
        'organization' => $validated['organization'] ?? null,
        'visit_date' => $validated['visit_date'],
        'visit_time' => $validated['preferred_time'],
        'visit_type' => $validated['visit_type'],
        'number_of_people' => $validated['group_size'],
        'notes' => $validated['special_requests'] ?? null,
        'status' => 'pending',
    ]);

    return redirect()->route('agendar.visita')->with('success', 'Pedido de visita enviado com sucesso! Entraremos em contacto em breve para confirmar.');
})->name('visits.store');

Route::get('/horarios', function () {
    $currentSeason = \App\Models\Schedule::getCurrentSeason();
    $schedules = \App\Models\Schedule::bySeason($currentSeason)
        ->where('is_open', true)
        ->orderByRaw("FIELD(day_of_week, 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday')")
        ->get();
    
    return view('horarios', compact('schedules', 'currentSeason'));
})->name('horarios');

Route::get('/agendar-visita', function () {
    $evento_id = request()->get('evento');
    
    // Buscar evento da BD se fornecido
    $eventoSelecionado = null;
    if ($evento_id) {
        $eventoSelecionado = Event::find($evento_id);
    }
    
    // Buscar eventos ativos disponíveis para agendamento
    $eventos_bd = Event::where('is_active', true)
        ->where('start_date', '>=', now())
        ->orderBy('start_date', 'asc')
        ->get();
    
    // Eventos fixos (exposições permanentes)
    $eventos_permanentes = [
        [
            'id' => 'perm-1',
            'titulo' => '45 Mil Anos de História',
            'tipo' => 'Exposição Permanente',
            'badge' => 'ARQUEOLOGIA',
            'descricao_curta' => 'Viagem pelo tempo desde o Paleolítico até à Idade Moderna',
        ],
        [
            'id' => 'perm-2',
            'titulo' => 'Curtumes: Memória Industrial',
            'tipo' => 'Exposição Permanente',
            'badge' => 'PATRIMÓNIO INDUSTRIAL',
            'descricao_curta' => 'A única coleção em Portugal dedicada aos curtumes',
        ],
        [
            'id' => 'perm-3',
            'titulo' => 'História Local e Etnografia',
            'tipo' => 'Exposição Permanente',
            'badge' => 'ETNOGRAFIA',
            'descricao_curta' => 'Da Rata Cega aos utensílios tradicionais de Minde',
        ],
    ];

    return view('agendar-visita', [
        'eventos_bd' => $eventos_bd,
        'eventos_permanentes' => $eventos_permanentes,
        'eventoSelecionado' => $eventoSelecionado,
        'evento_id_pre_selecionado' => $evento_id
    ]);
})->name('agendar.visita');

Route::get('/contactos', function () {
    return view('contactos');
})->name('contactos');

// =============================================
// ROTAS DO PAINEL ADMINISTRATIVO
// =============================================

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\VisitController;
use App\Http\Controllers\Admin\SettingsController;

// Autenticação
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Alias para rota de login (Laravel espera route('login'))
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Rotas protegidas do Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Eventos
    Route::get('events/calendar', [EventController::class, 'calendar'])->name('events.calendar');
    Route::get('events/calendar/data', [EventController::class, 'calendarData'])->name('events.calendar.data');
    Route::resource('events', EventController::class);
    Route::post('events/{event}/toggle-active', [EventController::class, 'toggleActive'])->name('events.toggle-active');
    Route::post('events/{event}/toggle-featured', [EventController::class, 'toggleFeatured'])->name('events.toggle-featured');

    // Horários
    Route::get('schedules', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::put('schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::post('schedules/batch', [ScheduleController::class, 'updateBatch'])->name('schedules.batch');

    // Contactos
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::post('contacts/{contact}/reply', [ContactController::class, 'reply'])->name('contacts.reply');
    Route::post('contacts/{contact}/archive', [ContactController::class, 'archive'])->name('contacts.archive');
    Route::post('contacts/{contact}/mark-read', [ContactController::class, 'markAsRead'])->name('contacts.mark-read');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::post('contacts/bulk', [ContactController::class, 'bulkAction'])->name('contacts.bulk');

    // Visitas
    Route::get('visits', [VisitController::class, 'index'])->name('visits.index');
    Route::get('visits/calendar', [VisitController::class, 'calendar'])->name('visits.calendar');
    Route::get('visits/{visit}', [VisitController::class, 'show'])->name('visits.show');
    Route::put('visits/{visit}', [VisitController::class, 'update'])->name('visits.update');
    Route::post('visits/{visit}/confirm', [VisitController::class, 'confirm'])->name('visits.confirm');
    Route::post('visits/{visit}/cancel', [VisitController::class, 'cancel'])->name('visits.cancel');
    Route::post('visits/{visit}/complete', [VisitController::class, 'complete'])->name('visits.complete');
    Route::delete('visits/{visit}', [VisitController::class, 'destroy'])->name('visits.destroy');

    // Configurações
    Route::get('settings/profile', [SettingsController::class, 'profile'])->name('settings.profile');
    Route::put('settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.profile.update');
    Route::get('settings/password', [SettingsController::class, 'password'])->name('settings.password');
    Route::put('settings/password', [SettingsController::class, 'updatePassword'])->name('settings.password.update');
    Route::get('settings/site', [SettingsController::class, 'site'])->name('settings.site');
    Route::put('settings/site', [SettingsController::class, 'updateSite'])->name('settings.site.update');

    // Gestão de Utilizadores (apenas admin)
    Route::get('settings/users', [SettingsController::class, 'users'])->name('settings.users');
    Route::get('settings/users/create', [SettingsController::class, 'createUser'])->name('settings.users.create');
    Route::post('settings/users', [SettingsController::class, 'storeUser'])->name('settings.users.store');
    Route::get('settings/users/{user}/edit', [SettingsController::class, 'editUser'])->name('settings.users.edit');
    Route::put('settings/users/{user}', [SettingsController::class, 'updateUser'])->name('settings.users.update');
    Route::delete('settings/users/{user}', [SettingsController::class, 'destroyUser'])->name('settings.users.destroy');
});