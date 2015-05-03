/*
SQL Dump
Navicat SQLite Data Transfer

Source Server         : cms-phpacademy
Source Server Version : 30808
Source Host           : :0

Target Server Type    : SQLite
Target Server Version : 30808
File Encoding         : 65001

Date: 2015-05-01 22:46:58
*/

PRAGMA foreign_keys = OFF;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS "main"."articles";
CREATE TABLE "articles" (
"article_id"  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"article_title"  TEXT(255),
"article_content"  TEXT,
"article_timestamp"  INTEGER
);

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO "main"."articles" VALUES (1, 'Introduction to PHP OOP', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 1430545497);
INSERT INTO "main"."articles" VALUES (2, 'Advanced PHP', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 1430545498);
INSERT INTO "main"."articles" VALUES (3, 'Laravel vs CodeIgniter vs CakePHP comparision', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 1430545499);
