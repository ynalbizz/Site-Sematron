<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
public function run(): void
    {
        // 1. Define o caminho do arquivo (database_path aponta para a pasta /database)
        $path = database_path('TESTE.sql');

        // 2. Verifica se o arquivo existe para evitar erros
        if (File::exists($path)) {
            
            // 3. Lê o conteúdo do arquivo como uma string
            $sql = File::get($path);

            // 4. Executa o SQL bruto
            // DB::unprepared é necessário para rodar múltiplos comandos SQL de uma vez
            DB::unprepared($sql);

            $this->command->info('Arquivo SQL importado com sucesso!');
        } else {
            $this->command->error('Arquivo SQL não encontrado em: ' . $path);
        }
    }
}
