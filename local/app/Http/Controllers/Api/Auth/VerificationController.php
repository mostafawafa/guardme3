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
            throw new \Exception("UID param is required and should be in integer");
        }

        $user = User::findOrFail($userId);

        return response()->json([
            'is_verified' => $user->verified ? true : false
        ]);
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
                'status'  => 'error',
                'type'    => 'user_not_found',
                'message' => 'The given User ID is not found.'
            ], 400);
        } catch (\Responsive\Exceptions\Auth\UserIsVerifiedException $e) {
            return response()->json([
                'status'  => 'error',
                'type'    => 'already_verified',
                'message' => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'status'  => 'success',
            'type'    => 'verified',
            'message' => 'Your account has been successfully verified.'
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
                'status'  => 'error',
                'type'    => 'user_not_found',
                'message' => 'The given User ID is not found.'
            ], 400);
        }

        return response()->json([
            'status'  => 'success',
            'type'    => 'unverified',
            'message' => 'Your account has been successfully unverified.'
        ], 200);
    }
}