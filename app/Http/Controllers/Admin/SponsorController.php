<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreSponsorRequest;
use App\Models\Sponsor;
use SEO;

class SponsorController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:manage-content|manage-dashboard');
    }

    public function index()
    {
        SEO::setTitle(__('Sponsors'));

        $sponsors = Sponsor::with('thumbnail')->latest()->get();

        return view('admin.pages.sponsors', compact('sponsors'));
    }

    public function form(Sponsor $sponsor = null)
    {
        $title = $sponsor ? __('Edit Sponsor') . ' : ' . $sponsor->name : __('Add Sponsor');

        SEO::setTitle($title);

        return view('admin.pages.sponsor-form', compact('sponsor', 'title'));
    }

    public function store(StoreSponsorRequest $request, Sponsor $sponsor)
    {
        $model = Sponsor::updateOrCreate(
            ['id' => $sponsor->id],
            $request->validated()
        );

        $this->storeThumbnail($request, $model);

        $this->alert('success', $model->wasRecentlyCreated ? 'create' : 'update');

        return redirect(route('admin.sponsors.index'));
    }

    public function delete(Sponsor $sponsor)
    {
        try {
            $sponsor->delete();
            $this->alert('success', 'delete');
        } catch (\Exception $exception) {
            $this->alert('error', 'delete');
        }

        return redirect(route('admin.sponsors.index'));
    }
}
