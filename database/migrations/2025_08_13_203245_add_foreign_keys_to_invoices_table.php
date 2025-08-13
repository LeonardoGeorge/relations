<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Foreign key para users
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // ou 'restrict' conforme sua regra

            // Foreign key para addresses
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses')
                ->onDelete('cascade'); // ou 'set null' se address_id for nullable
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Remove as foreign keys
            $table->dropForeign(['user_id']);
            $table->dropForeign(['address_id']);
        });
    }
};
