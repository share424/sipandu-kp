<?php

namespace App\Http\Controllers;

use App\JWT\JWT;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    public function index(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return redirect()->route('auth.index')->withErrors(['msg' => 'Email atau password salah']);
    }

    public function signup(Request $request)
    {
        return view('auth.signup');
    }

    public function createUser(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'hp' => 'required',
            'no_identitas' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'hp' => $request->hp,
            'no_identitas' => $request->no_identitas,
            'alamat' => $request->alamat,
        ]);

        $user->assignRole('user');

        return redirect()->route('auth.index')->with('msg', 'User berhasil dibuat, Silahkan cek email untuk verifikasi akun anda');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('auth.index');
    }

    public function loginSSO(Request $request)
    {

    }

    public function verifySSO(Request $request, $authData)
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false
        ]);
        $ssoDomain = config('sso.domain');

        $response = $client->request('POST', $ssoDomain . '/api/v1/auth/jwt/verify', [
            'form_params' => [
                'token' => $authData,
            ]
        ]);

        $res = json_decode($response->getBody());
        if ($res->status) {
            $JWT = new JWT();
            $JWT->setJWTString($res->data);
            if($JWT->decodeJWT()) {
                // if session is valid then set session and redirect page
				if(session()->getId() == $JWT->getPayloadJWT()->sessionRequest){
					// login sso berhasil
                    $payload = $JWT->getPayloadJWT();
                    $user = User::where('sso_id', $payload->user->id)->first();
                    if (!$user) {
                        $user = User::create([
                            'nama_lengkap' => $payload->user->name,
                            'email' => $payload->user->email,
                            'sso_id' => $payload->user->id,
                            'hp' => $payload->user->phone_number,
                            'no_identitas' => $payload->user->nik,
                            'alamat' => '',
                            'unit' => '',
                            'nip' => $payload->user->username,
                            'password' => bcrypt($payload->user->username),
                        ]);
                        $role = collect($payload->broker_roles)->first();
                        switch($role->role_code) {
                            case 'admin':
                                $user->assignRole(Role::SUPER_ADMIN);
                                break;
                            case 'utpd':
                                $user->assignRole(Role::UPTD);
                                break;
                            case 'kepala_dinas':
                                $user->assignRole(Role::KEPALA_DINAS);
                                break;
                            case 'admin_bidang':
                                $user->assignRole(Role::ADMIN_BIDANG);
                                break;
                            default: // default
                                $user->assignRole(Role::USER);
                                break;
                        }
                    }
                    auth()->login($user);
                    return redirect()->route('home');
				}
            }
        }
    }

    public function createSSORequest(Request $request)
    {
        $payloadJWT = [
            'redirect' 			=> 'http://' . $_SERVER['HTTP_HOST'] . '/verify-sso',
            'urlToRedirect'		=> route('home'),
            'logoutLink' 		=> route('auth.logout'),
            'kode_broker'		=> config('sso.broker_code'),
            'sessionRequest' 	=> session()->getId()
        ];
        $JWT = new JWT();
        $JWT->setPayloadJWT($payloadJWT);
        $JWT->encodeJWT();
        session()->flush();
        $ssoServerLink = config('sso.domain'). '/authBroker/';
        header('Location:'.$ssoServerLink.$JWT->getJWTString());exit;
    }
}
