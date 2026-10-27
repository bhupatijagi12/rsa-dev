ALTER TABLE `wallet_transaction` ADD `login_type` INT(10) NULL AFTER `status`;

ALTER TABLE `customized_dealer_plan` ADD `plan_amount` VARCHAR(50) NULL AFTER `status`;

ALTER TABLE `customized_dealer_plan` ADD `login_type` INT(10) NULL AFTER `plan_amount`;

ALTER TABLE `customized_dealer_plan` ADD `updated_by` INT(10) NULL AFTER `login_type`;

ALTER TABLE `tds_calculation` ADD `policy_id` INT(50) NULL AFTER `dealer_id`;
