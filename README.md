Sistema de Aluguer de Cassetes

Descrição:
- API e interface web para gerir aluguer e devolução de cassetes.
- Usuários autenticados podem listar, alugar e devolver cassetes.

Requisitos:
- PHP 8.1+, Composer, MySQL, Laravel 12

Instalação:
1. Clonar o repositório:
   git clone <https://github.com/charmilaS/Locadora_cassetes.git>
   cd Locadora_cassetes

2. Instalar dependências:
   composer install

3. Configurar .env 

4. Gerar chave da aplicação:
   php artisan key:generate

5. Rodar migrations:
   php artisan migrate

6. Popular a tabela de cassetes (opcional):
   php artisan db:seed --class=CassetteSeeder

7. Rodar servidor:
   php artisan serve
   Acesse: http://127.0.0.1:8000

API Endpoints:
- GET /api/cassettes          → Listar cassetes
- GET /api/rentals             → Listar alugueres
- POST /api/rentals            → Alugar cassete
- POST /api/rentals/{id}/return → Devolver cassete

Testes:
- php artisan test --filter=RentalTest
- Testam listagem, aluguer e devolução
- Testes criam usuários e cassetes manualmente

Observações:
- Interface usa Bootstrap 5
- Sistema exige autenticação para alugar/devolver
