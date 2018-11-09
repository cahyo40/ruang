<?php

use Illuminate\Database\Seeder;
use App\Pengguna;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Pengguna::create([
        //     'username'  =>  'admin',
        //     'nama'      =>  'xxx',
        //     'email'     =>  'admin',
        //     'password'  =>  bcrypt('admin123'),
        //     'status'    =>  'admin',
        //     'role'      =>  'admin'
        // ]);
        Pengguna::create([
            'username'  =>  '196310281993031002',
            'nama'      =>  ' Ir. Kodrat Iman Satoto, MT',
            'email'     =>  'kodrat@live.undip.ac.id',
            'password'  =>  bcrypt('00000000'),
            'status'    =>  'aktif',
            'role'      =>  'dosen'
        ]);
    }
}
