<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Notifications\ResetPasswordNotification;

class AuthService
{
    public function registerUser(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function sendPasswordResetToken(string $email): ?User
    {
        $user = User::whereEmail($email)->first();

        if (!$user) {
            return null;
        }

        $token = Str::random(60);
        
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        $user->notify(new ResetPasswordNotification($token, $user->email));

        return $user;
    }

    // Método para redefinir a senha
    public function resetPassword(string $token, string $newPassword): ?User
    {
        $passwordReset = DB::table('password_reset_tokens')->whereToken($token)->first();
        
        if (!$passwordReset) {
            return null;
        }
        
        $expirationTime = config('auth.passwords.users.expire');
        if (Carbon::parse($passwordReset->created_at)->addMinutes($expirationTime)->isPast()) {
            return (object)['error' => 'expired'];
        }
        
        $user = User::whereEmail($passwordReset->email)->first();

        if (!$user) {
            return null;
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        DB::table('password_reset_tokens')->whereEmail($user->email)->delete();

        return $user;
    }
}