<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\VisitController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\WebsiteController;


Route::get('/', [WebsiteController::class, 'home'])->name('home');

Route::get('/sobre', [WebsiteController::class, 'sobre'])->name('sobre');

Route::get('/colecoes', function () {
    return view('colecoes');
})->name('colecoes');


Route::post('/agendar-visita/store', [VisitController::class, 'store'])->name('visits.store');

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


Route::get('/eventos', [WebsiteController::class, 'eventos'])->name('eventos');
Route::get('/eventos/{slug}', [WebsiteController::class, 'eventosShow'])->name('eventoShow');

Route::get('/contactos', function () {
    return view('contactos');
})->name('contactos');

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

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// =============================================
// ROTAS DO PAINEL ADMINISTRATIVO
// =============================================



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
    Route::patch('visits/{visit}/confirm', [VisitController::class, 'confirm'])->name('visits.confirm');
    Route::patch('visits/{visit}/cancel', [VisitController::class, 'cancel'])->name('visits.cancel');
    Route::patch('visits/{visit}/complete', [VisitController::class, 'complete'])->name('visits.complete');
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
