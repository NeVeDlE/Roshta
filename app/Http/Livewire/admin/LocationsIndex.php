<?php

namespace App\Http\Livewire\admin;

use App\Models\Location;
use Livewire\Component;

class LocationsIndex extends Component
{
    public $bool;
    public $search;
    public $message;


    public function change()
    {
        $this->bool = !$this->bool;
    }

    public function accept($id)
    {

        $location = Location::where('id', $id)->first();
        if (sizeof(Location::where('owner_id', $location->owner_id)->where('status', 'accepted')->get()) > 0) {
            $this->message = 'This user already Own a Location';
        } else {
            $location->update(['status' => 'accepted']);
        }

    }

    public function decline($id)
    {
        Location::where('id', $id)->update(['status' => 'cancelled']);

    }

    public function index()
    {

        return view('admin.locations.index');
    }

    public function render()
    {
        if (!$this->bool) {
            $reqs = $reqs = \DB::table('users')
                ->join('locations', 'users.id', '=', 'locations.owner_id')
                ->select('locations.name as LName', 'locations.lat', 'locations.lng', 'locations.status',
                    'users.name', 'locations.id')
                ->where('users.name', 'like', '%' . $this->search . '%')
                ->where('type', '=', 'clinic')
                ->orderByRaw('FIELD(status,"pending","accepted","cancelled")')
                ->paginate(10);;
        } else {
            $reqs = $reqs = \DB::table('users')
                ->join('locations', 'users.id', '=', 'locations.owner_id')
                ->select('locations.name as LName', 'locations.lat', 'locations.lng', 'locations.status',
                    'users.name', 'locations.id')
                ->where('users.name', 'like', '%' . $this->search . '%')
                ->where('type', '=', 'pharmacy')
                ->orderByRaw('FIELD(status,"pending","accepted","cancelled")')
                ->paginate(10);;
        }
        return view('livewire.locations.locations-index', [
            'reqs' => $reqs,
        ]);
    }
}
