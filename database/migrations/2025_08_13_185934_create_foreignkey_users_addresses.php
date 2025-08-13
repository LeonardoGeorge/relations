<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Verifica se a constraint já existe antes de criar
            if (!$this->foreignKeyExists('users', 'users_address_id_foreign')) {
                $table->foreign('address_id')
                    ->references('id')
                    ->on('addresses')
                    ->onDelete('SET NULL');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
        });
    }

    protected function foreignKeyExists($table, $name)
    {
        $conn = Schema::getConnection();
        $dbSchemaManager = $conn->getDoctrineSchemaManager();
        $foreignKeys = $dbSchemaManager->listTableForeignKeys($table);

        foreach ($foreignKeys as $fk) {
            if ($fk->getName() === $name) {
                return true;
            }
        }
        return false;
    }
};
