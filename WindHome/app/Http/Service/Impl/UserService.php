<?php


namespace App\Http\Service\Impl;


use App\Http\Middleware\login;
use App\Http\Repository\Contract\UserRepositoryInterface;
use App\Http\Service\ServiceInterface\UserServiceInterface;
use App\Mail\ResetPasswordWindhome;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;



class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function store($request)
    {
        $data = $request->all();
        $this->userRepository->store($data);
    }

    public function update($request, $id)
    {
        $user = $this->userRepository->findById($id);
        $data = $request->all();
        $this->userRepository->update($user, $data);
        Session::flash('message', 'Cập nhật hồ sơ thành công');

    }

    public function updatePassword($request, $id)
    {
        $user = $this->userRepository->findById($id);
        $data = [];
        $data['password'] = Hash::make($request->passwordNew);
        $this->userRepository->update($user, $data);
        Session::flash('message', 'Đổi mật khẩu thành công');
    }

    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function destroy($id)
    {
        $user = $this->userRepository->findById($id);
        $this->userRepository->destroy($user);
    }

    public function findByEmail($email)
    {
        $userFind = User::where('email', $email)->get();
        if(count($userFind) != 0){
            $user = $userFind[0];
            $pass = str_random(8);
            $data= [];
            $data['password'] = Hash::make($pass);
            $this->userRepository->update($user, $data);
            $subject = 'WindHome thông báo thay đổi mật khẩu';
            $message = 'Mật khẩu mới của bạn tại WinHome là: '.$pass;
            $mail = new ResetPasswordWindhome($subject, $message);
            Mail::to($email)->send($mail);

//            dd($mail);
            Session::flash('status', 'Kiểm tra mật khẩu mới trong email của bạn');
            return view('auth.login');
        }
        else {

            Session::flash('status', 'Email không tồn tại');
            return redirect()->back();
        }

    }
}
