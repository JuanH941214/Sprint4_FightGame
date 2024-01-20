<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration// controlo de versiones en base da datos, se peuden revertir
{
    /**
     * Run the migrations.
     */
    public function up(): void// aqui se crean columnas bajo los nombre en ''
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();//columna
            $table->string('name');//columna
            $table->string('email')->unique();//columna- lo q almacenos en campo email debe ser unico, no puede haber duplciado en al bd
            $table->timestamp('email_verified_at')->nullable(); //columna-fechas, verificar el correo e. se alamacena la fecha, este campo puede queda vacio 
            $table->string('password');
            $table->rememberToken();// columna varchar 100, nombre remberToken, se va almacenar cada vez que de a  manterne la sesion
            $table->timestamps();// columna-crea 2 columnas created at y updated at 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // llama clase schema, elimina la tabla users 
    }
};
