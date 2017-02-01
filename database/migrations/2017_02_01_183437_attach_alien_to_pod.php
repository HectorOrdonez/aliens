<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AttachAlienToPod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aliens', function (Blueprint $table) {
            $table->integer('pod_id')->unsigned()->index();
        });

        Schema::table('aliens', function (Blueprint $table) {
            $table->foreign('pod_id')
                ->references('id')->on('pods')
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
            $table->dropForeign('aliens_pod_id_foreign');
            $table->dropColumn('pod_id');
        });
    }
}
