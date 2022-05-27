<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search;
    public $searchResults = [];
    public $lat = 0;
    public $lng = 0;
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

    public function updatingSearch()
    {
        $this->searchResults = $this->Searching();
    }

    protected function searching()
    {
        if (strlen($this->search) < 3) {
            return [];
        }


        if ($this->type == 'pharmacy') {
            return \DB::select("select id, name ,
         round(SQRT((lat-{$this->lat})*(lat-{$this->lat})+(lng-{$this->lng})*(lng-{$this->lng}))*100 ,2)as distance
        from locations where name like '%' '{$this->search}' '%' and type = 'pharmacy' and status='accepted'
          order By SQRT((lat-{$this->lat})*(lat-{$this->lat})+(lng-{$this->lng})*(lng-{$this->lng}))
          limit 10");
        } else if ($this->type == 'clinic') {
            return \DB::select("select l.id as id,u.name as name ,s.name as SName,l.name as LName ,
            round(SQRT((l.lat-{$this->lat})*(l.lat-{$this->lat})+(l.lng-{$this->lng})*(l.lng-{$this->lng}))*100,2) as distance
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
            ) and l.status='accepted'
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
