<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AliensBasedOnAlienTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aliens', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->integer('alien_type_id')->unsigned()->index();
        });

        Schema::table('aliens', function (Blueprint $table) {
            $table->foreign('alien_type_id')
                ->references('id')->on('alien_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aliens', function (Blueprint $table) {
            $table->text('type');
            $table->dropForeign('aliens_alien_type_id_foreign');
            $table->dropColumn('alien_type_id');
        });
    }
}
