<?php 
 
use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\Schema; 
 
class CreatePostsTable extends Migration 
{ 
    /** 
     * Run the migrations. 
     * 
     * @return void 
     */ 
    public function up() 
    { 
        Schema::create('posts', function (Blueprint $table) { 
            $table->id(); // Membuat kolom primary key auto-increment 
            $table->string('title'); // Kolom judul dengan tipe string 
            $table->text('content'); // Kolom konten dengan tipe text 
            $table->timestamps(); // Membuat kolom created_at dan updated_at 
        }); 
    } 
 
    /** 
     * Reverse the migrations. 
     * 
     * @return void 
     */ 
    public function down() 
    { 
        Schema::dropIfExists('posts'); 
    } 
} 