<?php declare(strict_types=1);

use Illuminate\Support\Facades\Lang;
use Symfony\Component\Finder\Finder;
use Tests\TestCase;

/**
 * The app runs in Dutch. The translation files should contain exactly the lines that are used:
 * everything the app shows must be Dutch, and nothing unused may linger in the files.
 */
class TranslationsTest extends TestCase
{
    /** Keys used in the app that are already written in Dutch, so they need no translation */
    private const DUTCH_KEYS = [
        'Cadeau',
        'Familie',
        'Inloggen',
        'Link',
        'Mijn lijst',
        'Naam',
        'Nieuw',
        'Onthoud me',
        'Sinterklaasletters',
        'Terug',
        'Uitloggen',
        'Verlanglijstjes',
        'Wachtwoord',
        'Wachtwoord vergeten?',
    ];

    /** Lines the framework translates for features we use: auth notification mails, the mail layout and error pages */
    private const FRAMEWORK_KEYS = [
        // Illuminate\Auth\Notifications\ResetPassword
        'Reset your password',
        'You are receiving this email because we received a password reset request for your account.',
        'Reset Password',
        'This password reset link will expire in :count minutes.',
        'If you did not request a password reset, no further action is required.',
        // Illuminate\Auth\Notifications\VerifyEmail
        'Verify your email address',
        'Please click the button below to verify your email address.',
        'Verify Email Address',
        'If you did not create an account, no further action is required.',
        // notifications::email and mail::message
        'Whoops!',
        'Hello!',
        'Regards,',
        "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\ninto your web browser:",
        'All rights reserved.',
        // errors::* exception pages
        'Unauthorized',
        'Forbidden',
        'Not Found',
        'Page Expired',
        'Too Many Requests',
        'Server Error',
        'Service Unavailable',
    ];

    /** Validation rules used in form requests and controllers ('min' comes from Password::defaults()) */
    private const VALIDATION_RULES = ['confirmed', 'email', 'in', 'min', 'numeric', 'required', 'string', 'url'];

    public function test_app_is_in_dutch(): void
    {
        $this->assertSame('nl', app()->getLocale());
        $this->assertSame(base_path('lang'), app()->langPath());
    }

    public function test_all_used_json_keys_are_translated_to_dutch(): void
    {
        $untranslated = [];
        foreach ($this->usedJsonKeys() as $key) {
            if (! in_array($key, self::DUTCH_KEYS, true) && ! Lang::has($key, 'nl', false)) {
                $untranslated[] = $key;
            }
        }

        $this->assertSame([], $untranslated, 'These keys have no Dutch translation in lang/nl.json');
    }

    public function test_dutch_json_file_contains_only_used_keys(): void
    {
        $translations = json_decode(file_get_contents(lang_path('nl.json')), true, flags: JSON_THROW_ON_ERROR);

        $unused = array_values(array_diff(array_keys($translations), $this->usedJsonKeys()));

        $this->assertSame([], $unused, 'These keys in lang/nl.json are not used');
    }

    public function test_all_used_group_lines_are_translated_to_dutch(): void
    {
        foreach (['auth.failed', 'auth.password', 'auth.throttle'] as $key) {
            $this->assertTrue(Lang::has($key, 'nl', false), "$key is missing");
        }

        foreach (['reset', 'sent', 'throttled', 'token', 'user'] as $status) {
            $this->assertTrue(Lang::has("passwords.$status", 'nl', false), "passwords.$status is missing");
        }

        foreach (self::VALIDATION_RULES as $rule) {
            $this->assertTrue(Lang::has("validation.$rule", 'nl', false), "validation.$rule is missing");
        }
    }

    public function test_dutch_validation_file_contains_only_used_rules(): void
    {
        $rules = array_keys(require lang_path('nl/validation.php'));
        sort($rules);

        $this->assertSame(self::VALIDATION_RULES, $rules);
    }

    public function test_only_used_translation_files_exist(): void
    {
        $files = collect(Finder::create()->files()->in(lang_path())->notName('.DS_Store'))
            ->map(fn (SplFileInfo $file) => str_replace('\\', '/', $file->getRelativePathname()))
            ->sort()
            ->values()
            ->all();

        $this->assertSame(['nl.json', 'nl/auth.php', 'nl/passwords.php', 'nl/validation.php'], $files);
    }

    /**
     * JSON translation keys used by the app's code and views, plus the framework lines for features we use.
     *
     * @return string[]
     */
    private function usedJsonKeys(): array
    {
        $keys = self::FRAMEWORK_KEYS;

        $files = Finder::create()->files()->name('*.php')->in([app_path(), base_path('src'), resource_path('views')]);
        foreach ($files as $file) {
            preg_match_all("/(?:__|@lang|trans)\(\s*'((?:[^'\\\\]|\\\\.)+)'/", $file->getContents(), $matches);
            foreach ($matches[1] as $key) {
                $key = stripslashes($key);
                // group lines like auth.failed live in the PHP files, not in nl.json
                if (! preg_match('/^[a-z_]+\.[a-z_.]+$/', $key)) {
                    $keys[] = $key;
                }
            }
        }

        return array_values(array_unique($keys));
    }
}
