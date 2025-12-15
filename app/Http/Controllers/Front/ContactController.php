<?php

namespace App\Http\Controllers\Front;

use App\Models\Message;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use SEO;

class ContactController extends FrontBaseController
{
    public function form(): View|Factory|array|Application
    {
        SEO::setTitle(__('Contact Us'));
        return view('front.pages.contact');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'title' => 'required|max:100',
            'message' => 'required',
            'email' => [Rule::requiredIf(!$user), 'nullable', 'email:rfc,dns'],
            'captcha' => 'required|captcha',
        ], [
            'title.required' => 'عنوان الرسالة مطلوب.',
            'message.required' => 'نص الرسالة مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            "captcha.required" => 'رمز التحقق مطلوب',
            "captcha.captcha" => 'رمز التحقق غير صحيح أعد المحاولة',
        ]);

        $data['email'] = $user->email ?? $data['email'];

        $data['user_id'] = $user?->id;

        $data['message'] = strip_tags($data['message'], ['p', 'ul', 'ol', 'li', 'br', "\n"]);

        Message::create($data);

        $this->alert('success', 'sent');

        return redirect(route('home'));
    }

    public function reloadCaptcha(): JsonResponse
    {
        return response()->json(['captcha' => captcha_src()]);
    }
}
