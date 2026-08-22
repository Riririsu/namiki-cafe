# Namiki Coffee — WordPress テーマ

架空のカフェ「並木珈琲」のコーポレートサイト用に制作した、オリジナルの WordPress クラシックテーマです。
静的コーディング（HTML/CSS/JS）を WordPress テーマ化したもので、プラグインに依存せず動作します。

## 特徴

- **クラシックテーマ**（ブロックテーマではありません） / WordPress 6.0 以上、PHP 7.4 以上
- **依存ライブラリなし** — スライダー・タブ・ハンバーガーメニュー・ギャラリーの無限スクロールはすべて素の JavaScript（`assets/js/main.js`）で実装
- **レスポンシブ対応**
- テンプレートを 1 ファイルずつ用意（トップ / お知らせ一覧 / お知らせ詳細 / 固定ページ）
- グローバルナビは固定メニューで自動表示され、「外観 > メニュー」でメニューを割り当てるとそちらが優先される

## ディレクトリ構成

```
namiki-coffee/
├── style.css            … テーマ情報（WordPress 必須ファイル）
├── functions.php        … スタイル/スクリプト読み込み、各種ヘルパー関数
├── header.php           … 共通ヘッダー
├── footer.php           … 共通フッター
├── front-page.php       … トップページ
├── home.php             … NEWS 一覧
├── single.php           … NEWS 詳細
├── page.php             … 固定ページ用フォールバック
├── index.php            … WordPress 必須のフォールバック
└── assets/
    ├── css/reset.css
    ├── css/main.css
    ├── js/main.js
    └── img/             … 画像を設置する場所（下記「画像について」参照）
```

## インストール

1. このリポジトリを clone または ZIP でダウンロードします。
2. `namiki-coffee/` フォルダごと、WordPress の `wp-content/themes/` にコピーします。
   （フォルダ名は `namiki-coffee` のままにしてください）
3. 管理画面「外観 > テーマ」から **Namiki Coffee** を有効化します。

## 画像について

**画像ファイルはこのリポジトリには含まれていません。** ロゴ・favicon・メインビジュアルのスライダー画像・
ギャラリー画像などは `namiki-coffee/assets/img/` に配置する前提で実装されています。
同じファイル名で画像を用意するか、各テンプレートの `assets/img/...` の参照先を差し替えてください。

<details>
<summary>必要な画像ファイル名の一覧</summary>

```
favicon.ico / favicon.png / favicon.svg / webclip.png
img_logo.png
img_FV_01_PC.png 〜 img_FV_04_PC.png      … メインビジュアル（PC）
img_FV_01_SP.jpg 〜 img_FV_04_SP.jpg      … メインビジュアル（SP）
img_concept_01.png / img_concept_02.png
img_about_01.png 〜 img_about_03.png
img_menu_season.png
img_food_1.png 〜 img_food_7.png
img_drink_1.png 〜 img_drink_8.png
img_lunch_1.png 〜 img_lunch_3.png
img_gallery-01.png 〜 img_gallery-07.png
```

</details>

## セットアップ

有効化後、以下の設定を行うと全テンプレートが正しく割り当てられます。

1. **固定ページを 2 つ作成**（本文は空で構いません）
   - 「トップページ」
   - 「お知らせ」
2. **「設定 > 表示設定」**
   - ホームページの表示：「固定ページ」
   - ホームページ：「トップページ」 → `front-page.php`
   - 投稿ページ：「お知らせ」 → `home.php`（詳細は `single.php`）
3. **「設定 > パーマリンク設定」** で「投稿名」を選択（推奨）

### お知らせ（投稿）の書き方

- **カテゴリー**：「メニュー」「お知らせ」などを作成して割り当てると、一覧・詳細に反映されます。未設定の場合は自動的に「お知らせ」と表示されます。
- **アイキャッチ画像**：詳細ページの写真部分に反映されます。未設定の場合は写真エリアごと非表示になります。
- **本文**：`the_content()` で出力されるため、ブロックエディタでそのまま執筆できます。

より詳しい導入手順は [`namiki-coffee/README.md`](namiki-coffee/README.md) を参照してください。

## カスタマイズのメモ

- コピーライトの年は `date('Y')` で自動的に更新されます。
- Google Map・Instagram・電話番号は現状ハードコードされています。頻繁に変更する場合は、カスタマイザーやカスタムフィールド化するとよいでしょう。
- 掲載されている電話番号（`000-0000-0000`）や住所は、デモ用のダミーデータです。

## ライセンス

[GNU General Public License v2 or later](LICENSE) で公開しています。

`assets/img/` に配置する画像・ロゴ等の素材は、このライセンスの対象外です。
