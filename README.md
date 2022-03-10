# Acquia CMS Starter toolkit
This is the sample repository having acquia_cms_starter_toolkit code build & install acms drupal site.

# Installation
Composer is the recommended way to download this tool. In order to download this tool, run the below composer command:

```
composer config repositories.acquia_cms_starterkit vcs 'git@github.com:vishalkhode1/acms-base.git'
```

OR optionally, you can add the following code under repository section in your project root composer.json file:

```
"acquia_cms_starterkit": {
  "type": "vcs",
  "url": "git@github.com:vishalkhode1/acms-base.git"
},
```
After the composer repository is added, run the below composer command to download the tool:

```
composer require vishal/acquia_base:dev-develop
```

# Usage

Run the following command to print hello world:
```
./vendor/bin/acms hello
```