<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\Otps;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class OtpsController extends Controller
{
    /**
     * @throws \Exception
     */
    public function generateCode()
    {
        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /**
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $user = $request->get('user_id');
        $code = $this->generateCode();
        $type = 'Reset';
        $sent_at = date('Y-m-d H:i:s');
        $expires_at = date('Y/m/d H:i:s', strtotime('1 hour'));
        try {
            Otps::create(['user_id' => $user, 'code' => $code, 'type' => $type, 'sent_at' => $sent_at, 'expires_at' => $expires_at, 'isUsed'=>false]);
        } catch (\Exception $e) {
            return response()->noContent(500);
        }
//        Mail::to('serega18102002@gmail.com')->send(new ResetPassword($code));
        return response()->json($code);
    }

    public function code_check(Request $request)
    {
        $user_id = $request->get('user_id');
        $code = $request->get('code');
        try {
            $otps = Otps::where(['code' => $code, 'user_id' => $user_id])->latest()->first();
            if (!$otps->isUsed)
                return response()->json(['message'=>"Код уже был использован"]);
            if ($otps->expires_at > date('Y-m-d H:i:s')) {
                $otps->update(['isUsed'=>true]);
                return response()->noContent(200);
            }
            else {
            return response()->json(['message' => 'Срок действия истек'], 498);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Неправильный код'], 400);
        }
    }

    public function reset(Request $request)
    {
        $user_id = $request->get('user_id');
        $new_pass = $request->get('password');
        User::find($user_id)->update(['password' => Hash::make($new_pass)]);
    }
}
