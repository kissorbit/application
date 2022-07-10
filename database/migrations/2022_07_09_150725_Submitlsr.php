<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Submitlsr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Submitlsr";
    public function up()
    {
        if ( Schema::hasTable("Submitlsr") ) {
            $this->down();
            Schema::create("Submitlsr", function (Blueprint $table) {
                $table->increments('id');
                $table->integer('select_lsr');$table->string('goods_type');$table->integer('estimated_goods_value');$table->integer('goods_tonnage');$table->string('goods_origin');$table->string('goods_destination');$table->string('goods_pickup_location');$table->string('goods_delivery_location');$table->string('goods_transit');$table->string('goods_bl');$table->string('goods_loading_date');$table->string('goods_loading_services');$table->string('goods_of_loading_services');$table->string('goods_recipient_name');$table->string('goods_recipient_number');$table->text('goods_lsr_observations');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Submitlsr", function (Blueprint $table) {
                $table->increments('id');
                $table->integer('select_lsr');$table->string('goods_type');$table->integer('estimated_goods_value');$table->integer('goods_tonnage');$table->string('goods_origin');$table->string('goods_destination');$table->string('goods_pickup_location');$table->string('goods_delivery_location');$table->string('goods_transit');$table->string('goods_bl');$table->string('goods_loading_date');$table->string('goods_loading_services');$table->string('goods_of_loading_services');$table->string('goods_recipient_name');$table->string('goods_recipient_number');$table->text('goods_lsr_observations');
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
        Schema::drop('Submitlsr');
    }
}
