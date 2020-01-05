<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\RoleServices;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use \Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * @param User $user
     * @param Post $post
     * @return View
     */
    public function dashboard(User $user, Post $post): View
    {
        return view('admin.dashboard', [
            'users' => $user,
            'posts' => $post,
        ]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllUsers(User $user)
    {
        return view('admin.all-users', [
            'users' => User::latest()->take(10)->get()
            ]
        );
    }

    /**
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function searchUsers(Request $request, User $user): JsonResponse
    {
        try {
            if($request->ajax()){
                $users = $user->searchUsersByTerm($request->get('term'));
                return new JsonResponse($users);
            }
        } catch ( \Exception $e) {

        }
    }

    /**
     * @param User $user
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function userProfile(user $user, Role $role)
    {
        try {
            return view('admin.user-profile', [
                'user' => $user,
                'roles' => $role->getRoles(),
                'user_has_role' => $user->userHasRoles($user->id)
            ]);
        } catch (\Exception $e) {

        }
    }

    /**
     * @param Request $request
     * @param RoleServices $roleServices
     * @return JsonResponse
     */
    public function updateUserRole(Request $request, RoleServices $roleServices)
    {
        try {
            if($request->ajax()){
                $roleServices->updateUserRole(
                    $request->get('user_id'),
                    $request->get('role_id'),
                    $request->get('role')
                );
                return new JsonResponse(true);
            }
        } catch ( \Exception $e) {

        }
    }
}
