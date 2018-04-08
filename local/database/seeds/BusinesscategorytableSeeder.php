<?php
use Illuminate\Database\Seeder;

class BusinesscategorytableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorylist = ['Hospital','Shopping Center','School','Government Building','Train station','Airport','Nightclub','Celebrity Protection','Bar','Hotel','Restaurant','Private residence','Bus depot','Factory','Event','Corporate Building','Others'];
        foreach($categorylist as $category){
            DB::table('businesscategory')->insert([
                'name' => $category               
            ]);
        }
    }
}
