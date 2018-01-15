INSERT INTO `spot` (`id`, `nom`, `description`, `photo`, `typePlage`, `interdiction`, `famille`, `frequentation`, `danger`, `accesParking`, `longitude`, `latitude`, `valider`, `user_id`, `created_at`, `updated_at`) VALUES ('0', 'Coudalère', 'spot de vague par tram forte', 'photo.png', 'beton', 'aucune', '0', 'moyen', 'digue, rocher', 'facile, 500mètres de la 2x2 voie', '3.017967', '42.815422', 'ok', '1', '2018-01-14 00:00:00', '2018-01-14 00:00:00');

INSERT INTO `sport` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES ('0', 'planche a voile', 'sport trop bien !!', '2018-01-14 00:00:00', '2018-01-14 00:00:00');

INSERT INTO `disciplines` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES ('0', 'Vague', 'Avec des vague et tu vent ', '2018-01-14 00:00:00', '2018-01-14 00:00:00');

INSERT INTO `post` (`id`, `bestWindForceMinus`, `bestWindDirection`, `levelMini`, `danger`, `user_id`, `sport_id`, `spot_id`, `discipline_id`, `created_at`, `updated_at`, `bestWindForceMax`) VALUES ('0', '25', 'O – NO', '3', 'digues, rochers', '1', '1', '1', '1', '2018-01-14 00:00:00', '2018-01-14 00:00:00', '30');