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

Date: 2023-09-24 04:10:44
*/


-- ----------------------------
-- Table structure for TREFERALGIFTCHART
-- ----------------------------
DROP TABLE [dbo].[TREFERALGIFTCHART]
GO
CREATE TABLE [dbo].[TREFERALGIFTCHART] (
[wID] smallint NOT NULL ,
[wItemID] int NOT NULL ,
[bLevel] tinyint NOT NULL ,
[bCount] tinyint NOT NULL ,
[bGLevel] tinyint NOT NULL ,
[dwDuraMax] tinyint NOT NULL ,
[dwDuraCur] tinyint NOT NULL ,
[bRefineCur] tinyint NOT NULL ,
[wUseTime] smallint NOT NULL ,
[bGradeEffect] tinyint NOT NULL ,
[bMagic1] tinyint NOT NULL ,
[bMagic2] tinyint NOT NULL ,
[bMagic3] tinyint NOT NULL ,
[bMagic4] tinyint NOT NULL ,
[bMagic5] tinyint NOT NULL ,
[bMagic6] tinyint NOT NULL ,
[wValue1] tinyint NOT NULL ,
[wValue2] tinyint NOT NULL ,
[wValue3] tinyint NOT NULL ,
[wValue4] tinyint NOT NULL ,
[wValue5] tinyint NOT NULL ,
[wValue6] tinyint NOT NULL ,
[dwTime1] int NOT NULL DEFAULT ((0)) ,
[dwTime2] int NOT NULL DEFAULT ((0)) ,
[dwTime3] int NOT NULL DEFAULT ((0)) ,
[dwTime4] int NOT NULL DEFAULT ((0)) ,
[dwTime5] int NOT NULL DEFAULT ((0)) ,
[dwTime6] int NOT NULL DEFAULT ((0)) ,
[bGroup] tinyint NOT NULL ,
[dEndTime] datetime NOT NULL ,
[szName] varchar(30) NULL ,
[bWhoGetsIt] tinyint NOT NULL 
)


GO

-- ----------------------------
-- Records of TREFERALGIFTCHART
-- ----------------------------
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'1', N'7609', N'0', N'8', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1', N'1900-01-01 00:00:00.000', N'Szerencseital', N'0')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'2', N'7654', N'0', N'8', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1', N'2016-03-29 01:08:15.000', N'Túlélés fozete', N'0')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'3', N'7001', N'0', N'1', N'0', N'0', N'0', N'0', N'7', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1', N'2016-03-29 01:08:15.000', N'Szél palástja', N'0')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'4', N'7656', N'0', N'8', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1900-01-01 00:00:00.000', N'Lerontás tekercse', N'0')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'5', N'11908', N'0', N'1', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1900-01-01 00:00:00.000', N'Napszemüveg (örök)', N'0')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'6', N'7689', N'0', N'5', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1900-01-01 00:00:00.000', N'Elsoosztályú manaital', N'0')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'7', N'7658', N'0', N'5', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1', N'1900-01-01 00:00:00.000', N'Szakérto tekercs', N'1')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'8', N'7511', N'0', N'1', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1', N'2016-03-29 01:08:15.000', N'Versenyló (30 nap)', N'1')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'9', N'7601', N'0', N'5', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1', N'2016-03-29 01:08:15.000', N'Feltámadástekercs', N'1')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'10', N'11908', N'0', N'1', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1900-01-01 00:00:00.000', N'Napszemüveg (örök)', N'1')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'11', N'7644', N'0', N'5', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1900-01-01 00:00:00.000', N'Különleges TP plusz (1ó)', N'1')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'12', N'7688', N'0', N'5', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1900-01-01 00:00:00.000', N'Elsoosztályú életero ital', N'1')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'13', N'29014', N'0', N'5', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1', N'1900-01-01 00:00:00.000', N'Holdko (100)', N'0')
GO
GO
INSERT INTO [dbo].[TREFERALGIFTCHART] ([wID], [wItemID], [bLevel], [bCount], [bGLevel], [dwDuraMax], [dwDuraCur], [bRefineCur], [wUseTime], [bGradeEffect], [bMagic1], [bMagic2], [bMagic3], [bMagic4], [bMagic5], [bMagic6], [wValue1], [wValue2], [wValue3], [wValue4], [wValue5], [wValue6], [dwTime1], [dwTime2], [dwTime3], [dwTime4], [dwTime5], [dwTime6], [bGroup], [dEndTime], [szName], [bWhoGetsIt]) VALUES (N'14', N'29014', N'0', N'5', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'0', N'1', N'1900-01-01 00:00:00.000', N'Holdko (100)', N'1')
GO
GO

-- ----------------------------
-- Table structure for TREFERALREQUIREMENTCHART
-- ----------------------------
DROP TABLE [dbo].[TREFERALREQUIREMENTCHART]
GO
CREATE TABLE [dbo].[TREFERALREQUIREMENTCHART] (
[bReferalCount] tinyint NOT NULL ,
[wPlayHours] int NOT NULL 
)


GO

-- ----------------------------
-- Records of TREFERALREQUIREMENTCHART
-- ----------------------------
INSERT INTO [dbo].[TREFERALREQUIREMENTCHART] ([bReferalCount], [wPlayHours]) VALUES (N'3', N'18000')
GO
GO

-- ----------------------------
-- Indexes structure for table TREFERALGIFTCHART
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table TREFERALGIFTCHART
-- ----------------------------
ALTER TABLE [dbo].[TREFERALGIFTCHART] ADD PRIMARY KEY ([wID])
GO
