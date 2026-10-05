# MornRain Minimal

> A distraction-free single column for long-form reading.

`MornRain Minimal` is a standalone WordPress theme by **MornRain**. It ships as pure
code with **zero third-party runtime dependencies**, loads **no external CDN**
assets, contacts **no remote service** and creates **no extra database tables**.

| Item | Value |
| --- | --- |
| License | GNU General Public License v2 or later |
| Minimum WordPress | 6.0 |
| Minimum PHP | 8.0 |
| Text domain | `mornrain-minimal` |
| Function prefix | `mornrain_minimal` |

---

## Table of contents

1. [Features](#features)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Configuration](#configuration)
5. [File structure](#file-structure)
6. [Development and quality checks](#development-and-quality-checks)
7. [Frequently asked questions](#frequently-asked-questions)
8. [Changelog](#changelog)
9. [License](#license)

---

## Features

- A single 42.5rem reading column with no sidebar anywhere.
- Serif body text paired with a clean system sans-serif for UI chrome.
- Large, airy line-height tuned for long-form essays.
- Minimal chrome: no borders, no shadows, no decorative elements.
- Small-caps meta lines that stay out of the reader's way.
- Automatic responsive downscale to a comfortable mobile measure.
- Print styles that produce a clean, link-aware paper layout.

---

## Requirements

| Component | Minimum | Recommended |
| --- | --- | --- |
| WordPress | 6.0 | 6.6 or newer |
| PHP | 8.0 | 8.3 |
| MySQL | 5.7 | 8.0 |
| MariaDB | 10.3 | 10.11 |

---

## Installation

### Option A - Upload a ZIP archive (recommended)

1. Download or clone this repository.
2. Compress the `mornrain-minimal` folder itself into `mornrain-minimal.zip`. The archive must
   contain the theme folder, not the repository root.
3. In WordPress go to **Appearance > Themes > Add New > Upload Theme**.
4. Choose `mornrain-minimal.zip`, click **Install Now**, then **Activate**.

### Option B - Copy the folder over FTP / SSH

1. Copy the whole `mornrain-minimal` folder into `wp-content/themes/`.
2. Go to **Appearance > Themes** and activate `MornRain Minimal`.

### Option C - Git clone (developer workflow)

```bash
cd wp-content/themes
git clone https://github.com/mornrain-lin/mornrain-minimal.git
```

---

## Configuration

| What | Where | Notes |
| --- | --- | --- |
| Primary menu | Appearance > Menus | Assign a menu to the **Primary Menu** location. |
| Footer menu | Appearance > Menus | Assign a menu to the **Footer Menu** location. |
| Custom logo | Appearance > Customize > Site Identity | Optional; falls back to the site title. |
| Site title and tagline | Settings > General | Rendered in the header and footer. |
| Widgets | - | This theme registers no widget areas by design. |
| Reading settings | Settings > Reading | Feed length and front page behaviour follow core settings. |

The theme stores nothing beyond standard WordPress theme mods. Switching away
from it leaves no residue behind.

---

## File structure

```text
mornrain-minimal/          # MornRain Minimal 主题根目录：长文单栏阅读
|-- .github/               # GitHub 仓库配置目录
|   `-- workflows/         # GitHub Actions 工作流目录
|       `-- build.yml      # CI 工作流：在 PHP 8.1–8.3 上 lint、跑 PHPUnit 并打包 ZIP 构件
|-- assets/                # 前端静态资源目录
|   |-- css/               # 样式资源目录
|   |   `-- main.css       # 主样式：42.5rem 单栏阅读度量、衬线正文与克制留白
|   `-- js/                # 脚本资源目录
|       `-- main.js        # 渐进增强脚本：移动端菜单开合与宽表格横向滚动
|-- tests/                 # PHPUnit 测试目录
|   |-- ScaffoldTest.php   # 脚手架冒烟测试：断言 README、LICENSE、composer.json 与入口文件存在
|   `-- bootstrap.php      # PHPUnit 引导文件：存在时才加载 Composer 自动加载器
|-- 404.php                # 404 模板：未找到提示与搜索入口
|-- archive.php            # 归档模板：单栏归档文章列表
|-- composer.json          # Composer 元数据与 lint/test 脚本
|-- footer.php             # 页脚模板：页脚菜单与版权信息
|-- functions.php          # 主题初始化：导航菜单、缩略图、编辑器样式与资源挂载（不注册自定义图尺寸）
|-- header.php             # 头部模板：head 元信息、站点品牌区与主导航
|-- index.php              # 首页模板：单栏文章列表
|-- LICENSE                # GPL-2.0-or-later 许可证全文
|-- page.php               # 独立页面模板：页面标题与正文
|-- phpunit.xml.dist       # PHPUnit 配置，扫描 tests 目录
|-- README.md              # 主题说明文档
|-- search.php             # 搜索结果模板：检索词标题与结果列表
|-- single.php             # 单篇文章模板：标题、元信息、特色图与正文
`-- style.css              # 主题头信息与基础样式，承载单栏长文阅读基调
```

---

## Development and quality checks

```bash
composer install
composer validate
composer lint   # runs php -l over every PHP file
composer test   # runs PHPUnit
```

Coding style follows the
[WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/):
tab indentation, Yoda conditions, prefixed global functions (`mornrain_minimal*`),
nonces and capability checks where relevant, and escaped output everywhere.

Continuous integration lives in `.github/workflows/build.yml`. It runs on every
push and pull request across PHP 8.1, 8.2 and 8.3: `composer install`,
`php -l` linting, PHPUnit, and finally packages a release ZIP as a build
artifact.

---

## Frequently asked questions

### Is there really no sidebar?

Correct. The theme registers no widget areas at all, so no sidebar markup is
ever generated.

### What reading width does it use?

A 42.5rem measure, which translates to roughly 65-75 Latin characters per line
depending on the font.

### Which font is used for body copy?

A serif stack that prefers the reader's platform serif, followed by Georgia and
a generic serif fallback.

### Can I add a table of contents?

Yes, any block or plugin that outputs a list will inherit the theme's spacing.

### Does it support full-width images?

Yes. Use a full-width or wide block alignment; the theme expands those blocks
past the measure while keeping the text column intact.

---

## Changelog

### 1.0.0

- Initial public release.

---

## License

Released under the **GNU General Public License v2 or later**.

```text
This program is free software; you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation; either version 2 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE. See the GNU General Public License for more details.
```

See [LICENSE](LICENSE) for the full text.
