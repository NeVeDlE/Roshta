<?php

namespace App\Http\Livewire\admin\jobs;

use App\Models\Doctor;
use App\Models\Pharmacist;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class JobsRequests extends Component
{

    public $search;
    public $bool;
    protected $listeners = ['download' => 'downloadPDF'];

    public function mount()
    {
        $this->bool = 0;
    }

    public function change()
    {
        $this->bool = !$this->bool;
    }

    public function accept($id)
    {
        if (!$this->bool) {
            $tmp = Doctor::where('id', $id)->first();
            $tmp->update(['status' => 'accepted']);
            User::where('id', $tmp->user_id)->update(['role_id' => '2']);
        } else {
            $tmp = Pharmacist::where('id', $id)->first();
            $tmp->update(['status' => 'accepted']);
            User::where('id', $tmp->user_id)->update(['role_id' => '3']);
        };
    }

    public function decline($id)
    {
        if (!$this->bool) {
            $tmp = Doctor::where('id', $id)->first();
            $tmp->update(['status' => 'cancelled']);
        } else {
            $tmp = Pharmacist::where('id', $id)->first();
            $tmp->update(['status' => 'cancelled']);
        };
        User::where('id', $tmp->user_id)->update(['role_id' => '4']);
    }

    public function downloadPDF($file, $name)
    {
        $file = storage_path() . "/app/public/" . $file;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return \Response::download($file, $name . '.pdf', $headers);

    }

    public function index()
    {
        if (Gate::authorize('admin')) {
            return view('admin.jobs.index');
        } else return redirect('/');
    }


    public function render()
    {
        if (Gate::authorize('admin')) {
            if (!$this->bool) {
                $reqs = \DB::table('users')
                    ->join('doctors', 'users.id', '=', 'doctors.user_id')
                    ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
                    ->select('users.name as doctor_name', 'doctors.id',
                        'specializations.name', 'doctors.status', 'doctors.university',
                        'doctors.degree', 'doctors.graduate_date')
                    ->where('users.name', 'like', '%' . $this->search . '%')
                    ->orderByRaw('FIELD(status,"pending","accepted","cancelled")')
                    ->paginate(10);
            } else {
                $reqs = \DB::table('users')
                    ->join('pharmacists', 'users.id', '=', 'pharmacists.user_id')
                    ->select('users.name as doctor_name', 'pharmacists.id', 'pharmacists.status', 'pharmacists.university',
                        'pharmacists.degree', 'pharmacists.graduate_date')
                    ->where('users.name', 'like', '%' . $this->search . '%')
                    ->orderByRaw('FIELD(status,"pending","accepted","cancelled")')
                    ->paginate(10);
            }
            return view('livewire.jobs.jobs-requests', [
                'reqs' => $reqs,
            ]);
        } else return abort(403);
    }
}
