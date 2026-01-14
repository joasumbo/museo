# Instruções de Deploy - Museu Municipal de Alcanena

## Após fazer deploy no servidor, executar:

### 1. Link simbólico do Storage
```bash
php artisan storage:link
```

### 2. Permissões
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache public/storage
```

### 3. Cache e Otimizações
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Verificar imagens

As imagens devem estar em:
- `public/assets/img/hero/` - Imagens do hero
- `public/assets/img/portfolio/` - Imagens da galeria
- `public/assets/img/gallery/` - Fotos das coleções
- `public/assets/img/event/` - Imagens dos eventos

## Upload de imagens de eventos

Eventos com imagens vão para `storage/app/public/events/`
O link simbólico cria: `public/storage` → `storage/app/public`

Acessível via: `{{ asset('storage/events/imagem.jpg') }}`

## Troubleshooting

Se imagens não aparecem:
1. Verificar se `public/storage` existe e é um link simbólico
2. Verificar permissões da pasta storage
3. Verificar se arquivos estão em `storage/app/public/`
4. Limpar cache: `php artisan cache:clear`
