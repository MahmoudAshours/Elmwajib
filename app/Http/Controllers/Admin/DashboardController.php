<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use JsonException;
use Spatie\Analytics\Period;
use Analytics;
use SEO;

class DashboardController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:manage-content|manage-dashboard');
    }

    private function mostVisitedPages(): array|null
    {
        /* Fetch Most Visited Pages */
        $app_name = config('seotools.meta.defaults.separator') . config('seotools.meta.defaults.title');
        $most_visited_pages = Analytics::fetchMostVisitedPages(Period::days(30), 10);
        $pages_visits = [];

        foreach ($most_visited_pages as $page) {
            if (!str_contains($page['url'], '/admin/') && !str_contains($page['url'], '/login') && !str_contains($page['url'], '/register')) {
                $pages_visits[trim(str_replace($app_name, '', $page['pageTitle']))] = $page['pageViews'];
            }
        }

        return $pages_visits;
    }

    private function pageViews(): array|null
    {
        /* fetch Total Visitors And Page Views */
        $analytics = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7))->slice(0, -1);

        $pages_views = [];

        foreach ($analytics as $analytic) {
            $date = $analytic['date']->translatedFormat('l');
            $views = $analytic['pageViews'];
            $pages_views[$date] = $views;
        }

        return array_reverse($pages_views);
    }

    private function newVisitors(): int|string|null|bool
    {
        return Analytics::fetchUserTypes(Period::days(7))->where('type', 'New Visitor')->first()['sessions'] ?? 0;
    }

    /**
     * @throws JsonException
     */
    public function __invoke(Request $request): View|Factory|array|Application
    {
        SEO::setTitle(__('Dashboard'));

        $users = User::with('thumbnail')
            ->withLessonsCount()
            ->WithReadingRate();

        try {
            $backubs = File::files(storage_path('app/faz-book-backup'));
        } catch (\Exception | \Error | \Throwable $e) {
            $backubs = [];
        }

        $count = [
            'users' => User::count(),
            'questions' => Question::count(),
            'downloads' => json_decode(file_get_contents(storage_path('stats/book-downloads.json')), true, 512, JSON_THROW_ON_ERROR),
        ];

        $last_weak_visits = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7))->slice(0, -1)->sum('pageViews');

        $last_month_visits = Analytics::fetchTotalVisitorsAndPageViews(Period::days(30))->slice(0, -1)->sum('pageViews');

        $last_year_visits = Analytics::fetchTotalVisitorsAndPageViews(Period::days(365))->slice(0, -1)->sum('pageViews');

        $all_page_visits = Analytics::fetchTotalVisitorsAndPageViews(Period::days(Carbon::parse('01-01-2022')->diffInDays(now())))->slice(0, -1)->sum('pageViews');

        /* fetch Page Views */
        $pages_views = $this->pageViews();

        /* Fetch Most Visited Pages */
        $most_visited_pages = $this->mostVisitedPages();

        $new_visitors = $this->newVisitors();

        return view('admin.pages.dashboard', get_defined_vars());
    }
}
