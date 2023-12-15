<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminProfileRequest;
use App\Models\Contact;
use App\Models\User;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    use JsonResponse;
    public function index()
    {
        return view('backend.index');
    }

    public function viewProfile($id)
    {
        $admin = User::where('id', $id)->first();
        return view('backend.account.show', compact('admin'));
    }

    public function editProfile($id)
    {
        $admin = User::where('id', $id)->first();
        return view('backend.account.edit', compact('admin'));
    }


    public function updateProfile(AdminProfileRequest $request, $id)
    {
        $admin = User::where('id', $id)->first();
        if($admin){
            $fileName = $admin->image;
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

    public function contactusMessage()
    {
        $messages = Contact::all();
        return view('backend.contact_message', compact('messages'));
    }

    public function contactusMessageDelete($id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->back();
    }
}
