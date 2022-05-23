<?php

namespace App\Http\Livewire\pharmacists;

use App\Models\Location;
use App\Models\Medicine;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PharmacyIndex extends Component
{
    public $page_id;
    public $pharmacy;
    public $message;
    public $quantity;
    public $medicine;
    public $search;

    public function rules(): array
    {
        return [
            'medicine' => ['required', Rule::exists('Medicine', 'id')],
            'quantity' => ['required', 'numeric'],

        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addMedicineToPharmacy()
    {
        Gate::authorize('pharmacyOwner', $this->pharmacy);

        $this->validate();

        $oldQuantity = 0;
        $oldvalue = \DB::table('location_medicines')
            ->where('location_id', $this->pharmacy->id)
            ->where('medicine_id', $this->medicine)->first();
        //if there's already a quantity add it to the new value bcz im lazy to make a full crud xD
        //so ill just leave it as it is
        if (isset($oldvalue)) {
            $oldQuantity = $oldvalue->quantity;
            \DB::delete("delete from location_medicines
            where location_id = {$this->pharmacy->id}
            and medicine_id = {$this->medicine}");
        }
        $this->pharmacy->addMedicine(Medicine::where('id', $this->medicine)->first(), $oldQuantity + $this->quantity);
        $this->message = 'Medicine added to ur pharmacy successfully';
        $this->resetForm();
        $this->setPage(0);
    }

    public function mount($pharmacy)
    {
        $this->page_id = 0;
        $this->pharmacy = $pharmacy;
    }

    public function resetForm()
    {
        $this->quantity = '';
        $this->medicine = '';
    }

    public function setPage($id)
    {
        $this->page_id = $id;
    }

    public function index()
    {
        $pharmacy = Location::where('owner_id', auth()->id())->where('type', 'pharmacy')->where('status', 'accepted')->first();
        if (Gate::authorize('pharmacist') && isset($pharmacy)) {
            return view('pharmacists.pharmacies.index', [
                'pharmacy' => $pharmacy,
            ]);
        } else return redirect('/');

    }

    public function render()
    {
        if (!$this->page_id) {
            $medicines = \DB::table('location_medicines')
                ->join('Medicine', 'location_medicines.medicine_id', 'Medicine.id')
                ->where('location_id', '=', $this->pharmacy->id)
                ->select('location_medicines.quantity', 'Medicine.price')->get();
            $totalMoney = 0;
            foreach ($medicines as $medicine) {
                $totalMoney += (int)$medicine->quantity * $medicine->price;
            }
            return view('livewire.pharmacists.pharmacy-index', [
                'pharmacy' => $this->pharmacy,
                'totalMedicines' => \DB::table('location_medicines')
                    ->where('location_id', '=', $this->pharmacy->id)
                    ->sum('location_medicines.quantity'),
                'totalMoney' => $totalMoney
            ]);
        } else {
            return view('livewire.pharmacists.pharmacy-index', [
                'Medicine' => Medicine::where('name', 'like', '%' . $this->search . '%')->take(10)->get(),
            ]);
        }
    }
}
