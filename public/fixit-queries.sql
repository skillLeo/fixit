INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (NULL, 'backend.customer.index', 'web', NULL, NULL), (NULL, 'backend.customer.create', 'web', NULL, NULL), (NULL, 'backend.customer.edit', 'web', NULL, NULL), (NULL, 'backend.customer.destroy', 'web', NULL, NULL);
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (NULL, 'backend.additional-service.index', 'web', '2024-10-03 14:34:22', '2024-10-03 14:34:22'), (NULL, 'backend.additional-service.create', 'web', '2024-10-03 14:34:22', '2024-10-03 14:34:22'), (NULL, 'backend.additional-service.edit', 'web', '2024-10-03 14:34:22', '2024-10-03 14:34:22'), (NULL, 'backend.additional-service.destroy', 'web', '2024-10-03 14:34:22', '2024-10-03 14:34:22')
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('125', '1'), ('126', '1'), ('127', '1'), ('128', '1'), ('125', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('135', '1'), ('136', '1'), ('137', '1'), ('138', '1'), ('135', '3'), ('136', '3'), ('137', '3'), ('138', '3')
DELETE FROM `role_has_permissions` WHERE `role_has_permissions`.`permission_id` = 125 AND `role_has_permissions`.`role_id` = 3;
UPDATE `permissions` SET `name` = 'backend.wallet.credit' WHERE `permissions`.`id` = 52;
UPDATE `permissions` SET `name` = 'backend.wallet.debit' WHERE `permissions`.`id` = 53;

DELETE FROM `role_has_permissions` WHERE `role_has_permissions`.`permission_id` = 32 AND `role_has_permissions`.`role_id` = 2;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('129', 'backend.serviceman_wallet.index', 'web', NULL, NULL), ('130', 'backend.serviceman_wallet.credit', 'web', NULL, NULL), ('131', 'backend.serviceman_wallet.debit', 'web', NULL, NULL);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('129', '1'), ('130', '1'), ('131', '1'), ('129', '4');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('101', '2');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('101', '3'), ('102', '3'), ('103', '3'), ('104', '3');

ALTER TABLE `exclude_services_coupons` ADD PRIMARY KEY( `id`);
ALTER TABLE `exclude_services_coupons` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `services_coupons` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT;
UPDATE `currencies` SET `system_reserve` = '0' WHERE `currencies`.`id` = 1;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('132', 'backend.serviceman_withdraw_request.index', 'web', NULL, NULL), ('133', 'backend.serviceman_withdraw_request.create', 'web', NULL, NULL), ('134', 'backend.serviceman_withdraw_request.action', 'web', NULL, NULL);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('132', '1'), ('133', '1'), ('134', '1'), ('132', '3'), ('134', '3'), ('132', '4'), ('133', '4');

UPDATE `settings` SET `values` = '{\r\n    \"mail\": null,\r\n    \"email\": {\r\n        \"mail_host\": \"smtp.gmail.com\",\r\n        \"mail_port\": \"587\",\r\n        \"mail_mailer\": \"smtp\",\r\n        \"mail_password\": \"kpsdqncnjdwgbeld\",\r\n        \"mail_username\": \"fixit.pixelstrap@gmail.com\",\r\n        \"mail_from_name\": \"Fixit\",\r\n        \"mail_encryption\": \"tls\",\r\n        \"mail_from_address\": \"fixit.pixelstrap@gmail.com\"\r\n    },\r\n    \"general\": {\r\n        \"mode\": \"light\",\r\n        \"favicon\": \"https://laravel.pixelstrap.net/fixit/storage/545/faviconIcon.png\",\r\n        \"copyright\": \"Copyright 2024 Â© Fixit theme by pwixelstrap\",\r\n        \"dark_logo\": \"https://laravel.pixelstrap.net/fixit/storage/547/logo-dark.png\",\r\n        \"site_name\": \"Fixit\",\r\n        \"light_logo\": \"https://laravel.pixelstrap.net/fixit/storage/546/Logo-Light.png\",\r\n        \"platform_fees\": \"10\",\r\n        \"default_timezone\": \"Pacific/Wake\",\r\n        \"min_booking_amount\": \"10\",\r\n        \"platform_fees_type\": \"fixed\",\r\n        \"default_currency_id\": \"1\",\r\n        \"default_language_id\": \"1\"\r\n    },\r\n    \"firebase\": {\r\n        \"service_json\": {\r\n            \"type\": \"service_account\",\r\n            \"auth_uri\": \"https://accounts.google.com/o/oauth2/auth\",\r\n            \"client_id\": \"106003570537958311205\",\r\n            \"token_uri\": \"https://oauth2.googleapis.com/token\",\r\n            \"project_id\": \"fixit-db226\",\r\n            \"private_key\": \"-----BEGIN PRIVATE KEY-----\\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDT2xgBDx+q1gxt\\nyPN9guKC8JVIstknDYa6xrfK5zsofUiTHlirWq0VJ/+mHlfmkBBABJ14WaEmVQ8p\\nGVpDQovwR1HtGzDkoHM9pwOmGZBzQv41bR3YPSw53JaJqHJakCOrbgE/O6rUJLIM\\nLcjxTCUL9OQrFtuaOV6y3VbHnOlidpE2nWr9E15DKm6XntHvRWL1bVq3SL9ZVD7P\\nzvE9mHOIm+SQRjGRuboHogeilyjXmC0Nhts37wLb/M6vs+v/xD98lW921B9x3S2Z\\nMqgKGj8YWsGCu1BeFtgoOHz60qhBPktVMjoIwBpaoEsNhBLcsgLUX1XO0KnO11i4\\nj+nHC/LnAgMBAAECggEAU21j9obOIahJHLKVsEdqi8XSA97qRMa+166Jkg2c7kTn\\n34eDw3bh0gL+WZx5YQI6Y/ttR4eEPmQgpD6nnPUHxodPa9/ZUS8eMpkihrZqe/lV\\nwhRGPHFaiS6k2XDMF33LjiaztwL4MrKAquscxmkF7b9yWsWVlRYihK1FDzZrcaon\\ngnaM3ZTZH+zR81pDmQmJhRVkMQQiB9ADUqYxH7ZfKLTvq0kUGx2qJ9oSULyf2XjP\\nkjT4opMNLCX45z6myB1Uxp/WsjUoxkBfQU7R7++kxS/VWJ9Dp9xXxaE5wEDRDIB3\\nppj5Tb9Hu9uwL0JXYd18Zz3nj0vR2NdKb8uvTkURgQKBgQD6GHAiGcGUxSeM6li9\\nRhMWQ0Lni5hs425CAaMIVnw7VwFB35bmPMBuwc/l1C3pVN5fMQVFqb+kTE6q5yvB\\nIm/yXewJ3IrtbarCqrFbAMNJZamn/8+ib71Vhn8DsaX3rpgBSw/P4+6GJAmlVIDB\\n/LvIjKHWOPGXQwWyuNGLf1cakwKBgQDY24mpLyqE4cf7Oj8HS+c0RKqYkBHmGfwY\\ntkVEGkyjLHwUe79UftsWNW6FDUVfqxxurzqId1+esC9HrfPK77LsbQTXOBXSrUql\\nUgkf+ZyWQ93AZBXGTUIu+MRuUfUgzskqEZZu1qXhE8wDaXlUpGWo2sM5TfEncyDP\\n/KrbFiU23QKBgF4EY9sd7Zz8xNJ/op58wl4jKPqcis+ca+2aaeyPfqJcIdfesv6Y\\npgq9B2ex7RSDWBlW91Fp7+ZW3Vf4EYXIaWcmkb5fT0bUbFZEDupUDhYAhtfmHetF\\nsFp/di4wUWEcHH6X9jjDyf5Ze9rQOpsyZHGPFKPQwlmH05ONURDs7RTLAoGBAM9m\\nkC9N29WA9rlwyI0a7AISVjJZP7UZTwD3eiGbIYbB6d3RSHjwZmrEKXJ48cuApE27\\nqziPKtVjXaSpWsvRGgeCcKnBiyWV9RlN70o0ea1BNRlm32hrxYuVApEcM1vwSXbB\\noWVaRwWP4IO24YKxREUNDL+Gqsh3FH+3AFVOxcLFAoGAOqs1vG0wZwPoEegYs5dB\\nuDfX4oKibtFN+hegKeRZeG6p0QBEeP/FQtKiUFzSzEfooni4kWtI9hDWnHz5VMR/\\na+de7UQrU9sSHRy/42EEZV9mZ+YFfuiSm15OgipHaVK3Mc0EysYxq+qOj1BV2FQT\\nQTR3pra+lZtYzcDkhs2295I=\\n-----END PRIVATE KEY-----\\n\",\r\n            \"client_email\": \"firebase-adminsdk-fd7gn@fixit-db226.iam.gserviceaccount.com\",\r\n            \"private_key_id\": \"cf47d079e87639acd62596406da41f03d3dd9dcd\",\r\n            \"universe_domain\": \"googleapis.com\",\r\n            \"client_x509_cert_url\": \"https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-fd7gn%40fixit-db226.iam.gserviceaccount.com\",\r\n            \"auth_provider_x509_cert_url\": \"https://www.googleapis.com/oauth2/v1/certs\"\r\n        },\r\n        \"google_map_api_key\": \"\"\r\n    },\r\n    \"activation\": {\r\n        \"cash\": \"1\",\r\n\"subscription_enable\": \"1\",\r\n        \"coupon_enable\": \"1\",\r\n        \"wallet_enable\": \"1\",\r\n        \"default_credentials\": \"1\",\r\n        \"extra_charge_status\": \"1\",\r\n        \"platform_fees_status\": \"1\",\r\n        \"service_auto_approve\": \"1\",\r\n        \"provider_auto_approve\": \"1\"\r\n    },\r\n    \"google_reCaptcha\": {\r\n        \"secret\": null,\r\n        \"status\": \"0\",\r\n        \"site_key\": null\r\n    },\r\n    \"subscription_plan\": {\r\n        \"free_trial_days\": \"7\",\r\n        \"free_trial_enabled\": \"1\"\r\n    },\r\n    \"provider_commissions\": {\r\n        \"status\": \"0\",\r\n        \"min_withdraw_amount\": \"500\",\r\n        \"default_commission_rate\": \"10\",\r\n        \"is_category_based_commission\": \"1\"\r\n    },\r\n    \"default_creation_limits\": {\r\n        \"allowed_max_services\": \"5\",\r\n        \"allowed_max_addresses\": \"5\",\r\n        \"allowed_max_servicemen\": \"10\",\r\n        \"allowed_max_service_packages\": \"3\"\r\n    }\r\n}' WHERE `settings`.`id` = 1;

CREATE TABLE `serviceman_wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `serviceman_id` bigint UNSIGNED DEFAULT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `serviceman_wallets`
--
ALTER TABLE `serviceman_wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceman_wallets_serviceman_id_foreign` (`serviceman_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `serviceman_wallets`
--
ALTER TABLE `serviceman_wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `serviceman_wallets`
--
ALTER TABLE `serviceman_wallets`
  ADD CONSTRAINT `serviceman_wallets_serviceman_id_foreign` FOREIGN KEY (`serviceman_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;


CREATE TABLE `serviceman_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `serviceman_wallet_id` bigint UNSIGNED DEFAULT NULL,
  `serviceman_id` bigint UNSIGNED DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `type` enum('credit','debit') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `serviceman_transactions`
--
ALTER TABLE `serviceman_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceman_transactions_serviceman_wallet_id_foreign` (`serviceman_wallet_id`),
  ADD KEY `serviceman_transactions_serviceman_id_foreign` (`serviceman_id`),
  ADD KEY `serviceman_transactions_from_foreign` (`from`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `serviceman_transactions`
--
ALTER TABLE `serviceman_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `serviceman_transactions`
--
ALTER TABLE `serviceman_transactions`
  ADD CONSTRAINT `serviceman_transactions_from_foreign` FOREIGN KEY (`from`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `serviceman_transactions_serviceman_id_foreign` FOREIGN KEY (`serviceman_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `serviceman_transactions_serviceman_wallet_id_foreign` FOREIGN KEY (`serviceman_wallet_id`) REFERENCES `serviceman_wallets` (`id`) ON DELETE CASCADE;


CREATE TABLE `serviceman_withdraw_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) DEFAULT '0.00',
  `message` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_message` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `serviceman_wallet_id` bigint UNSIGNED DEFAULT NULL,
  `serviceman_id` bigint UNSIGNED DEFAULT NULL,
  `payment_type` enum('paypal','bank') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'bank',
  `is_used_by_admin` int NOT NULL DEFAULT '0',
  `is_used` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `withdraw_requests`
--
ALTER TABLE `serviceman_withdraw_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceman_withdraw_requests_serviceman_wallet_id_foreign` (`serviceman_wallet_id`),
  ADD KEY `serviceman_withdraw_requests_serviceman_id_foreign` (`serviceman_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `withdraw_requests`
--
ALTER TABLE `serviceman_withdraw_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `withdraw_requests`
--
ALTER TABLE `serviceman_withdraw_requests`
  ADD CONSTRAINT `serviceman_withdraw_requests_serviceman_id_foreign` FOREIGN KEY (`serviceman_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `serviceman_withdraw_requests_serviceman_wallet_id_foreign` FOREIGN KEY (`serviceman_wallet_id`) REFERENCES `serviceman_wallets` (`id`) ON DELETE CASCADE;
COMMIT;

ALTER TABLE `users` DROP FOREIGN KEY `users_company_id_foreign`; ALTER TABLE `users` ADD CONSTRAINT `users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `time_slots` DROP FOREIGN KEY `time_slots_provider_id_foreign`; ALTER TABLE `time_slots` ADD CONSTRAINT `time_slots_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT; ALTER TABLE `time_slots` DROP FOREIGN KEY `time_slots_serviceman_id_foreign`; ALTER TABLE `time_slots` ADD CONSTRAINT `time_slots_serviceman_id_foreign` FOREIGN KEY (`serviceman_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

UPDATE `currencies` SET `system_reserve` = '0' WHERE `currencies`.`id` = 1;

ALTER TABLE `services` ADD `per_serviceman_commission` DECIMAL(4,2) NULL DEFAULT NULL AFTER `discount`;

DELETE FROM `role_has_permissions` WHERE `role_has_permissions`.`permission_id` = 32 AND `role_has_permissions`.`role_id` = 4;

--
-- Table structure for table `serviceman_commissions`
--

CREATE TABLE `serviceman_commissions` (
  `id` bigint UNSIGNED NOT NULL,
  `commission_history_id` bigint UNSIGNED NOT NULL,
  `serviceman_id` bigint UNSIGNED NOT NULL,
  `commission` decimal(8,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `serviceman_commissions`
--
ALTER TABLE `serviceman_commissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceman_commissions_commission_history_id_foreign` (`commission_history_id`),
  ADD KEY `serviceman_commissions_serviceman_id_foreign` (`serviceman_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `serviceman_commissions`
--
ALTER TABLE `serviceman_commissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `serviceman_commissions`
--
ALTER TABLE `serviceman_commissions`
  ADD CONSTRAINT `serviceman_commissions_commission_history_id_foreign` FOREIGN KEY (`commission_history_id`) REFERENCES `commission_histories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `serviceman_commissions_serviceman_id_foreign` FOREIGN KEY (`serviceman_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('39', '4')

-------------------- New Query :- 26-08-2024 -: -------------------------

--
-- Table structure for table `booking_additional_services`
--

CREATE TABLE `booking_additional_services` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `additional_service_id` bigint UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking_additional_services`
--

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_servicemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initial_price` decimal(10,2) DEFAULT NULL,
  `final_price` decimal(10,2) DEFAULT NULL,
  `status` enum('open','pending','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `service_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `provider_id` bigint UNSIGNED DEFAULT NULL,
  `created_by_id` bigint UNSIGNED DEFAULT NULL,
  `booking_date` datetime DEFAULT NULL,
  `category_ids` json DEFAULT NULL,
  `locations` json DEFAULT NULL,
  `location_coordinates` json DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_requests_service_id_foreign` (`service_id`),
  ADD KEY `service_requests_user_id_foreign` (`user_id`),
  ADD KEY `service_requests_provider_id_foreign` (`provider_id`),
  ADD KEY `service_requests_created_by_id_foreign` (`created_by_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD CONSTRAINT `service_requests_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_requests_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_requests_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` bigint UNSIGNED NOT NULL,
  `service_request_id` bigint UNSIGNED DEFAULT NULL,
  `provider_id` bigint UNSIGNED DEFAULT NULL,
  `amount` decimal(8,4) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('rejected','accepted','requested') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bids_service_request_id_foreign` (`service_request_id`),
  ADD KEY `bids_provider_id_foreign` (`provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bids_service_request_id_foreign` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;
COMMIT;

--
-- Table structure for table `service_request_zones`
--

CREATE TABLE `service_request_zones` (
  `id` bigint UNSIGNED NOT NULL,
  `service_request_id` bigint UNSIGNED DEFAULT NULL,
  `zone_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_request_zones`
--
ALTER TABLE `service_request_zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_request_zones_service_request_id_foreign` (`service_request_id`),
  ADD KEY `service_request_zones_zone_id_foreign` (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_request_zones`
--
ALTER TABLE `service_request_zones` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_request_zones`
--
ALTER TABLE `service_request_zones`
  ADD CONSTRAINT `service_request_zones_service_request_id_foreign` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_request_zones_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;
COMMIT;


ALTER TABLE `services` ADD `parent_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `user_id`;

INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES (NULL, 'service_request', '{\"index\":\"backend.service_request.index\",\"create\":\"backend.service_request.create\",\"edit\":\"backend.service_request.edit\",\"destroy\":\"backend.service_request.destroy\"}', '2024-10-07 18:52:20', '2024-10-07 18:52:20'), (NULL, 'bids', '{\"index\":\"backend.bid.index\",\"create\":\"backend.bid.create\",\"edit\":\"backend.bid.edit\",\"destroy\":\"backend.bid.destroy\"}', NULL, NULL);

--
-- Table structure for table `banner_zones`
--

CREATE TABLE `banner_zones` (
  `id` bigint UNSIGNED NOT NULL,
  `banner_id` bigint UNSIGNED NOT NULL,
  `zone_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner_zones`
--
ALTER TABLE `banner_zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banner_zones_banner_id_foreign` (`banner_id`),
  ADD KEY `banner_zones_zone_id_foreign` (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner_zones`
--
ALTER TABLE `banner_zones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner_zones`
--
ALTER TABLE `banner_zones`
  ADD CONSTRAINT `banner_zones_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `banner_zones_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;
COMMIT;


INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (150, 'backend.review.edit', 'web', '2024-10-11 09:41:01', '2024-10-11 09:41:01');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('150', '1'), ('150', '2');
UPDATE `modules` SET `actions` = '{\r\n \"index\": \"backend.review.index\",\r\n \"create\": \"backend.review.create\",\r\n \"edit\": \"backend.review.edit\",\r\n \"destroy\": \"backend.review.destroy\"\r\n}' WHERE `modules`.`id` = 17;


--
-- Table structure for table `coupon_users`
--

CREATE TABLE `coupon_users` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_zones`
--

CREATE TABLE `coupon_zones` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED NOT NULL,
  `zone_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon_users`
--
ALTER TABLE `coupon_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_users_coupon_id_foreign` (`coupon_id`),
  ADD KEY `coupon_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `coupon_zones`
--
ALTER TABLE `coupon_zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_zones_coupon_id_foreign` (`coupon_id`),
  ADD KEY `coupon_zones_zone_id_foreign` (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon_users`
--
ALTER TABLE `coupon_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_zones`
--
ALTER TABLE `coupon_zones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coupon_users`
--
ALTER TABLE `coupon_users`
  ADD CONSTRAINT `coupon_users_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_zones`
--
ALTER TABLE `coupon_zones`
  ADD CONSTRAINT `coupon_zones_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_zones_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;
COMMIT;


ALTER TABLE `services` ADD COLUMN `destination_location` JSON NULL;

ALTER TABLE `services` CHANGE `type` `type` ENUM('fixed','provider_site','remotely') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'fixed';
ALTER TABLE `bookings` ADD `type` ENUM('fixed','provider_site','remotely','') NOT NULL DEFAULT 'fixed' AFTER `service_price`;


-- Insert modules
INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES
(NULL, 'sms_templates', '{\"index\":\"backend.sms_template.index\",\"edit\":\"backend.sms_template.edit\"}', '2024-10-17 11:57:19', '2024-10-17 11:57:19'),
(NULL, 'email_templates', '{\"index\":\"backend.email_template.index\",\"edit\":\"backend.email_template.edit\"}', '2024-10-17 11:57:19', '2024-10-17 11:57:19'),
(NULL, 'push_notification_templates', '{\"index\":\"backend.push_notification_template.index\",\"edit\":\"backend.push_notification_template.edit\"}', '2024-10-17 11:57:19', '2024-10-17 11:57:19');

-- Insert permissions
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(160, 'backend.sms_template.index', 'web', '2024-10-17 12:18:21', '2024-10-17 12:18:21'),
(161, 'backend.sms_template.edit', 'web', '2024-10-17 12:18:21', '2024-10-17 12:18:21'),
(162, 'backend.email_template.index', 'web', '2024-10-17 12:18:21', '2024-10-17 12:18:21'),
(163, 'backend.email_template.edit', 'web', '2024-10-17 12:18:21', '2024-10-17 12:18:21'),
(164, 'backend.push_notification_template.index', 'web', '2024-10-17 12:18:21', '2024-10-17 12:18:21'),
(165, 'backend.push_notification_template.edit', 'web', '2024-10-17 12:18:21', '2024-10-17 12:18:21');

-- Assign permissions to roles
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
('160', '1'),
('161', '1'),
('162', '1'),
('163', '1'),
('164', '1'),
('165', '1');

INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES (NULL, 'sms_gateways', '{\"index\":\"backend.sms_gateway.index\",\"edit\":\"backend.sms_gateway.edit\"}', '2024-10-21 15:56:13', '2024-10-21 15:56:13');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (166, 'backend.sms_gateway.index', 'web', '2024-10-21 15:59:23', '2024-10-21 15:59:23'), (167, 'backend.sms_gateway.edit', 'web', '2024-10-21 15:59:23', '2024-10-21 15:59:23');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('166', '1'), ('167', '1');


INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES (NULL, 'custom_sms_gateways', '{\"index\":\"backend.custom_sms_gateway.index\",\"edit\":\"backend.custom_sms_gateway.edit\"}', '2024-10-23 16:50:56', '2024-10-23 16:50:56');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (168, 'backend.custom_sms_gateway.index', 'web', '2024-10-23 16:49:03', '2024-10-23 16:49:03'), (169, 'backend.custom_sms_gateway.edit', 'web', '2024-10-23 16:49:03', '2024-10-23 16:49:03');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('168', '1'), ('169', '1');

INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES (NULL, 'provider_dashboard', '{\"index\":\"backend.provider_dashboard.index\"}', '2024-10-25 17:21:37', '2024-10-25 17:21:37'), (NULL, 'consumer_dashboard', '{\"index\":\"backend.consumer_dashboard.index\"}', '2024-10-25 17:22:55', '2024-10-25 17:22:55'), (NULL, 'servicemen_dashboard', '{\"index\":\"backend.servicemen_dashboard.index\"}', '2024-10-25 17:22:55', '2024-10-25 17:22:55');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (170, 'backend.provider_dashboard.index', 'web', '2024-10-25 17:27:33', '2024-10-25 17:27:33'), (171, 'backend.consumer_dashboard.index', 'web', '2024-10-25 17:27:33', '2024-10-25 17:27:33'), (172, 'backend.servicemen_dashboard.index', 'web', '2024-10-25 17:27:33', '2024-10-25 17:27:33');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('170', '1'), ('171', '1'), ('172', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('172', '3');

CREATE TABLE `email_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `button_text` longtext COLLATE utf8mb4_unicode_ci,
  `button_url` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `email_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE TABLE `sms_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `url` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `sms_templates`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sms_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;


CREATE TABLE `push_notification_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `url` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `push_notification_templates`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `push_notification_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE users ADD COLUMN location_cordinates JSON NULL;


INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES (NULL, 'serviceman_locations', '{\r\n \"index\": \"backend.serviceman_location.index\",\r\n \"create\": \"backend.serviceman_location.create\",\r\n \"edit\": \"backend.serviceman_location.edit\"\r\n}', '2024-11-04 16:54:18', NULL);

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (173, 'backend.serviceman_location.index', 'web', '2024-11-04 16:59:55', '2024-11-04 16:59:55'), (174, 'backend.serviceman_location.create', 'web', '2024-11-04 16:59:55', '2024-11-04 16:59:55'), (175, 'backend.serviceman_location.edit', 'web', '2024-11-04 17:00:52', '2024-11-04 17:00:52');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('173', '1'), ('174', '1'), ('175', '1'), ('173', '3'), ('174', '3'), ('175', '3');

INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES (NULL, 'unverified_user', '{\"index\":\"backend.unverified_user.index\",\"edit\":\"backend.unverified_user.edit\"}', '2024-11-06 09:17:29', '2024-11-06 09:17:29');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (176, 'backend.unverified_user.index', 'web', '2024-11-06 09:26:59', '2024-11-06 09:26:59'), (177, 'backend.unverified_user.edit', 'web', '2024-11-06 09:26:59', '2024-11-06 09:26:59');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('176', '1'), ('177', '1');

CREATE TABLE `custom_sms_gateways` (
  `id` bigint UNSIGNED NOT NULL,
  `base_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_config` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_keys` json DEFAULT NULL,
  `config` json DEFAULT NULL,
  `body` json DEFAULT NULL,
  `params` json DEFAULT NULL,
  `headers` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `custom_sms_gateways` (`id`, `base_url`, `method`, `sid`, `auth_token`, `is_config`, `from`, `custom_keys`, `config`, `body`, `params`, `headers`, `created_at`, `updated_at`) VALUES
(1, 'https://api.twilio.com/2010-04-01/Accounts/AC29dca1a7ff0237356fd999c6ecb5d992/Messages.json', 'post', 'AC29dca1a7ff0237356fd999c6ecb5d992', '562b4f1ff7ade37ee543ae6e18bee36d', '[\"sid\",\"auth_token\"]', '16572084747', NULL, NULL, '{\"To\": \"{to}\", \"Body\": \"{message}\", \"From\": \"+16572084747\"}', '{\"\": null}', '{\"\": null}', '2024-10-23 00:06:58', '2024-11-05 05:16:22');

ALTER TABLE `custom_sms_gateways`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `custom_sms_gateways`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
 VALUES (192, 'backend.service_request.index', 'web', '2024-11-06 09:26:59', '2024-11-06 09:26:59'),
  (193, 'backend.service_request.edit', 'web', '2024-11-06 09:26:59', '2024-11-06 09:26:59'),
  (194, 'backend.service_request.create', 'web', '2024-11-06 09:26:59', '2024-11-06 09:26:59'),
  (195, 'backend.service_request.destroy', 'web', '2024-11-06 09:26:59', '2024-11-06 09:26:59');



INSERT INTO `role_has_permissions` (`permission_id`, `role_id`)
 VALUES ('192', '1'), ('193', '1'), ('194', '1'), ('195', '1'), ('192', '3'), ('193', '3'), ('192', '2'), ('194', '2') ;

------------------------------- 29/11/2024 --------------------------------------------------------------------------

UPDATE `system_langs` SET `system_reserve` = '0' WHERE `system_langs`.`id` = 1;

ALTER TABLE `zones` CHANGE `created_by_id` `created_by_id` BIGINT UNSIGNED NULL;

ALTER TABLE `categories` CHANGE `title` `title` JSON NULL DEFAULT NULL;

ALTER TABLE `categories` CHANGE `description` `description` JSON NULL DEFAULT NULL;

------------------------------- 24/01/2025 --------------------------------------------------------------------------

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (NULL, 'backend.report.index', 'web', '2025-01-24 16:32:43', '2025-01-24 16:32:43'), (NULL, 'backend.report.create', 'web', '2025-01-24 16:32:43', '2025-01-24 16:32:43')

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('199', '1'), ('200', '1')


------------------------------- 11/02/2025 --------------------------------------------------------------------------

ALTER TABLE `service_faqs` CHANGE `question` `question` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
------------------------------- 12/02/2025 --------------------------------------------------------------------------

UPDATE `modules` SET `actions` = '{\"index\":\"backend.wallet.index\",\"credit\":\"backend.wallet.credit\",\"debit\":\"backend.wallet.debit\"}' WHERE `modules`.`id` = 15;

UPDATE `modules` SET `actions` = '{\"index\":\"backend.bid.index\",\"create\":\"backend.bid.create\",\"edit\":\"backend.bid.edit\"}', `created_at` = NULL, `updated_at` = NULL WHERE `modules`.`id` = 36;


------------------------------- 14/02/2025 --------------------------------------------------------------------------

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (NULL, 'backend.customization.index', 'web', '2025-02-14 17:04:36', '2025-02-14 17:04:36'), (NULL, 'backend.customization.edit', 'web', '2025-02-14 17:04:36', '2025-02-14 17:04:36');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('201', '1'), ('202', '1');
INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES (NULL, 'customizations', '{\"index\":\"backend.customization.index\",\"edit\":\"backend.customization.edit\"}', '2025-02-14 17:08:38', '2025-02-14 17:08:38');

CREATE TABLE `customizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `html` longtext DEFAULT NULL,
  `css` longtext DEFAULT NULL,
  `js` longtext DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `customizations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

CREATE TABLE `backup_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_path` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `backup_logs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `backup_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (null, 'backend.backup.index', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.backup.create', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.backup.edit', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.backup.destroy', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00');


INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES (null, 'backups', '{\"index\":\"backend.backup.index\",\"create\":\"backend.backup.create\",\"edit\":\"backend.backup.edit\",\"trash\":\"backend.backup.destroy\"}', '2025-02-25 12:26:00', '2025-02-25 12:26:00');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('203', '1'), ('204', '1') , ('205', '1'), ('206', '1');

CREATE TABLE `service_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `service_taxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_taxes_service_id_foreign` (`service_id`),
  ADD KEY `service_taxes_tax_id_foreign` (`tax_id`);

ALTER TABLE `service_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `pages` ADD COLUMN `slug` LONGTEXT AFTER `id`;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (null, 'backend.system_tool.index', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.system_tool.create', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.system_tool.edit', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.system_tool.destroy', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00');


INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES (null, 'system_tools', '{\"index\":\"backend.system_tool.index\",\"create\":\"backend.system_tool.create\",\"edit\":\"backend.system_tool.edit\",\"trash\":\"backend.system_tool.destroy\"}', '2025-02-25 12:26:00', '2025-02-25 12:26:00');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('207', '1'), ('208', '1') , ('209', '1'), ('210', '1');

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(191) DEFAULT NULL,
  `event` varchar(191) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

INSERT INTO `modules` (`id`, `name `, `actions`, `created_at`, `updated_at`) VALUES (null, 'advertisements', '{\"index\":\"backend.advertisement.index\",\"create\":\"backend.advertisement.create\",\"edit\":\"backend.advertisement.edit\",\"trash\":\"backend.advertisement.destroy\"', '2025-02-25 12:26:00', '2025-02-25 12:26:00');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (null, 'backend.advertisement.index', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.advertisement.create', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.advertisement.edit', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.advertisement.destroy', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('211', '1'), ('212', '1') , ('213', '1'), ('214', '1'),('211', '3'), ('212', '3') , ('213', '3'), ('214', '3') ,('211', '2');


CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zone` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `screen` varchar(191) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `price` double DEFAULT NULL,
  `banner_type` varchar(191) DEFAULT NULL,
  `video_link` varchar(191) DEFAULT NULL,
  `status` enum('pending','approved','rejected','running','paused','expired') DEFAULT 'pending',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `advertisement_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_created_by_foreign` (`created_by`),
  ADD KEY `advertisements_provider_id_foreign` (`provider_id`);

ALTER TABLE `advertisement_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisement_services_advertisement_id_foreign` (`advertisement_id`),
  ADD KEY `advertisement_services_service_id_foreign` (`service_id`);



ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `advertisement_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;



ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertisements_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `advertisement_services`
  ADD CONSTRAINT `advertisement_services_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertisement_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;


ALTER TABLE `services` ADD `video` VARCHAR(191) NULL DEFAULT NULL AFTER `price`;

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `required_servicemen` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_type` varchar(191) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `custom_message` longtext DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cart_servicemen` (
  `serviceman_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_service_id_foreign` (`service_id`),
  ADD KEY `cart_address_id_foreign` (`address_id`),
  ADD KEY `cart_customer_id_foreign` (`customer_id`);

ALTER TABLE `cart_servicemen`
  ADD KEY `cart_servicemen_serviceman_id_foreign` (`serviceman_id`),
  ADD KEY `cart_servicemen_cart_id_foreign` (`cart_id`);

ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `cart`
  ADD CONSTRAINT `cart_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

ALTER TABLE `cart_servicemen`
  ADD CONSTRAINT `cart_servicemen_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_servicemen_serviceman_id_foreign` FOREIGN KEY (`serviceman_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;



CREATE TABLE `custom_offers` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `is_servicemen_required` tinyint(1) NOT NULL DEFAULT '0',
  `required_servicemen` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category_ids` json DEFAULT NULL,
  `provider_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `service_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','accepted','rejected','expired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `started_at` date DEFAULT NULL,
  `ended_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_unit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `custom_offers` (`id`, `title`, `description`, `is_servicemen_required`, `required_servicemen`, `price`, `category_ids`, `provider_id`, `user_id`, `service_id`, `status`, `started_at`, `ended_at`, `created_at`, `updated_at`, `duration`, `duration_unit`) VALUES
(15, 'custom offer', 'custom offer descrption', 0, 1, 500.00, '[69, 65]', 3, 2, 56, 'accepted', '2024-12-27', '2024-01-27', '2024-12-27 23:42:25', '2024-12-27 23:42:25', '2', 'hours');

ALTER TABLE `custom_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_offers_provider_id_foreign` (`provider_id`),
  ADD KEY `custom_offers_user_id_foreign` (`user_id`),
  ADD KEY `custom_offers_service_id_foreign` (`service_id`);

ALTER TABLE `custom_offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `custom_offers`
  ADD CONSTRAINT `custom_offers_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `custom_offers_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `custom_offers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;


INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES (null, 'custom_offers', '{\"index\":\"backend.custom_offer.index\",\"create\":\"backend.custom_offer.create\",\"edit\":\"backend.custom_offer.edit\",\"trash\":\"backend.custom_offer.destroy\"', '2025-02-25 12:26:00', '2025-02-25 12:26:00');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (null, 'backend.custom_offer.index', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.custom_offer.create', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.custom_offer.edit', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00'),
(null, 'backend.custom_offer.destroy', 'web', '2025-02-25 12:26:00', '2025-02-25 12:26:00');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('215', '1'), ('216', '1') , ('217', '1'), ('218', '1'),('215', '3'), ('216', '3') , ('217', '3'), ('215', '2') ,('216', '2') ,('217', '2');

ALTER TABLE `services` ADD `is_advertised` TINYINT(1) NULL DEFAULT '0' AFTER `is_featured`;

TRUNCATE TABLE `modules`;

TRUNCATE TABLE `permissions`;

TRUNCATE TABLE `role_has_permissions`;

INSERT INTO `modules` (`id`, `name`, `actions`, `created_at`, `updated_at`) VALUES
(1, 'roles', '{\"index\":\"backend.role.index\",\"create\":\"backend.role.create\",\"edit\":\"backend.role.edit\",\"destroy\":\"backend.role.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(2, 'bank_details', '{\"index\":\"backend.bank_detail.index\",\"create\":\"backend.bank_detail.create\",\"edit\":\"backend.bank_detail.edit\",\"destroy\":\"backend.bank_detail.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(3, 'service_categories', '{\"index\":\"backend.service_category.index\",\"create\":\"backend.service_category.create\",\"edit\":\"backend.service_category.edit\",\"destroy\":\"backend.service_category.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(4, 'blog_categories', '{\"index\":\"backend.blog_category.index\",\"create\":\"backend.blog_category.create\",\"edit\":\"backend.blog_category.edit\",\"destroy\":\"backend.blog_category.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(5, 'services', '{\"index\":\"backend.service.index\",\"create\":\"backend.service.create\",\"edit\":\"backend.service.edit\",\"destroy\":\"backend.service.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(6, 'plans', '{\"index\":\"backend.plan.index\",\"create\":\"backend.plan.create\",\"edit\":\"backend.plan.edit\",\"destroy\":\"backend.plan.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(7, 'service_packages', '{\"index\":\"backend.service-package.index\",\"create\":\"backend.service-package.create\",\"edit\":\"backend.service-package.edit\",\"destroy\":\"backend.service-package.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(8, 'bookings', '{\"index\":\"backend.booking.index\",\"create\":\"backend.booking.create\",\"edit\":\"backend.booking.edit\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(9, 'custom_offers', '{\"index\":\"backend.custom_offer.index\",\"create\":\"backend.custom_offer.create\",\"edit\":\"backend.custom_offer.edit\",\"destroy\":\"backend.custom_offer.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(10, 'providers', '{\"index\":\"backend.provider.index\",\"create\":\"backend.provider.create\",\"edit\":\"backend.provider.edit\",\"destroy\":\"backend.provider.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(11, 'provider_wallets', '{\"index\":\"backend.provider_wallet.index\",\"credit\":\"backend.provider_wallet.credit\",\"debit\":\"backend.provider_wallet.debit\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(12, 'serviceman_wallets', '{\"index\":\"backend.serviceman_wallet.index\",\"credit\":\"backend.serviceman_wallet.credit\",\"debit\":\"backend.serviceman_wallet.debit\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(13, 'commission_histories', '{\"index\":\"backend.commission_history.index\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(14, 'withdraw_requests', '{\"index\":\"backend.withdraw_request.index\",\"create\":\"backend.withdraw_request.create\",\"action\":\"backend.withdraw_request.action\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(15, 'serviceman_withdraw_requests', '{\"index\":\"backend.serviceman_withdraw_request.index\",\"create\":\"backend.serviceman_withdraw_request.create\",\"action\":\"backend.serviceman_withdraw_request.action\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(16, 'servicemen', '{\"index\":\"backend.serviceman.index\",\"create\":\"backend.serviceman.create\",\"edit\":\"backend.serviceman.edit\",\"destroy\":\"backend.serviceman.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(17, 'coupons', '{\"index\":\"backend.coupon.index\",\"create\":\"backend.coupon.create\",\"edit\":\"backend.coupon.edit\",\"destroy\":\"backend.coupon.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(18, 'backups', '{\"index\":\"backend.backup.index\",\"create\":\"backend.backup.create\",\"edit\":\"backend.backup.edit\",\"trash\":\"backend.backup.destroy\"}', '2025-03-28 07:18:19', '2025-03-28 07:18:19'),
(19, 'system_tools', '{\"index\":\"backend.system_tool.index\",\"create\":\"backend.system_tool.create\",\"edit\":\"backend.system_tool.edit\",\"trash\":\"backend.system_tool.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(20, 'wallets', '{\"index\":\"backend.wallet.index\",\"credit\":\"backend.wallet.credit\",\"debit\":\"backend.wallet.debit\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(21, 'sliders', '{\"index\":\"backend.slider.index\",\"create\":\"backend.slider.create\",\"edit\":\"backend.slider.edit\",\"destroy\":\"backend.slider.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(22, 'reviews', '{\"index\":\"backend.review.index\",\"create\":\"backend.review.create\",\"edit\":\"backend.review.edit\",\"destroy\":\"backend.review.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(23, 'earnings', '{\"index\":\"backend.earning.index\",\"create\":\"backend.earning.create\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(24, 'taxes', '{\"index\":\"backend.tax.index\",\"create\":\"backend.tax.create\",\"edit\":\"backend.tax.edit\",\"destroy\":\"backend.tax.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(25, 'users', '{\"index\":\"backend.user.index\",\"create\":\"backend.user.create\",\"edit\":\"backend.user.edit\",\"destroy\":\"backend.user.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(26, 'customers', '{\"index\":\"backend.customer.index\",\"create\":\"backend.customer.create\",\"edit\":\"backend.customer.edit\",\"destroy\":\"backend.customer.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(27, 'payment_transactions', '{\"index\":\"backend.payment_transaction.index\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(28, 'documents', '{\"index\":\"backend.document.index\",\"create\":\"backend.document.create\",\"edit\":\"backend.document.edit\",\"destroy\":\"backend.document.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(29, 'currencies', '{\"index\":\"backend.currency.index\",\"create\":\"backend.currency.create\",\"edit\":\"backend.currency.edit\",\"destroy\":\"backend.currency.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(30, 'tags', '{\"index\":\"backend.tag.index\",\"create\":\"backend.tag.create\",\"edit\":\"backend.tag.edit\",\"destroy\":\"backend.tag.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(31, 'blogs', '{\"index\":\"backend.blog.index\",\"create\":\"backend.blog.create\",\"edit\":\"backend.blog.edit\",\"destroy\":\"backend.blog.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(32, 'pages', '{\"index\":\"backend.page.index\",\"create\":\"backend.page.create\",\"edit\":\"backend.page.edit\",\"destroy\":\"backend.page.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(33, 'provider_time_slots', '{\"index\":\"backend.provider_time_slot.index\",\"create\":\"backend.provider_time_slot.create\",\"edit\":\"backend.provider_time_slot.edit\",\"destroy\":\"backend.provider_time_slot.destroy\"}', '2025-03-28 07:18:20', '2025-03-28 07:18:20'),
(34, 'provider_documents', '{\"index\":\"backend.provider_document.index\",\"create\":\"backend.provider_document.create\",\"edit\":\"backend.provider_document.edit\",\"destroy\":\"backend.provider_document.destroy\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(35, 'banners', '{\"index\":\"backend.banner.index\",\"create\":\"backend.banner.create\",\"edit\":\"backend.banner.edit\",\"destroy\":\"backend.banner.destroy\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(36, 'advertisements', '{\"index\":\"backend.advertisement.index\",\"create\":\"backend.advertisement.create\",\"edit\":\"backend.advertisement.edit\",\"destroy\":\"backend.advertisement.destroy\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(37, 'settings', '{\"index\":\"backend.setting.index\",\"create\":\"backend.setting.create\",\"edit\":\"backend.setting.edit\",\"destroy\":\"backend.setting.destroy\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(38, 'payment_methods', '{\"index\":\"backend.payment_method.index\",\"create\":\"backend.payment_method.create\",\"edit\":\"backend.payment_method.edit\",\"destroy\":\"backend.payment_method.destroy\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(39, 'sms_gateways', '{\"index\":\"backend.sms_gateway.index\",\"edit\":\"backend.sms_gateway.edit\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(40, 'languages', '{\"index\":\"backend.language.index\",\"create\":\"backend.language.create\",\"edit\":\"backend.language.edit\",\"destroy\":\"backend.language.destroy\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(41, 'push_notifications', '{\"index\":\"backend.push_notification.index\",\"create\":\"backend.push_notification.create\",\"edit\":\"backend.push_notification.edit\",\"destroy\":\"backend.push_notification.destroy\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(42, 'bids', '{\"index\":\"backend.bid.index\",\"create\":\"backend.bid.create\",\"edit\":\"backend.bid.edit\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(43, 'zones', '{\"index\":\"backend.zone.index\",\"create\":\"backend.zone.create\",\"edit\":\"backend.zone.edit\",\"destroy\":\"backend.zone.destroy\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(44, 'home_pages', '{\"index\":\"backend.home_page.index\",\"edit\":\"backend.home_page.edit\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(45, 'customizations', '{\"index\":\"backend.customization.index\",\"edit\":\"backend.customization.edit\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(46, 'testimonials', '{\"index\":\"backend.testimonial.index\",\"create\":\"backend.testimonial.create\",\"edit\":\"backend.testimonial.edit\",\"destroy\":\"backend.testimonial.destroy\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(47, 'theme_options', '{\"index\":\"backend.theme_option.index\",\"edit\":\"backend.theme_option.edit\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(48, 'news_letters', '{\"index\":\"backend.news_letter.index\",\"create\":\"backend.news_letter.create\",\"edit\":\"backend.news_letter.edit\",\"destroy\":\"backend.news_letter.destroy\"}', '2025-03-28 07:18:21', '2025-03-28 07:18:21'),
(49, 'sms_templates', '{\"index\":\"backend.sms_template.index\",\"edit\":\"backend.sms_template.edit\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22'),
(50, 'email_templates', '{\"index\":\"backend.email_template.index\",\"edit\":\"backend.email_template.edit\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22'),
(51, 'push_notification_templates', '{\"index\":\"backend.push_notification_template.index\",\"edit\":\"backend.push_notification_template.edit\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22'),
(52, 'service_request', '{\"index\":\"backend.service_request.index\",\"create\":\"backend.service_request.create\",\"edit\":\"backend.service_request.edit\",\"destroy\":\"backend.service_request.destroy\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22'),
(53, 'custom_sms_gateways', '{\"index\":\"backend.custom_sms_gateway.index\",\"edit\":\"backend.custom_sms_gateway.edit\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22'),
(54, 'provider_dashboard', '{\"index\":\"backend.provider_dashboard.index\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22'),
(55, 'consumer_dashboard', '{\"index\":\"backend.consumer_dashboard.index\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22'),
(56, 'servicemen_dashboard', '{\"index\":\"backend.servicemen_dashboard.index\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22'),
(57, 'unverified_user', '{\"index\":\"backend.unverified_user.index\",\"edit\":\"backend.unverified_user.edit\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22'),
(58, 'serviceman_locations', '{\"index\":\"backend.serviceman_location.index\",\"create\":\"backend.serviceman_location.create\",\"edit\":\"backend.serviceman_location.edit\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22'),
(59, 'reports', '{\"index\":\"backend.report.index\",\"create\":\"backend.report.create\"}', '2025-03-28 07:18:22', '2025-03-28 07:18:22');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'backend.role.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(2, 'backend.role.create', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(3, 'backend.role.edit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(4, 'backend.role.destroy', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(5, 'backend.bank_detail.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(6, 'backend.bank_detail.create', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(7, 'backend.bank_detail.edit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(8, 'backend.bank_detail.destroy', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(9, 'backend.service_category.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(10, 'backend.service_category.create', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(11, 'backend.service_category.edit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(12, 'backend.service_category.destroy', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(13, 'backend.blog_category.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(14, 'backend.blog_category.create', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(15, 'backend.blog_category.edit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(16, 'backend.blog_category.destroy', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(17, 'backend.service.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(18, 'backend.service.create', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(19, 'backend.service.edit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(20, 'backend.service.destroy', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(21, 'backend.plan.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(22, 'backend.plan.create', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(23, 'backend.plan.edit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(24, 'backend.plan.destroy', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(25, 'backend.service-package.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(26, 'backend.service-package.create', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(27, 'backend.service-package.edit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(28, 'backend.service-package.destroy', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(29, 'backend.booking.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(30, 'backend.booking.create', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(31, 'backend.booking.edit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(32, 'backend.custom_offer.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(33, 'backend.custom_offer.create', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(34, 'backend.custom_offer.edit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(35, 'backend.custom_offer.destroy', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(36, 'backend.provider.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(37, 'backend.provider.create', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(38, 'backend.provider.edit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(39, 'backend.provider.destroy', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(40, 'backend.provider_wallet.index', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(41, 'backend.provider_wallet.credit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(42, 'backend.provider_wallet.debit', 'web', '2025-03-28 07:30:51', '2025-03-28 07:30:51'),
(43, 'backend.serviceman_wallet.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(44, 'backend.serviceman_wallet.credit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(45, 'backend.serviceman_wallet.debit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(46, 'backend.commission_history.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(47, 'backend.withdraw_request.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(48, 'backend.withdraw_request.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(49, 'backend.withdraw_request.action', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(50, 'backend.serviceman_withdraw_request.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(51, 'backend.serviceman_withdraw_request.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(52, 'backend.serviceman_withdraw_request.action', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(53, 'backend.serviceman.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(54, 'backend.serviceman.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(55, 'backend.serviceman.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(56, 'backend.serviceman.destroy', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(57, 'backend.coupon.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(58, 'backend.coupon.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(59, 'backend.coupon.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(60, 'backend.coupon.destroy', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(61, 'backend.backup.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(62, 'backend.backup.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(63, 'backend.backup.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(64, 'backend.backup.destroy', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(65, 'backend.system_tool.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(66, 'backend.system_tool.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(67, 'backend.system_tool.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(68, 'backend.system_tool.destroy', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(69, 'backend.wallet.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(70, 'backend.wallet.credit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(71, 'backend.wallet.debit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(72, 'backend.slider.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(73, 'backend.slider.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(74, 'backend.slider.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(75, 'backend.slider.destroy', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(76, 'backend.review.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(77, 'backend.review.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(78, 'backend.review.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(79, 'backend.review.destroy', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(80, 'backend.earning.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(81, 'backend.earning.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(82, 'backend.tax.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(83, 'backend.tax.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(84, 'backend.tax.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(85, 'backend.tax.destroy', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(86, 'backend.user.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(87, 'backend.user.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(88, 'backend.user.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(89, 'backend.user.destroy', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(90, 'backend.customer.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(91, 'backend.customer.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(92, 'backend.customer.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(93, 'backend.customer.destroy', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(94, 'backend.payment_transaction.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(95, 'backend.document.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(96, 'backend.document.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(97, 'backend.document.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(98, 'backend.document.destroy', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(99, 'backend.currency.index', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(100, 'backend.currency.create', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(101, 'backend.currency.edit', 'web', '2025-03-28 07:30:52', '2025-03-28 07:30:52'),
(102, 'backend.currency.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(103, 'backend.tag.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(104, 'backend.tag.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(105, 'backend.tag.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(106, 'backend.tag.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(107, 'backend.blog.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(108, 'backend.blog.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(109, 'backend.blog.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(110, 'backend.blog.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(111, 'backend.page.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(112, 'backend.page.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(113, 'backend.page.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(114, 'backend.page.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(115, 'backend.provider_time_slot.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(116, 'backend.provider_time_slot.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(117, 'backend.provider_time_slot.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(118, 'backend.provider_time_slot.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(119, 'backend.provider_document.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(120, 'backend.provider_document.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(121, 'backend.provider_document.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(122, 'backend.provider_document.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(123, 'backend.banner.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(124, 'backend.banner.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(125, 'backend.banner.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(126, 'backend.banner.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(127, 'backend.advertisement.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(128, 'backend.advertisement.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(129, 'backend.advertisement.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(130, 'backend.advertisement.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(131, 'backend.setting.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(132, 'backend.setting.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(133, 'backend.setting.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(134, 'backend.setting.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(135, 'backend.payment_method.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(136, 'backend.payment_method.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(137, 'backend.payment_method.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(138, 'backend.payment_method.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(139, 'backend.sms_gateway.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(140, 'backend.sms_gateway.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(141, 'backend.language.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(142, 'backend.language.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(143, 'backend.language.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(144, 'backend.language.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(145, 'backend.push_notification.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(146, 'backend.push_notification.create', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(147, 'backend.push_notification.edit', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(148, 'backend.push_notification.destroy', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(149, 'backend.bid.index', 'web', '2025-03-28 07:30:53', '2025-03-28 07:30:53'),
(150, 'backend.bid.create', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(151, 'backend.bid.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(152, 'backend.zone.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(153, 'backend.zone.create', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(154, 'backend.zone.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(155, 'backend.zone.destroy', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(156, 'backend.home_page.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(157, 'backend.home_page.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(158, 'backend.customization.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(159, 'backend.customization.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(160, 'backend.testimonial.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(161, 'backend.testimonial.create', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(162, 'backend.testimonial.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(163, 'backend.testimonial.destroy', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(164, 'backend.theme_option.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(165, 'backend.theme_option.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(166, 'backend.news_letter.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(167, 'backend.news_letter.create', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(168, 'backend.news_letter.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(169, 'backend.news_letter.destroy', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(170, 'backend.sms_template.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(171, 'backend.sms_template.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(172, 'backend.email_template.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(173, 'backend.email_template.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(174, 'backend.push_notification_template.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(175, 'backend.push_notification_template.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(176, 'backend.service_request.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(177, 'backend.service_request.create', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(178, 'backend.service_request.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(179, 'backend.service_request.destroy', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(180, 'backend.custom_sms_gateway.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(181, 'backend.custom_sms_gateway.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(182, 'backend.provider_dashboard.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(183, 'backend.consumer_dashboard.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(184, 'backend.servicemen_dashboard.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(185, 'backend.unverified_user.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(186, 'backend.unverified_user.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(187, 'backend.serviceman_location.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(188, 'backend.serviceman_location.create', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(189, 'backend.serviceman_location.edit', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(190, 'backend.report.index', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54'),
(191, 'backend.report.create', 'web', '2025-03-28 07:30:54', '2025-03-28 07:30:54');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 3),
(18, 1),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(25, 3),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(32, 1),
(32, 2),
(32, 3),
(33, 1),
(33, 2),
(33, 3),
(34, 1),
(34, 2),
(34, 3),
(35, 1),
(36, 1),
(36, 2),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(40, 3),
(41, 1),
(42, 1),
(43, 1),
(43, 4),
(44, 1),
(45, 1),
(46, 1),
(46, 3),
(47, 1),
(47, 3),
(47, 4),
(48, 1),
(48, 3),
(48, 4),
(49, 1),
(50, 1),
(50, 3),
(50, 4),
(51, 1),
(51, 4),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(54, 1),
(54, 3),
(55, 1),
(55, 3),
(56, 1),
(56, 3),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(76, 2),
(76, 3),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(107, 2),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(111, 2),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(123, 2),
(123, 3),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(127, 2),
(127, 3),
(128, 1),
(128, 3),
(129, 1),
(129, 3),
(130, 1),
(130, 3),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(145, 2),
(145, 3),
(146, 1),
(146, 2),
(147, 1),
(147, 3),
(148, 1),
(149, 1),
(149, 2),
(149, 3),
(150, 1),
(150, 3),
(151, 1),
(151, 2),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(176, 2),
(176, 3),
(177, 1),
(177, 2),
(178, 1),
(178, 3),
(179, 1),
(179, 2),
(180, 1),
(180, 2),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(187, 3),
(188, 1),
(188, 3),
(189, 1),
(189, 3),
(190, 1),
(191, 1);

ALTER TABLE zones
ADD COLUMN currency_id BIGINT UNSIGNED NULL AFTER created_by_id,
ADD COLUMN payment_methods JSON NULL AFTER currency_id;

ALTER TABLE zones
ADD CONSTRAINT zones_currency_id_foreign
FOREIGN KEY (currency_id) REFERENCES currencies(id)
ON DELETE CASCADE;

ALTER TABLE `coupons` ADD `title` VARCHAR(191) NULL DEFAULT NULL AFTER `code`;

ALTER TABLE `user_subscriptions` ADD `product_id` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL AFTER `is_included_free_trial`, ADD `in_app_status` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL AFTER `product_id`, ADD `in_app_price` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL AFTER `in_app_status`, ADD `source` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL AFTER `in_app_price`;

ALTER TABLE `time_slots`
  DROP `time_unit`,
  DROP `gap`;

ALTER TABLE `time_slots` ADD `is_active` TINYINT NOT NULL DEFAULT '1' AFTER `time_slots`;

ALTER TABLE `users` ADD `firebase_uid` VARCHAR(191) NULL AFTER `code`;

ALTER TABLE `bank_details` ADD UNIQUE(`user_id`);

ALTER TABLE `bookings` CHANGE `total_extra_servicemen` `total_extra_servicemen` INT(11) NULL DEFAULT '0';

--
-- Table structure for table `booking_tax`
--

CREATE TABLE `booking_tax` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL,
  `rate` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for table `booking_tax`
--
ALTER TABLE `booking_tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_tax_booking_id_foreign` (`booking_id`),
  ADD KEY `booking_tax_tax_id_foreign` (`tax_id`);

--
-- Constraints for table `booking_tax`
--
ALTER TABLE `booking_tax`
  ADD CONSTRAINT `booking_tax_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_tax_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE;

  ALTER TABLE `booking_tax` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT;

  ALTER TABLE `booking_additional_services` ADD UNIQUE(`id`);

  ALTER TABLE `booking_additional_services` CHANGE `id` `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT;

  ALTER TABLE `booking_additional_services` ADD CONSTRAINT `fk_booking_id` FOREIGN KEY (`booking_id`) REFERENCES `bookings`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `booking_additional_services` ADD CONSTRAINT `fk_additional_service_id` FOREIGN KEY (`additional_service_id`) REFERENCES `services`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `extra_charges`
  ADD COLUMN `tax_amount` DECIMAL(10,2) NOT NULL DEFAULT 0,
  ADD COLUMN `platform_fees` DECIMAL(10,2) NOT NULL DEFAULT 0,
  ADD COLUMN `grand_total` DECIMAL(10,2) NOT NULL DEFAULT 0 AFTER `platform_fees`;

  --------------------- version 1.0.12 -------
  ---version 10.0.12------
UPDATE `countries` SET `currency_symbol` = 'FCFA', `currency_code` = 'FCFA' WHERE `countries`.`id` = 120;
UPDATE `countries` SET `currency_symbol` = 'FCFA ', `currency_code` = 'FCFA ' WHERE `countries`.`id` = 140;
UPDATE `countries` SET `currency_symbol` = 'FCFA ', `currency_code` = 'FCFA ' WHERE `countries`.`id` = 148;
UPDATE `countries` SET `currency_symbol` = 'FCFA ', `currency_code` = 'FCFA ' WHERE `countries`.`id` = 178;
UPDATE `countries` SET `currency_symbol` = 'FCFA ', `currency_code` = 'FCFA ' WHERE `countries`.`id` = 226;
UPDATE `countries` SET `currency_symbol` = 'FCFA ', `currency_code` = 'FCFA ' WHERE `countries`.`id` = 266;