<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points_awards', function (Blueprint $table) {
            $table->id();
            $table->foreignId("transaction_id")->constrained("transactions");
            $table->foreignId("client_id")->constrained("clients");
            $table->integer("points");
            $table->integer("redeemed_points")->default(0);
            $table->text("awards")->default(0);
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
        Schema::dropIfExists('points_awards');
    }
}
