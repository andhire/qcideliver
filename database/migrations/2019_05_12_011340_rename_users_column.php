<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameUsersColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function(Blueprint $table) {
            $table->renameColumn('nombre', 'name');
            $table->renameColumn('mail', 'email');
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('stnk', function(Blueprint $table) {
            $table->renameColumn('name', 'nombre');
            $table->renameColumn('email', 'mail');
        });
    }
}
