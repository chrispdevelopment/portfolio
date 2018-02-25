<?php
/**
 * @var \Portfolio\Packages\Settings\SettingsObject $settings
 */
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="navbar-brand">
        <div class="navbar-brand-image">
            <a class="" href="{{ url('/') }}">{{$settings->logo_image}}</a>
        </div>
        <div class="navbar-brand-text">
            <div class="main-title">
                <a href="{{ url('/') }}">{{$settings->title}}</a>
            </div>
            <div class="sub-title">
                <a href="{{ url('/') }}">{{$settings->sub_title}}</a>
            </div>
        </div>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#about">About <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#projects">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>