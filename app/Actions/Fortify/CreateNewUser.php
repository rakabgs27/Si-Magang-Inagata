<?php

namespace App\Actions\Fortify;

use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $messages = [
            'name.required' => 'Nama Wajib Diisi',
            'name.min' => 'Nama Kurang Dari Ketentuan',
            'name.max' => 'Nama Lebih Dari Dari Ketentuan',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Email Tidak Sesuai Ketentuan',
            'email.max' => 'Email Lebih Dari Dari Ketentuan',
            'email.unique' => 'Email Telah Ada',
            'divisi_id.required' => 'Divisi Wajib Diisi',
            'nomor_hp.required' => 'Nomor Hp Wajib Diisi',
            'nomor_hp.regex' => 'Nomor Hp Tidak Sesuai Format',
            'nama_instansi.required' => 'Nama Instansi Wajib Diisi',
            'nama_jurusan.required' => 'Nama Jurusan Wajib Diisi',
            'nim.required' => 'Nomor Induk Mahasiswa Wajib Diisi',
            'link_cv.required' => 'Link CV Wajib Diisi',
            'link_porto.required' => 'Link Porto Wajib Diisi',
        ];

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'min:4'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'divisi_id' => ['required', 'integer'],
            'nama_instansi' => ['required', 'string', 'max:255'],
            'nama_jurusan' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:255'],
            'link_cv' => ['required', 'string', 'max:255'],
            'link_porto' => ['required', 'string', 'max:255'],
            'nomor_hp' => ['required','regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,8}$/'],
        ], $messages)->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make('temporary_password'),
            'email_verified_at' => now(),
        ]);

        $password = $input['nim'] . $user->id;
        $hashedPassword = Hash::make($password);
        $user->update(['password' => $hashedPassword]);

        // $user->assignRole('user');

        Pendaftar::create([
            'user_id' => $user->id,
            'divisi_id' => $input['divisi_id'],
            'nama_instansi' => $input['nama_instansi'],
            'nama_jurusan' => $input['nama_jurusan'],
            'nim' => $input['nim'],
            'link_cv' => $input['link_cv'],
            'link_porto' => $input['link_porto'],
            'nomor_hp' => $input['nomor_hp'],
            'status' => 'Pending'
        ]);

        return $user;
    }
}
