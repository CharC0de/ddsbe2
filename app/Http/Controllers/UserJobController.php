<?php

namespace App\Http\Controllers;
//use App\User;
use App\Models\UserJob; // <-- your model is located inside Models Folder
use Illuminate\Http\Response; // Response Components
use App\Traits\ApiResponser; // <-- use to standardized our code for api response
use Illuminate\Http\Request; // <-- handling http request in lumen
use Illuminate\Support\Facades\DB; // <-- if your not using lumen eloquent you can use DB component in lumen


class UserJobController extends Controller
{


    // use to add your Traits ApiResponser
    use ApiResponser;
    private $rules;
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->rules = [
            'jobname' => 'required|max:20',

        ];
    }
    /**
     * Return the list of usersjob
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $usersjob = UserJob::all();
        return $this->successResponse($usersjob);
    }
    /**
     * Obtains and show one userjob
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $userjob = UserJob::findOrFail($id);
        return $this->successResponse($userjob);
    }
    public function add(Request $request)
    {

        $this->validate($request, $this->rules);
        $user = UserJob::create($request->all());
        return $this->successResponse($user, Response::HTTP_CREATED);
    }
    /**
     * Update an existing job
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request, $id)
    {

        $this->validate($request, $this->rules);
        $user = UserJob::findOrFail($id);
        $user->fill($request->all());
        // if no changes happen
        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user->save();
        return $this->successResponse($user);
    }
    /**
     * Remove an existing user
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $user = UserJob::findOrFail($id);
        $user->delete();

        return $this->successResponse($user);
    }
}
