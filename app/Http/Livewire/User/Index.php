<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    public $userId;
    public $addUser;
    public $newRoles;
    public $newName;
    public $newEmail;

    public function showEditForm($userId){
        $this->userId = $userId;
        $this->newRoles = User::find($userId)->getRoleNames()->first();
        // dd($this->newRoles);
    }

    public function update(){
        $user = User::find($this->userId);
        $user->syncRoles($this->newRoles);
        $this->cancelEdit();
    }

    public function cancelEdit(){
        $this->userId = null;
    }

    public function resetPassword($userId){
        $user = User::find($userId);
        $user->password = bcrypt('00000000');
        $user->save();
        session()->flash('success', 'Password berhasil diatur ulang. Sandi Default adalah "00000000"');

    }

    public function addNewUser(){
        $this->addUser = true;
    }

    public function cancelNewUser(){
        $this->addUser = null;
        $this->newRoles = null;
        $this->newName = null;
        $this->newEmail = null;

    }

    public function store(){
        $user =  User::create([
            'name' => $this->newName,
            'email' => $this->newEmail,
            'password' => bcrypt('00000000')
        ]);

        $user->assignRole($this->newRoles);

        session()->flash('success', 'Akun sudah ditambahkan. Sandi Default adalah "00000000"');
        $this->cancelNewUser();
    }

    public function render()
    {
        $users = User::where('id', '!=', auth()->id())->paginate(10);
        $roles = Role::all()->pluck('name');
        return view('livewire.user.index', [
            'users' => $users,
            'roleslist' => $roles,
        ]);
    }
}
