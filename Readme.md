# TYPO3 CMS Extension news_feuser

This extension extends the news record by a relation to a **FE User**.

## Requirements

- TYPO3 CMS 8.7+
- EXT:news 6+
- License: GPL 2

## Installation

Install the extension as any other extension.

If you use composer, use `composer require georgringer/news-feuser`.

## Usage

### Rendering the user

After filling out the relation, you are able to output the fe user with

```
<!-- Show the full model -->
<f:debug>{newsItem.newsFeUser}</f:debug>

<!-- Show the names -->
<f:if condition="{newsItem.newsFeUser}">
    <ul>
    <f:for each="{newsItem.newsFeUser}" as="user">
        <li>{user.firstName} {user.lastName}</li>
    </f:for>
    </ul>
</f:if>
```

### `perUser` Action

An additional action is added to the plugin which allows to show the news items which belong to a given frontend user. The name of the *GET* argument is defined in the configuration of the extension manager of the extension.

Set it to `user|id` if the GET argument is called `&user[id]`.

Duplicate the template file `List.html` with the name `PerUser.html` which will output the news of the given user.
