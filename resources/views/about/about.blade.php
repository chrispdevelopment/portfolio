<?php
/**
 * @var \Portfolio\Packages\Settings\SettingsObject $settings
 */
?>

<a name="about"></a>
<div class="row about">
    <div class="col-auto offset-1 logo">
        {{$settings->logo_image}}
    </div>
    <div class="col-auto title align-self-center">
        <div class="main-title">
            {{$settings->title}}
        </div>
        <div class="sub-title">
            {{$settings->sub_title}}
        </div>
    </div>
</div>

<div class="row justify-content-center about">
    <div class="col-11 intro">
        <div class="col-12">
            {{$settings->intro}}
        </div>
        <div class="collapse col-12" id="collapseExtraIntro">
            {{$settings->extra_info}}
        </div>
        <div class="col-12 collapse-extra-info">
            <a data-toggle="collapse" href="#collapseExtraIntro" aria-expanded="false" aria-controls="collapseExtraIntro">More Info <i class="fas fa-angle-double-down"></i></a>
        </div>
    </div>
</div>