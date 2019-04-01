<?php 
use JanKlod\Collections\Collection;
use JanKlod\Foundation\Setting;


return [
	'env' => function () {
		return Setting::APP_ENV;
	},
	'collection' => function () {
		return new Collection();
	}
];