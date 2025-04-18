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

Date: 2023-09-24 03:46:14
*/


-- ----------------------------
-- Table structure for TGAINMSBONUSLOG
-- ----------------------------
DROP TABLE [dbo].[TGAINMSBONUSLOG]
GO
CREATE TABLE [dbo].[TGAINMSBONUSLOG] (
[dwUserID] int NOT NULL ,
[dwCash] int NOT NULL ,
[dDate] datetime NOT NULL 
)


GO
