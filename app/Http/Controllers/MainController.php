<?php

namespace Portfolio\Http\Controllers;

use Illuminate\Http\Request;
use Portfolio\Packages\Settings\Settings;

class MainController extends Controller {

    public function index() {

        return view('index', [
            'settings' => Settings::getSettings()
        ]);

    }

}
