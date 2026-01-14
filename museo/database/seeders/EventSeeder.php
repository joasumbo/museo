<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Limpar eventos existentes
        Event::truncate();

        $events = [
            [
                'title' => 'Exposição: Memórias do Couro - A Indústria dos Curtumes em Alcanena',
                'slug' => 'exposicao-memorias-do-couro',
                'description' => 'Esta exposição permanente apresenta a história da indústria dos curtumes em Alcanena, uma atividade que marcou profundamente a identidade económica e social do concelho durante o século XX. 

Através de máquinas originais, ferramentas, produtos químicos, documentação técnica e empresarial, fotografias históricas e testemunhos orais de antigos trabalhadores, reconstituímos todo o processo de transformação da pele em couro.

A coleção documenta não apenas os aspectos técnicos da produção, mas também as condições de trabalho, a organização social das fábricas, os conflitos laborais e o impacto económico desta indústria na região. Inclui peças únicas como máquinas de descarne, fulões rotativos, medidores de pH, moldes de calçado e amostras de couro de diferentes qualidades.

Esta é uma coleção única em Portugal pela sua especificidade técnica, científica e industrial, sendo um testemunho vivo de um passado industrial que merece ser preservado e valorizado.',
                'short_description' => 'A história única da indústria dos curtumes que transformou Alcanena',
                'type' => 'exhibition',
                'image' => 'events/evento-1.jpg',
                'start_date' => now()->subDays(30)->format('Y-m-d'),
                'end_date' => now()->addMonths(6)->format('Y-m-d'),
                'start_time' => '09:30',
                'end_time' => '18:00',
                'location' => 'Sala de Exposições Permanentes - Piso 1',
                'is_active' => true,
                'is_featured' => true,
                'is_free' => true,
                'created_by' => 1,
            ],
            [
                'title' => 'Ateliê Didático: Cerâmica Pré-Histórica',
                'slug' => 'atelie-ceramica-pre-historica',
                'description' => 'Workshop prático dirigido a famílias e grupos escolares onde os participantes terão a oportunidade de experimentar as técnicas ancestrais de produção de cerâmica utilizadas pelas comunidades pré-históricas que habitaram o território de Alcanena.

Neste ateliê, os participantes irão:
• Conhecer os artefactos cerâmicos da coleção de arqueologia do museu
• Aprender sobre as técnicas de modelação manual (rolos, placas e pizzicato)
• Experimentar decorações típicas do Neolítico e Idade do Bronze
• Criar a sua própria peça cerâmica para levar para casa

A atividade é orientada por técnicos especializados em arqueologia experimental e educação patrimonial. Todos os materiais estão incluídos. Recomendado para idades a partir dos 8 anos. As crianças menores de 12 anos devem estar acompanhadas por um adulto.',
                'short_description' => 'Crie a sua própria cerâmica com técnicas pré-históricas',
                'type' => 'workshop',
                'image' => 'events/evento-2.jpg',
                'start_date' => now()->addDays(5)->format('Y-m-d'),
                'end_date' => now()->addDays(5)->format('Y-m-d'),
                'start_time' => '14:30',
                'end_time' => '17:00',
                'location' => 'Sala de Atividades Educativas',
                'is_active' => true,
                'is_featured' => true,
                'is_free' => false,
                'price' => 8.00,
                'max_capacity' => 20,
                'created_by' => 1,
            ],
            [
                'title' => 'Conferência: 45 Mil Anos de Ocupação Humana em Alcanena',
                'slug' => 'conferencia-45-mil-anos-alcanena',
                'description' => 'Sessão de apresentação dos resultados de quatro décadas de investigação arqueológica no concelho de Alcanena, a cargo do Dr. João Zilhão, arqueólogo e professor catedrático da Universidade de Barcelona, e da Dra. Teresa Aubry, investigadora do Instituto Politécnico de Tomar.

A conferência abordará os seguintes temas:
• As primeiras ocupações paleolíticas: caçadores-recolectores do Plistocénico
• O processo de neolitização: chegada da agricultura e pastorícia
• As comunidades metalúrgicas da Idade do Bronze e do Ferro
• A romanização do território: villas, villae e vias romanas
• O povoamento medieval: castelos, mosteiros e comunidades rurais
• Perspectivas futuras da investigação arqueológica na região

Após as apresentações, haverá um debate aberto com o público e uma visita guiada à coleção de arqueologia do museu. Entrada livre, mas com inscrição prévia obrigatória devido à lotação limitada do auditório.',
                'short_description' => 'Resultados de investigação arqueológica por especialistas',
                'type' => 'conference',
                'image' => 'events/evento-3.jpg',
                'start_date' => now()->addDays(12)->format('Y-m-d'),
                'end_date' => now()->addDays(12)->format('Y-m-d'),
                'start_time' => '18:00',
                'end_time' => '20:30',
                'location' => 'Auditório Municipal de Alcanena',
                'is_active' => true,
                'is_featured' => true,
                'is_free' => true,
                'max_capacity' => 80,
                'created_by' => 1,
            ],
            [
                'title' => 'Visita Guiada Especializada: Arqueologia do Maciço Calcário Estremenho',
                'slug' => 'visita-guiada-arqueologia-macico-calcario',
                'description' => 'Visita guiada aprofundada à coleção de arqueologia do Museu Municipal de Alcanena, com foco especial nos sítios arqueológicos do Maciço Calcário Estremenho, uma das regiões mais ricas em vestígios pré-históricos de Portugal.

Durante a visita, iremos explorar:

**Paleolítico Médio (100.000 - 40.000 anos):**
Instrumentos em pedra lascada de Neandertais, incluindo bifaces, raspadores e pontas Levallois encontrados em grutas e abrigos rochosos.

**Paleolítico Superior (40.000 - 10.000 anos):**
Artefactos dos primeiros Homo sapiens na região, com destaque para as indústrias líticas do Gravettense e Solutrense, incluindo pontas de seta, burís e lâminas.

**Neolítico (6.000 - 3.000 a.C.):**
Cerâmicas decoradas, machados polidos, mós, polidores e elementos de adorno pessoal que documentam as primeiras comunidades agrícolas.

**Calcolítico e Idade do Bronze (3.000 - 800 a.C.):**
Artefactos metálicos, punhais de cobre, machados de bronze, cerâmicas campaniformes e elementos arquitetónicos de monumentos megalíticos.

A visita é conduzida por arqueólogos e inclui manipulação de réplicas de artefactos. Duração aproximada: 90 minutos.',
                'short_description' => 'Explore os tesouros arqueológicos com um especialista',
                'type' => 'guided_tour',
                'image' => 'events/evento-4.jpg',
                'start_date' => now()->addDays(8)->format('Y-m-d'),
                'end_date' => now()->addDays(8)->format('Y-m-d'),
                'start_time' => '15:00',
                'end_time' => '16:30',
                'location' => 'Sala de Arqueologia - Coleção Permanente',
                'is_active' => true,
                'is_featured' => false,
                'is_free' => false,
                'price' => 5.00,
                'max_capacity' => 15,
                'created_by' => 1,
            ],
            [
                'title' => 'Noite Europeia dos Museus 2025',
                'slug' => 'noite-europeia-museus-2025',
                'description' => 'O Museu Municipal de Alcanena junta-se à 21ª edição da Noite Europeia dos Museus, uma iniciativa do Conselho da Europa e da Rede Portuguesa de Museus que visa promover o acesso à cultura e ao património.

**Programa Especial:**

18h00 - Abertura oficial e boas-vindas
18h30 - Visitas guiadas simultâneas a todas as coleções (duração: 45 min, partidas a cada 30 min)
19h30 - Performance musical: "Sons do Passado" - recriação de música medieval com instrumentos tradicionais
20h30 - Palestra curta: "Histórias secretas das peças do museu" (20 minutos)
21h00 - Visita teatralizada: "Memórias de um Curtidor" - dramatização com ator
22h00 - Jam session de música tradicional portuguesa no claustro
23h00 - Observação astronómica no jardim (clima permitindo)

**Atividades Paralelas:**
• Ateliês de desenho e pintura para crianças (18h-22h)
• Posto de fotografia com trajes históricos
• Degustação de doçaria conventual regional
• Bar com produtos locais

Entrada livre durante todo o evento. Todas as atividades são gratuitas. O museu estará aberto até às 24h00.',
                'short_description' => 'Uma noite mágica de cultura com entrada livre e atividades especiais',
                'type' => 'other',
                'image' => 'events/evento-5.jpg',
                'start_date' => now()->addDays(45)->format('Y-m-d'),
                'end_date' => now()->addDays(45)->format('Y-m-d'),
                'start_time' => '18:00',
                'end_time' => '00:00',
                'location' => 'Museu Municipal de Alcanena - Todo o edifício',
                'is_active' => true,
                'is_featured' => true,
                'is_free' => true,
                'created_by' => 1,
            ],
            [
                'title' => 'Workshop: Fotografia de Património Cultural',
                'slug' => 'workshop-fotografia-patrimonio',
                'description' => 'Workshop intensivo de fotografia dedicado ao registo e documentação do património cultural, ministrado pelo fotógrafo profissional Pedro Fernandes, especializado em fotografia de museus e património.

**Programa:**

Sessão Teórica (10h00-11h30):
• Introdução à fotografia de património: ética e boas práticas
• Equipamento essencial e alternativas económicas
• Iluminação natural vs artificial em espaços museológicos
• Composição e enquadramento de objetos tridimensionais
• Fotografia de vitrines e objetos protegidos por vidro
• Gestão de reflexos e brilhos indesejados

Prática Orientada (11h45-13h00):
• Exercícios práticos nas salas do museu
• Fotografia de diferentes tipos de artefactos (cerâmica, metais, têxteis)
• Criação de séries fotográficas coerentes
• Edição básica e tratamento de imagem (introdução)

Os participantes devem trazer a sua própria câmara (DSLR, mirrorless ou smartphone de boa qualidade). Todos os participantes receberão um certificado de participação e um guia digital com técnicas e recomendações.

Limite: 12 participantes para garantir acompanhamento personalizado.',
                'short_description' => 'Aprenda a fotografar artefactos e espaços patrimoniais profissionalmente',
                'type' => 'workshop',
                'image' => 'events/evento-6.jpg',
                'start_date' => now()->addDays(18)->format('Y-m-d'),
                'end_date' => now()->addDays(18)->format('Y-m-d'),
                'start_time' => '10:00',
                'end_time' => '13:00',
                'location' => 'Museu Municipal - Sala de Formação e Galerias',
                'is_active' => true,
                'is_featured' => false,
                'is_free' => false,
                'price' => 20.00,
                'max_capacity' => 12,
                'created_by' => 1,
            ],
            [
                'title' => 'Dia Internacional dos Museus - Portas Abertas',
                'slug' => 'dia-internacional-museus-2025',
                'description' => 'Celebração do Dia Internacional dos Museus (18 de maio), promovido anualmente pelo ICOM (International Council of Museums), com o tema de 2025: "Museus, Sustentabilidade e Bem-estar".

**Programa Completo:**

09h30 - Abertura oficial com a presença de entidades locais
10h00-13h00 - Visitas guiadas contínuas a todas as coleções (sem marcação prévia)
10h00-18h00 - Ateliês infantis: "Pequenos Museólogos" (idades 5-10 anos)
11h00 - Palestra: "O papel dos museus na educação ambiental" - Dra. Ana Costa
14h00 - Workshop: "Conservação preventiva: cuidar do património"
15h00 - Apresentação do projeto: "Museu Sustentável - Redução de Carbono"
16h00 - Visita técnica aos bastidores: reservas e laboratório de conservação (inscrição prévia)
17h00 - Mesa redonda: "Museus e comunidade: perspectivas futuras"

**Novidade:** Lançamento da nova aplicação móvel do museu com realidade aumentada para explorar as coleções de forma interativa.

Entrada livre durante todo o dia. Oferta de catálogo do museu aos primeiros 100 visitantes. Lembranças para todas as crianças. Cafetaria com produtos biológicos e locais.

Esta é uma excelente oportunidade para conhecer o trabalho diário do museu e descobrir áreas normalmente fechadas ao público.',
                'short_description' => 'Celebre o património com entrada livre e atividades para toda a família',
                'type' => 'other',
                'image' => 'events/evento-7.jpg',
                'start_date' => now()->addDays(147)->format('Y-m-d'),
                'end_date' => now()->addDays(147)->format('Y-m-d'),
                'start_time' => '09:30',
                'end_time' => '18:00',
                'location' => 'Museu Municipal de Alcanena',
                'is_active' => true,
                'is_featured' => true,
                'is_free' => true,
                'created_by' => 1,
            ],
            [
                'title' => 'Exposição Temporária: "Alcanena na I Guerra Mundial"',
                'slug' => 'exposicao-alcanena-i-guerra-mundial',
                'description' => 'Exposição temporária que documenta a participação de Alcanena na Primeira Guerra Mundial (1914-1918), através de fotografias, cartas, uniformes, condecorações e objetos pessoais de soldados alcanenenses que combateram nos vários teatros de operações.

**Núcleos Temáticos:**

1. **Antes da Guerra:**
Contexto político e social de Alcanena no início do século XX, relações internacionais e o caminho para o conflito.

2. **A Mobilização:**
Cartazes de recrutamento, listas de convocados, despedidas nas estações, o impacto nas famílias e na economia local.

3. **Nos Campos de Batalha:**
Cartas do front, diários de campanha, fotografias de trincheiras, equipamento militar, mapas de operações. Destaque para o Corpo Expedicionário Português em França e Flandres.

4. **A Retaguarda:**
O papel das mulheres, o esforço de guerra, racionamento, produção industrial, Hospital Militar de Alcanena.

5. **O Regresso e a Memória:**
Regressos, baixas, mutilados de guerra, monumentos aos combatentes, cerimónias de homenagem, memória coletiva.

A exposição inclui multimédia com testemunhos audiovisuais (gravações históricas), projeções de filmes da época e uma instalação imersiva que recria uma trincheira.

Visitas guiadas temáticas disponíveis mediante marcação. Material educativo para escolas.',
                'short_description' => 'A história dos alcanenenses na Grande Guerra através de objetos pessoais',
                'type' => 'exhibition',
                'image' => 'events/evento-8.jpg',
                'start_date' => now()->addDays(22)->format('Y-m-d'),
                'end_date' => now()->addDays(112)->format('Y-m-d'),
                'start_time' => '09:30',
                'end_time' => '18:00',
                'location' => 'Galeria de Exposições Temporárias - Piso 2',
                'is_active' => true,
                'is_featured' => true,
                'is_free' => true,
                'created_by' => 1,
            ],
            [
                'title' => 'Ciclo de Visitas: "Terras de Alcanena - Património Natural e Construído"',
                'slug' => 'ciclo-visitas-terras-alcanena',
                'description' => 'Programa de visitas guiadas mensais pelo concelho de Alcanena, explorando o rico património natural, arqueológico, arquitetónico e etnográfico do território, em parceria com a Câmara Municipal e associações locais.

**Calendário de Visitas (Sábados às 9h00):**

**Janeiro - Grutas da Serra de Aire:**
Visita às grutas com observação de formações cársicas, fósseis marinhos e explicação sobre a geologia do Maciço Calcário Estremenho. Inclui Centro de Interpretação.

**Fevereiro - Necrópole Medieval de Moncaz:**
Descoberta de vestígios medievais, igreja paroquial, estruturas funerárias e paisagem rural tradicional.

**Março - Fábrica dos Curtumes Peixeiro (ruínas industriais):**
Visita a uma antiga fábrica de curtumes preservada, com explicação sobre o processo produtivo e arquitectura industrial.

**Abril - Monumentos Megalíticos:**
Percurso arqueológico por antas, menires e estruturas neolíticas, com contextualização pré-histórica.

**Maio - Núcleo Urbano Histórico:**
Descoberta do centro histórico de Alcanena, arquitectura tradicional, fontes, solares e edifícios notáveis.

Cada visita tem duração aproximada de 3 horas, com transporte incluído (partida do museu). Recomenda-se calçado confortável e protetor solar. Água e seguro incluídos.

Inscrição obrigatória (máximo 25 participantes por visita). Série de 5 visitas com desconto de 20%.',
                'short_description' => 'Explore o património de Alcanena em visitas guiadas pelo concelho',
                'type' => 'guided_tour',
                'image' => 'events/evento-9.jpg',
                'start_date' => now()->addDays(30)->format('Y-m-d'),
                'end_date' => now()->addDays(30)->format('Y-m-d'),
                'start_time' => '09:00',
                'end_time' => '13:00',
                'location' => 'Saída do Museu Municipal (transporte incluído)',
                'is_active' => true,
                'is_featured' => false,
                'is_free' => false,
                'price' => 12.00,
                'max_capacity' => 25,
                'created_by' => 1,
            ],
            [
                'title' => 'Sarau Cultural: "Histórias e Lendas de Alcanena"',
                'slug' => 'sarau-cultural-historias-lendas',
                'description' => 'Noite de partilha de histórias, lendas e tradições orais de Alcanena, com contadores de histórias, música tradicional e sabores regionais, num ambiente intimista no claustro do museu.

**Programa da Noite:**

20h00 - **Recepção e Boas-vindas**
Acolhimento dos participantes com um cálice de vinho e petiscos regionais no jardim do museu.

20h30 - **Primeiro Acto: Lendas do Maciço Calcário**
Contador de histórias José Saramago partilha lendas ancestrais:
• A Lenda da Moura Encantada da Gruta
• O Tesouro dos Mouros da Serra
• A Fonte das Almas Penadas
• O Cavaleiro Fantasma do Castelo

21h15 - **Interlúdio Musical**
Grupo de Cavaquinhos de Alcanena interpreta melodias tradicionais portuguesas e canções de trabalho dos curtidores.

21h45 - **Segundo Acto: Memórias do Trabalho**
Testemunhos de anciãos sobre:
• A vida nas fábricas de curtumes
• As romarias e festas tradicionais
• Os ofícios antigos (ferreiros, oleiros, tecelões)
• Receitas e segredos culinários transmitidos de geração em geração

22h30 - **Terceiro Acto: Participação do Público**
Convite para que os presentes partilhem as suas próprias histórias, memórias familiares e vivências.

23h00 - **Encerramento**
Degustação de doces conventuais e licores regionais. Convívio livre.

Ambiente à luz de velas e lanternas. Lugares limitados para preservar a intimidade do evento. Bebidas e petiscos incluídos no bilhete.',
                'short_description' => 'Noite mágica de histórias, música e tradições num ambiente único',
                'type' => 'other',
                'image' => 'events/evento-10.jpg',
                'start_date' => now()->addDays(38)->format('Y-m-d'),
                'end_date' => now()->addDays(38)->format('Y-m-d'),
                'start_time' => '20:00',
                'end_time' => '23:30',
                'location' => 'Claustro e Jardim do Museu Municipal',
                'is_active' => true,
                'is_featured' => true,
                'is_free' => false,
                'price' => 10.00,
                'max_capacity' => 40,
                'created_by' => 1,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        $this->command->info('✅ 10 eventos completos criados com sucesso!');
        $this->command->info('📸 Imagens utilizadas da pasta informações');
    }
}
