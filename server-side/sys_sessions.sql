/*
MySQL Data Transfer
Source Host: localhost
Source Database: demo
Target Host: localhost
Target Database: demo
Date: 1/11/2009 10:18:28 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for sys_sessions
-- ----------------------------
DROP TABLE IF EXISTS `sys_sessions`;
CREATE TABLE `sys_sessions` (
  `username` varchar(50) NOT NULL,
  `session_id` varchar(50) NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(100) NOT NULL,
  `last_activity` bigint(20) NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

