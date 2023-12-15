<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Backend\UserService;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    use JsonResponse;
    protected $userService;
    /**
     * Display a listing of the resource.
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->index();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userService->show($id);
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userService->show($id);
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->userService->update($request, $id);
        return $this->success('Record update successfully.', ['success' => true, 'data' => null]);
    }


    public function delete($id)
    {
        try
        {
            $this->userService->destroy($id);
            return $this->success('Record Deleted Successfully', ['success' => true, 'data' => null]);
        }
        catch (\Throwable $th) {
            return $this->error('Record not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}
