<?php

namespace app\Packages\Settings;

use Illuminate\Support\Facades\Facade;
use Portfolio\Packages\Settings\SettingsObject;

/**
 * Class Settings
 * @package app\Packages\Settings
 *
 * @method static SettingsObject getSettings()
 *
 * @see \Portfolio\Packages\Settings\SettingService
 */
class Settings extends Facade {

    protected static function getFacadeAccessor() {
        return 'settings';
    }

}