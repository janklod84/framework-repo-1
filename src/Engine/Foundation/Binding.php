<?php 
use JanKlod\Collections\Collection;
use JanKlod\Foundation\Setting;


return [
	'env' => function () {
		return Setting::APP_ENV;
	},
	'collection' => function () {
		return new Collection();
	}, 
	'base_url' => function () {
		return $this->app->configs['app']['base_url'] ?? '';
	}
];