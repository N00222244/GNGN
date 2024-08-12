<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned(); // Column for user_id
            $table->bigInteger('role_id')->unsigned(); // Column for role_id
            $table->timestamps();

            //fk 
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('user_role', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropForeign(['role_id']);
    });

    Schema::dropIfExists('user_role');
}
};
