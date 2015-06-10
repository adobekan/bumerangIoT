<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserDataRequest;
use App\Http\Requests\UserRequest;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {

    /**
     *Define middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator',['except'=>['account','updatePersonalData','updatePersonalPassword']]);
    }

    /**
     * Get all users
     */
    public function index()
    {
      //$users = DB::table('users')->paginate(15);
         $users=User::paginate(25);

        return view('user.index',compact('users'));
    }

    /**
     * Administrator can add new user
     *
     * @param UserRequest $request
     * @return \Illuminate\View\View
     */
    public function store(UserRequest $request)
    {

        $user = new User($request->all());
        $user->level=$request->user_type_list;

        $user->save();
        $userType= UserType::lists('type','id');
        Session::flash('flash_message', 'User was successfully created!');

        return view('user.edit', compact('user','userType'));
    }

    /**
     * Administrator can modify users
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        if($user->id==null)
        {
            $user=Auth::user();
        }
        $userType= UserType::lists('type','id');
        return view('user.edit',compact('user','userType'));
    }

    /**
     * Allow user to change personal data
     *
     * @return \Illuminate\View\View
     */
    public function account()
    {
        $user=Auth::user();
        return view('user.account',compact('user'));
    }

    /**
     * Administrator can update user name/ accessKey /user_type
     *
     * @param User $user
     * @param UserDataRequest $request
     * @return \Illuminate\View\View
     */

    public function updateData(User $user, UserDataRequest $request)
    {
        $user->update(['name'=>$request->name,'accessKey'=>$request->accessKey, 'level'=>$request->user_type_list]);

        Session::flash('flash_message', 'User was successfully updated!');
        $userType= UserType::lists('type','id');
        return view('user.edit', compact('user','userType'));
    }

    /**
     * @param UserDataRequest $request
     * @return \Illuminate\View\View
     */
    public function updatePersonalData( UserDataRequest $request)
    {
        $user=Auth::user();
        $user->update(['name'=>$request->name,'accessKey'=>$request->accessKey]);

        Session::flash('flash_message', 'User was successfully updated!');
        $userType= UserType::lists('type','id');
        return view('user.account', compact('user','userType'));
    }

    /**
     * @param User $user
     * @param PasswordRequest $request
     * @return \Illuminate\View\View
     */
    public function updatePassword(User $user, PasswordRequest $request)
    {
        $old_password=$request->old_password;
        if(Hash::check($old_password,$user->password))
        {

            try{
                $user->password=Hash::make($request->password);
                $user->save();
            }
            catch(Exception $e)
            {
                return response(json(['error' => 'Password update error.']),500);
            }
            Session::flash('flash_message', 'User was successfully updated!');

        }else
        {
            Session::flash('flash_message','Please check your old password');
        }
        $userType= UserType::lists('type','id');

        return view('user.edit', compact('user', 'userType'));
    }

    /**
     * @param PasswordRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse
     */
    public function updatePersonalPassword(PasswordRequest $request)
    {
        $user=Auth::user();
        $old_password=$request->old_password;
        if(Hash::check($old_password,$user->password))
        {
            try{
                $user->password=Hash::make($request->password);
                $user->save();
            }
            catch(Exception $e)
            {
                return response(json(['error' => 'Password update error.']),500);
            }
            Session::flash('flash_message', 'User was successfully updated!');

        }else
        {
            Session::flash('flash_message','Please check your old password');
        }
        return redirect('auth/logout');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $userType= UserType::lists('type','id');
        return view('user.create',compact('userType'));
    }
    /**
     * Administrator can remove a user
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('flash_message', 'Device was successfully deleted!');
        return redirect('user');
    }
}
