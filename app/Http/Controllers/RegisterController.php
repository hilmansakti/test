<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AdditionalRequest;
use App\Repository\AddressRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\UserCreditCardRepositoryInterface;
use App\Repository\MembershipRepositoryInterface;

use Hash;
use Session;

class RegisterController extends Controller
{
    protected $addressRepository;
    protected $userRepository;
    protected $userCCRepository;
    protected $membershipRepository;

    public function __construct(
        AddressRepositoryInterface $addressRepository, 
        UserRepositoryInterface $userRepository, 
        UserCreditCardRepositoryInterface $userCCRepository, 
        MembershipRepositoryInterface $membershipRepository ) {
        $this->middleware('guest');

        $this->userRepository = $userRepository;
        $this->membershipRepository = $membershipRepository;
        $this->addressRepository = $addressRepository;
        $this->userCCRepository = $userCCRepository;

    }

    /**
     * register foem one
     */
    public function index() {
        return view('auth.register');
    }

    /**
     * submit user credential
     */

    public function register_one(RegisterRequest $request) {

        $validator = $request->validated();
        $register = $this->userRepository->create($request->all());

        if($register) {            
            return redirect()->route('register.index-two', $register->id)->with('success', "You have registered successfully. Please complete form below!");        
        }

        Session::flash('error', 'Something went wrong!');
        return redirect()->back()->withInput();        
    }

    /**
     * register form two
     */

    public function index_two($user_id) {
        $membership = $this->membershipRepository->all();
        $data = [
            'user_id'       => $user_id,
            'membership'    => $membership
        ];

        return view('auth.register2', $data);
    }

    public function getMembershipFee(Request $request) {
        $membership_id = $request->membership_id;
        $gender = $request->gender;
        $old = $request->age;

        $membership = $this->membershipRepository->find($membership_id);        
        $vat = $membership->vat;

        switch ($membership->slug) {
            case "silver":
                if($gender == 'female' && $old > 17) {
                    $vat = 0;
                }
              break;
            case "gold":
                if($gender == 'female' && $old > 20) {
                    $vat = 0;
                }
              break;
            case "platinum":
                if($gender == 'female' && $old > 22) {
                    $vat = 0;
                }
              break;
            default:
                $vat = 10;
          }

        return response()->json([
            "success"   => true,
            "fee"       => "Rp ".number_format($membership->fee),
            "vat"       => $vat."%"
        ], 200);

    }



    /**
     * submit user additional information
     */
    public function register_two(AdditionalRequest $request) {
        $user_id = $request->user_id;
        $user = $this->userRepository->update($user_id, $request->only('dob'));

        $address = $request->address;
        foreach($address as $addr) {
            $addr['user_id'] = $user_id;
            $this->addressRepository->create($addr);
        }

        $membership_id = $request->membership;        
        $add = $this->userRepository->setMembership(['user_id' => $user_id, 'membership_id' => $membership_id]);

        if(!$add)
            return redirect()->back()->with('error', 'Error adding membership!')->withInput();

        $cc = $request->only('number', 'type', 'exp_date', 'user_id');
        $cc = $this->userCCRepository->create($cc);
        
        if(!$cc)
            return redirect()->back()->with('error', 'Error adding CC!')->withInput();


        return redirect()->route('register.success')->with('Success', 'Data has been saved!');

    }

    public function success() {
        $data = [
            
        ];

        return view('auth.success', $data);
    }

    
}

