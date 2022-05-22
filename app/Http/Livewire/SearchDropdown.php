<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search;
    public $searchResults = [];
    public $lat;
    public $lng;
    public $type;
    protected $listeners = [
        'changeLat', 'changeLng'
    ];

    public function mount()
    {
        $this->type = 'clinic';
    }

    public function changeLat($value)
    {
        $this->lat = $value;
    }

    public function changeLng($value)
    {
        $this->lng = $value;
    }

    public function updatedType()
    {
        $this->searchResults = $this->Searching();
    }

    public function updatedSearch()
    {
        $this->searchResults = $this->Searching();
    }

    public function searching()
    {
        if (strlen($this->search) < 3) {
            return [];
        }

        if ($this->type == 'pharmacy') {
            return \DB::select("select name ,
         SQRT((lat-{$this->lat})*(lat-{$this->lat})+(lng-{$this->lng})*(lng-{$this->lng}))*100000 as distance
        from locations where name like '%' '{$this->search}' '%' and type = 'pharmacy'
          order By SQRT((lat-{$this->lat})*(lat-{$this->lat})+(lng-{$this->lng})*(lng-{$this->lng}))
          limit 10");
        } else if ($this->type == 'clinic') {
            return \DB::select("select u.name as name ,s.name as SName,l.name as LName ,
            SQRT((l.lat-{$this->lat})*(l.lat-{$this->lat})+(l.lng-{$this->lng})*(l.lng-{$this->lng}))*100000 as distance
            from locations l
            join doctors d
            on l.owner_id = d.user_id
            join users u
            on u.id = d.user_id
            join specializations s
            on s.id = d.specialization_id
            where l.type = 'clinic' AND (
                 u.name like '%' '{$this->search}' '%'
              OR s.name like '%' '{$this->search}' '%'
              OR l.name like '%' '{$this->search}' '%'
            )
            order by SQRT((l.lat-{$this->lat})*(l.lat-{$this->lat})+(l.lng-{$this->lng})*(l.lng-{$this->lng}))
            limit 10");

        } else {
            return Medicine::where('name', 'like', '%' . $this->search . '%')->take(10)->get();

        }
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
