<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('user_id')->after('id');
            $table->string('postcode', 20);
            $table->string('houseno', 10);
            $table->string('line1', 150);
            $table->string('line2', 150);
            $table->string('line3', 150);
            $table->string('line4', 150);
            $table->string('locality', 100);
            $table->string('citytown', 100);
            $table->string('country',150);
            $table->string('latitude',150);
            $table->string('longitude',150);   
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
        Schema::dropIfExists('address');
    }
}
