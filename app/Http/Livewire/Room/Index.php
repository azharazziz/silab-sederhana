<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public $roomId;
    Public $roomName;
    public $addNewRoom = false;
    public $newRoomName;

    public function addNewRoom(){
        $this->addNewRoom = true;
    }

    public function cancelNewRoom(){
        $this->addNewRoom = false;
    }

    public function store(){
        $this->validate([
            'newRoomName'   => 'required',
        ]);
        Room::create([
            'room_name' => $this->newRoomName,
        ]);
        session()->flash('success', 'Data berhasil disimpan');
        $this->addNewRoom = false;
    }

    public function showEditForm($roomId){
        $this->roomId = $roomId;
        $room = Room::find($roomId);
        $this->roomName = $room->room_name;
    }

    public function cancelEdit(){
        $this->roomId = null;
        $this->roomName = null;
    }

    public function update(){
        $this->validate([
            'roomName'   => 'required',
        ]);
        $room = Room::find($this->roomId);
        $room->room_name = $this->roomName;
        $room->save();
        $this->search = $room->room_name;
        session()->flash('success', 'Data berhasil diubah');
        $this->cancelEdit();
    }

    public function destroy($roomId){
        Room::find($roomId)->delete();
        session()->flash('danger', 'Data berhasil dihapus');
    }

    public function render()
    {
        if($this->search != null){
            $room = Room::where('room_name', 'like', '%'. $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        } else {
            $room = Room::orderBy('room_name', 'desc')->paginate(10);
;
        }
        return view('livewire.room.index',[
            'room' => $room,
        ]);
    }
}
