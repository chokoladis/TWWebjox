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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('right_id')->after('email')->default(1); // after create rights table
            $table->index('right_id', 'users_right_idx');
            $table->foreign('right_id', 'users_rights_fk')->references('id')->on('rights');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_rights_fk');
            // $table->dropColumn('right_id');            
            // $table->dropIndex('right_id');
        });
    }
};
