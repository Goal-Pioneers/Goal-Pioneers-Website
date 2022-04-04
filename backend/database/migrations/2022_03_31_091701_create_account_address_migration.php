<?php
// Needed Libraries
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


    // Code function
    /**
     * 
     */
    return new class extends Migration
    {
        // Code Preperation
        const DB_TABLE_NAME_ADDRESS = 'account_address';


        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            //
            Schema::create( self::DB_TABLE_NAME_ADDRESS, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 

                    $table->bigInteger( 'address_field_1_id' )->unsigned();
                    $table->bigInteger( 'address_field_2_id' )->unsigned()->nullable();
                    
                    $table->bigInteger( 'address_city_id' )->unsigned();
                    $table->bigInteger( 'address_post_field_id' )->unsigned();
                    $table->bigInteger( 'address_country_id' )->unsigned();

                    
                    $table->foreign('address_field_1_id')->references('id')->on('entities_address_field');
                    $table->foreign('address_field_2_id')->references('id')->on('entities_address_field');
                    $table->foreign('address_city_id')->references('id')->on('label_address_city');
                    $table->foreign('address_post_field_id')->references('id')->on('entities_post_field');
                    $table->foreign('address_country_id')->references('id')->on('label_address_country');
                }
            );
        }


        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            //
            Schema::dropIfExists( self::DB_TABLE_NAME_ADDRESS );
        }
    };
?>