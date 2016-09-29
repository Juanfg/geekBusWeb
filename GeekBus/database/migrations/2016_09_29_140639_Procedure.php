<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Procedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = " 
            CREATE FUNCTION `distlatlon`(`lat1` DOUBLE, `lon1` DOUBLE, `lat2` DOUBLE, `lon2` DOUBLE)
            RETURNS double
            LANGUAGE SQL
            DETERMINISTIC
            NO SQL
            SQL SECURITY DEFINER
            COMMENT ''
            BEGIN
            DECLARE a DOUBLE;
            DECLARE c DOUBLE;
            DECLARE dLat DOUBLE;
            DECLARE dLon DOUBLE;
            SELECT (radians (lat2-lat1)) INTO dLat;
            SELECT (radians (lon2-lon1)) INTO dLon;
            SELECT ((sin(dLat/2)) * (sin(dLat/2)) + (cos(radians(lat1))) * (cos(radians(lat2))) * (sin(dLon/2)) * (sin(dLon/2))) INTO a;
            SELECT ((2 * (atan2(sqrt(a), sqrt(1-a))))*6371000) INTO c;
            RETURN c;
            END";

        DB::connection()->getPdo()->exec($sql);    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "DROP FUNCTION `distlatlon`;";

        DB::connection()->getPdo()->exec($sql);    
    }
}
