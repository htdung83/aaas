<?php

namespace App\Http\Controllers\Api;

use App\Actions\Users\DeleteUser;
use App\Actions\Users\FetchUsers;
use App\Actions\Users\SaveUser;
use App\Actions\Users\ShowUser;
use App\DTOs\Users\FetchUsersDTO;
use App\DTOs\Users\SaveUserDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class UserController extends Controller
{
    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function index(Request $request, FetchUsers $action): JsonResponse
    {
        return response()->json($action->handle(FetchUsersDTO::fromRequest($request)));
    }

    public function show(int $id, ShowUser $action): JsonResponse
    {
        return response()->json($action->handle($id));
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function store(Request $request, SaveUser $action): JsonResponse
    {
        return response()->json($action->handle(SaveUserDTO::fromRequest($request)));
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function update(Request $request, int $id, SaveUser $action): JsonResponse
    {
        return response()->json($action->handle(SaveUserDTO::fromRequest($request), $id), Response::HTTP_OK);
    }

    public function destroy(int $id, DeleteUser $action)
    {
        $action->handle($id);

        return response()->noContent();
    }
}
