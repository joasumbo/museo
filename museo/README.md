# Museu Municipal de Alcanena - Sistema de Gestão

Sistema web completo para gestão do Museu Municipal de Alcanena, incluindo website público e painel administrativo.

## Requisitos do Sistema

- PHP >= 8.2
- Composer
- MySQL >= 5.7 ou MariaDB >= 10.3
- Node.js >= 16.x (opcional, para desenvolvimento de assets)
- Extensões PHP necessárias:
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath
  - Fileinfo
  - GD

## Instalação

### 1. Clonar o Repositório

```bash
git clone https://github.com/joasumbo/mseu.git
cd mseu
```

### 2. Instalar Dependências

```bash
composer install
```

### 3. Configurar Variáveis de Ambiente

Copie o arquivo de exemplo e configure as variáveis:

```bash
cp .env.example .env
```

Edite o arquivo `.env` e configure:

```env
APP_NAME="Museu Municipal Alcanena"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://seu-dominio.pt

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=museu_alcanena
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

MAIL_MAILER=smtp
MAIL_HOST=smtp.seu-provedor.pt
MAIL_PORT=587
MAIL_USERNAME=seu_email@dominio.pt
MAIL_PASSWORD=sua_senha_email
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=museu@cm-alcanena.pt
MAIL_FROM_NAME="${APP_NAME}"
```

### 4. Gerar Chave da Aplicação

```bash
php artisan key:generate
```

### 5. Criar Base de Dados

Crie a base de dados MySQL:

```sql
CREATE DATABASE museu_alcanena CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. Executar Migrações

```bash
php artisan migrate
```

### 7. Criar Utilizador Administrador

Execute o seeder para criar o utilizador superadmin:

```bash
php artisan db:seed --class=SuperAdminSeeder
```

Credenciais padrão:
- Email: `admin@museu-alcanena.pt`
- Password: `Admin@Museu2025!`

**IMPORTANTE:** Altere estas credenciais após o primeiro login.

### 8. Criar Link Simbólico para Storage

```bash
php artisan storage:link
```

### 9. Configurar Permissões (Linux/Unix)

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 10. Limpar Caches

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

## Configuração do Servidor Web

### Apache

Crie um VirtualHost:

```apache
<VirtualHost *:80>
    ServerName museu-alcanena.pt
    ServerAlias www.museu-alcanena.pt
    DocumentRoot /caminho/para/mseu/public

    <Directory /caminho/para/mseu/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/museu-error.log
    CustomLog ${APACHE_LOG_DIR}/museu-access.log combined
</VirtualHost>
```

Ative o módulo rewrite:

```bash
a2enmod rewrite
systemctl restart apache2
```

### Nginx

Adicione ao arquivo de configuração:

```nginx
server {
    listen 80;
    server_name museu-alcanena.pt www.museu-alcanena.pt;
    root /caminho/para/mseu/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## Estrutura do Projeto

```
mseu/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Admin/          # Controllers do painel admin
│   │   └── Middleware/         # Middlewares de autenticação
│   └── Models/                 # Models Eloquent
├── database/
│   ├── migrations/             # Migrações da base de dados
│   └── seeders/                # Seeders
├── public/                     # Pasta pública (Document Root)
│   └── assets/                 # Assets do site (CSS, JS, imagens)
├── resources/
│   └── views/
│       ├── admin/              # Views do painel administrativo
│       ├── components/         # Componentes reutilizáveis
│       └── layouts/            # Layouts principais
└── routes/
    └── web.php                 # Rotas da aplicação
```

## Funcionalidades

### Website Público

- Homepage com eventos destacados
- Páginas institucionais (Sobre, Coleções, Horários)
- Sistema de eventos conectado à base de dados
- Formulário de agendamento de visitas
- Formulário de contacto
- Responsivo e otimizado para SEO

### Painel Administrativo

Acesso: `/admin/login`

- Dashboard com estatísticas
- Gestão de eventos (criar, editar, eliminar)
- Calendário interativo de eventos com cores por tipo
- Gestão de horários de funcionamento
- Visualização de visitas agendadas
- Gestão de mensagens de contacto
- Gestão de utilizadores (apenas superadmin)
- Perfil e alteração de password

## Manutenção

### Backup da Base de Dados

```bash
mysqldump -u usuario -p museu_alcanena > backup_$(date +%Y%m%d).sql
```

### Atualizar o Sistema

```bash
git pull origin main
composer install --no-dev
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Logs

Os logs da aplicação estão localizados em:

```
storage/logs/laravel.log
```

### Limpar Caches em Produção

```bash
php artisan optimize:clear
php artisan optimize
```

## Segurança

### Recomendações

1. **Altere as credenciais padrão** do administrador após a instalação
2. **Configure HTTPS** usando Let's Encrypt ou certificado válido
3. **Mantenha o sistema atualizado** executando `composer update` regularmente
4. **Configure backups automáticos** da base de dados
5. **Restrinja acesso** à pasta `/admin` por IP se possível
6. **Use senhas fortes** para todos os utilizadores
7. **Ative o firewall** do servidor
8. **Desative APP_DEBUG** em produção

### Alterar Password do Administrador

Após o primeiro login, aceda a:
`Painel Admin > Configurações > Alterar Password`

## Resolução de Problemas

### Erro 500 - Internal Server Error

1. Verifique as permissões das pastas `storage` e `bootstrap/cache`
2. Confirme que o arquivo `.env` existe e está configurado
3. Execute `php artisan config:clear`
4. Verifique os logs em `storage/logs/laravel.log`

### Imagens não aparecem

Execute:

```bash
php artisan storage:link
```

### Erro de conexão à base de dados

Verifique as credenciais no arquivo `.env` e confirme que a base de dados existe.

## Suporte Técnico

Para questões técnicas ou reportar problemas, contacte:
- Email: suporte@cm-alcanena.pt
- GitHub Issues: https://github.com/joasumbo/mseu/issues

## Tecnologias Utilizadas

- Laravel 11
- PHP 8.2
- MySQL
- Tailwind CSS
- Alpine.js
- FullCalendar

## Licença

Este projeto é propriedade do Município de Alcanena.
Todos os direitos reservados.

## Créditos

Desenvolvido para o Museu Municipal de Alcanena.

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
