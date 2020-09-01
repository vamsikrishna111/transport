<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLorrydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lorrydetails', function (Blueprint $table) {

            $table->id();
            $table->string('companyname');
            $table->string('name');
             $table->string('vehiclenumber');
            $table->string('startlocation');
            $table->string('endlocation');
            $table->string('tripcost');
            $table->string('advance');
            $table->string('totalkm');
            $table->string('dieselcost');
            $table->string('existingdiesel');
            $table->string('fillup');
            $table->string('totaldiesel');
            $table->string('finalbill');


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
        Schema::dropIfExists('lorrydetails');
    }
}
