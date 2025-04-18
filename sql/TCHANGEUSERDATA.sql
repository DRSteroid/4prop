/*
Navicat SQL Server Data Transfer

Source Server         : MSSQL Server
Source Server Version : 105000
Source Host           : 37.17.173.229:1433
Source Database       : YiroGames_4S_Users
Source Schema         : dbo

Target Server Type    : SQL Server
Target Server Version : 105000
File Encoding         : 65001

Date: 2015-10-15 19:28:40
*/


-- ----------------------------
-- Table structure for TCHANGEUSERDATA
-- ----------------------------
DROP TABLE [dbo].[TCHANGEUSERDATA]
GO
CREATE TABLE [dbo].[TCHANGEUSERDATA] (
[dwUserID] varchar(50) NULL ,
[szOldData] varchar(50) NULL ,
[szNewData] varchar(50) NULL ,
[dwStatus] int NULL ,
[dwKey] varchar(50) NULL ,
[dDate] smalldatetime NULL 
)


GO
