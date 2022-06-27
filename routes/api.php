<?php

use App\Models\Doctor;
use App\Models\Examination;
use App\Models\Location;
use App\Models\Medicine;
use App\Models\Pharmacist;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//use it to make examinations requires user_id, location_id
Route::post('/examinations/reserve', function () {
    $validator = Validator::make(request()->all(), [
        'user_id' => 'required|exists:users,id',
        'location_id' => 'required|exists:locations,id'
    ]);
    if (!$validator->fails()) {
        $location = Location::where('id', request()->location_id)->first();
        $user = User::where('id', request()->user_id)->first();
        if (!$user->requestsNumber() && $location->type == 'clinic') {
            $location->addExaminationRequest($user);
            $x = \DB::table('location_users')
                ->select('location_users.status as status')
                ->where('location_users.user_id', '=', $user->id)
                ->where('status', 'pending')->latest()->first();
            return array_merge(collect($x)->toArray(), [
                'name' => $location->name,
                'lat' => $location->lat,
                'lng' => $location->lng
            ]);
        }
        return 'Error';
    }
    return $validator->errors();
});

//returns diseases for a specific patient
Route::post('/user/diseases', function () {
    $validator = Validator::make(request()->all(), [
        'user_id' => 'required|exists:users,id',
        'search' => 'string|nullable'
    ]);
    if (!$validator->fails()) {
        $search = isset(request()->search) ? request()->search : '';
        return DB::table('examination_diseases')
            ->join('diseases', 'examination_diseases.disease_id', '=', 'diseases.id')
            ->join('examinations', 'examination_diseases.examination_id', '=', 'examinations.id')
            ->where('examinations.patient_id', '=', request()->user_id)
            ->where('diseases.name', 'like', '%' . $search . '%')
            ->select('diseases.id', 'diseases.name', 'diseases.description', 'diseases.created_at', 'diseases.updated_at')
            ->distinct()->get();
    }
    return $validator->errors();
});

//returns medicines for a specific patient
Route::post('/user/medicines', function () {
    $validator = Validator::make(request()->all(), [
        'user_id' => 'required|exists:users,id',
        'search' => 'string|nullable'
    ]);
    if (!$validator->fails()) {
        $search = isset(request()->search) ? request()->search : '';
        return DB::table('examination_medicines')
            ->join('medicines', 'examination_medicines.medicine_id', '=', 'medicines.id')
            ->join('examinations', 'examination_medicines.examination_id', '=', 'examinations.id')
            ->where('medicines.name', 'like', '%' . $search . '%')
            ->where('examinations.patient_id', '=', request()->user_id)
            ->select('medicines.id', 'medicines.name', 'medicines.description', 'medicines.price',
                'medicines.photo', 'medicines.created_at', 'medicines.updated_at')->distinct()->get();
    }
    return $validator->errors();
});

//returns diseases for a specific examinations
Route::post('/examinations/diseases', function () {
    $validator = Validator::make(request()->all(), [
        'examination_id' => 'required|exists:examinations,id',
    ]);

    if (!$validator->fails()) {
        return Examination::where('id', request()->examination_id)->first()->diseases;
    }
    return $validator->errors();
});

//returns medicines for a specific examinations
Route::post('/examinations/medicines', function () {
    $validator = Validator::make(request()->all(), [
        'examination_id' => 'required|exists:examinations,id',
    ]);

    if (!$validator->fails()) {
        return Examination::where('id', request()->examination_id)->first()->medicines;
    }
    return $validator->errors();
});

//returns examinations for specific patient
Route::post('/patient/examinations', function () {
    $validator = Validator::make(request()->all(), [
        'user_id' => 'required|exists:users,id'
    ]);
    if (!$validator->fails()) {
        $exams = User::where('id', request()->user_id)->first()->examinations;
        for ($i = 0; $i < sizeof($exams); $i++) {
            $exams[$i] = array_merge($exams[$i]->toArray(['updated_at']), [
                'doctor_name' => User::where('id', $exams[$i]->doctor_id)->first()->name,
                'price' => \DB::table('examination_medicines')
                    ->join('medicines', 'medicines.id', '=', 'examination_medicines.medicine_id')
                    ->where('examination_medicines.examination_id', '=', $exams[$i]->id)
                    ->sum('medicines.price')]);
        }
        return $exams;

    } else {
        return "send a valid user_id";
    }

});

//requires user_id
Route::post('/examinationRequests', function () {
    if (isset(request()->user_id)) {
        $search = isset(request()->search) ? request()->search : '';
        return \DB::table('location_users')
            ->join('locations', 'locations.id', '=', 'location_users.location_id')
            ->select('locations.name', 'locations.lat', 'locations.lng', 'location_users.status', 'location_users.created_at')
            ->where('location_users.user_id', '=', request()->user_id)
            ->where('locations.name', 'like', '%' . request()->search . '%')
            ->orderByRaw('FIELD(location_users.status,"accepted","pending","cancelled")')
            ->get();
    } else
        return "send a valid user_id";
});

//return all specs
Route::get('/specialization', function () {
    return Specialization::all();
});


//requires (type,search,lat,lng) returns values based on type for global searching purpose
Route::post('/search', function () {

    $validator = Validator::make(request()->all(), [
        'type' => ['required', Rule::in(['clinic', 'pharmacy', 'medicine'])],
        'search' => 'string|nullable',
        'lat' => 'string|nullable',
        'lng' => 'string|nullable',
    ]);
    if ($validator->fails()) {
        return $validator->errors();
    }
    $type = request()->type;
    $search = isset(request()->search) ? request()->search : '';
    $lat = isset(request()->lat) ? request()->lat : '0';
    $lng = isset(request()->lng) ? request()->lng : '0';
    if ($type == 'pharmacy') {
        return \DB::select("select id, name , lat ,lng,
         round(SQRT((lat-{$lat})*(lat-{$lat})+(lng-{$lng})*(lng-{$lng}))*100 ,2)as distance
        from locations where name like '%' '{$search}' '%' and type = 'pharmacy' and status='accepted'
          order By SQRT((lat-{$lat})*(lat-{$lat})+(lng-{$lng})*(lng-{$lng}))");
    } else if ($type == 'clinic') {
        return \DB::select("select l.id as id,u.name as name ,s.name as SName,l.name as LName  ,l.lat ,l.lng,
            round(SQRT((l.lat-{$lat})*(l.lat-{$lat})+(l.lng-{$lng})*(l.lng-{$lng}))*100,2) as distance
            from locations l
            join doctors d
            on l.owner_id = d.user_id
            join users u
            on u.id = d.user_id
            join specializations s
            on s.id = d.specialization_id
            where l.type = 'clinic' AND (
                 u.name like '%' '{$search}' '%'
              OR s.name like '%' '{$search}' '%'
              OR l.name like '%' '{$search}' '%'
            ) and l.status='accepted'
            order by SQRT((l.lat-{$lat})*(l.lat-{$lat})+(l.lng-{$lng})*(l.lng-{$lng}))");

    } else {
        return Medicine::where('name', 'like', '%' . $search . '%')->get();
    }
});

Route::post('/job/requests', function () {
    $validator = Validator::make(request()->all(), [
        'user_id' => 'required|exists:users,id',
    ]);
    if (!$validator->fails()) {
        $val = Doctor::where('user_id', request()->user_id)->where('status', 'pending')->first();
        if (isset($val)) {
            return array_merge($val->toArray(), [
                'type' => 'doctor',
            ]);
        }
        $val = Pharmacist::where('user_id', request()->user_id)->where('status', 'pending')->first();
        if (isset($val)) {
            return array_merge($val->toArray(), [
                'type' => 'pharmacist',
            ]);
        }

        return 'No Requests';
    }
    return $validator->errors();
});


//requires (degree,university,graduate_date,user_id(
Route::post('/register/pharmacist', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'degree' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        'university' => 'required|min:2|max:255',
        'graduate_date' => 'date',
        'user_id' => 'required|exists:users,id|unique:doctors,user_id|unique:pharmacist,user_id'
    ]);
    if ($validator->fails()) {
        //  return $validator->errors();
        return "some errors";
    } else {
        $atr = array_merge(request()->all(), [
            'status' => 'pending'
        ]);
        $atr['degree'] = request()->degree->store('pharmacists', 'public');
        Pharmacist::create($atr);
        return "successfully registered wait for approval";
    }

});


//requires (degree,university,graduate_date,user_id,specialization_id)
Route::post('/register/doctor', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'specialization_id' => 'required|exists:specializations,id',
        'degree' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        'university' => 'required|min:2|max:255',
        'graduate_date' => 'date',
        'user_id' => 'required|exists:users,id|unique:doctors,user_id|unique:doctors,user_id'
    ]);
    if ($validator->fails()) {
        //  return $validator->errors();
        return "some errors";
    } else {
        $atr = array_merge(request()->all(), [
            'status' => 'pending'
        ]);
        $atr['degree'] = $request->degree->store('doctors', 'public');
        Doctor::create($atr);
        return "successfully registered wait for approval";
    }

});

//use it to login
Route::post('/login', function () {
    $validator = Validator::make(request()->all(), [
        'email' => 'email|required|exists:users,email',
        'password' => 'required',
    ]);
    if (!$validator->fails()) {
        $user = User::where('email', request()->email)->first();
        if (isset($user)) {
            if (Hash::check(request()->password, $user->password)) {
                return $user;
            }
        }
    }
    return 'Not Found';
});


Route::post('/register', function (Request $request) {

    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'national_id' => ['required', 'string', 'size:14', 'unique:users,national_id'],
        'phone' => ['required', 'string', 'size:11', 'unique:users,phone'],
        'picture' => ['image', 'sometimes'],
        'birthday' => ['required', 'date'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);
    if ($validator->fails()) {
        return $validator->errors();
    } else {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'national_id' => $request->national_id,
            'phone' => $request->phone,
            'picture' => isset(request()->picture) ?
                $request->file('picture')->store('profile_pictures') : null,
            'birthday' => $request->birthday,
            'password' => Hash::make($request->password),
        ]);
        return [
            "id" => $user->id,
            "name" => $user->name,
            "national_id" => $user->national_id,
            "phone" => $user->phone,
            "picture" => $user->picture,
            "birthday" => $user->birthday,
            "role_id" => $user->role_id,
            "email" => $user->email,
        ];
    }

});


