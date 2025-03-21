/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50562 (5.5.62-log)
 Source Host           : localhost:3306
 Source Schema         : cloud3t

 Target Server Type    : MySQL
 Target Server Version : 50562 (5.5.62-log)
 File Encoding         : 65001

 Date: 18/03/2025 14:00:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `uid` int(11) NULL DEFAULT NULL,
  `createdtime` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES (1, 'Bạn vừa nâng cấp hosting lên góiVN2', 1, '2024-06-25 12:51:176');
INSERT INTO `log` VALUES (2, 'Bạn vừa nâng cấp hosting lên góiVN2', 1, '2024-06-25 12:51:176');
INSERT INTO `log` VALUES (3, 'Bạn vừa nâng cấp hosting lên góiVN7', 1, '2024-06-25 12:52:176');
INSERT INTO `log` VALUES (4, 'Bạn vừa nâng cấp hosting lên góiVN1', 1, '2024-06-25 12:52:176');
INSERT INTO `log` VALUES (5, 'Bạn đã gia hạn hosting kncms.store với giá là 15.000đ', 1, '2024-06-25 01:10:176');
INSERT INTO `log` VALUES (6, 'Bạn đã gia hạn hosting kncms.store với giá là 15.000đ', 1, '2024-06-25 01:10:176');
INSERT INTO `log` VALUES (7, 'Bạn vừa nâng cấp hosting lên góiVN4', 1, '2024-06-25 10:27:176');
INSERT INTO `log` VALUES (8, 'Bạn đã gia hạn hosting kncms.store với giá là 15.000đ', 1, '2024-06-25 10:57:176');
INSERT INTO `log` VALUES (9, 'Bạn đã gia hạn hosting kncms.store với giá là 15.000đ', 1, '2024-06-25 10:58:176');
INSERT INTO `log` VALUES (10, 'Bạn đã gia hạn hosting kncms.store với giá là 15.000đ', 1, '2024-06-25 10:58:176');
INSERT INTO `log` VALUES (11, 'Bạn đã gia hạn hosting kncms.store với giá là 15.000đ', 1, '2024-06-25 10:58:176');
INSERT INTO `log` VALUES (12, 'Bạn đã gia hạn hosting kncms.store với giá là 15.000đ', 1, '2024-06-25 10:58:176');
INSERT INTO `log` VALUES (13, 'Bạn đã gia hạn hosting kncms.store với giá là 15.000đ', 1, '2024-06-25 10:58:176');
INSERT INTO `log` VALUES (14, 'Bạn đã gia hạn hosting kncms.store với giá là 15.000đ', 1, '2024-06-25 10:58:176');
INSERT INTO `log` VALUES (15, 'Test | Số tiền bị trừ là 20.000.000', 1, '2024-06-29 11:46:180');
INSERT INTO `log` VALUES (16, 'Test cộng tiền | Số tiền được cộng là 725.000', 1, '2024-06-29 11:49:180');
INSERT INTO `log` VALUES (17, 'Admin cộng tiền | Số tiền nhận được là 725.000', 1, '2024-06-29 11:49:180');
INSERT INTO `log` VALUES (18, 'Admin trừ tiền | Số tiền bị trừ là 72.500.000', 1, '2024-06-29 11:50:180');
INSERT INTO `log` VALUES (19, 'Admin cộng tiền | Số tiền nhận được là 57.107.000', 1, '2024-06-29 11:50:180');

-- ----------------------------
-- Table structure for mp3
-- ----------------------------
DROP TABLE IF EXISTS `mp3`;
CREATE TABLE `mp3`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MP3_ID` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CreatedTime` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mp3
-- ----------------------------
INSERT INTO `mp3` VALUES (1, 'y8hKABnudDA', '2025-03-10 12:13:68');
INSERT INTO `mp3` VALUES (2, 'LFCPjkqibdM', '2025-03-11 10:03:69');
INSERT INTO `mp3` VALUES (3, '38D_Kp9ABus', '2025-03-11 11:50:69');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Fav` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `EnbleMailer` int(11) NULL DEFAULT 0,
  `APIKey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `APIID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ServerAPI` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '2',
  `ThongBao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `whm_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `whm_pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `whm_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `whm_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (2, 'Cloud3T.com', 'Cloud3T', 'http://localhost/dist/Logo.png', 'http://localhost/dist/Logo.png', 'Khôi Nguyên', 0, '879dd9889504ba955179d83a5a25cbcd', '879dd9889504ba955179d83a5a25cbcd', '2', 'LSBOaOG6rXAgbcOjIGdp4bqjbSBnacOhICc8c3BhbiBzdHlsZT0iLS10dy1ib3JkZXItc3BhY2luZy14OiAwOyAtLXR3LWJvcmRlci1zcGFjaW5nLXk6IDA7IC0tdHctdHJhbnNsYXRlLXg6IDA7IC0tdHctdHJhbnNsYXRlLXk6IDA7IC0tdHctcm90YXRlOiAwOyAtLXR3LXNrZXcteDogMDsgLS10dy1za2V3LXk6IDA7IC0tdHctc2NhbGUteDogMTsgLS10dy1zY2FsZS15OiAxOyAtLXR3LXBhbi14OiA7IC0tdHctcGFuLXk6IDsgLS10dy1waW5jaC16b29tOiA7IC0tdHctc2Nyb2xsLXNuYXAtc3RyaWN0bmVzczogcHJveGltaXR5OyAtLXR3LWdyYWRpZW50LWZyb20tcG9zaXRpb246IDsgLS10dy1ncmFkaWVudC12aWEtcG9zaXRpb246IDsgLS10dy1ncmFkaWVudC10by1wb3NpdGlvbjogOyAtLXR3LW9yZGluYWw6IDsgLS10dy1zbGFzaGVkLXplcm86IDsgLS10dy1udW1lcmljLWZpZ3VyZTogOyAtLXR3LW51bWVyaWMtc3BhY2luZzogOyAtLXR3LW51bWVyaWMtZnJhY3Rpb246IDsgLS10dy1yaW5nLWluc2V0OiA7IC0tdHctcmluZy1vZmZzZXQtd2lkdGg6IDBweDsgLS10dy1yaW5nLW9mZnNldC1jb2xvcjogI2ZmZjsgLS10dy1yaW5nLWNvbG9yOiByZ2JhKDYzLDEzMSwyNDgsLjUpOyAtLXR3LXJpbmctb2Zmc2V0LXNoYWRvdzogMCAwICMwMDAwOyAtLXR3LXJpbmctc2hhZG93OiAwIDAgIzAwMDA7IC0tdHctc2hhZG93OiAwIDAgIzAwMDA7IC0tdHctc2hhZG93LWNvbG9yZWQ6IDAgMCAjMDAwMDsgLS10dy1ibHVyOiA7IC0tdHctYnJpZ2h0bmVzczogOyAtLXR3LWNvbnRyYXN0OiA7IC0tdHctZ3JheXNjYWxlOiA7IC0tdHctaHVlLXJvdGF0ZTogOyAtLXR3LWludmVydDogOyAtLXR3LXNhdHVyYXRlOiA7IC0tdHctc2VwaWE6IDsgLS10dy1kcm9wLXNoYWRvdzogOyAtLXR3LWJhY2tkcm9wLWJsdXI6IDsgLS10dy1iYWNrZHJvcC1icmlnaHRuZXNzOiA7IC0tdHctYmFja2Ryb3AtY29udHJhc3Q6IDsgLS10dy1iYWNrZHJvcC1ncmF5c2NhbGU6IDsgLS10dy1iYWNrZHJvcC1odWUtcm90YXRlOiA7IC0tdHctYmFja2Ryb3AtaW52ZXJ0OiA7IC0tdHctYmFja2Ryb3Atb3BhY2l0eTogOyAtLXR3LWJhY2tkcm9wLXNhdHVyYXRlOiA7IC0tdHctYmFja2Ryb3Atc2VwaWE6IDsgY29sb3I6IHJnYigwLCAwLCAwKTsiPkhPU1RJTkcxMCcgxJHhu4Mgbmjhuq1uIMawdSDEkcOjaSAxMCUgY2hvIGhvc3RpbmcgYuG6oW4gbmjDqTwvc3Bhbj48YnI+PGRpdj48c3BhbiBzdHlsZT0iLS10dy1ib3JkZXItc3BhY2luZy14OiAwOyAtLXR3LWJvcmRlci1zcGFjaW5nLXk6IDA7IC0tdHctdHJhbnNsYXRlLXg6IDA7IC0tdHctdHJhbnNsYXRlLXk6IDA7IC0tdHctcm90YXRlOiAwOyAtLXR3LXNrZXcteDogMDsgLS10dy1za2V3LXk6IDA7IC0tdHctc2NhbGUteDogMTsgLS10dy1zY2FsZS15OiAxOyAtLXR3LXBhbi14OiA7IC0tdHctcGFuLXk6IDsgLS10dy1waW5jaC16b29tOiA7IC0tdHctc2Nyb2xsLXNuYXAtc3RyaWN0bmVzczogcHJveGltaXR5OyAtLXR3LWdyYWRpZW50LWZyb20tcG9zaXRpb246IDsgLS10dy1ncmFkaWVudC12aWEtcG9zaXRpb246IDsgLS10dy1ncmFkaWVudC10by1wb3NpdGlvbjogOyAtLXR3LW9yZGluYWw6IDsgLS10dy1zbGFzaGVkLXplcm86IDsgLS10dy1udW1lcmljLWZpZ3VyZTogOyAtLXR3LW51bWVyaWMtc3BhY2luZzogOyAtLXR3LW51bWVyaWMtZnJhY3Rpb246IDsgLS10dy1yaW5nLWluc2V0OiA7IC0tdHctcmluZy1vZmZzZXQtd2lkdGg6IDBweDsgLS10dy1yaW5nLW9mZnNldC1jb2xvcjogI2ZmZjsgLS10dy1yaW5nLWNvbG9yOiByZ2JhKDYzLDEzMSwyNDgsLjUpOyAtLXR3LXJpbmctb2Zmc2V0LXNoYWRvdzogMCAwICMwMDAwOyAtLXR3LXJpbmctc2hhZG93OiAwIDAgIzAwMDA7IC0tdHctc2hhZG93OiAwIDAgIzAwMDA7IC0tdHctc2hhZG93LWNvbG9yZWQ6IDAgMCAjMDAwMDsgLS10dy1ibHVyOiA7IC0tdHctYnJpZ2h0bmVzczogOyAtLXR3LWNvbnRyYXN0OiA7IC0tdHctZ3JheXNjYWxlOiA7IC0tdHctaHVlLXJvdGF0ZTogOyAtLXR3LWludmVydDogOyAtLXR3LXNhdHVyYXRlOiA7IC0tdHctc2VwaWE6IDsgLS10dy1kcm9wLXNoYWRvdzogOyAtLXR3LWJhY2tkcm9wLWJsdXI6IDsgLS10dy1iYWNrZHJvcC1icmlnaHRuZXNzOiA7IC0tdHctYmFja2Ryb3AtY29udHJhc3Q6IDsgLS10dy1iYWNrZHJvcC1ncmF5c2NhbGU6IDsgLS10dy1iYWNrZHJvcC1odWUtcm90YXRlOiA7IC0tdHctYmFja2Ryb3AtaW52ZXJ0OiA7IC0tdHctYmFja2Ryb3Atb3BhY2l0eTogOyAtLXR3LWJhY2tkcm9wLXNhdHVyYXRlOiA7IC0tdHctYmFja2Ryb3Atc2VwaWE6IDsgY29sb3I6IHJnYigwLCAwLCAwKTsiPjxzcGFuIHN0eWxlPSJjb2xvcjogcmdiKDMzLCAzNywgNDEpOyI+LSBOaOG6rXAgbcOjIGdp4bqjbSBnacOhICc8L3NwYW4+PHNwYW4gc3R5bGU9Ii0tdHctYm9yZGVyLXNwYWNpbmcteDogMDsgLS10dy1ib3JkZXItc3BhY2luZy15OiAwOyAtLXR3LXRyYW5zbGF0ZS14OiAwOyAtLXR3LXRyYW5zbGF0ZS15OiAwOyAtLXR3LXJvdGF0ZTogMDsgLS10dy1za2V3LXg6IDA7IC0tdHctc2tldy15OiAwOyAtLXR3LXNjYWxlLXg6IDE7IC0tdHctc2NhbGUteTogMTsgLS10dy1wYW4teDogOyAtLXR3LXBhbi15OiA7IC0tdHctcGluY2gtem9vbTogOyAtLXR3LXNjcm9sbC1zbmFwLXN0cmljdG5lc3M6IHByb3hpbWl0eTsgLS10dy1ncmFkaWVudC1mcm9tLXBvc2l0aW9uOiA7IC0tdHctZ3JhZGllbnQtdmlhLXBvc2l0aW9uOiA7IC0tdHctZ3JhZGllbnQtdG8tcG9zaXRpb246IDsgLS10dy1vcmRpbmFsOiA7IC0tdHctc2xhc2hlZC16ZXJvOiA7IC0tdHctbnVtZXJpYy1maWd1cmU6IDsgLS10dy1udW1lcmljLXNwYWNpbmc6IDsgLS10dy1udW1lcmljLWZyYWN0aW9uOiA7IC0tdHctcmluZy1pbnNldDogOyAtLXR3LXJpbmctb2Zmc2V0LXdpZHRoOiAwcHg7IC0tdHctcmluZy1vZmZzZXQtY29sb3I6ICNmZmY7IC0tdHctcmluZy1jb2xvcjogcmdiYSg2MywxMzEsMjQ4LC41KTsgLS10dy1yaW5nLW9mZnNldC1zaGFkb3c6IDAgMCAjMDAwMDsgLS10dy1yaW5nLXNoYWRvdzogMCAwICMwMDAwOyAtLXR3LXNoYWRvdzogMCAwICMwMDAwOyAtLXR3LXNoYWRvdy1jb2xvcmVkOiAwIDAgIzAwMDA7IC0tdHctYmx1cjogOyAtLXR3LWJyaWdodG5lc3M6IDsgLS10dy1jb250cmFzdDogOyAtLXR3LWdyYXlzY2FsZTogOyAtLXR3LWh1ZS1yb3RhdGU6IDsgLS10dy1pbnZlcnQ6IDsgLS10dy1zYXR1cmF0ZTogOyAtLXR3LXNlcGlhOiA7IC0tdHctZHJvcC1zaGFkb3c6IDsgLS10dy1iYWNrZHJvcC1ibHVyOiA7IC0tdHctYmFja2Ryb3AtYnJpZ2h0bmVzczogOyAtLXR3LWJhY2tkcm9wLWNvbnRyYXN0OiA7IC0tdHctYmFja2Ryb3AtZ3JheXNjYWxlOiA7IC0tdHctYmFja2Ryb3AtaHVlLXJvdGF0ZTogOyAtLXR3LWJhY2tkcm9wLWludmVydDogOyAtLXR3LWJhY2tkcm9wLW9wYWNpdHk6IDsgLS10dy1iYWNrZHJvcC1zYXR1cmF0ZTogOyAtLXR3LWJhY2tkcm9wLXNlcGlhOiA7Ij5ET01BSU4xMCcgxJHhu4Mgbmjhuq1uIMawdSDEkcOjaSAxMCUgY2hvIGRvbWFpbiBi4bqhbiBuaMOpPC9zcGFuPjxicj48L3NwYW4+PC9kaXY+', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for trans_bank
-- ----------------------------
DROP TABLE IF EXISTS `trans_bank`;
CREATE TABLE `trans_bank`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sotien` int(11) NULL DEFAULT NULL,
  `noidung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `uid` int(11) NULL DEFAULT NULL,
  `mgd` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `createdtime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of trans_bank
-- ----------------------------
INSERT INTO `trans_bank` VALUES (70, 'admin', 10000, '1', 1, 'FT24179008370029BNK', 1, '2024-06-27 06:13:178');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LastLogin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Level` int(11) NULL DEFAULT 1,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Cash` int(11) NULL DEFAULT 0,
  `Ban` int(11) NULL DEFAULT 0,
  `Token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'NO',
  `Auth` int(11) NOT NULL DEFAULT -1,
  `Avt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'assets/img/avt.jpg',
  `Name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `API_Key` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'nguyen', '2025-03-16 08:41:74', 3, 'kngyen205@gmail.com', 0, 0, 'NO', -1, 'assets/img/avt.jpg', '', '12d84957204a7f0fe73ee85267bd8efd');
INSERT INTO `users` VALUES (2, 'KhNguyenZ', 'nguyen', '2024-07-05 01:02:186', 1, 'knguyen151108@gmail.com', 0, 0, 'NO', -1, 'assets/img/avt.jpg', NULL, NULL);
INSERT INTO `users` VALUES (3, 'KhNguyenZxx', '1', NULL, 1, 'kngyen205@gmail.com', 0, 0, 'a37ae22c867f1a1414248b2fb84775af', -1, 'assets/img/avt.jpg', NULL, NULL);
INSERT INTO `users` VALUES (4, 'testuser', '123456', NULL, 1, '123456', 0, 0, 'a0b505588edcebc2938656facc61e33a', -1, 'assets/img/avt.jpg', NULL, NULL);

-- ----------------------------
-- Table structure for users_napthe
-- ----------------------------
DROP TABLE IF EXISTS `users_napthe`;
CREATE TABLE `users_napthe`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `serial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mgd` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `uid` int(11) NULL DEFAULT NULL,
  `server_api` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `createdtime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users_napthe
-- ----------------------------
INSERT INTO `users_napthe` VALUES (27, 'VIETTEL', '30000', '12345678945345', '7094262011', '12345678945342', '3', 1, '', NULL);
INSERT INTO `users_napthe` VALUES (28, 'VIETTEL', '30000', '12345678945345', '9114897189', '12345678945342', '3', 1, 'https://www.doithe1s.vn/', NULL);
INSERT INTO `users_napthe` VALUES (29, 'VIETTEL', '50000', '10010503229999', '9480149347', '610619328154163', '1', 1, 'https://www.doithe1s.vn/', NULL);

-- ----------------------------
-- Table structure for voucher
-- ----------------------------
DROP TABLE IF EXISTS `voucher`;
CREATE TABLE `voucher`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `discount` int(11) NULL DEFAULT NULL,
  `limit` int(11) NULL DEFAULT NULL,
  `type` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of voucher
-- ----------------------------
INSERT INTO `voucher` VALUES (1, 'GIAMGIA10', 10, 1, 1);
INSERT INTO `voucher` VALUES (5, 'HOSTING10', 10, 1000, 2);

SET FOREIGN_KEY_CHECKS = 1;
