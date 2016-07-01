<?php

use Illuminate\Database\Seeder;

class FacultadSeeder extends Seeder
{
   public function run()
   {
      DB::table('facultades')->truncate();
      DB::table('facultades')->insert([
         ['id'=>1, 'name'=>'Facultad de Medicina', 'code'=>'01'],
         ['id'=>2, 'name'=>'Facultad de Derecho y Ciencia Política', 'code'=>'02'],
         ['id'=>3 , 'name'=>'Facultad de Letras y Ciencias Humanas' , 'code'=>'03'],
         ['id'=>4 , 'name'=>'Facultad de Farmacia y Bioquímica' , 'code'=>'04'],
         ['id'=>5 , 'name'=>'Facultad de Odontología' , 'code'=>'05'],
         ['id'=>6 , 'name'=>'Facultad de Educación' , 'code'=>'06'],
         ['id'=>7 , 'name'=>'Facultad de Química e Ingeniería Química' , 'code'=>'07'],
         ['id'=>8 , 'name'=>'Facultad de Medicina Veterinaria' , 'code'=>'08'],
         ['id'=>9 , 'name'=>'Facultad de Ciencias Administrativas' , 'code'=>'09'],
         ['id'=>10 , 'name'=>'Facultad de Ciencias Biológicas' , 'code'=>'10'],
         ['id'=>11 , 'name'=>'Facultad de Ciencias Contables' , 'code'=>'11'],
         ['id'=>12 , 'name'=>'Facultad de Ciecias Ecónomicas' , 'code'=>'12'],
         ['id'=>13 , 'name'=>'Facultad de Ciencias Físicas' , 'code'=>'13'],
         ['id'=>14 , 'name'=>'Facultad de Ciencias Matemáticas' , 'code'=>'14'],
         ['id'=>15 , 'name'=>'Facultad de Ciencias Sociales' , 'code'=>'15'],
         ['id'=>16 , 'name'=>'Facultad de Ingeniería Geológica, Minera, Metalurgica y Geográfica' , 'code'=>'16'],
         ['id'=>17 , 'name'=>'Facultad de Ingeniería Industrial' , 'code'=>'17'],
         ['id'=>18 , 'name'=>'Facultad de Psicología' , 'code'=>'18'],
         ['id'=>19 , 'name'=>'Facultad de Ingeniería Electrónica y Eléctrica' , 'code'=>'19'],
         ['id'=>20 , 'name'=>'Facultad de Ingeniería Sistemas e Informática' , 'code'=>'20'],
      ]);
   }
}
