<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\UpdatePasswordRequest;
use App\Http\Requests\Front\UpdateProfileRequest;
use App\Models\Certificate;
use App\Models\Country;
use SEO;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProfileController extends FrontBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function profile()
    {
        SEO::setTitle(__('Profile'));

        $user = auth()->user();
        $genders = ['male', 'female'];
        $countries = Country::all();
        return view('front.pages.profile', compact('user', 'genders', 'countries'));
    }

    public function account()
    {
        SEO::setTitle(__('Profile'));

        $user = auth()->user();

        return view('front.pages.account-settings', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());

        $this->storeThumbnail($request, $user);

        $this->alert('success', 'update');

        return redirect(route('users.profile'));
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);

        $this->alert('success', 'update');

        return redirect(route('users.profile'));
    }

    public function certificates()
    {
        $user = auth()->user()->load('certificates');

        return view('front.pages.certificates', compact('user'));
    }

    public function downloadCertificate(Certificate $certificate): BinaryFileResponse
    {
        $certificate_url = public_path($certificate->url);

        $certificate_name = "{$certificate->topic->code}." . extension($certificate_url);

        $headers = [
            'Cache-Control' => 'no-cache, must-revalidate , no-store',
        ];

        return response()->download($certificate_url, $certificate_name, $headers);
    }
}
