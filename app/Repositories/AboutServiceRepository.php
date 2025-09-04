<?php
namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\ServiceAbout;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\AboutServiceRepositoryInterface;

class AboutServiceRepository implements AboutServiceRepositoryInterface
{


    public function all() : LengthAwarePaginator
    {
        return ServiceAbout::query()->latest()->paginate(10);
    }

    public function find(int $id) : ServiceAbout
    {
        return ServiceAbout::find($id);
    }

    public function create(array $data) : ServiceAbout
    {

        

        $data['service_start']=Carbon::parse($data['service_start'])->format('Y');
        $data['service_finish']=Carbon::parse($data['service_finish'])->format('Y');
      //  dd($data);
        return ServiceAbout::create($data);
    }

    public function update(array $data,$id) : ServiceAbout
    {
        $experience = ServiceAbout::find($id);
        $data['service_start']=Carbon::parse($data['service_start'])->format('Y');
        $data['service_finish']=Carbon::parse($data['service_finish'])->format('Y');
       
        if ($experience) {
            $experience->update($data);
            return $experience;
        }
        return null;
    }

    public function delete(int $id) : bool
    {
        $experience = ServiceAbout::find($id);
        if ($experience) {
            return $experience->delete();
        }
        return false;
    }


    public function getActive(): Collection
    {
        return ServiceAbout::active()->get(); 
    }


}


