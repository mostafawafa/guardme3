<?php

namespace Responsive\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Responsive\Http\Controllers\Controller;
use Responsive\User;

class VerificationController extends Controller
{
    /**
     * Check for verification status
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getVerificationStatus(Request $request)
    {
        // convert string to integer, return false if not integer
        $userId = filter_var($request->get('uid'), FILTER_VALIDATE_INT);

        if (! is_int($userId)) {
            return response()->json([
                'data' => [],
                'meta' => [
                    'msg' => 'BAD_REQUEST',
                    'status' => 400
                ]
            ], 400);
        }

        try {
            $user = User::findOrFail($userId);

            return response()->json([
                'data' => [
                    'is_verified' => $user->verified ? true : false
                ],
                'meta' => [
                    'msg' => 'OK',
                    'status' => 200
                ]
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'data' => [],
                'meta' => [
                    'msg' => 'USER_NOT_FOUND',
                    'status' => 404
                ]
            ], 404);
        }
    }

    /**
     * Handle the user verification
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postVerified(Request $request)
    {
        try {
            $this->validate($request, ['user_id' => 'required|exists:users,id']);

            $user = User::findOrFail($request->input('user_id'));

            $user->processVerify();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'data' => [],
                'meta' => [
                    'msg' => 'USER_NOT_FOUND',
                    'status' => 404
                ]
            ], 404);
        } catch (\Responsive\Exceptions\Auth\UserIsVerifiedException $e) {
            return response()->json([
                'data' => [],
                'meta' => [
                    'msg' => 'ALREADY_VERIFIED',
                    'status' => 202
                ]
            ], 202);
        }

        return response()->json([
            'data' => $user,
            'meta' => [
                'msg' => 'OK',
                'status' => 200
            ]
        ], 200);
    }

    /**
     * Set the user as unverified
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postUnverified(Request $request)
    {
        try {
            $this->validate($request, ['user_id' => 'required|exists:users,id']);

            $user = User::findOrFail($request->input('user_id'));

            $user->setAsUnverified();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'data' => [],
                'meta' => [
                    'msg' => 'USER_NOT_FOUND',
                    'status' => 404
                ]
            ], 404);
        }

        return response()->json([
            'data' => $user,
            'meta' => [
                'msg' => 'OK',
                'status' => 200
            ]
        ], 200);
    }
}