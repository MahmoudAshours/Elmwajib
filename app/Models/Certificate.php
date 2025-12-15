<?php

namespace App\Models;

use App\Services\Arabic_Glyphs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Certificate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot(): void
    {
        parent::boot();

        static::created(static function (self $certificate) {
            $certificate->update([
                'url' => $certificate->generateCertificate($certificate->user, $certificate->topic)
            ]);
        });
    }

    private function generateCertificate(User $user, Topic $topic): string
    {
        $directoryPath = storage_path("app/public/certificates/$user->id");

        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true, true);
        }

        if (File::exists($directoryPath . '/' . $topic->id . '.jpg')) {
            unlink($directoryPath . '/' . $topic->id . '.jpg');
        }

        $template = public_path("assets/certificate-template.png");
        $fontFile = public_path('fonts/din-next-lt-w23-regular.ttf');
        $glyphs = new Arabic_Glyphs();
        $UserName = $glyphs->utf8Glyphs($user->name);
        $topicTitle = $glyphs->utf8Glyphs($topic->title);

        $image = Image::make($template);

        $image->text($UserName, 421, 250, function ($font) use ($fontFile) {
            $font->file($fontFile);
            $font->size(40);
            $font->color('000000');
            $font->align('center');
            $font->valign('middle');
        });

        $image->text($topicTitle, 421, 390, function ($font) use ($fontFile) {
            $font->file($fontFile);
            $font->size(40);
            $font->color('000000');
            $font->align('center');
            $font->valign('middle');
        });

        $storePath = 'certificates/' . $user->id . '/' . $topic->id . '.jpg';
        $downloadPath = storage_path('app/public/' . $storePath);

        $image->save($downloadPath);

        return $storePath;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function getUrlAttribute($value): string
    {
        return "/storage/$value";
    }
}
