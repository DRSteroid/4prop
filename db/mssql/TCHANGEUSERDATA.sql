/*
Navicat SQL Server Data Transfer

Source Server         : localhost
Source Server Version : 150000
Source Host           : localhost:1433
Source Database       : TGLOBAL_GSP
Source Schema         : dbo

Target Server Type    : SQL Server
Target Server Version : 150000
File Encoding         : 65001

Date: 2023-09-24 03:43:43
*/


-- ----------------------------
-- Table structure for TCHANGEUSERDATA
-- ----------------------------
DROP TABLE [dbo].[TCHANGEUSERDATA]
GO
CREATE TABLE [dbo].[TCHANGEUSERDATA] (
[dwUserID] int NULL ,
[szOldData] varchar(50) NULL ,
[szNewData] varchar(50) NULL ,
[dwStatus] int NULL ,
[dwKey] varchar(50) NULL ,
[dDate] smalldatetime NULL 
)


GO

-- ----------------------------
-- Records of TCHANGEUSERDATA
-- ----------------------------
