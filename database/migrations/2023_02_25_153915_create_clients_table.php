<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("full_name",50);
            $table->string("id_number",11);
            $table->enum("type",['مؤسسة','أفراد','شركة']);
            $table->enum("marital_status",['أعزب','متزوج']);
            $table->enum("city",["جباليا","بني سهيلا","بيت حانون","بيت لاهيا","دير البلح","خانيونس","رفح","غزة"]);
            $table->string("email",255);
            $table->string("BOD",50);
            $table->string("occupation",50);
            $table->string("phone",11);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
