<?php

namespace Portfolio\Packages\Settings;

use Portfolio\Repositories\SiteSettingRepository;

/**
 * Class SettingService
 * @package Portfolio\Packages\Settings
 */
class SettingService {

    /** @var SiteSettingRepository */
    private $_siteSettingRepository;

    /** @var SettingsObject */
    private $_settings;

    /**
     * SettingService constructor.
     * @param SiteSettingRepository $settingRepository
     */
    public function __construct(SiteSettingRepository $settingRepository) {

        $this->_siteSettingRepository = $settingRepository;
        $this->_settings = new SettingsObject();

        $settings = $this->_siteSettingRepository->getAllSettings();

        foreach ($settings as $setting) {
            $this->_settings->{$setting->name} = $setting->value;
        }

    }

    /**
     * Get all settings with their values converted to the correct variable type
     *
     * @return \Portfolio\Packages\Settings\SettingsObject
     */
    public function getSettings() {
        return $this->_settings;
    }

}