<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\DTOs\UserDTO\UserInfoDTO;
use App\Services\User\UserService;
use App\DTOs\Requests\AddAddressDTO;
use App\DTOs\Requests\UpdateUserDTO;
use App\Http\Controllers\Controller;
use App\DTOs\Requests\UpdateAddressDTO;
use Cloudinary\JsonUtils;
use PDO;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }
    //
    public function user(Request $request)
    {

        logger(($request->user()->id));
        $userId = $request->user()->id;
        $user = $this->userService->findUser($userId);

        $userDTO = new UserInfoDTO(
            $user['name'],
            $user['username'], // ['name' => $user['name'], 'username' => $user['username']
            $user['email'],
            $user['phone_number'],
            $user['birth'],
            $user['gender'],
            $user['weight'],
            $user['height']
        );
        return response($userDTO->toArray());
    }
    public function updateInfo(Request $request)
    {
        $userId = $request->user()->id;
        $user = $this->userService->findUser($userId);
        $userInfoDTO = new UpdateUserDTO(
            $request->name,
            $request->email ?? "",
            $request->phoneNumber ?? "",
            $request->birthday ?? "",
            $request->gender ?? "",
            $request->weight ?? null,
            $request->height ?? null
        );
        $user->update($userInfoDTO->toArray());
        return $user;
    }

    public function getAddresses(Request $request)
    {
        $userId = $request->user()->id;
        return $this->userService->findAddresses($userId);
    }

    public function addAddress(Request $request)
    {
        $userId = $request->user()->id;
        $addressDTO = new AddAddressDTO(
            $request->streetLine,
            $request->name,
            $request->phoneNumber,
            $request->isDefault
        );
        $address = $this->userService->addAddress($userId, $addressDTO);
        return $address;
    }

    public function makeAddressDefault(Request $request)
    {
        $userId = $request->user()->id;
        $addressId = $request->addressId;
        $address = $this->userService->makeAddressDefault($userId, $addressId);
        return $address;
    }

    public function updateAddress(Request $request)
    {
        $userId = $request->user()->id;
        $updateDTO = new UpdateAddressDTO(
            $request->addressId,
            $request->streetLine,
            $request->name,
            $request->phoneNumber
        );
        $address = $this->userService->updateAddress($userId, $updateDTO);
        return $address;
    }

    public function deleteAddress(Request $request)
    {
        $userId = $request->user()->id;
        $addressId = $request->addressId;
        $address = $this->userService->deleteAddress($userId, $addressId);
        return $address;
    }

    public function getAll()
    {
        return 'ok';
    }

    public function getAllUsers(Request $request)
    {
        $users = $this->userService->getAllUsers();

        $userDTOs = [];
        foreach ($users as $user) {
            $userDTO = new UserInfoDTO(
                $user->name,
                null,
                $user->email,
                $user->phone_number,
                $user->birth,
                $user->gender,
                $user->weight,
                $user->height,
            );
            $userDTOs[] = $userDTO->toArray();
        }
        return $userDTOs;
    }
}
