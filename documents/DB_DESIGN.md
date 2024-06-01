# データベース設計

## users : ユーザーテーブル ※ ユーザーの基本情報

| 列名     | データ型     | 制約                        | 説明                   |
| -------- | ------------ | --------------------------- | ---------------------- |
| 🔑id     | BIGINT       | PRIMARY KEY、AUTO_INCREMENT | ユーザー ID            |
| name     | VARCHAR(50)  | NOT NULL                    | ユーザー名             |
| email    | VARCHAR(255) | NOT NULL, UNIQUE            | メールアドレス         |
| password | VARCHAR(255) | NOT NULL                    | パスワードのハッシュ化 |

## family_groups : ファミリーグループテーブル ※ 子供の情報を家族で共有する

| 列名       | データ型 | 制約                                  | 説明        |
| ---------- | -------- | ------------------------------------- | ----------- |
| 🔑id       | BIGINT   | PRIMARY KEY、AUTO_INCREMENT           | レコード ID |
| 🔗user_id  | BIGINT   | FOREIGN KEY (users.id)、 NOT NULL     | ユーザー ID |
| 🔗child_id | BIGINT   | FOREIGN KEY (childrens.id)、 NOT NULL | 子供 ID     |

## childrens : 子供テーブル ※ 子供に関する情報

| 列名       | データ型     | 制約                              | 説明                    |
| ---------- | ------------ | --------------------------------- | ----------------------- |
| 🔑id       | BIGINT       | PRIMARY KEY、AUTO_INCREMENT       | 子供 ID                 |
| name       | VARCHAR(255) | NOT NULL                          | 子供の名前              |
| gender     | CHAR(1)      | NOT NULL                          | 性別 (M: 男性, F: 女性) |
| birth_date | DATE         | NOT NULL                          | 生年月日                |
| icon_image | VARCHAR(255) | NULL                              | アイコン画像の PATH     |

## children_likes : 子供の好きなことテーブル

| 列名          | データ型     | 制約                                  | 説明          |
| ------------- | ------------ | ------------------------------------- | ------------- |
| 🔑id          | BIGINT       | PRIMARY KEY、AUTO_INCREMENT           | 好きなこと ID |
| 🔗child_id    | BIGINT       | FOREIGN KEY (childrens.id)、 NOT NULL | 子供 ID       |
| like          | VARCHAR(255) | NOT NULL                              | 好きなもの    |
| registered_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP             | 登録日時      |

## children_dislikes : 子供の嫌いなことテーブル

| 列名          | データ型     | 制約                                  | 説明          |
| ------------- | ------------ | ------------------------------------- | ------------- |
| 🔑id          | BIGINT       | PRIMARY KEY、AUTO_INCREMENT           | 嫌いなこと ID |
| 🔗child_id    | BIGINT       | FOREIGN KEY (childrens.id)、 NOT NULL | 子供 ID       |
| dislike       | VARCHAR(255) | NOT NULL                              | 嫌いなもの    |
| registered_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP             | 登録日時      |

## child_daily_records : 毎日育児記録テーブル

| 列名                       | データ型     | 制約                                  | 説明                                                                     |
| -------------------------- | ------------ | ------------------------------------- | ------------------------------------------------------------------------ |
| 🔑id                       | BIGINT       | PRIMARY KEY、AUTO_INCREMENT           | 記録 ID                                                                  |
| 🔗child_id                 | BIGINT       | FOREIGN KEY (childrens.id)、 NOT NULL | 子供 ID                                                                  |
| health_status              | TINYINT      | NOT NULL                              | 健康状態 (1 - 非常に良い、2 - 良い、3 - 普通、4 - 悪い 、5 - 非常に悪い) |
| body_temperature           | DECIMAL(4,2) | NULL                                  | 体温 (例: 37.5)                                                          |
| stool_count                | TINYINT      | NULL                                  | うんちの回数                                                             |
| morning_medication_taken   | BOOLEAN      | NULL                                  | 朝に薬を飲んだかどうか                                                   |
| afternoon_medication_taken | BOOLEAN      | NULL                                  | 昼に薬を飲んだかどうか                                                   |
| evening_medication_taken   | BOOLEAN      | NULL                                  | 晩に薬を飲んだかどうか                                                   |
| bedtime_medication_taken   | BOOLEAN      | NULL                                  | 寝る前に薬を飲んだかどうか                                               |
| new_ability                | TEXT         | NULL                                  | できるようになったこと                                                   |
| comment                    | TEXT         | NULL                                  | コメント                                                                 |
| image                      | VARCHAR(255) | NULL                                  | 画像                                                                     |
| record_date                | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP             | 記録日時                                                                 |

## child_symptoms : 子供の症状

| 列名        | データ型 | 制約                                 | 説明                                                                |
| ----------- | -------- | ------------------------------------ | ------------------------------------------------------------------- |
| 🔑id        | BIGINT   | PRIMARY KEY、AUTO_INCREMENT          | 症状 ID                                                             |
| 🔗record_id | BIGINT   | FOREIGN KEY (child_daily_records.id) | 記録 ID                                                             |
| symptom     | TINYINT  | NULL                                 | 症状 (0 - 無し、1 - 咳、2 - 鼻水、3 - 発熱、4 - 嘔吐、5 - 下痢など) |

## ai_daily_report_comments : AI 日報コメントテーブル

| 列名                    | データ型 | 制約                                            | 説明        |
| ----------------------- | -------- | ----------------------------------------------- | ----------- |
| 🔑id                    | BIGINT   | PRIMARY KEY、AUTO_INCREMENT                     | レポート ID |
| 🔗child_daily_record_id | BIGINT   | FOREIGN KEY (child_daily_records.id)、 NOT NULL | 記録 ID     |
| comment                 | TEXT     | NULL                                            | AI コメント |
