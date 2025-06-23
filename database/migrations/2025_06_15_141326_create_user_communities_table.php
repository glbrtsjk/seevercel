<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
    {
        Schema::table('communities', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
        });

        Schema::table('communities', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable(false)->change();
        });

        Schema::table('communities', function (Blueprint $table) {
            $table->foreign('created_by')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('communities', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
        });

        Schema::table('communities', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable()->change();
        });

        Schema::table('communities', function (Blueprint $table) {
            $table->foreign('created_by')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }
};
