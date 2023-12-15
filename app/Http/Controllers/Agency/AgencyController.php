<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminProfileRequest;
use App\Models\User;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgencyController extends Controller
{
    use JsonResponse;
    public function dashboard()
    {
        return view('agency.dashboard');
    }

    public function viewProfile($id)
    {
        $agency = User::where('id', $id)->first();
        return view('agency.account_setting.show', compact('agency'));
    }

    public function editProfile($id)
    {
        $agency = User::where('id', $id)->first();
        return view('agency.account_setting.edit', compact('agency'));
    }


    public function updateProfile(AdminProfileRequest $request, $id)
    {
        $agency = User::where('id', $id)->first();
        if($agency){
            $fileName = $agency->image;
            if($request->has('image') && !is_null($request->image))
            {
                $image = $request->file('image');
                $fileName = date('d').'_'.date('m').'_'.date('Y').'_'.$image->getClientOriginalName();
                $destinationPath = public_path().'/Uploads/user' ;
                $image->move($destinationPath,$fileName);
            };
            User::where('id', $id)->update([
                'full_name' => $request->full_name,
                'contact' => $request->contact,
                'profile_picture' => $fileName,
            ]);
            return $this->success('Record update successfully.', ['success' => true, 'data' => null]);
        }
        else{
            return $this->error('Record not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}
