<div style="margin-bottom: 1rem; padding: 20px;">
    <a href="{{ route('lang.switch', 'en') }}" @class(['font-bold' => app()->getLocale() === 'en'])>🇬🇧 English</a> |
    <a href="{{ route('lang.switch', 'de') }}" @class(['font-bold' => app()->getLocale() === 'de'])>🇩🇪 Deutsch</a>
</div>
