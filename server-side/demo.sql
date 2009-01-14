/*
MySQL Data Transfer
Source Host: localhost
Source Database: demo
Target Host: localhost
Target Database: demo
Date: 1/14/2009 8:19:58 AM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for gpsmarkers
-- ----------------------------
DROP TABLE IF EXISTS `gpsmarkers`;
CREATE TABLE `gpsmarkers` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `IDNKHT` bigint(20) default NULL,
  `LAT` float default NULL,
  `LNG` float default NULL,
  `TYPE` varchar(30) default NULL,
  `GPS_TIME` bigint(20) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for model_xe
-- ----------------------------
DROP TABLE IF EXISTS `model_xe`;
CREATE TABLE `model_xe` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `MS_MODEL_XE` varchar(100) NOT NULL default '',
  `LOAI_MODEL` varchar(100) default '',
  `NHAN_HIEU` varchar(100) default '',
  `MS_THUE` varchar(100) NOT NULL default '',
  `NHIEN_LIEU` varchar(200) NOT NULL default '',
  `PTAC` double NOT NULL default '0',
  `TRONG_TAI` double NOT NULL default '0',
  `DIEN_TICH_SAN` float NOT NULL default '0',
  `LOAI_XE` varchar(100) NOT NULL,
  `SO_SUON` varchar(8) NOT NULL,
  `SO_KM_DA_DI` double default NULL,
  PRIMARY KEY  (`ID`,`MS_MODEL_XE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for nhat_ki_hanh_trinh
-- ----------------------------
DROP TABLE IF EXISTS `nhat_ki_hanh_trinh`;
CREATE TABLE `nhat_ki_hanh_trinh` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `STT_XE` bigint(20) NOT NULL,
  `TEN` varchar(100) default NULL,
  `DIA_DIEM` varchar(200) default NULL,
  `LATITUDE` float default NULL,
  `LONGITUDE` float default NULL,
  `NGAY_KHOI_HANH` bigint(20) default NULL,
  `NGAY_KET_THUC` bigint(20) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- ----------------------------
-- Table structure for xe
-- ----------------------------
DROP TABLE IF EXISTS `xe`;
CREATE TABLE `xe` (
  `ID` bigint(20) unsigned NOT NULL auto_increment,
  `SO_DANG_KY_XE` varchar(100) NOT NULL,
  `MS_MODEL_XE` varchar(100) default NULL,
  `MS_THIET_BI` varchar(100) default NULL,
  `THE_TICH_THAT` int(11) default NULL,
  `NGAY_CAP_NHAT` bigint(20) default NULL,
  PRIMARY KEY  (`ID`,`SO_DANG_KY_XE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `sys_sessions` VALUES ('admin', '8e68a788d9cac695da6c32f86e308bdf', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', '1231858112');
