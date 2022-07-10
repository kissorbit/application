<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lsr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Lsr";
    public function up()
    {
        if ( Schema::hasTable("Lsr") ) {
            $this->down();
            Schema::create("Lsr", function (Blueprint $table) {
                $table->increments('id');
                $table->string('compagny_name');$table->string('email');$table->integer('phone_co');$table->string('compagny_address');$table->string('country');$table->string('city');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Lsr", function (Blueprint $table) {
                $table->increments('id');
                $table->string('compagny_name');$table->string('email');$table->integer('phone_co');$table->string('compagny_address');$table->string('country');$table->string('city');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Lsr');
    }
}
